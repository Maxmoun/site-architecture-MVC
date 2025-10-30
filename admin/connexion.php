<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $username = $_POST['username'];  
    $password = $_POST['password'];  

    $host = "localhost";  
    $dbusername = "root";    
    $dbpassword = "";  
    $dbname = "siteinfo";  
     
    $conn = new mysqli($host,  $dbusername, $dbpassword, $dbname) or die ("la base inexistante");
    echo"connexion reussie";

    if ($conn->connect_error) {  
        die("Échec de la connexion : " . $conn->connect_error);  
    }  

    $query = "SELECT * FROM utilisateur WHERE username='$username' AND password='$password'";  

    $result = $conn->query($query);  

     
    if ($result->num_rows == 1) {  
        header("Location: tableau.php");  
        exit();  
    } else {  
        header("Location: ../index.php");  
        exit();  
    }  
    $conn ->close();

}  
?>  