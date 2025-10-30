<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'siteinfo';

    $connection = new mysqli($servername, $username, $password, $database);

    if($connection->connect_error){
        die("Connection failled: ".$connection->connect_error);
    }

    $nom="";  
    $email    = "";
    $message     = "";
    $errorMsg = "";
    $successMsg = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
        $nom    = $_POST["nom"];
        $email     =$_POST["email"];
        $message    = $_POST["message"];
    
 
        do{
            if(empty($nom) || empty($email) || empty($message) ){
                $errorMsg = "svp champ ....";
                break;
            }

            $sql = "INSERT INTO contact(nom, email, message) VALUES('$nom', '$email', '$message')";
            $result = $connection->query($sql);

            if(!$result){
                $errorMsg = "Erreur d'insertion: ".$connection->connect_error;
            }


            $nom  ="";  
            $email    = "";
            $message     = "";
            $errorMsg = "";
            $successMsg = "un nouveau etudiant ajouté avec succès...!";

            header("location: ../index.php");
            exit;

        } while(false);
    }

?>