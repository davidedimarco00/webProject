<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/orderConfirmedPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Order Details";
$templateParams["pagereq"] = "template/orderconfirmedTemplate.php";

require 'template/base.php';

?>