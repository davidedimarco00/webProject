<?php
    require_once 'bootstrap.php';

    if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
      logUserOut();
    }
    //Base Template
    $templateParams["titolo"] = "homePage";
    $templateParams["pagereq"] = "template/whoWeAreTemplate.php";
    $templateParams["css"] = array("css/weAre.css", "css/header.css", "css/footer.css");
    $templateParams["categories"] = $dbh->getCategories();

    require 'template/base.php';
?>