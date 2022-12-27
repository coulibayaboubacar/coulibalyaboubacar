<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    include("Conn.php");
    try { 
        $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        echo "Page de modification <br> <br>"; 
        if(isset($_REQUEST["id"])){
            $id=$_REQUEST["id"];
            $sql= "select * from etudiant WHERE Id = '$id' ";
            $result = $conn->query($sql);
            if($result->rowCount() > 0) 
        { 
        while($row = $result->fetch()) 
        { 
            echo "<form action='Modifier.php' method='post' >
                    <input type='text' name='Id' placeholder='Id' value= ".$row['Id']."><br><br>
                    <input type='text' name='Prenom' placeholder='Prenom' value= ".$row['Prenom']."><br><br>
                    <input type='text' name='Nom' placeholder='Nom' value= ".$row['Nom']."><br><br>
                    <input type='text' name='Login' placeholder='Login' value= ".$row['Login']."><br><br>
                    <input type='text' name='Mdp' placeholder='Mdp' value= ".$row['Mdp']."><br><br>
                    <input type='text' name='Email' placeholder='Email' value= ".$row['Email']."><br><br>
                    <input type='text' name='Adresse' placeholder='Adresse' value= ".$row['Adresse']."><br><br>
                    <input type='text' name='Telephone' placeholder='Telephone' value= ".$row['Telephone']."><br><br>
                    <input type='submit' value='Modifier'><br>
                </form>"; 
                
            }   
            
            echo
                " ";
                
            } 
            else 
                {
                    echo "0 results"; 
                }
            }
    }
            catch(PDOException $e)
                { 
                    echo "Connection failed: " . $e->getMessage(); 
                }
                if(isset($_REQUEST["Nom"])){
                    $id=$_REQUEST['Id'];
                    $prenom=$_REQUEST['Prenom'];
                    $nom=$_REQUEST['Nom'];
                    $login=$_REQUEST['Login'];
                    $mdp=$_REQUEST['Mdp'];
                    $email=$_REQUEST['Email'];
                    $adresse=$_REQUEST['Adresse'];
                    $telephone=$_REQUEST['Telephone'];
                    $sql = "UPDATE etudiant SET Prenom = '$prenom ', Nom = '$nom ', Login = '$login ', Mdp= '$mdp ', Email = '$email ', Adresse= '$adresse ', Telephone= '$telephone ' where Id ='$id' ";
                    $result = $conn->query($sql);
                    if($result->rowCount() > 0) 
                        { 
                            echo 'Modification effectuer !'; 
                        }
                        else
                        {
                            echo 'Modification non effectuer !'; 
                        } 
                }                 
?> 
</body>
</html>

