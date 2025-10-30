<?php  
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('ROOT_PATH', __DIR__);

// --- Inclusions des Fichiers (Après avoir défini : define('ROOT_PATH', __DIR__);) ---
require_once ROOT_PATH . '/serveur/Database.php';

require_once ROOT_PATH . '/modele/AproposModel.php';
require_once ROOT_PATH . '/controleur/AproposControlleur.php';

require_once ROOT_PATH . '/modele/AttaqueModel.php';
require_once ROOT_PATH . '/controleur/AttaqueControlleur.php';

require_once ROOT_PATH . '/modele/LutteModel.php';
require_once ROOT_PATH . '/controleur/LutteControlleur.php';

require_once ROOT_PATH . '/modele/DonneeModel.php';
require_once ROOT_PATH . '/controleur/DonneeControlleur.php';

require_once ROOT_PATH . '/modele/MonnaieModel.php';
require_once ROOT_PATH . '/controleur/MonnaieControlleur.php';
// Connexion à la base de données  
$database = new Database();  
$db = $database->getConnection();  

// Lecture des contenus  
$aproposControlleur = new AproposControlleur($db);   
$aproposs = $aproposControlleur->read();  

$attaqueControlleur = new AttaqueControlleur($db);   
$attaques = $attaqueControlleur->read();  

$lutteControlleur = new LutteControlleur($db);   
$luttes = $lutteControlleur->read();  

$donneeControlleur = new DonneeControlleur($db);   
$donnees = $donneeControlleur->read();  

$monnaieControlleur = new MonnaieControlleur($db);   
$monnaies = $monnaieControlleur->read();  

// Vérifier quel contenu afficher  
$page = isset($_GET['page']) ? $_GET['page'] : 'apropos';  
?>  

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="images/favicon.png" rel="icon">
     <link rel="stylesheet" href="vue/style.css">
    <title>siteInfo</title>
</head>  
<body>   
<header>  
       <nav>  
        <label class="logo">SiteInfo</label>  
            <ul>  
                <li><a href="?page=apropos">À propos</a></li>  
                <li><a href="?page=attaques">Attaques</a></li>  
                <li><a href="?page=lutte">Lutte</a></li>  
                <li><a href="?page=donnees">Données</a></li>  
                <li><a href="?page=monnaies">Monnaies</a></li>  
                <li><a href="?page=monnaies">Contact</a></li>  
            </ul>  
       </nav>  
    </header>  
    
    <section class="banniere-photo">  
        <h1>Centre d'information </h1>  
        <h3>Les actualités et informations liées aux attaques et de lutte contre les Boko Haram</h3>  
    </section>   

    <div class="content-section">  
        <?php   
        // Utiliser un switch pour afficher le contenu correspondant à la page sélectionnée  
        switch ($page) {  
            case 'apropos':  
                echo '<div class="about-section">  
                        <div class="inner-container">';  
                while ($row = $aproposs->fetch(PDO::FETCH_ASSOC)) {  
                    echo '<h1>' . htmlspecialchars($row['titre']) . '</h1>';  
                    if (!empty($row['photo'])) {  
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Image de la tâche" class="task-image">';  
                    } else {  
                        echo '<span>Aucune image</span>';  
                    }  
                    echo '<p class="text">' . htmlspecialchars($row['description']) . '</p>';  
                }  
                                echo '</div>  
                    </div>';  
                break;  

            case 'attaques':  
                echo '<h2>LES ATTAQUES BOKO HARAM</h2>';  
                while ($row = $attaques->fetch(PDO::FETCH_ASSOC)) {  
                    echo '<div class="carte-ligne">  
                            <div class="carte">';  
                    if (!empty($row['photo'])) {  
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Image de l\'attaque" class="task-image">';  
                    } else {  
                        echo '<span>Aucune image</span>';  
                    }  
                    echo '<div class="colonne">  
                            <p class="text">' . htmlspecialchars($row['titre']) . '</p>  
                            <a href="' . htmlspecialchars($row['lien']) . '" class="lire">Lire</a>  
                        </div>  
                    </div>  
                  </div>';  
                }  
                break;  

            case 'lutte':  
                echo '<h2>LES LUTTES BOKO HARAM</h2>';  
                while ($row = $luttes->fetch(PDO::FETCH_ASSOC)) {  
                    echo '<div class="carte-ligne">  
                            <div class="carte">';  
                    if (!empty($row['photo'])) {  
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Image de la lutte" class="task-image">';  
                    } else {  
                        echo '<span>Aucune image</span>';  
                    }  
                    echo '<div class="colonne">  
                            <p class="text">' . htmlspecialchars($row['titre']) . '</p>  
                            <a href="' . htmlspecialchars($row['lien']) . '" class="lire">Lire</a>  
                        </div>  
                    </div>  
                  </div>';  
                }  
                break;  

            case 'monnaies':  
                echo '<h2>MONNAIES</h2>';  
                echo '<div class="text-responsive">  
                        La monnaie électronique peut aider à lutter contre Boko Haram en traçant les flux financiers, réduisant l\'utilisation d\'argent liquide (limitant l\'anonymat), facilitant les paiements aux victimes et informateurs, et renforçant la gouvernance. Cependant, elle doit être réglementée (KYC, AML) et surveillée pour éviter son utilisation abusive par Boko Haram, nécessitant une coopération internationale contre le financement transfrontalier.  
                    </div>';  
                while ($row = $monnaies->fetch(PDO::FETCH_ASSOC)) {    
                    echo '<div class="carte-ligne">  
                            <div class="carte">';  
                    if (!empty($row['photo'])) {  
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Image de la monnaie" class="task-image">';  
                    } else {  
                        echo '<span>Aucune image</span>';  
                    }  
                    echo '<div class="colonne">  
                            <p class="text">' . htmlspecialchars($row['titre']) . '</p>  
                            <a href="' . htmlspecialchars($row['lien']) . '" class="lire">Lire</a>  
                        </div>  
                    </div>  
                  </div>';  
                }  
                break;  

            case 'donnees':  
                echo '<h2>LES DONNEES</h2>';  
                echo '<div class="text-responsive">  
                        Les données électroniques sont cruciales pour lutter contre Boko Haram : elles permettent le renseignement et la surveillance (identification des membres, réseaux, géolocalisation), la contre-propagande et le désengagement en ligne, servent de preuves numériques pour les enquêtes et améliorent la sécurité grâce à l\'analyse prédictive. L\'utilisation de ces données doit cependant se faire dans le respect de la vie privée et des droits de l\'homme.  
                    </div>';  
                while ($row = $donnees->fetch(PDO::FETCH_ASSOC)) {  
                    echo '<div class="carte-ligne">  
                            <div class="carte">';  
                    if (!empty($row['photo'])) {  
                        echo '<img src="' . htmlspecialchars($row['photo']) . '" alt="Image des données" class="task-image">';  
                    } else {  
                        echo '<span>Aucune image</span>';  
                    }  
                    echo '<div class="colonne">  
                            <p class="text">' . htmlspecialchars($row['titre']) . '</p>  
                            <a href="' . htmlspecialchars($row['lien']) . '" class="lire">Lire</a>  
                        </div>  
                    </div>  
                  </div>';  
                }  
                break;  
        
            default:  
                  echo '<h1>Page non trouvée</h1>';  
                break;  
        }  
        ?>  
    </div>  

    <div class="contact">  
        <div class="map">  
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.248656543918!2d1.0988566747836197!3d6.230914526494692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10215a7ea5069dc9%3A0xa190c63b2cb31d4a!2sUCAO-UUT!5e0!3m2!1sfr!2stg!4v1738513820477!5m2!1sfr!2stg" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
        </div>  
        <<div class="form">
            <h1>Nous contactez</h1>
            <form method="POST"  action="admin/recepcontact.php">
                <input type="text" name="nom" value="<?php echo $nom; ?>" placeholder="Entrer votre Nom">
                <input type="email" name="email"  value="<?php echo $email; ?>" placeholder="Entrer votre Email">
                <textarea  name="message"  value="<?php echo $message; ?>" placeholder="Votre Message"></textarea>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </div>  

    <br><br><br>  
    <footer>  
        <div class="contenu-footer">  
            <div class="bloc footer-services">  
                <ul class="liste-services">  
                    <img src="Images/menu.svg" alt="">  
                    <li><a href="?page=apropos">À propos</a></li>  
                    <li><a href="?page=attaques">Attaques</a></li>  
                    <li><a href="?page=lutte">Lutte</a></li>  
                    <li><a href="?page=donnees">Données</a></li>  
                    <li><a href="?page=monnaies">Monnaies</a></li>  
                    <li><a href="?page=contact">Contact</a></li>  
                </ul>  
            </div>  
            <div class="bloc footer-medias">  
                <h3>Nos Contacts</h3>  
                <ul class="liste-media">  
                    <li><a href="#"><img src="Images/telephone.svg" alt="">+2280000000</a></li>  
                    <li><a href="#"><img src="Images/gmail.svg" alt="">SiteInfo@gmail.com</a></li>  
                    <li><a href="#"><img src="Images/lieu.svg" alt="">Rue de 40, N'Dj</a></li>  
                    <li><a href="#">&copy; MOUN-RE MAXIME</a></li>  
                </ul>  
            </div>  
            <div class="bloc footer-medias">  
                <h3>Nos Réseaux sociaux</h3>  
                <ul class="liste-media">  
                    <li><a href="#"><img src="Images/facebook.svg" alt="">SiteInfo</a></li>  
                    <li><a href="#"><img src="Images/instagram.svg" alt="">SiteInfo</a></li>  
                    <li><a href="#"><img src="Images/tiktok.svg" alt="">SiteInfo</a></li>  
                    <li><a href="#"><img src="Images/twitter.svg" alt="">SiteInfo</a></li>  
                </ul>  
            </div>  
        </div>  
    </footer>  
</body>   
</html>  