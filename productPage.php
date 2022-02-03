<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/productPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Product Details";
$templateParams["pagereq"] = "template/productTemplate.php";
//$templateParams["nomearticolo"] = $dbh->metodo per prendere l'articolo richiesto;
//Home Template
//$templateParams["venditore"] = $dbh->metodo per ottenere il venditore;
$templateParams["item"]=$dbh->getObject($_GET["cod"])[0];
$templateParams["item"]["images"]=getImages($_GET["cod"]);

require 'template/base.php';
?>