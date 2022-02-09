<?php error_reporting(E_ALL); ini_set('display_errors', 1);
    require_once 'bootstrap.php';

    /*Home Template
    $templateParams["css"] = array("css/header.css", "css/footer.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/modifyitemTemplate.php";

    $templateParams["item"]=$dbh->getProductById($_GET["cod"])[0];

    $templateParams["categories"]=$dbh->getCategories();
    
    var_dump($_POST);
    require 'template/base.php';*/
    //array(6) { ["Nome"]=> string(15) "Microphone EVIL" ["Descrizione"]=> string(20) "For professional use" ["Prezzo"]=> string(5) "79.99" ["category"]=> string(2) "-1" ["submit"]=> string(12) "Submit Query" ["action"]=> string(1) "0" } 
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
        $vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        
        $result=1;
        $msg="";
        var_dump($_FILES["images"]);
        if ($_FILES["images"]!=NULL && !empty($_FILES['images']["name"][0])){
            $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
            if(!empty($allresult)){
                $msg.="Errore nel caricamento di una o più immagini. ";
            }
        }
        
        if($codcat != "-1"){
            $codProdotto = $dbh->insertProduct($nome, $desc, $prezzo, $codcat, $vend);
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

        $nome = htmlspecialchars($_POST["Nome"]);
        $desc = htmlspecialchars($_POST["Descrizione"]);
        $prezzo = (float) htmlspecialchars($_POST["Prezzo"]);
        $vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        
        if ($_FILES["images"]!=NULL && !empty($_FILES['images']["name"][0])){
            $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
            if(!empty($allresult)){
                $msg.="Errore nel caricamento di una o più immagini. ";
            }
        }

        if($codcat != "-1" && !empty($dbh->getProductById((int)$_POST["codProdotto"]))){
            //$imgarticolo = $msg;
            $codProdotto = $dbh->updateProduct((int)$_POST["codProdotto"], $nome, $desc, $prezzo, $codcat, $vend);
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
        header("location: index.php?formmsg=".$msg);
    }
    else {
        header("location: index.php?formmsg=Errore Generico. ");
    }
?> 
