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
        /*for($i=0; $i<10; $i++){
            $img="images/".$codProdotto."_".$i;
            if(exif_imagetype($img.".jpg")) {
                return $img+".jpg";
            }
            if(exif_imagetype($img.".png")) {
                return $img+".png";
            }
        }*/

           /* if(exif_imagetype($img.".jpeg")) {
                return $img.".jpeg";
            }*/

        return "images/placeholder.jpg";
    }

    function uploadImage($path, $image, $cod){
        $imageName = basename($image["name"]);
        $fullPath = $path.$cod."_";
        
        $maxKB = 1500;
        $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
        $result = 0;
        $msg = "";
        //Controllo se immagine è veramente un'immagine
        $imageSize = getimagesize($image["tmp_name"]);
        if($imageSize === false) {
            $msg .= "File caricato non è un'immagine! ";
        }
        //Controllo dimensione dell'immagine < 500KB
        if ($image["size"] > $maxKB * 1024) {
            $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
        }

        //Controllo estensione del file
        $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
        if(!in_array($imageFileType, $acceptedExtensions)){
            $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
        }
        //Controllo il primo nome disponibile
        while (true){
            if(!exif_imagetype($fullPath.$i)){
                $fullPath.=$i;
                break;
            }
            if($i>=10){
                $msg .= "Troppi file gia presenti per lo stesso prodotto. ";
                break;
            }
            $i++;

        }
        //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
        /*if (file_exists($fullPath)) {
            $i = 1;
            do{
                $i++;
                $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
            }
            while(file_exists($path.$imageName));
            $fullPath = $path.$imageName;
        }*/

        //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
        if(strlen($msg)==0){
            if(!move_uploaded_file($image["tmp_name"], $fullPath)){
                $msg.= "Errore nel caricamento dell'immagine.";
            }
            else{
                $result = 1;
                $msg = $imageName;
            }
        }
        return array($result, $msg);
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
                else{
                    $result = 1;
                    $msg = $imageName;
                }
            }
            array_push($allresults, $msg);
        }
        return $allresults;
    }
?>