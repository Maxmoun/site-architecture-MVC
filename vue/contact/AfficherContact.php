<?php  
ini_set('display_errors', 1);  
ini_set('display_startup_errors', 1);  
error_reporting(E_ALL);  

include '../../serveur/Database.php';  
include '../../modele/ContactModel.php';  
include '../../controleur/ContactControlleur.php'; 

$database = new Database();  
$db = $database->getConnection();  

$contactControlleur = new ContactControlleur($db); 

$contacts = $contactControlleur->read();  
?>  

<!DOCTYPE html>  
<html lang="fr">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>L</title>  
    <style>  
        body {  
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 5px;  
            text-align: center;  
        }  
        h1 {  
            color: #333;  
        }  
        a {  
            display: inline-block;  
            padding: 10px 10px;  
            margin: 10px;  
            text-decoration: none;  
            color: #fff;
            background-color: #3d09fa; 
            border-radius: 5px;  
            transition: background 0.3s;  
        }  
        a:hover {  
            background-color: #3d09fa; 
        }  
        table {  
            width: 95%;  
            margin: 20px auto;  
            border-collapse: collapse;  
            background: white;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
            border-radius: 10px;  
            overflow: hidden;  
        }  
        th, td {  
            padding: 15px;  
            border: 1px solid #ddd;  
            text-align: left;  
        }  
        th {  
            background-color: #3d09fa;   
            color: white;  
        }  
        tr:nth-child(even) {  
            background-color: #fff;  
        }  
        tr:hover {  
            background-color: blue;  
        }  
        .actions a {  
            background-color: #28a745;  
        }  
        .actions a:last-child {  
            background-color: #dc3545;  
        }  
        .task-image {  
            width: 70px; /* Ajustez la taille selon vos besoins */  
            height: 70px;  
        }  
        @media (max-width: 600px) {  
    body {  
        padding: 2px;  
    }  

    a {  
        padding: 8px;  
        margin: 5px;  
    }  

    table {  
        width: 100%;  
    }  

    th, td {  
        padding: 10px;  
    }  

    .task-image {  
        width: 50px; /* Ajustez la taille pour les écrans plus petits */  
        height: 50px;  
    }  
} 
    </style>  
</head>  
<body>  
    <h1>Messages recus</h1>  
    <a href="CreerContact.php">Créer apropos</a>  
    <table>  
        <thead>  
            <tr>  
                <th>NOM</th>  
                <th>Email</th>  
                <th>Message</th> <!-- Nouvelle colonne pour l'image -->  
                <th>Actions</th>  
            </tr>  
        </thead>  
        <tbody>  
            <?php while ($row = $contacts->fetch(PDO::FETCH_ASSOC)): ?>  
                <tr>  
                    <td><?php echo htmlspecialchars($row['nom']); ?></td>  
                    <td><?php echo htmlspecialchars($row['email']); ?></td>  
                    <td><?php echo htmlspecialchars($row['message']); ?></td> 
                    <td class="actions">   
                        <a href="SupprimerContact.php?id=<?php echo $row['id']; ?>">Supprimer</a> 
                    </td>  
                </tr>  
            <?php endwhile; ?>  
        </tbody>  
    </table>  
</body>  
</html>  
