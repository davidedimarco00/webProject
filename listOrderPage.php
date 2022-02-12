<?php
    require_once "bootstrap.php";
    if (!isUserLoggedIn()){
        
    }
    $templateParams["orders"]=$dbh->getOrderCarts($_SESSION["Nickname"]);
    $templateParams["css"] = array("css/listPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Ordini";
    $templateParams["pagereq"] = "template/listOrderTemplate.php";
    require 'template/base.php';
?>