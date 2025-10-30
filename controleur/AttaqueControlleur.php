<?php

class AttaqueControlleur {
    private $db;
    private $attaque; 

    public function __construct($database) {
        $this->db = $database;
    }

    public function index() {
        $attaque = $this->read();
    }
    public function read() {  
        // Exemple de méthode pour lire les "apropos"  
        $query = "SELECT * FROM attaque"; // Récupérer toutes les entrées de la table  
        $stmt = $this->db->prepare($query);  
        $stmt->execute();  
        return $stmt;// Retourne toutes les lignes sous forme de tableau associatif  
    }  

    public function show($id) {
        $query = "SELECT * FROM attaque WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        return $stmt;
    }
    
     public function create($titre, $lien, $photo) {  
        $query = "INSERT INTO attaque (titre, lien, photo) VALUES (:titre, :lien, :photo)";  
        $stmt = $this->db->prepare($query);  
        $stmt->bindParam(':titre', $titre);  
        $stmt->bindParam(':lien', $lien);  
        $stmt->bindParam(':photo', $photo);  

        return $stmt->execute();  
    }  

    public function update($id, $titre, $lien, $photo = null) {  
      
    $query = "UPDATE attaque SET titre = :titre, lien = :lien" .   
             ($photo ? ", photo = :photo" : "") .   
             " WHERE id = :id";  
    $stmt = $this->db->prepare($query);  
    $stmt->bindParam(':titre', $titre);  
    $stmt->bindParam(':lien', $lien);  
    if ($photo) {  
        $stmt->bindParam(':photo', $photo);  
    }  
    $stmt->bindParam(':id', $id);  
    
    return $stmt->execute();  
    }  
    public function delete($id) {  
    $query = "DELETE FROM attaque WHERE id = :id";   
    $stmt = $this->db->prepare($query); 
    $stmt->bindParam(':id', $id);  
    if ($stmt->execute()) {  
        header("Location: AfficherAttaque.php");  
        exit();  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
}
}
