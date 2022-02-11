<?php error_reporting(E_ALL); ini_set('display_errors', 1);
    require_once "bootstrap.php";
    $templateParams["orders"]=$dbh->getOrderCarts($_SESSION["Nickname"]);
    $templateParams["css"] = array("css/listPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Ordini";
    $templateParams["pagereq"] = "template/listOrderTemplate.php";
    require 'template/base.php';
?>