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


  /*  $templateParams["articoli"] = $dbh->getAllArticles();*/
    //$templateParams["qualcosa"] = $dbh->;
    //Home Template
    //$templateParams["articoli"] = $dbh->metodo per ottenere gli articoli della pagina principale;

    require 'template/base.php';
?>