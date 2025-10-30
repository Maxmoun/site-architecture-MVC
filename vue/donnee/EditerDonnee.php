<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);  

include '../../serveur/Database.php';  
include '../../modele/DonneeModel.php';  
include '../../controleur/DonneeControlleur.php';   

$database = new Database();  
$db = $database->getConnection();  

$donneeControlleur = new DonneeControlleur($db);  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $id = $_POST['id'];  
    $titre = $_POST['titre'];  
    $description = $_POST['description'];
    $lien = $_POST['lien'];   
    
    $photo = null; // Initialisation de la variable photo  
    
    // Vérification de l'upload de la photo  
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {  
        $fileTmpPath = $_FILES['photo']['tmp_name'];  
        $fileName = $_FILES['photo']['name'];  
        $fileNameCmps = explode(".", $fileName);  
        $fileExtension = strtolower(end($fileNameCmps));  

        // Vérifier les extensions autorisées  
        $allowedfileExtensions = ['jpg', 'jpeg', 'png'];  
        if (in_array($fileExtension, $allowedfileExtensions)) {  
            // Dossier de destination  
            $uploadFileDir = '../images/'; // Modifiez le chemin si nécessaire  
            if (!is_dir($uploadFileDir)) {  
                mkdir($uploadFileDir, 0755, true); // Créer le dossier s'il n'existe pas  
            }  
            $photo = '../images/' . basename($fileName);  // Chemin complet  
            move_uploaded_file($fileTmpPath, $photo); // Déplacer le fichier  
        } else {  
            echo 'Seules les images JPG, JPEG et PNG sont autorisées.';  
        }  
    }  

    // Appel à la méthode de mise à jour  
    $donneeControlleur->update($id, $titre, $description, $description, $photo?? null); // Ajoutez $photoPath ici  
} else {  
    $id = $_GET['id'];  
    $stmt = $donneeControlleur->show($id);  
    $donnee = $stmt->fetch(PDO::FETCH_ASSOC);  
}  
?>  

<!DOCTYPE html>  
<html lang="fr">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Modifier la tâche</title>  
        <style>
        * {
             box-sizing: border-box;

         }
  
        /* Style inputs */
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
            }
  
        button[type=submit] {
            background-color: #2e19f0;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            }
        input[type=file] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        a{
           background-color: #2e19f0;
            color: white;
            padding: 12px 20px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }
        a:hover {
            background-color: white;
        }
  
        button[type=submit]:hover {
            background-color: white;
        }
  
        
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }
  
        
        .column {
            float: left;
            width: 50%;
             margin-top: 6px;
            padding: 20px;
        }
  
       
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
  
        @media screen and (max-width: 600px) {
             .column, input[type=submit] {
            width: 100%;
            margin-top: 0;
            }
        }
    </style>
</head>  
<body>  
    <section>
        <div class="container">
            <div style="text-align:center">
                <h2>MODIFIER UNE ATTAQUE </h2>
                <p>vous pouvez modifier la section Attaque</p>
            </div>
            <div class="row">
                <div class="column">  
                    <form method="POST" action="#" enctype="multipart/form-data">  
                         <input type="hidden" name="id" value="<?php echo $donnee['id']; ?>">  
                        <label for="titre">Titre:</label>  
                        <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($donnee['titre']); ?>" required>  
          
                        <label for="description">Description:</label>  
                        <textarea id="description" name="description" style="height:100px" required><?php echo htmlspecialchars($donnee['description']); ?></textarea>  
          
                        <label for="lien">Lien:</label>  
                        <input type="text" id="lien" name="titre" value="<?php echo htmlspecialchars($donnee['lien']); ?>" required>  
       
                        <label for="photo">Choisir une image:</label>  
                        <input type="file" id="photo" name="photo" accept=".jpg, .jpeg, .png">  
         
                        <button type="submit">Mettre à jour</button>  
                        <a href="AfficherDonnee.php">Retour à la liste</a>
                    </form>  
                </div>
            </div>
        </div>
    </section>
</body>  
</html>  