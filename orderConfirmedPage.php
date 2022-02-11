<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/header.css", "css/footer.css","css/orderConfirmedPage.css");
$templateParams["titolo"] = "Order Details";
$templateParams["pagereq"] = "template/orderconfirmedTemplate.php";

require 'template/base.php';

?>