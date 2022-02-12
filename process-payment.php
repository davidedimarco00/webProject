<?php
    require_once "bootstrap.php";


    var_dump($_POST);
    $date=date("Y-m-d");
    $date=strval($date);
    $deliver="UPS";

    $CodCarrello =$dbh->getCart($_SESSION["Nickname"]);

    $items=$dbh->getCartItems($CodCarrello);
    //aggiorno le quantità di prodotto
    foreach($items as $item){
        $product=$dbh->getProductById($item["CodProdotto"])[0];
        $dbh->updateProduct($product["CodProdotto"], $product["Nome"], $product["Descrizione"], $product["Prezzo"], $product["CodCategoria"], $product["Quantità"]-$item["quantita"], $product["Venditore"]);
    }

    //notifica cliente
    $CodNotifica = $dbh->insertNotify($date, "Your order is confirmed", $_SESSION["Nickname"]);

    //notifica venditore
    foreach($items as $item){
        $product=$dbh->getProductById($item["CodProdotto"])[0];
        $CodNotifica = $dbh->insertNotify($date, "Il tuo prodotto con codice: " . $product["CodProdotto"] . " è stato venduto a " . $_SESSION["Nickname"] . "." , $product["Venditore"]);
        print($CodNotifica);
    }
    

    $dbh->disableCart($CodCarrello, $_SESSION["Nickname"]);

    $CodOrdine = $dbh->insertOrder($CodCarrello,$date);

    $CodFattura = $dbh->insertBilling($CodOrdine, $dbh->totalPrice($CodCarrello), $_POST["name"], $_POST["surname"], $_POST["email"], ($_POST["address"] . $_POST["address2"] . $_POST["country"]), intval($_POST["zip"]));

    header("location: orderConfirmedPage.php");


?> 