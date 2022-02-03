<?php
    function isActive($pagename){
        if(basename($_SERVER['PHP_SELF'])==$pagename){
            echo " class='active' ";
        }
    }

    function getIdFromName($name){
        return preg_replace("/[^a-z]/", '', strtolower($name));
    }

    function registerLoggedUser($logininfo, $isVendor, $notifiesCount_result, $notifies_result) {
        if($isVendor){
            $_SESSION["Nickname"] = $logininfo["Nickname"];
            $_SESSION["isVendor"] = true;
        }
        else{
            $_SESSION["Nickname"] = $logininfo["Nickname"];
            $_SESSION["isVendor"] = false;
        }
        
        $_SESSION["Nome"] = $logininfo["Nome"];
        $_SESSION["Cognome"] = $logininfo["Cognome"];
        $_SESSION["NotifiesNumber"] = $notifiesCount_result;
        $_SESSION["notifies"] = $notifies_result;

    }

    function isUserLoggedIn(){
        return isSet($_SESSION["Cognome"]) && isSet($_SESSION["Nickname"]) && isSet($_SESSION["Nome"]);
    }

    function isUserHasNotifies(){
        return isSet($_SESSION["NotifiesNumber"]) && $_SESSION["NotifiesNumber"]!=0 &&
         isSet($_SESSION["notifies"]) && $_SESSION["notifies"]!=0;
    }

    function logUserOut(){
        $_SESSION["Nickname"] = NULL;
        $_SESSION["Nome"] = NULL;
        $_SESSION["Cognome"] = NULL;
        $_SESSION["isVendor"] = NULL;
        $_SESSION["NotifiesNumber"] = NULL;
        $_SESSION["notifies"]=NULL;
        session_destroy();
    }

    function isUserVendor(){
        return isSet($_SESSION["isVendor"]) && $_SESSION["isVendor"];
    }

    function getImages($codProdotto){
        $images = array();
        for($i=0; $i<10; $i++){
            $img="images/".$codProdotto."_".$i;
            if(exif_imagetype($img.".jpg")) {
                array_push($images, $img.".jpg");
            }
            if(exif_imagetype($img.".png")) {
                array_push($images, $img.".png");
            }
            if(exif_imagetype($img.".jpeg")) {
                array_push($images, $img.".jpeg");
            }
        }
        if($images==NULL || count($images)==0){
            return array("images/placeholder.jpg");
        }
        else {
            return $images;
        }
        
    }

    function getFirstImage($codProdotto){
        for($i=0; $i<10; $i++){
            $img="images/".$codProdotto."_".$i;
            if(exif_imagetype($img.".jpg")) {
                return $img.".jpg";
            }
            if(exif_imagetype($img.".png")) {
                return $img.".png";
            }
            if(exif_imagetype($img.".jpeg")) {
                return $img.".jpeg";
            }
        }
        return "images/placeholder.jpg";
    }
?>