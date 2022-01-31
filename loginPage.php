<?php
    require_once 'bootstrap.php';

    /*if(isSet($_GET["action"]) && $_GET["action"]=="logout"){
        logUserOut();
    }*/

    

   /* if (isSet($_SESSION["Nickname"])) {
        $templateParams["notReadNotifies"] = $dbh->getNotReadNotifiesNumber($_POST["nickname"]);
        $templateParams["notifies"] = $dbh->getNotifies($_POST["nickname"]);
    }*/


    //LOGIN
    if(isSet($_POST["nickname"]) && isSet($_POST["password"]) && !isSet($_POST["name"])) {

        $login_result = $dbh->checkLogin($_POST["nickname"], hash("sha256", $_POST["password"]));
        $notifies_result = $dbh->getNotReadNotifiesNumber($_POST["nickname"]);
        if(count($login_result)!=0){
            registerLoggedUser($login_result[0], $login_result[0]["isVend"], $notifies_result[0]["notRead"]);
        }
        else{
            $templateParams["formmsg"] = "Login Error";
        }
    }

    //REGISTRAZIONE
    if(isSet($_POST["name"]) && isSet($_POST["surname"]) && isSet($_POST["email"]) && isSet($_POST["nickname"]) && isSet($_POST["password"])) {
        if (isSet($_POST["isVend"]) == NULL) {
            $registration_result= $dbh->addNewUser($_POST["name"], $_POST["surname"], 
                                                $_POST["nickname"],$_POST["email"],
                                                hash("sha256", $_POST["password"]),
                                                0);
        }else {
            $registration_result= $dbh->addNewUser($_POST["name"], $_POST["surname"], 
                                            $_POST["nickname"],$_POST["email"],
                                            hash("sha256", $_POST["password"]),
                                            1);
        }
    }
    
    if(isUserLoggedIn()){
        $templateParams["titolo"] = "Admin Page";
        $templateParams["pagereq"] = "template/mainPageTemplate.php";
        $templateParams["css"] = array("css/mainPageStyle.css", "css/header.css", "css/footer.css");
        $templateParams["categories"] = $dbh->getCategories();
    }
    else{
        $templateParams["titolo"] = "Login Page";
        $templateParams["pagereq"] = "template/loginPageTemplate.php";
        $templateParams["css"] = array("css/loginPage.css", "css/header.css", "css/footer.css");
        $templateParams["categories"] = $dbh->getCategories();
    }

    require 'template/base.php';
?> 