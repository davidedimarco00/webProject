<?php
require_once 'bootstrap.php';

//Home Template
$templateParams["css"] = "css/productPage.css";
$templateParams["titolo"] = "Product Details";
$templateParams["pagereq"] = "template/product.php";

//Placeholder Templates: da sostituire con le query al database
$templateParams["items"] = array(array("name" => "MIXER XEN02", "vendor" => "briglia", "price" => "50", "shippingprice" => "0", "images" => array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg")),
array("name" => "Blue Yeti Microphone", "vendor" => "briglia", "price" => "132", "shippingprice" => "5", "images" => array("https://m.media-amazon.com/images/I/61LmU6eBjyL._AC_SL1500_.jpg", "https://images-na.ssl-images-amazon.com/images/G/29/apparel/rcxgs/tile._CB483369964_.gif", "https://m.media-amazon.com/images/I/81bYEr6onaL._AC_SL1500_.jpg")),
array("name" => "Anker SoundCore Life Q30", "vendor" => "richi", "price" => "70", "shippingprice" => "7", "images" => array("https://m.media-amazon.com/images/I/61+WYAjltpL._AC_SL1500_.jpg", "https://m.media-amazon.com/images/I/71td6PxaFNL._AC_SL1500_.jpg")));
$var = 0;

// qua va preso l'id dell'oggetto con il get
if(isSet($_GET["id"]) && is_numeric($_GET["id"])){
    $var=$_GET["id"];
}
$templateParams["item"] = $templateParams["items"][$var]; 
/*
$templateParams["nomearticolo"] = "MIC XEN02";
$templateParams["spedizione"] = "0";
$templateParams["venditore"] = "briglia";
$templateParams["prezzo"] = "50";
$templateParams["caratteristiche"] = array(array("numero di porte", "8"), array("Potenza", "8Wh"), array("Dimensioni", "15cm x 15cm x 6cm"));
$templateParams["immagini"] = array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg", "images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg");*/
//<?php $current = $templateParams["items"][0];  <!-- qua va preso l'oggetto con il get -->
$templateParams["caratteristiche"] = array(array("numero di porte", "8"), array("Potenza", "8Wh"), array("Dimensioni", "15cm x 15cm x 6cm")); //TODO
require 'template/base.php';
?>