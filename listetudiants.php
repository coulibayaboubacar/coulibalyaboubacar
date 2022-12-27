<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des Etudiants</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table,td,th{
            text-align: center;
            margin-left: 80px;
        }
    </style>
</head>
<body>
    <?php
     include("conn.php");
         try {
            $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
            // Définir le mode d'erreur PDO comme l'exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
        $name = "%".$_REQUEST["name"]."%";
        $id = "%".$_REQUEST["id"]."%";
        $prenom = "%".$_REQUEST["prenoms"]."%" ;
         $email = "%".$_REQUEST["email"]."%" ;
          $adresse = "%".$_REQUEST["adresse"]."%" ;
           $telephone = "%".$_REQUEST["telephone"]."%" ;// Récupère la paramètre
        if (($name !== "")and($id !== "")and($prenom !== "")and($adresse !== "")and($email !== "")and($telephone !== "")) {// Recherche toutes les propositions de array si $ q est différent de ""
            $sql = ("SELECT * FROM etudiant Where Nom Like '$name' OR Prenom Like '$prenom' OR Email Like '$email'
            OR Adresse Like '$adresse' OR Telephone Like '$telephone' OR Id Like '$id' ORDER BY Id"); 
            $result= $conn->query($sql);
            echo "<h1 id='entete'>Page d'administration</h1>";
            if ($result->rowCount() > 0) {
                    echo "<table>
                    <tr>
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Login</th>
                    <th>Mdp</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Modifier</th>
                    <th>Suprimer</th>
                    </tr>";
                    // Afficher les données de chaque ligne
                    while($row = $result->fetch()) {
                        $id=$row["Id"];
                        echo "<tr><td><a href='details.php?id=$id'>$id</a></td><td>".$row["Prenom"]."
                        <td>".$row["Nom"]."</td>
                        <td>".$row["Login"]."</td>
                        <td>".$row["Mdp"]."</td>
                        <td>".$row["Email"]."</td>
                        <td>".$row["Adresse"]."</td>
                        <td>".$row["Telephone"]."</td>
                        <td><a href='modifier.php?id=$id'>$id</a></td>
                        <td><a href='supprimer.php?id=$id'>$id</a></td></tr>";
                    }
                    echo "</table>";
            } else {
                echo "0 results";
            }   
        }else{
            echo 'champ vide? Veuilez renseillez la collonne';
        }
    ?>
</body>
</html>