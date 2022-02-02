<?php
require_once 'bootstrap.php';

//Home Template
$templateParams["css"] = "css/productPage.css";
$templateParams["titolo"] = "Products";
$templateParams["pagereq"] = "template/modifyitem.php";

/*Placeholder Templates: da sostituire con le query al database
$templateParams["items"] = array(array("codProdotto" => 1, "name" => "MIXER XEN02", "vendor" => "briglia", "price" => "50", "shippingprice" => "0", "images" => array("images/mixer.jpg", "images/mixer2.jpg", "images/mixer3.jpg")),
array("codProdotto" => 2, "name" => "Blue Yeti Microphone", "vendor" => "briglia", "price" => "132", "shippingprice" => "5", "images" => array("https://m.media-amazon.com/images/I/61LmU6eBjyL._AC_SL1500_.jpg", "https://images-na.ssl-images-amazon.com/images/G/29/apparel/rcxgs/tile._CB483369964_.gif", "https://m.media-amazon.com/images/I/81bYEr6onaL._AC_SL1500_.jpg")),
array("codProdotto" => 3, "name" => "Anker SoundCore Life Q30", "vendor" => "richi", "price" => "70", "shippingprice" => "7", "images" => array("https://m.media-amazon.com/images/I/61+WYAjltpL._AC_SL1500_.jpg", "https://m.media-amazon.com/images/I/71td6PxaFNL._AC_SL1500_.jpg")));
$var = 1;*/
//$templateParams["items"]=$dbh->getProductsOfVendor();
// qua va preso l'id dell'oggetto con il get
foreach($templateParams["items"] as $item){
    if(isSet($_GET["id"]) && is_numeric($_GET["id"]) && $_GET["id"]==$item["codProdotto"]){
        $var=$item["codProdotto"];
        break;
    }

}
$templateParams["item"] = $templateParams["items"][$var-1]; 
$templateParams["caratteristiche"] = array(array("numero di porte", "8"), array("Potenza", "8Wh"), array("Dimensioni", "15cm x 15cm x 6cm")); //TODO
require 'template/base.php';
?> 
