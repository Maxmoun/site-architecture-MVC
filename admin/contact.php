<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="images/favicon.png" rel="icon">
    <link rel="stylesheet" href="style.css">
    <title>siteInfo</title>
</head>
<body>
    <header>
       <nav>
        <label class="logo">SiteInfo</label>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="apropos.html">A propos</a></li>
                <li><a href="actualites.html">Actualités</a></li>
                <li><a href="donnees.html">Données</a></li>
                <li><a href="monnaies.html">Monnaies</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
       </nav>
    </header>
       <section class="banniere-photo">
            <h1>Centre d'information </h1>
            <h3>Les actualités et informations liées aux attaques et de lutte contre les bokouharam</h3>
       </section>



    <div class="contact">
        
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.248656543918!2d1.0988566747836197!3d6.230914526494692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10215a7ea5069dc9%3A0xa190c63b2cb31d4a!2sUCAO-UUT!5e0!3m2!1sfr!2stg!4v1738513820477!5m2!1sfr!2stg" width="400" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
        </div>
        <div class="form">
            <h1>Nous contactez</h1>
            <form method="POST"  action="recepcontact.php">
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
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="apropos.html">A propos</a></li>
                    <li><a href="actualites.html">Actualités</a></li>
                    <li><a href="donnees.html">Données</a></li>
                    <li><a href="monnaies.html">Monnaies</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="bloc footer-medias">
                <h3>Nos Contacts</h3>
                <ul class="liste-media">
                    <li><a href="#"><img src="Images/telephone.svg" alt="">+2280000000</a></li>
                    <li><a href="#"><img src="Images/gmail.svg" alt="">SiteInfo@gmail.com</a></li>
                    <li><a href="#"><img src="Images/lieu.svg" alt="">Rue de 40, N'Dj</a></li>
                    <li><a href="#">&copy;MOUN-RE MAXIME</a></li>
                </ul>
            </div>
            <div class="bloc footer-medias">
                <h3>Nos Reseaux sociaux</h3>
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