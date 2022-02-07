<?php
    require_once 'bootstrap.php';

    //Home Template
    $templateParams["css"] = array("css/productPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/itemListTemplate.php";
    if (isUserVendor()) {
        $templateParams["items"]=$dbh->getProductsByVendor($_SESSION["Nickname"]);
    }else {
        $templateParams["items"]=$dbh->getAllProducts();
        print_r($templateParams["items"]); //to delete
    }
    require 'template/base.php';
?>