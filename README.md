# site-architecture-MVC
1- 📝 Présentation du Projet de Site Web Dynamique Académique


    Ce projet a été intégralement développé par MOUN-RE MAXIME en utilisant PHP, HTML, et CSS, en s'appuyant sur 
    l'architecture Modèle-Vue-Contrôleur (MVC)

2- 💻 Structure et Accès au Projet

Le site est structuré en deux sections distinctes :

    - Partie Visiteur (Front-end): Accessible via l'URL : http://localhost/site-architecture-MVC/
    -Partie Administration (Back-end): Accessible via l'URL : http://localhost/site-architecture-MVC/admin
    
    L'accès à la partie administration est sécurisé par une authentification. Si les identifiants
    fournis sont corrects, l'utilisateur est dirigé vers le tableau de bord; dans le cas contraire, il est
    redirigé vers la partie visiteur.

    Le projet a été conçu pour être adaptatif et responsif, assurant un affichage optimal sur tout type d'écran.

3 - ⚙️ Configuration de la Base de Données et Mise en Route
    Base de Données (BDD): Le fichier de la base de données est inclus dans le dossier bd. 
    Il doit être importé localement sur un environnement de développement tel que XAMPP ou équivalent.

    Remplissage du Contenu: Une fois le site hébergé en local, veuillez accéder au tableau de bord administrateur. 
    Toutes les données du site (photos, liens, descriptions, messages, titres, etc.) ont été intentionnellement 
    supprimées de la base de données importée pour vous permettre  d'en assurer le remplissage et de constater 
    le fonctionnement du site. Le contenu est entièrement dynamique et provient de la BDD

    Note Importante pour l'Administration:
        Identifiants de l'administrateur par défaut (préservés dans la BDD importée) :
            Utilisateur : maxmoun
            Mot de passe : 1234
        
        Fonctionnalité d'ajout d'administrateurs:
            e formulaire permettant l'ajout de nouveaux administrateurs a été délibérément omis pour vous inviter à l'implémenter
             vous-même, afin de parfaire votre compréhension pratique de l'architecture Modèle-Vue-Contrôleur (MVC), qui sert de 
             fondement à de nombreux frameworks modernes(Laravel,...)

4 - ⚙️ Configuration de la Réécriture d'URL (URL Rewriting)

    Ce code configure le serveur web Apache afin qu'il utilise des URL propres et conviviales (clean URLs). Pour ce faire, 
    il redirige toutes les requêtes vers un unique fichier de démarrage, l'index.php. Ce mécanisme est le fondement du 
    fonctionnement des architectures Modèle-Vue-Contrôleur (MVC) et des frameworks modernes

Développeur et Auteur : MOUN-RE MAXIME (Étudiant en Big Data). Je suis à votre disposition pour toute opportunité de collaboration 
ou demande de services.



