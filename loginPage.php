<?php 
    require_once 'bootstrap.php';

    //LOGIN
    if(isSet($_POST["nickname"]) && isSet($_POST["password"]) && !isSet($_POST["name"])) {

        $login_result = $dbh->checkLogin($_POST["nickname"], hash("sha256", $_POST["password"]));
        $notifiesCount_result = $dbh->getNotReadNotifiesNumber($_POST["nickname"]);
        $notifies_result = $dbh->getNotifies($_POST["nickname"]);
        

        if(count($login_result)!=0){
            registerLoggedUser($login_result[0], $login_result[0]["isVend"], $notifiesCount_result[0]["notRead"], $notifies_result);
            $templateParams["formmsg"] = "Login Avvenuto Con Successo";
        }
        else{
            $templateParams["formmsg"] = "Nickname or Password Sbagliati";
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
        $templateParams["formmsg"]= "Registrazione Avvenuta con Successo!";
        $login_result = $dbh->checkLogin($_POST["nickname"], hash("sha256", $_POST["password"]));
        $notifiesCount_result = $dbh->getNotReadNotifiesNumber($_POST["nickname"]);
        $notifies_result = $dbh->getNotifies($_POST["nickname"]);
        

        if(count($login_result)!=0){
            registerLoggedUser($login_result[0], $login_result[0]["isVend"], $notifiesCount_result[0]["notRead"], $notifies_result);
        }
    }
    
    if(isUserLoggedIn()){
        header("location: index.php?formmsg=".$templateParams["formmsg"]);
       
    }
    else {
        $templateParams["titolo"] = "Login Page";
        $templateParams["pagereq"] = "template/loginPageTemplate.php";
        $templateParams["css"] = array("css/loginPage.css", "css/header.css", "css/footer.css");
    }

    require 'template/base.php';
?> 