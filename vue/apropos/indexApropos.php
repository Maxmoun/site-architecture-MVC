<?php  
    ini_set('display_errors', 1);  
    ini_set('display_startup_errors', 1);  
    error_reporting(E_ALL);  

    include '../../serveur/Database.php';  
    include '../../modele/AproposModel.php';  
    include '../../controleur/AproposControlleur.php';  

    $database = new Database();  
    $db = $database->getConnection();  

    $aproposControlleur = new AproposControlleur($db); 

    $aproposs = $aproposControlleur->read();  
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

    <div class="about-section">
        <div class="inner-container">
            <?php while ($row = $aproposs->fetch(PDO::FETCH_ASSOC)): ?>
                <?php if (!empty($row['photo'])): ?>  
                    <img src="<?php echo htmlspecialchars($row['photo']); ?>" alt="Image de la tâche" class="task-image">  
                <?php else: ?>  
                    <span>Aucune image</span>  
                <?php endif; ?>  
                <h1><?php echo htmlspecialchars($row['titre']); ?></h1>

                <p class="text"><?php echo htmlspecialchars($row['description']); ?></p>
            <?php endwhile; ?>  
            <div class="skills">
                <span><a href="actualites.html">Actualités</a></span>
                <span><a href="donnees.html">Données</a></span>
                <span><a href="monnaies.html">Monnaies</a></span>
            </div>
        </div>
    </div>
</body>
</html>         