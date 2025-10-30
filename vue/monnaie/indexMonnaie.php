<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);  

include '../../serveur/Database.php';  
include '../../modele/MonnaieModel.php';  
include '../../controleur/MonnaieControlleur.php'; 

$database = new Database();  
$db = $database->getConnection();  

$monnaieControlleur = new MonnaieControlleur($db); 

$monnaies = $monnaieControlleur->read();  
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>

</head>
 <body>
     <h2> MONNAIES</h2>    
	
   
 
<?php while ($row = $monnaies->fetch(PDO::FETCH_ASSOC)): ?>
	
    <div class="carte-ligne">
        <div class="carte">
            <?php if (!empty($row['photo'])): ?>  
                    <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Image de la tâche" class="task-image">  
             <?php else: ?>  
                    <span>Aucune image</span>  
            <?php endif; ?>
            <div class="colonne">
                <p class="text"><?php echo htmlspecialchars($row['titre']); ?></p>
                <a href="<?php echo htmlspecialchars($row['lien']); ?>" class="lire">Lire</a>
            </div>
        </div>

    </div>
  <?php endwhile; ?> 
</body>
</html>         