<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        table,td,th{
            border: 1px solid black;
        }
    </style>
    <title>Details</title>
</head>
<body>
    <?php
        session_start();
        include("conn.php");
     try {
            $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
            // Définir le mode d'erreur PDO comme l'exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (isset($_REQUEST["id"])) {
                $id=$_REQUEST["id"];
                $sql = "SELECT * FROM etudiant Where Id='$id'";
                $result = $conn->query($sql);
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
                    </tr>";
                    // Afficher les données de chaque ligne
                    while($row = $result->fetch()) {
                    echo "<tr><td>".$row["Id"]."</td>
                    <td>".$row["Prenom"]."
                    <td>".$row["Nom"]."</td>
                    <td>".$row["Login"]."</td>
                    <td>".$row["Mdp"]."</td>
                    <td>".$row["Email"]."</td>
                    <td>".$row["Adresse"]."</td>
                    <td>".$row["Telephone"]."</td></tr>";
                    }
                    echo "</table>";
                    } else {
                    echo "0 results";
                    }
                }
        }
        catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    ?>
</body>
</html>