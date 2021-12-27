<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "homePage";
$templateParams["pagereq"] = "template/mainPage.php";
$templateParams["css"] = "css/mainPageStyle.css";

//$templateParams["qualcosa"] = $dbh->;
//Home Template
//$templateParams["articoli"] = $dbh->metodo per ottenere gli articoli della pagina principale;

require 'template/base.php';
?>