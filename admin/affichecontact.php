<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <title>site info</title>

  

</head>
<body>
<div class="container my-5">
    <center> <h2 class="display-5">LISTE DE APROPOS</h2></center>
    
    <table class="table table-hover table-responsive">
            <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "siteinfo";

                $connection = new mysqli($servername, $username, $password, $database);
                
                if($connection->connect_error){
                    die("erreur de connexion: ".$connection->connect_error);
                }
                
                /* else{
                    echo "Connection Sucess ...!";
                } */
                $sql = "SELECT * FROM contact";
                $result = $connection->query($sql);

                if(!$result){
                    die("erreur de connexion : ".$connection->connect_error);
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                            <td>$row[id]</td>
                            <td>$row[nom]</td>
                            <td>$row[email]</td>
                            <td>$row[message]</td>
                            

                            <td>
                            <a class='btn btn-outline-warning' href='/innfosite/editapropos.php?id=$row[id]' role='button'>Modifier</a>
                            <a class='btn btn-outline-danger' href='/infosite/deleteapropos.php?mid=$row[id]' role='button'>Supprimer</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
 

    </div>

    

</body>
</html>