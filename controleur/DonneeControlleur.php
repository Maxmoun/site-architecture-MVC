<?php

class DonneeControlleur {
    private $db;
    private $donnee; 

    public function __construct($database) {
        $this->db = $database;
    }

    public function index() {
        $donnee = $this->read();
    }
    public function read() {  
        // Exemple de méthode pour lire les "apropos"  
        $query = "SELECT * FROM donnees"; // Récupérer toutes les entrées de la table  
        $stmt = $this->db->prepare($query);  
        $stmt->execute();  
        return $stmt;// Retourne toutes les lignes sous forme de tableau associatif  
    }  

    public function show($id) {
        $query = "SELECT * FROM donnees WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        return $stmt;
    }
    
     public function create($titre,$description, $lien, $photo) {  
        $query = "INSERT INTO donnees (titre, description, lien, photo) VALUES (:titre, :description, :lien, :photo)";  
        $stmt = $this->db->prepare($query);  
        $stmt->bindParam(':titre', $titre);  
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':lien', $lien);  
        $stmt->bindParam(':photo', $photo);  

        return $stmt->execute();  
    }  

    public function update($id, $titre, $description, $lien, $photo = null) {  
      
    $query = "UPDATE donnees SET titre = :titre, description = :description, lien = :lien" .   
             ($photo ? ", photo = :photo" : "") .   
             " WHERE id = :id";  
    $stmt = $this->db->prepare($query);  
    $stmt->bindParam(':titre', $titre); 
    $stmt->bindParam(':description', $description); 
    $stmt->bindParam(':lien', $lien);  
    if ($photo) {  
        $stmt->bindParam(':photo', $photo);  
    }  
    $stmt->bindParam(':id', $id);  
    
    return $stmt->execute();  
    }  
    public function delete($id) {  
    $query = "DELETE FROM donnees WHERE id = :id";   
    $stmt = $this->db->prepare($query); 
    $stmt->bindParam(':id', $id);  
    if ($stmt->execute()) {  
        header("Location: AfficherDonnee.php");  
        exit();  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
}
}
