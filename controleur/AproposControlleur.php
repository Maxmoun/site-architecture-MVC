
<?php

class AproposControlleur {
    private $db;
    private $apropos; 

    public function __construct($database) {
        $this->db = $database;
    }

    public function index() {
        $apropos = $this->read();
    }
    public function read() {  
        // Exemple de méthode pour lire les "apropos"  
        $query = "SELECT * FROM apropos"; // Récupérer toutes les entrées de la table  
        $stmt = $this->db->prepare($query);  
        $stmt->execute();  
        return $stmt;// Retourne toutes les lignes sous forme de tableau associatif  
    }  

    public function show($id) {
        $query = "SELECT * FROM apropos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute(); 
        return $stmt;
    }
    
     public function create($titre, $description, $photo) {  
        $query = "INSERT INTO apropos (titre, description, photo) VALUES (:titre, :description, :photo)";  
        $stmt = $this->db->prepare($query);  
        $stmt->bindParam(':titre', $titre);  
        $stmt->bindParam(':description', $description);  
        $stmt->bindParam(':photo', $photo);  

        return $stmt->execute();  
    }  

    public function update($id, $titre, $description, $photo = null) {  
    // Logique pour mettre à jour la tâche dans la base de données.  
    // N'oubliez pas d'inclure le chemin de l'image dans la requête SQL si $photoPath n'est pas null  
    $query = "UPDATE apropos SET titre = :titre, description = :description" .   
             ($photo ? ", photo = :photo" : "") .   
             " WHERE id = :id";  
    $stmt = $this->db->prepare($query);  
    $stmt->bindParam(':titre', $titre);  
    $stmt->bindParam(':description', $description);  
    if ($photo) {  
        $stmt->bindParam(':photo', $photo);  
    }  
    $stmt->bindParam(':id', $id);  
    
    return $stmt->execute();  
    }  
    public function delete($id) {  
    $query = "DELETE FROM apropos WHERE id = :id";   
    $stmt = $this->db->prepare($query); 
    $stmt->bindParam(':id', $id);  
    if ($stmt->execute()) {  
        header("Location: AfficherApropos.php");  
        exit();  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
}
}