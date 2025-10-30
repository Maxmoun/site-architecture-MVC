<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../serveur/Database.php';  
include '../../modele/AttaqueModel.php';  
include '../../controleur/AttaqueControlleur.php';

$database = new Database();
$db = $database->getConnection();

// Instanciez le contrôleur en passant la connexion  
$attaqueControlleur = new AttaqueControlleur($db);   

// Vérifiez si un ID est fourni pour la suppression  
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  

    // Appelez la méthode delete du contrôleur  
    if ($attaqueControlleur->delete($id)) {  
        echo "Apropos supprimé avec succès.";  
        header("Location: AfficherAttaque.php");  
        exit(); // Arrêter le script après la redirection  
    } else {  
        echo "Erreur lors de la suppression de l'Apropos.";  
    }  
} else {  
    echo "Aucun ID fourni.";  
    exit();  
}  
?>