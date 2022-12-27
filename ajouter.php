<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJOUT</title>
</head>
<body>
    <form action="ajouter.php" method="post">
        <fieldset id="fied">
        <legend > Ajout De Nouveu Etudiant</legend> 
        <br><input type="text" name="prenom" placeholder="Prenom" ><br>
        <br><input type="text" name="nom" placeholder="Nom" ><br>
        <br><input type="text" name="login" placeholder="Login" ><br>
        <br><input type="password" name="mdp" placeholder="Mot De Passe" ><br>
        <br><input type="text" name="email" placeholder="Email" ><br>
        <br><input type="text" name="adresse" placeholder="Adresse" ><br>
        <br><input type="text" name="telephone" placeholder="Telephone" ><br>
        <br><input type="submit" value="Ajouter"><br>
        </fieldset>
        </form>
    </form>
</body>
</html>
<?php
        session_start();
        include("conn.php");
    try {
        $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
        // Définir le mode d'erreur PDO comme l'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_REQUEST['prenom'])){
            $prenom=$_REQUEST['prenom'];
            $nom=$_REQUEST['nom'];
            $login=$_REQUEST['login'];
            $mdp=$_REQUEST['mdp'];
            $email=$_REQUEST['email'];
            $adresse=$_REQUEST['adresse'];
            $telephone=$_REQUEST['telephone'];
            $sql = "INSERT INTO etudiant (ID,Prenom,Nom,Login,Mdp,Email,Adresse,Telephone)
            VALUES ('','$prenom', '$nom','$login','$email' ,'$email','$adresse','$telephone')";
            // On utilise exec () car aucun résultat n'est retourné
            $conn->exec($sql);
            $last_id = $conn->lastInsertId();
            echo " Enregistrement créé avec succès.</br> La dernière ID insérée est : " . $last_id;
        }
    } catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
?>