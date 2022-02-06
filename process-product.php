<?php
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
        header("location: index.php?error=error");
    }

    //aggiungi
    if($_POST["action"]==0){
        $nome = htmlspecialchars($_POST["Nome"]);
        $desc = htmlspecialchars($_POST["Descrizione"]);
        $prezzo = (float) htmlspecialchars($_POST["Prezzo"]);
        //$vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        
        $result=1;
        $msg="error";
        $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
        var_dump($allresult);
        if($codcat !=-1){
            $codProdotto = $dbh->insertProduct($nome, $desc, $prezzo, $codcat);
            if($codProdotto != false){
                $msg="Success!";
            }
            else {
                $msg="Error!";
            }
        }
        header("location: index.php?formmsg=".$msg);
    }

    //agiorna/ modifica
    if($_POST["action"]==1){
        $nome = htmlspecialchars($_POST["Nome"]);
        $desc = htmlspecialchars($_POST["Descrizione"]);
        $prezzo = (float) htmlspecialchars($_POST["Prezzo"]);
        //$vend = $_SESSION["Nickname"];
        $codcat = (int) htmlspecialchars($_POST["category"]);
        $result=1;
        $allresult=uploadImages("images/", $_FILES["images"], $_POST["codProdotto"]);
        if($codcat != -1){
            //$imgarticolo = $msg;
            $codProdotto = $dbh->updateProduct((int)$_POST["codProdotto"], $nome, $desc, $prezzo, $codcat);
            if($codProdotto != false){
                $msg="Success!";
            }
            else {
                $msg="Error!";
            }
        }
        header("location: index.php?formmsg=".$msg);
    }
?> 
