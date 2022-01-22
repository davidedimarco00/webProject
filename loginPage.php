<?php
    require_once 'bootstrap.php';

    if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
        logUserOut();
    }
    if(isSet($_POST["username"]) && isSet($_POST["password"])){
        if(isSet($_POST["vendor"]) && $_POST["vendor"] == "on"){
            $isVendor=true;
            $login_result = $dbh->checkLogin($_POST["username"], hash("sha256", $_POST["password"]), $isVendor);
        }
        else {
            $isVendor=false;
            $login_result = $dbh->checkLogin($_POST["username"], hash("sha256", $_POST["password"]), $isVendor);
        }
        
        if(count($login_result)!=0){
            registerLoggedUser($login_result[0], $isVendor);
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