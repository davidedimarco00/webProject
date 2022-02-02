<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/productPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Product Details";
$templateParams["pagereq"] = "template/productTemplate.php";
//$templateParams["nomearticolo"] = $dbh->metodo per prendere l'articolo richiesto;
//Home Template
//$templateParams["venditore"] = $dbh->metodo per ottenere il venditore;
$templateParams["item"]=$dbh->getObject($_GET["cod"]);
/*$item["name"] = "MIC XEN02";
$item["shippingprice"] = "0";
$item["vendor"] = "briglia";
$item["price"] = "50";
$item["caratteristiche"] = array(array("numero di porte", "8"), array("Potenza", "8Wh"), array("Dimensioni", "15cm x 15cm x 6cm"));
$item["images"] = array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg", "images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg");*/

require 'template/base.php';
?>