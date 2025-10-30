<?php  

class Apropos {  
    private $conn;  
    private $table = "apropos";  

    public $id;  
    public $titre;  
    public $description;  
    public $photo; 

    public function __construct($db) {  
        $this->conn = $db;  
    }  

    public function read() {  
        $query = "SELECT * FROM apropos ORDER BY id DESC"; // Utiliser une colonne existante    
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
        $query = "INSERT INTO " . $this->table . " SET titre=:titre, description=:description, photo=:photo";  
        $stmt = $this->conn->prepare($query);  

        $this->titre = htmlspecialchars(strip_tags($this->titre));  
        $this->description = htmlspecialchars(strip_tags($this->description));  
        $this->photo = htmlspecialchars(strip_tags($this->photo));  

        $stmt->bindParam(":titre", $this->titre);  
        $stmt->bindParam(":description", $this->description);  
        $stmt->bindParam(":photo", $this->photo);   

        if($stmt->execute()) {  
            return true;  
        }  
        return false;  
    }  

    public function update() {  
        $query = "UPDATE " . $this->table . " SET titre=:titre, description=:description, photo=:photo WHERE id=:id";  
        $stmt = $this->conn->prepare($query);  

        $this->titre = htmlspecialchars(strip_tags($this->titre));  
        $this->description = htmlspecialchars(strip_tags($this->description));  
        $this->photo = htmlspecialchars(strip_tags($this->photo)); // Assainir le chemin de la photo  
        $this->id = htmlspecialchars(strip_tags($this->id));  

        $stmt->bindParam(":titre", $this->titre);  
        $stmt->bindParam(":description", $this->description);  
        $stmt->bindParam(":photo", $this->photo); // Lier la photo au paramètre  
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