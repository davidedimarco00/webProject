<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, "dsoundsystemLOGIC", $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            echo "Connessione fallita";
        }        
    }

    public function checkLogin($user,$pass){
        $query = "SELECT Nome, Cognome, Nickname, isVend FROM utente WHERE Nickname=? AND password=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$user, $pass);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addNewUser($name, $surname, $nickname, $email, $pass, $isVend) {
        $query = "INSERT INTO `utente` (`Nome`, `Cognome`, `Nickname`, `E_mail`, `Password`, `isVend`) VALUES (?, ?, ?, ?, ?, ?);";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssi', $name, $surname, $nickname, $email, $pass, $isVend);
        $result = $stmt->execute();
        if (false === $result) {
            echo "<script type='text/javascript'>alert('Username già esistente');</script>";
        }
       // return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotifies($nickname){
        $query = "SELECT data, testo from notifica WHERE NOT letto and data < NOW() and Nickname=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nickname);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllNotifies($nickname){
        $query = "SELECT CodNotifica, Data, Testo from notifica WHERE Nickname=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nickname);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNotReadNotifiesNumber($nickname){
        $query = "SELECT count(*) as notRead from notifica where NOT letto and data < NOW() and Nickname=?; ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nickname);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getAllProducts(){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Venditore FROM prodotto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByVendor($vendor){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Venditore FROM prodotto where Venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$vendor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByCategory($cat){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Venditore FROM prodotto where CodCategoria=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$cat);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getObject($cod){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria FROM prodotto WHERE CodProdotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$cod);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomProducts($limit){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Venditore FROM prodotto ORDER BY RAND() LIMIT ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$limit);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategories(){
        $query = "SELECT CodCategoria, Nome FROM categoria";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductById($id){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Venditore FROM prodotto WHERE CodProdotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertProduct($nome, $descrizione, $prezzo, $codCategoria, $venditore){
        $query = "INSERT INTO prodotto (Nome, Descrizione, Prezzo, CodCategoria, Venditore) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdis', $nome, $descrizione, $prezzo, $codCategoria, $venditore);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateProduct($codProdotto, $nome, $descrizione, $prezzo, $codCategoria, $venditore){
        $query = "UPDATE prodotto SET Nome = ?, Descrizione = ?, Prezzo = ?, CodCategoria = ?, Venditore=? WHERE CodProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdisi', $nome, $descrizione, $prezzo, $codCategoria, $venditore, $codProdotto);
        
        return $stmt->execute();
    }

    public function deleteProduct($codProdotto){
        $query = "DELETE FROM prodotto WHERE CodProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codProdotto);
        $stmt->execute();
        
        return true;
    }
}
?>
