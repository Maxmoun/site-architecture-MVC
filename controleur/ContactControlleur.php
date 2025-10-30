<?php

class ContactControlleur {
    private $db;
    private $contact; 

    public function __construct($database) {
        $this->db = $database;
    }

    public function index() {
        $contact = $this->read();
    }
    public function read() {  
        // Exemple de méthode pour lire les "apropos"  
        $query = "SELECT * FROM contact"; // Récupérer toutes les entrées de la table  
        $stmt = $this->db->prepare($query);  
        $stmt->execute();  
        return $stmt;// Retourne toutes les lignes sous forme de tableau associatif  
    }  

    public function show($id) {
        $query = "SELECT * FROM contact WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        return $stmt;
    }
    
     public function create($nom, $email, $message) {  
        $query = "INSERT INTO contact (nom, email, message) VALUES (:nom, :email, :message)";  
        $stmt = $this->db->prepare($query);  
        $stmt->bindParam(':nom', $nom);  
        $stmt->bindParam(':email', $email);  
        $stmt->bindParam(':message', $message);  

        return $stmt->execute();  
    }  

    public function update($id, $nom, $email, $message) {  
    // Logique pour mettre à jour la tâche dans la base de données.  
    // N'oubliez pas d'inclure le chemin de l'image dans la requête SQL si $photoPath n'est pas null  
    $query = "UPDATE contact SET nom = :nom, email = :email, message = :message";     
             " WHERE id = :id";  
    $stmt = $this->db->prepare($query);  
    $stmt->bindParam(':nom', $nom);  
    $stmt->bindParam(':email', $email);  
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':id', $id);  
    
    return $stmt->execute();  
    }  
    public function delete($id) {  
    $query = "DELETE FROM contact WHERE id = :id";   
    $stmt = $this->db->prepare($query); 
    $stmt->bindParam(':id', $id);  
    if ($stmt->execute()) {  
        header("Location: AfficherContact.php");  
        exit();  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
}
}