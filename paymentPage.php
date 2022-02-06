<?php
require_once 'bootstrap.php';

$templateParams["css"] = array("css/paymentPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Payment Details";
$templateParams["pagereq"] = "template/paymentTemplate.php";

$templateParams["total"] = 100.00;

require 'template/base.php';
?>