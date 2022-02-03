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

    if (isSet($_SESSION["Nickname"])) {
      $templateParams["notReadNotifies"] = $dbh->getNotReadNotifiesNumber($_SESSION["Nickname"]);
      $templateParams["notifies"] = $dbh->getNotifies($_SESSION["Nickname"]);
      print_r($templateParams["notifies"]);
    }
    $templateParams["items"]=$dbh->getRandomProducts(7);

    require 'template/base.php';
?>