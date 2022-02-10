<?php    
require_once "bootstrap.php";

$cod=$_REQUEST["q"];
$dbh->addProductToCart($_SESSION["Nickname"],$cod);
echo "true";
?>