<?php
session_start();
require_once("utils/functions.php");
require_once("db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "dsoundsystemLOGIC", 3306);
if (isSet($_SESSION["Nickname"])) {
    $templateParams["notReadNotifies"] = $dbh->getNotReadNotifiesNumber($_SESSION["Nickname"]);
    $templateParams["notifies"] = $dbh->getNotifies($_SESSION["Nickname"]);
}
?> 
