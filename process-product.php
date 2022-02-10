<?php
    require_once "bootstrap.php";

    if (!isUserLoggedIn() || !isUserVendor() || !isSet($_POST["action"]) || ($_POST["action"]!=1 && $_POST["action"]!=2 && $_POST["action"]!=0)){
        header("location: index.php?formmsg=Permesso negato. ");
    }
    //elimina
    if ($_POST["submit"] == "Elimina"){
        $dbh->deleteProduct($_POST["codProdotto"]);
        header("location: index.php?formmsg=Prodotto eliminato con successo. ");
    }
    //aggiungi
    else if($_POST["action"]==0){
        $nome = htmlspecialchars($_POST["Nome"]);
        $desc = htmlspecialchars($_POST["Descrizione"]);
        $prezzo = (float) htmlspecialchars($_POST["Prezzo"]);
        $quant = (int) htmlspecialchars($_POST["Quantità"]);
        $vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        
        $msg="";
        var_dump($_FILES["images"]);
        if ($_FILES["images"]!=NULL && !empty($_FILES['images']["name"][0])){
            $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
            if(!empty($allresult)){
                $msg.="Errore nel caricamento di una o più immagini. ";
            }
        }
        
        if($codcat != "-1" && $nome != "" && $desc != "" && $prezzo != "" && $quant != "" && $vend != ""){
            $codProdotto = $dbh->insertProduct($nome, $desc, $prezzo, $codcat, $quant, $vend);
            if($codProdotto != false){
                $msg.="Prodotto inserito con successo. ";
            }
            else {
                $msg.="Errore nell'inserimento del prodotto. ";
            }
        }
        else{
            $msg.="Errore generico";
        }

        header("location: index.php?formmsg=".$msg);
    }

    //agiorna/ modifica
    else if($_POST["action"]==1){
        $msg="";
        var_dump($_POST);
        $nome = htmlspecialchars($_POST["Nome"]);
        $desc = htmlspecialchars($_POST["Descrizione"]);
        $prezzo = (float) htmlspecialchars($_POST["Prezzo"]);
        $quant = (int) htmlspecialchars($_POST["Quantità"]);
        $vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        
        if ($_FILES["images"]!=NULL && !empty($_FILES['images']["name"][0])){
            $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
            if(!empty($allresult)){
                foreach($allresult as $err){
                    $msg.=$err;
                }
            }
        }
        if($codcat != "-1" && !empty($dbh->getProductById((int)$_POST["codProdotto"])) && $nome != "" && $desc != "" && $prezzo != "" && $quant != "" && $vend != ""){
            $codProdotto = $dbh->updateProduct((int)$_POST["codProdotto"], $nome, $desc, $prezzo, $codcat, $quant, $vend);
            if($codProdotto != false){
                $msg.="Prodotto aggiornato con successo! ";
            }
            else {
                $msg.="Errore nell'aggiornamento del prodotto! ";
            }
        }
        else{
            $msg.="Errore generico. ";
        }
        $allimages=getImages($_POST["codProdotto"]);
        foreach($_POST as $index => $status){
            if ($status == "on" && tempImageCheck($allimages[$index])){
                removeImage($allimages[$index]);
            }
        }
        header("location: index.php?formmsg=".$msg);
    }
    else {
        header("location: index.php?formmsg=Errore Generico. ");
    }
?> 
