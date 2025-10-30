<?php  

class Attaque {  
    private $conn;  
    private $table = "attaque";  

    public $id;  
    public $titre;  
    public $photo; 
    public $lien; 

    public function __construct($db) {  
        $this->conn = $db;  
    }  

    public function read() {  
        $query = "SELECT * FROM attaque ORDER BY id DESC"; // Utiliser une colonne existante    
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
        $query = "INSERT INTO " . $this->table . " SET titre=:titre, photo=:photo, lien=:lien";  
        $stmt = $this->conn->prepare($query);  

        $this->titre = htmlspecialchars(strip_tags($this->titre));   
        $this->photo = htmlspecialchars(strip_tags($this->photo));  
        $this->lien = htmlspecialchars(strip_tags($this->lien));

        $stmt->bindParam(":titre", $this->titre);   
        $stmt->bindParam(":photo", $this->photo);   
        $stmt->bindParam(":lien", $this->lien); 

        if($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  

    public function update() {  
        $query = "UPDATE " . $this->table . " SET titre=:titre, photo=:photo, lien=:lien WHERE id=:id";  
        $stmt = $this->conn->prepare($query);  

        $this->titre = htmlspecialchars(strip_tags($this->titre));  
        $this->photo = htmlspecialchars(strip_tags($this->photo)); // Assainir le chemin de la photo  
         $this->lien = htmlspecialchars(strip_tags($this->lien));
        $this->id = htmlspecialchars(strip_tags($this->id));  

        $stmt->bindParam(":titre", $this->titre);   
        $stmt->bindParam(":photo", $this->photo); // Lier la photo au paramètre  
        $stmt->bindParam(":lien", $this->lien); 
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