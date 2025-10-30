<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../serveur/Database.php';  
include '../../modele/ContactModel.php';  
include '../../controleur/ContactControlleur.php';

$database = new Database();
$db = $database->getConnection();

// Instanciez le contrôleur en passant la connexion  
$contactControlleur = new ContactControlleur($db);   

// Vérifiez si un ID est fourni pour la suppression  
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  

    // Appelez la méthode delete du contrôleur  
    if ($contactControlleur->delete($id)) {  
        echo "contact supprimé avec succès.";  
        header("Location: AfficherContact.php");  
        exit(); // Arrêter le script après la redirection  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
} else {  
    echo "Aucun ID fourni.";  
    exit();  
}  
?>