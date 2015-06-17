<?php

switch ( strtolower($_POST["type"]) ) {
    case "inköpsförslag":
        $pronoun = 'ditt';
        break;
    case "fjärrlåneansökan":
        $pronoun = 'din';
        break;
}

$messageSuccess = "Tack för " . $pronoun . " " . strtolower($_POST["type"]);
$messageFail = "Något gick fel. Skicka " . $pronoun . ' till <a href="mailto:biblioteket@vimmerby.se">biblioteket@vimmerby.se</a>';

?>