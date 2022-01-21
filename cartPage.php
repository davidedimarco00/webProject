<?php
require_once 'bootstrap.php';

//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array("css/cartPage.css", "css/header.css", "css/footer.css");
$templateParams["titolo"] = "Cart Details";
$templateParams["pagereq"] = "template/cartTemplate.php";

require 'template/base.php';

?>