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
//Placeholder Templates: da sostituire con le query al database
$templateParams["css"] = array( "css/header.css", "css/footer.css","css/cartPage.css");
$templateParams["titolo"] = "Cart Details";
$templateParams["pagereq"] = "template/cartTemplate.php";




$templateParams["items"] =$dbh->getCartItems($CodCarrello);

/*PROVE


public function getCartItems($CodCarrello){
    $query = "SELECT * from Incarrello JOIN prodotto
              ON Incarrello.CodProdotto = prodotto.CodProdotto
              WHERE Incarrello.CodCarrello=1;";
    $stmt = $this->db->prepare($query);
    $stmt->bind_param('i',$CodCarrello);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

public function deleteCartProduct($CodCarrello,$CodProdotto){
        $query = "DELETE FROM Incarrello WHERE CodProdotto = ? AND Incarrello.CodCarrello=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$CodProdotto,$CodCarrello);
        $stmt->execute();
        
        return true;
}

public function updateQuantity(){

}



*/

$templateParams["total"] = $dbh->totalPrice($CodCarrello);


require 'template/base.php';
?>