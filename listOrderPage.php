<?php
    require_once "bootstrap.php";
    if (!isUserLoggedIn()){
        header("location: index.php?formmsg=È necesario eseguire il login");
    }
    $templateParams["orders"]=$dbh->getOrderCarts($_SESSION["Nickname"]);
    $templateParams["css"] = array("css/listPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Ordini";
    $templateParams["pagereq"] = "template/listOrderTemplate.php";
    require 'template/base.php';
?>