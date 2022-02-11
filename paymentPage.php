<?php
require_once 'bootstrap.php';

$templateParams["css"] = array("css/paymentPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Payment Details";
$templateParams["pagereq"] = "template/paymentTemplate.php";


$CodCarrello =$dbh->getCart($_SESSION["Nickname"]);
$templateParams["total"] = $dbh->totalPrice($CodCarrello);

require 'template/base.php';
?>