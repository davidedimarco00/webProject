<?php
    require_once "bootstrap.php";


    var_dump($_POST);
    $date=date("Y-m-d");
    $date=strval($date);
    $deliver="UPS";

    $CodCarrello =$dbh->getCart($_SESSION["Nickname"]);

    $items=$dbh->getCartItems($CodCarrello);
    //aggiorno le quantità di prodotto
    $rollback=array();
    foreach($items as $item){
        $product=$dbh->getProductById($item["CodProdotto"])[0];
        
        if(($product["Quantità"]-$item["quantita"])<0){
            foreach($rollback as $err){
                $dbh->updateProduct($err["CodProdotto"], $err["Nome"], $err["Descrizione"], $err["Prezzo"], $err["CodCategoria"], $err["Quantità"], $err["Venditore"]);
            }
            foreach($items as $cartdel){
                $dbh->deleteCartProduct($CodCarrello,$cartdel["CodProdotto"]);
            }
            header("location: index.php?formmsg=Si è verificato un errore durante l'ordine. Il carrello è stato svuotato.");
        }
        $dbh->updateProduct($product["CodProdotto"], $product["Nome"], $product["Descrizione"], $product["Prezzo"], $product["CodCategoria"], $product["Quantità"]-$item["quantita"], $product["Venditore"]);
        array_push($rollback, $item);
    }

    //notifica cliente
    $CodNotifica = $dbh->insertNotify($date, "Il tuo ordine è stato completato con successo.", $_SESSION["Nickname"]);

    //notifica venditore
    foreach($items as $item){
        $product=$dbh->getProductById($item["CodProdotto"])[0];
        if ($product["Quantità"]<=0){
            $dbh->insertNotify($date, "Il tuo prodotto con codice: ".$product["CodProdotto"]." è esaurito.", $product["Venditore"]);
        }
        $CodNotifica = $dbh->insertNotify($date, "Il tuo prodotto con codice: " . $product["CodProdotto"] . " è stato venduto a " . $_SESSION["Nickname"] . "." , $product["Venditore"]);
        print($CodNotifica);
    }
    

    $dbh->disableCart($CodCarrello, $_SESSION["Nickname"]);

    $CodOrdine = $dbh->insertOrder($CodCarrello,$date);

    $CodFattura = $dbh->insertBilling($CodOrdine, $dbh->totalPrice($CodCarrello), $_POST["name"], $_POST["surname"], $_POST["email"], ($_POST["address"] . $_POST["address2"] . $_POST["country"]), intval($_POST["zip"]));

    header("location: orderConfirmedPage.php");


?> 