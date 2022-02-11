<?php
    require_once 'bootstrap.php';

    if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
      logUserOut();
    }
    //Base Template
    $templateParams["titolo"] = "homePage";
    $templateParams["pagereq"] = "template/mainPageTemplate.php";
    $templateParams["css"] = array("css/mainPageStyle.css", "css/header.css", "css/footer.css");
    $templateParams["categories"] = $dbh->getCategories();
    $templateParams["items"]=$dbh->getRandomProducts(10);

    require 'template/base.php';
?>