<?php //error_reporting(E_ALL); ini_set('display_errors', 1);
    function isActive($pagename){
        if(basename($_SERVER['PHP_SELF'])==$pagename){
            echo " class='active' ";
        }
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

    function tempImageCheck($img){
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        if (is_file($img)){
            $type = finfo_file($finfo, $img);
            return isset($type) && in_array($type, array("image/png", "image/jpeg", "image/gif"));
        }
        else {
            return false;
        }
        return false;
        
    }

    function getImages($codProdotto){
        $images = array();
        for($i=0; $i<10; $i++){
            $img="images/".$codProdotto."_".$i;
            if(tempImageCheck($img.".jpg")) {
                array_push($images, $img.".jpg");
            }
            if(tempImageCheck($img.".png")) {
                array_push($images, $img.".png");
            }
            if(tempImageCheck($img.".jpeg")) {
                array_push($images, $img.".jpeg");
            }
            if(tempImageCheck($img.".gif")) {
                array_push($images, $img.".gif");
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
            if(tempImageCheck($img.".jpg")) {
                return $img.".jpg";
            }
            if(tempImageCheck($img.".png")) {
                return $img.".png";
            }
            if(tempImageCheck($img.".jpeg")) {
                return $img.".jpeg";
            }
            if(tempImageCheck($img.".gif")) {
                return $img.".gif";
            }
        }
        return "images/placeholder.jpg";
    }

    function uploadImages($path, $images, $cod){
        $maxKB = 1500;
        $allresults=array();
        $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
        for($i=0;$i<count($images["name"]); $i++){
            $imageName = $images["name"][$i];
            $fullPath = $path.$imageName;
            $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
            $result = 0;
            $msg = "";

            //Controllo se immagine è veramente un'immagine
            $imageSize = getimagesize($images["tmp_name"][$i]);
            if($imageSize === false) {
                $msg .= "File caricato non è un'immagine! ";
            }
            //Controllo dimensione dell'immagine < 500KB
            if ($images["size"][$i] > $maxKB * 1024) {
                $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
            }

            //Controllo estensione del file
            if(!in_array($imageFileType, $acceptedExtensions)){
                $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
            }
            
            //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
            $m = 1;
            do{
                $imageName = pathinfo($cod, PATHINFO_FILENAME)."_$m.".$imageFileType;
                $m++;
            }
            while(file_exists($path.$imageName));
            $fullPath = $path.$imageName;

            //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
            if(strlen($msg)==0){
                if(!move_uploaded_file($images["tmp_name"][$i], $fullPath)){
                    $msg.= "Errore nel caricamento dell'immagine.";
                }
            }
            if($msg!=""){
                array_push($allresults, $msg);
            }
        }
        return $allresults;
    }

    function getVendorFromList($items){
        $vend=$items[0]["Venditore"];
        foreach($items as $item){
            if ($item["Venditore"] != $vend){
                return NULL;
            }
        }
        return $vend;
    }

    function removeImage($imgpath){
        unlink($imgpath);
    }

    function hasImages($cod){
        return getFirstImage($cod)!="images/placeholder.jpg";
    }

    function updateTotal($quantity,$price,$total){
        return $total+=$quantity*$price;
    }
?>