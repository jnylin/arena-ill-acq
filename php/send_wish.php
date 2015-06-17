<?php
// Läs in config
$ini_array = parse_ini_file("arenamejl.ini");

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: ' . $ini_array["origin"]);
header('Access-Control-Allow-Methods: POST');

// Skapa mejlet
require 'create_wish_mail.php';

// Skapa responsmeddelanden $messageSuccess och $messageFail
require 'create_messages.php';

// Och skicka det
if ( ($_POST["type"] != "") && ($_POST["name"] != "") && ($_POST["email"] != "") ) {
	$status = mb_send_mail($to, $subject, $m, $headers);
	if(!$status) {
		echo '{"success": false, "message": "' . $messageFail . '"}';
	}
	else {
		echo '{"success": true, "message": "' . $messageSuccess . '"}';	
	}
}
else {
	echo '{"error": "typenameemail=' . $_POST["type"] . $_POST["name"] . $_POST["email"] . '"}';
}

?>
