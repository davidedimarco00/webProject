<?php
function isActive($pagename){
    if(basename($_SERVER['PHP_SELF'])==$pagename){
        echo " class='active' ";
    }
}

function getIdFromName($name){
    return preg_replace("/[^a-z]/", '', strtolower($name));
}

function registerLoggedUser($logininfo){
    $_SESSION["NickCliente"] = $logininfo["NickCliente"];
    $_SESSION["Nome"] = $logininfo["Nome"];
    $_SESSION["Cognome"] = $logininfo["Cognome"];
}

function isUserLoggedIn(){
    return isSet($_SESSION["Cognome"]) && isSet($_SESSION["NickCliente"]) && isSet($_SESSION["Nome"]);
}

function logUserOut(){
    $_SESSION["NickCliente"] = NULL;
    $_SESSION["Nome"] = NULL;
    $_SESSION["Cognome"] = NULL;
}
?>