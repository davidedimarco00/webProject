<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Titolo della Pagina";
$templateParams["pagereq"] = "product.php";
//$templateParams["nomearticolo"] = $dbh->metodo per prendere l'articolo richiesto;
//Home Template
//$templateParams["venditore"] = $dbh->metodo per ottenere il venditore;

require 'template/base.php';
?>