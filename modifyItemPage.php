<?php
    require_once 'bootstrap.php';

    //Home Template
    $templateParams["css"] = array("css/header.css", "css/footer.css", "css/productPage.css");
    $templateParams["titolo"] = "Products";
    $templateParams["pagereq"] = "template/modifyitemTemplate.php";

    

    $templateParams["categories"]=$dbh->getCategories();
    if(isSet($_GET["cod"])){
        $templateParams["item"]=$dbh->getProductById($_GET["cod"])[0];
        if($templateParams["item"]==NULL){
            header("location: index.php?formmsg=l'oggetto richiesto non esiste");
        }
        $templateParams["action"]=1;
    }
    else{
        $templateParams["action"]=0;
    }
    require 'template/base.php';
?> 
