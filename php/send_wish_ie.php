<?php
if ( $_SERVER['REQUEST_METHOD'] === "POST" ) {
    header('Content-Type: text/html; charset=utf-8');
    $htmlTitle = "Inköpsförslag och fjärrlåneansökan på Vimmerby bibliotek";
    echo '<!DOCTYPE html><html><head><meta charset="utf-8" /><meta name="viewport" content="width=device-width, user-scalable=no" /><title>' . $htmlTitle . '</title><style>body{padding:0;}p{margin:0;font-family: Arial, sans-serif; font-size: 18px; font-weight: bold; color: #00416a;}</style></head><body>';
    // Läggg till css

    // Skapa mejlet
    require 'create_wish_mail.php';

    // Skapa responsmeddelanden $messageSuccess och $messageFail
    require 'create_messages.php';

    // Och skicka det
    if ( ($_POST["type"] != "") && ($_POST["name"] != "") && ($_POST["email"] != "") ) {
	    $status = mb_send_mail($to, $subject, $m, $headers);
	    if(!$status) {
		    echo '<p>' . $messageFail . '</p>';
	    }
	    else {
		    echo '<p>' . $messageSuccess . '</p>';
	    }
    }
    echo '</body></html>';
}
else {
    header("HTTP/1.1 403 Forbidden");
}

?>