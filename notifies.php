<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/notifies.css","css/header.css", "css/footer.css");
$templateParams["js"] = "js/notifies.js";

$templateParams["titolo"] = "Notifies";
$templateParams["pagereq"] = "template/notifiesTemplate.php";

if (isSet($_SESSION["Nickname"])) {
    $templateParams["allnotifies"]=$dbh->getAllNotifies($_SESSION["Nickname"]);
}

require 'template/base.php';

?>