<?php
require_once 'bootstrap.php';
if(!isUserLoggedIn()){
    header("Location: loginPage.php");
}

$CodCarrello =$dbh->getCart($_SESSION["Nickname"]);
if (isset($_GET["delete"])){
    $dbh->deleteCartProduct($CodCarrello,$_GET["delete"]);
}
if (isset($_GET["update"])){

}

$templateParams["css"] = array( "css/header.css", "css/footer.css","css/cartPage.css");
$templateParams["titolo"] = "Cart Details";
$templateParams["pagereq"] = "template/cartTemplate.php";




$templateParams["items"] =$dbh->getCartItems($CodCarrello);
$templateParams["total"] = $dbh->totalPrice($CodCarrello);


require 'template/base.php';
?>