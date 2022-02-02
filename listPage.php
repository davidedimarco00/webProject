<?php
    require_once 'bootstrap.php';

    //Home Template
    $templateParams["css"] = array("css/productPage.css", "css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/itemListTemplate.php";
    $templateParams["items"]=$dbh->getAllProducts();
    require 'template/base.php';
?> 