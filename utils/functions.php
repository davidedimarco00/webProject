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
    $_SESSION["idautore"] = $logininfo["idautore"];
    $_SESSION["username"] = $logininfo["username"];
    $_SESSION["nome"] = $logininfo["nome"];
}

function isUserLoggedIn(){
    return isSet($_SESSION["idautore"]) && isSet($_SESSION["username"]) && isSet($_SESSION["nome"]);
}

function logUserOut(){
    $_SESSION["idautore"] = NULL;
    $_SESSION["username"] = NULL;
    $_SESSION["nome"] = NULL;
}
?>