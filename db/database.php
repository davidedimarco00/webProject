<?php
class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port){
        $this->db = new mysqli($servername, $username, $password, "dsoundsystem", $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
            echo "Connessione fallita";
        }        
    }

    public function getCategoryById($idcategory){
        $stmt = $this->db->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, nome FROM articolo, autore WHERE idarticolo=? AND autore=idautore";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategory($idcategory){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore, articolo_ha_categoria WHERE categoria=? AND autore=idautore AND idarticolo=articolo";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
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

    public function getNotReadNotifiesNumber($nickname){
        $query = "SELECT count(*) as notRead from notifica where NOT letto and data < NOW() and Nickname=?; ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nickname);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*public function getAllProductsByVendor($vendor){
        $query = "SELECT count(*) as notRead from notifica where NOT letto and data < NOW() and Nickname=?; ";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$nickname);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }*/
    public function getAllProducts(){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria FROM prodotto";
        $stmt = $this->db->prepare($query);
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
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria FROM prodotto ORDER BY RAND() LIMIT ?";
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

}
?>
