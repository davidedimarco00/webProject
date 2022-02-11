<?php error_reporting(E_ALL); ini_set('display_errors', 1);
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

    public function deleteNotify($codNotifica) { //in codNotifica va passata l
        $query = "DELETE FROM notifica where CodNotifica=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codNotifica);
        $stmt->execute();
        $result = $stmt->get_result();
        //verifica qui che la rimozione sia andata a buon fine
    }
    
    public function getAllProducts(){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByVendor($vendor){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto where Venditore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$vendor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsByCategory($cat){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto where CodCategoria=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$cat);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function searchProduct($string) {
        $string = "%$string%";
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto where Nome LIKE ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $string);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    

    public function getRandomProducts($limit){
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto ORDER BY RAND() LIMIT ?";
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
        $query = "SELECT CodProdotto, Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore FROM prodotto WHERE CodProdotto=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertProduct($nome, $descrizione, $prezzo, $codCategoria, $quant, $venditore){
        $query = "INSERT INTO prodotto (Nome, Descrizione, Prezzo, CodCategoria, Quantità, Venditore) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdiis', $nome, $descrizione, $prezzo, $codCategoria, $quant, $venditore);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateProduct($codProdotto, $nome, $descrizione, $prezzo, $codCategoria, $quant, $venditore){
        $query = "UPDATE prodotto SET Nome = ?, Descrizione = ?, Prezzo = ?, CodCategoria = ?, Quantità = ?, Venditore = ? WHERE CodProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssdiisi', $nome, $descrizione, $prezzo, $codCategoria, $quant, $venditore, $codProdotto);
        
        return $stmt->execute();
    }

    public function deleteProduct($codProdotto){
        $query = "DELETE FROM prodotto WHERE CodProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codProdotto);
        $stmt->execute();
        
        return true;
    }

    public function productInStock($codProdotto, $quantity){
        $query = "SELECT CodProdotto, Nome, Quantità FROM prodotto WHERE CodProdotto = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codProdotto);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC)[0]["Quantità"] >= $quantity;
    }

    public function getCategoryName($codCategoria){
        $query = "SELECT CodCategoria, Nome FROM categoria WHERE CodCategoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$codCategoria);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        return $result[0]["Nome"];
    }

    public function addCart($nick){
        $query = "INSERT INTO carrello (Nickname, Stato) VALUES (?,?)";
        $status=1;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si',$nick,$status);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function getCart($nick){
        $query = "SELECT CodCarrello, Nickname, Stato FROM carrello WHERE Stato = ? AND Nickname = ?";
        $status=1;
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('is',$status,$nick);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if (empty($result)){
            return $this->addCart($nick);
        }
        return $result[0]["CodCarrello"];

    }

    public function addProductToCart($nickname,$codProdotto){
        /*se esiste il carrello attivo per quel nikname aggiungi il prodotto a quel carrello se non esiste ne creo uno nuovo e glielo aggiungo*/

        $CodCarrello=$this->getCart($nickname);
        $status=1;
        $query = "INSERT INTO Incarrello (CodCarrello,CodProdotto,quantita) VALUES (?,?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii',$CodCarrello , $codProdotto, $status);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function getCartItems($CodCarrello){
        $query = "SELECT * from Incarrello JOIN prodotto
                ON Incarrello.CodProdotto = prodotto.CodProdotto
                WHERE Incarrello.CodCarrello=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$CodCarrello);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function deleteCartProduct($CodCarrello,$CodProdotto){
        $query = "DELETE FROM Incarrello WHERE CodProdotto = ? AND Incarrello.CodCarrello=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$CodProdotto,$CodCarrello);
        $stmt->execute();
        
        return true;
    }

    public function totalPrice($CodCarrello){
        $query = "SELECT Prezzo from Incarrello JOIN prodotto
                ON Incarrello.CodProdotto = prodotto.CodProdotto
                WHERE Incarrello.CodCarrello=?;";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$CodCarrello);
        $stmt->execute();
        $result = $stmt->get_result();
        $resut = $result->fetch_all(MYSQLI_ASSOC);
        $total=0;
        foreach($result["Prezzo"] as $price):
            $total+=$price; 
        endforeach;
        return $total;
    }
    /*TODO: se prodotto esaurito -> manda notifica al venditore*/
}
?>
