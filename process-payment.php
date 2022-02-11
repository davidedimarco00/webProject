<?php
    require_once "bootstrap.php";

    $date="23/08/2000";
    $deliver="UPS";

    $CodCarrello =$dbh->getCart($_SESSION["Nickname"]);

    $dbh->disableCart();

    $CodOrdine = $dbh->insertOrder($CodCarrello,$date);

    $CodFattura = $dbh->insertBilling($CodOrdine, $_POST["name"], $_POST["surname"],$_POST["username"], $_POST["email"], ($_POST["address"] . $_POST["address2"] . $_POST["country"]), $_POST["zip"]);
    


    public function insertOrder($nickname,$date){
        $CodCarrello=$this->getCart($nickname);
        $status="Non ancora Spedito";
        $query = "INSERT INTO Incarrello (CodCarrello,Stato, Data) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii',$CodCarrello, $status, $date);
        $stmt->execute();
        
        return $stmt->insert_id;

    }

    public function insertBilling($CodOrdine,$name, $surname, $email, $address, $zip){
        $status="Non ancora spedito";
        $query = "INSERT INTO IndirizzoFattura (CodOrdine, Nome, Cognome, Email, Indirizzo, Zip) VALUES (?,?,?,?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issssi',$CodOrdine, $name, $surname, $email, $address, $zip);
        $stmt->execute();
        
        return $stmt->insert_id;

    }

    public function disableCart


    public function insertBilling($CodNotifica, $Data, $Testo, $Letto, $Nickname){
        $status="Non ancora spedito";
        $query = "INSERT INTO `notifica`(`CodNotifica`, `Data`, `Testo`, `Letto`, `Nickname`) VALUES (?,?,?,?,?)"
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('issssi',$CodOrdine, $name, $surname, $email, $address, $zip);
        $stmt->execute();
        
        return $stmt->insert_id;

    }
    INSERT INTO `notifica`(`CodNotifica`, `Data`, `Testo`, `Letto`, `Nickname`) VALUES (NULL,'2022-01-22','Notifica di prova',false,'davidima00')



?> 