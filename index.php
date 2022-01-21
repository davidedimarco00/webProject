<?php
    require_once 'bootstrap.php';

    //Base Template
    $templateParams["titolo"] = "homePage";
    $templateParams["pagereq"] = "template/mainPageTemplate.php";
    $templateParams["css"] = array("css/mainPageStyle.css", "css/header.css", "css/footer.css");

    //$templateParams["qualcosa"] = $dbh->;
    //Home Template
    //$templateParams["articoli"] = $dbh->metodo per ottenere gli articoli della pagina principale;

    require 'template/base.php';
?>