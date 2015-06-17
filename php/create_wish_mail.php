<?php
// Inköpsförslag / fjärrlåneansökan
// Tar POST-anrop
// Mejlet skickas av send_wish.php eller send_wish_ie.php, där sker också kontroll av anropen

// Data för mejlet
$from = $_POST["name"] . " via Arena <" . $ini_array["sender"] . ">";

if ( isset ( $_POST["receiver"] ) ) {
	$to = $_POST["receiver"];
}
else {
	switch ( $_POST["type"] ) {
		case "Inköpsförslag":
			$to = $ini_array['receivers']['acq'];
        	break;
    	case "Fjärrlåneansökan":
			$to = $ini_array['receivers']['ill'];
        	break;
	}
}

$subject = $_POST["type"];
$replyTo = $_POST["name"] . " <" . $_POST["email"] . ">";


// Datum och mejlets id
$date = date(DATE_RFC2822);
$mid = "<" . sha1(microtime()) . "@" . $_SERVER['HTTP_HOST'] . ">";

mb_internal_encoding("UTF-8");

$headers = "From: " . $from . "\r\n" .
"Reply-To: " . $replyTo . "\r\n" .
"Date: " . $date . "\r\n" .
"Message-ID: " . $mid . "\r\n" .
'X-Mailer: PHP/' . phpversion() . "\r\n" .
'Content-Type: text/plain; charset="utf-8"';

$m = "\n========================\n";
$m .= "Låntagare";
$m .= "\n========================\n";
$m .= "Lånekort: ";
if ( $_POST["title"] === "ITSAM" ) {
    $m .= "Dolt i exempelfilmen" ."\n";
}
else {
    $m .= $_POST["card"] . "\n"; // Obligatoriskt
}
$m .= "Namn: " . $_POST["name"] . "\n"; // Obligatoriskt
$m .= "E-post: " . $_POST["email"] . "\n"; // Obligatoriskt


$m .= "\n\n========================\n";
$m .= $_POST["type"]; // Obligatoriskt
$m .= "\n========================\n";
if ( $_POST["author"] != "" ) {
	$m .= "Författare: " . $_POST["author"] . "\n";
}
$m .= "Titel: " . $_POST["title"] . "\n"; // Obligatoriskt
if ( $_POST["publisher"] != "" ) {
	$m .= "Förlag: " . $_POST["publisher"] . "\n";
}
if ( $_POST["year"] != "" ) {
	$m .= "Utgivningsår: " . $_POST["year"] . "\n";
}
if ( $_POST["language"] != "" ) {
	$m .= "Språk: " . $_POST["language"] . "\n";
}
if ( $_POST["identifier"] != "" ) {
	$m .= "ISBN/ISSN: " . $_POST["identifier"] . "\n";
}

// Fritext
if ( $_POST["free"] != "" ) {
	$m .= "\n" . $_POST["free"] . "\n";
}
?>
