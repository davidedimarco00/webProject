<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = "css/productPage.css";
$templateParams["titolo"] = "Vendor Items";
$templateParams["pagereq"] = "template/vendor.php";
//$templateParams["nomearticolo"] = $dbh->metodo per prendere l'articolo richiesto;
//Home Template
//$templateParams["venditore"] = $dbh->metodo per ottenere il venditore;
$templateParams["items"] = array(array("name" => "MIXER XEN02", "vendor" => "briglia", "price" => "50", "images" => array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg")),
array("name" => "Blue Yeti Microphone", "vendor" => "briglia", "price" => "132", "images" => array("https://m.media-amazon.com/images/I/61LmU6eBjyL._AC_SL1500_.jpg", "https://m.media-amazon.com/images/I/81bYEr6onaL._AC_SL1500_.jpg")),
array("name" => "Anker SoundCore Life Q30", "vendor" => "briglia", "price" => "70", "images" => array("https://m.media-amazon.com/images/I/61+WYAjltpL._AC_SL1500_.jpg", "https://m.media-amazon.com/images/I/71td6PxaFNL._AC_SL1500_.jpg")));

require 'template/base.php';
?> 
