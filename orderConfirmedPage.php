<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = "css/orderConfirmedPage.css";
$templateParams["titolo"] = "Order Details";
$templateParams["pagereq"] = "template/corderconfirmed.php";
//$templateParams["nomearticolo"] = $dbh->metodo per prendere l'articolo richiesto;
//Home Template
//$templateParams["venditore"] = $dbh->metodo per ottenere il venditore;
/*
$templateParams["nomearticolo"] = "MIC XEN02";
$templateParams["spedizione"] = "0";
$templateParams["venditore"] = "briglia";
$templateParams["prezzo"] = "50";
$templateParams["caratteristiche"] = array(array("numero di porte", "8"), array("Potenza", "8Wh"), array("Dimensioni", "15cm x 15cm x 6cm"));
$templateParams["immagini"] = array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg", "images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg");
*/
require 'template/base.php';

?>