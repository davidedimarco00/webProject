<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function registerLoggedUser($logininfo, $isVendor){
    if($isVendor){
        $_SESSION["Nickname"] = $logininfo["NickVend"];
        $_SESSION["isVendor"] = true;
    }
    else{
        $_SESSION["Nickname"] = $logininfo["NickCliente"];
        $_SESSION["isVendor"] = false;
    }
    
    $_SESSION["Nome"] = $logininfo["Nome"];
    $_SESSION["Cognome"] = $logininfo["Cognome"];
}

function isUserLoggedIn(){
    return isSet($_SESSION["Cognome"]) && isSet($_SESSION["Nickname"]) && isSet($_SESSION["Nome"]);
}

function logUserOut(){
    $_SESSION["Nickname"] = NULL;
    $_SESSION["Nome"] = NULL;
    $_SESSION["Cognome"] = NULL;
    $_SESSION["isVendor"] = NULL;
}

function isUserVendor(){
    return isSet($_SESSION["isVendor"]) && $_SESSION["isVendor"];
}
?>