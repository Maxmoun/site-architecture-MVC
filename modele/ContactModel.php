<?php  

class Contact {  
    private $conn;  
    private $table = "contact";  

    public $id;  
    public $nom;  
    public $email;  
    public $message; 

    public function __construct($db) {  
        $this->conn = $db;  
    }  

    public function read() {  
        $query = "SELECT * FROM contact ORDER BY id DESC"; // Utiliser une colonne existante    
        $stmt = $this->conn->prepare($query);  
        $stmt->execute();  
        return $stmt;  
    }  

    public function readId($id) {  
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";  
        $stmt = $this->conn->prepare($query);  
        $stmt->bindParam(':id', $id);  
        $stmt->execute();  
        return $stmt;  
    }  

    public function create() {  
        $query = "INSERT INTO " . $this->table . " SET nom=:nom, email=:email, message=:message";  
        $stmt = $this->conn->prepare($query);  

        $this->nom = htmlspecialchars(strip_tags($this->nom));  
        $this->email = htmlspecialchars(strip_tags($this->email));  
        $this->message = htmlspecialchars(strip_tags($this->message));  

        $stmt->bindParam(":nom", $this->nom);  
        $stmt->bindParam(":email", $this->email);  
        $stmt->bindParam(":message", $this->message);   

        if($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  

    public function update() {  
        $query = "UPDATE " . $this->table . " SET nom=:nom, email=:email, message=:message WHERE id=:id";  
        $stmt = $this->conn->prepare($query);  

        $this->nom = htmlspecialchars(strip_tags($this->nom));  
        $this->email = htmlspecialchars(strip_tags($this->email));  
        $this->message = htmlspecialchars(strip_tags($this->message)); // Assainir le chemin de la photo  
        $this->id = htmlspecialchars(strip_tags($this->id));  

        $stmt->bindParam(":nom", $this->nom);  
        $stmt->bindParam(":email", $this->email);  
        $stmt->bindParam(":message", $this->message); // Lier la photo au paramètre  
        $stmt->bindParam(":id", $this->id);  

        if($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  

    public function delete() {  
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";  
        $stmt = $this->conn->prepare($query);  

        $this->id = htmlspecialchars(strip_tags($this->id));  

        $stmt->bindParam(":id", $this->id);  

        if($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  
}  