<?php
    require_once 'bootstrap.php';

    //Base Template
    $templateParams["titolo"] = "homePage";
    $templateParams["pagereq"] = "template/mainPageTemplate.php";
    $templateParams["css"] = array("css/mainPageStyle.css", "css/header.css", "css/footer.css");

    $templateParams["items"]=$dbh->getProductsByCategory($category);

    require 'template/base.php';
?>