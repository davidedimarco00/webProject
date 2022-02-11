<?php    
require_once "bootstrap.php";

$cod=$_REQUEST["q"];
if($dbh->productInStock($cod, 1)){
    $dbh->addProductToCart($_SESSION["Nickname"],$cod);
    echo true;
}
else {
    echo false;
}

?>