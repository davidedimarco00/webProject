<?php
    require_once 'bootstrap.php';

    if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
        logUserOut();
    }
    if(isSet($_POST["username"]) && isSet($_POST["password"])){
        $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
        /*if($_POST["username"] == "briglia" && $_POST["password"] == "miao"){
            $login_result=array("id" => 0,"username" => "briglia","nome" => "Andrea Brigliadori");
        }*/
        if(count($login_result)!=0){
            registerLoggedUser($login_result[0]);
        }
    }
    
    if(isUserLoggedIn()){
        $templateParams["titolo"] = "Admin Page";
        $templateParams["pagereq"] = "template/mainPageTemplate.php";
        $templateParams["css"] = array("css/mainPageStyle.css", "css/header.css", "css/footer.css");
    }
    else{
        $templateParams["titolo"] = "Login Page";
        $templateParams["pagereq"] = "template/loginPageTemplate.php";
        $templateParams["css"] = array("css/loginPage.css", "css/header.css", "css/footer.css");
    }

    require 'template/base.php';
?> 