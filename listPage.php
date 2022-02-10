<?php
    require_once 'bootstrap.php';

    if(isSet($_GET["vendor"])){
        $templateParams["title"]="Store di ".$_GET["vendor"];
        $templateParams["items"]=$dbh->getProductsByVendor($_GET["vendor"]);
        if(empty($templateParams["items"])){
            header("location: index.php?formmsg=Venditore non esistente. ");
        }
    }
    else if (isSet($_GET["cat"])){
        $templateParams["title"]="Prodotti della Categoria ".$_GET["cat"];
        $templateParams["items"]=$dbh->getProductsByCategory($_GET["cat"]);
        if(empty($templateParams["items"])){
            header("location: index.php?formmsg=Categoria non esistente. ");
        }
    }
    else if (isUserVendor()) {
        $templateParams["title"]="Store di ".$_SESSION["Nickname"];
        $templateParams["items"]=$dbh->getProductsByVendor($_SESSION["Nickname"]);
    }
    else {
        //$templateParams["items"]=$dbh->getAllProducts(); //TODO
        //$templateParams["items"]=$dbh->getPurchasedProducts($_SESSION["Nickname"]);
        header("location: index.php?formmsg=Venditore non esistente. ");
    }

    //Home Template
    $templateParams["css"] = array("css/productPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/itemListTemplate.php";
    require 'template/base.php';
?>