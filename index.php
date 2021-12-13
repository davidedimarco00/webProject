<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "Titolo della Pagina";
//$templateParams["nome"] = "nomepagina.php";
//$templateParams["qualcosa"] = $dbh->;
//Home Template
//$templateParams["articoli"] = $dbh->metodo per ottenere gli articoli della pagina principale;

require 'template/base.php';
?>