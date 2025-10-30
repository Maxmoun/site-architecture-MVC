<?php  

ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);  

include '../../serveur/Database.php';  
include '../../modele/LutteModel.php';  
include '../../controleur/LutteControlleur.php';   

$database = new Database();  
$db = $database->getConnection();  

$lutteControlleur = new LutteControlleur($db);  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    $titre = $_POST['titre'];  
    $lien = $_POST['lien'];  

    // Traitement de l'image  
    if (isset($_FILES['photo'])) {
        $fileError = $_FILES['photo']['error'];
        
        if ($fileError === UPLOAD_ERR_OK) {  
            $fileTmpPath = $_FILES['photo']['tmp_name'];  
            $fileName = $_FILES['photo']['name'];  
            $fileNameCmps = explode(".", $fileName);  
            $fileExtension = strtolower(end($fileNameCmps));  

            // Vérifier les extensions autorisées  
            $allowedfileExtensions = ['jpg', 'jpeg', 'png'];  
            if (in_array($fileExtension, $allowedfileExtensions)) {  
                $uploadFileDir = '../../images/'; // Répertoire  
                $photo = $uploadFileDir . time() . '_' . $fileName; // Évitez les collisions de nom de fichier  

                // Déplacer le fichier téléchargé vers le dossier images  
                if (move_uploaded_file($fileTmpPath, $photo)) {  
                    // Enregistrement des informations dans la base de données  
                    // Cette méthode doit accepter le chemin de l'image  
                    $lutteControlleur->create($titre, $lien, $photo);  
                    echo "image a été téléchargée avec succès.";  
                } else {  
                    echo 'Erreur lors du déplacement du fichier.';  
                }  
            } else {  
                echo 'Seules les extensions JPG, JPEG et PNG sont autorisées.';  
            }  
        } else {
        
            switch ($fileError) {
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    echo 'Le fichier est trop volumineux.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo 'Le fichier a été téléchargé partiellement.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo 'Aucun fichier na été téléchargé.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo 'Le dossier temporaire est manquant.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo 'Échec de lécriture sur le disque.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                                    echo 'Une extension PHP a arrêté le téléchargement.';
                    break;
                default:
                    echo 'Erreur inconnue lors du téléchargement du fichier.';
                    break;
            }
        }
    } else {  
        echo 'Erreur lors du téléchargement du fichier.';  
    }  
}  
?>    

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une tâche</title>
    <style>
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
  
        /* Style the container/contact section */
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 10px;
        }
  
        /* Create two columns that float next to eachother */
        .column {
            float: left;
            width: 50%;
             margin-top: 6px;
            padding: 20px;
        }
  
        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
  
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
             .column, input[type=submit] {
            width: 100%;
            margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <<section>
        <div class="container">
            <div style="text-align:center">
                <h2>CREER UNE LUTTE </h2>
                <p>vous pouvez creer la section Lutte</p>
            </div>
            <div class="row">
                <div class="column">
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <label for="titre">Titre:</label>
                        <input type="text" id="titre" name="titre" required>

                        <label for="lien">Lien:</label>
                        <textarea id="lien" name="lien" style="height:100px" required></textarea>
                        
                        <label for="photo">Photo:</label>
                        <input type="file" id="photo" name="photo" required>
                        
                        <button type="submit">Créer</button>
                         <a href="AfficherLutte.php">Retour à la liste</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    
</body>
</html>

