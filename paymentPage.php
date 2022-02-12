<?php
require_once 'bootstrap.php';

$templateParams["css"] = array("css/paymentPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Payment Details";
$templateParams["pagereq"] = "template/paymentTemplate.php";


$CodCarrello =$dbh->getCart($_SESSION["Nickname"]);
$templateParams["total"] = $dbh->totalPrice($CodCarrello);
$templateParams["countries"]=array("Austria", "Belgio", "Bulgaria", "Cipro", "Croazia", "Danimarca", "Estonia", "Finlandia", "Francia", "Germania", "Grecia", "Irlanda", "Italia", "Lettonia", "Lituania", "Lussemburgo", "Malta", "Paesi Bassi", "Polonia", "Portogallo", "Repubblica Ceca", "Romania", "Slovacchia", "Slovenia", "Spagna", "Svezia", "Ungheria");
if($templateParams["total"]==0){
    header("location: cartPage.php");
}
require 'template/base.php';
?>