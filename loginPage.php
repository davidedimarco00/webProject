<?php
    require_once 'bootstrap.php';

    /*if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
        logUserOut();
    }*/
    if(isset($_POST["username"]) && isset($_POST["password"])){
        //$login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
        if($_POST["username"] == "briglia" && $_POST["password"] == "miao"){
            $login_result=array("id" => 0,"username" => "briglia","nome" => "Andrea Brigliadori");
        }
        if(count($login_result)==0){
            //Login fallito
            $templateParams["errorelogin"] = "Errore! Controllare username o password!";
        }
        else{
            registerLoggedUser($login_result);
        }
    }
    
    if(isUserLoggedIn()){
        $templateParams["titolo"] = "Admin Page";
        $templateParams["pagereq"] = "template/mainPageTemplate.php";
        $templateParams["css"] = "css/mainPageStyle.css";
        if(isset($_GET["formmsg"])){
            $templateParams["formmsg"] = $_GET["formmsg"];
        }
    }
    else{
        $templateParams["titolo"] = "Login Page";
        $templateParams["pagereq"] = "template/loginPageTemplate.php";
        $templateParams["css"] = array("css/loginPage.css", "css/header.css", "css/footer.css");
        var_dump($login_result);
    }

    require 'template/base.php';
?> 