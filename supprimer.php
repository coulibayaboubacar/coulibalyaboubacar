<?php
        session_start();
        include("conn.php");
    try {
        $conn = new PDO("mysql:host=$server;dbname=mabase", $user, $mdp);
        // Définir le mode d'erreur PDO comme l'exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (isset($_REQUEST["id"])) {
            $id=$_REQUEST["id"];
            $sql = "DELETE FROM etudiant Where Id='$id'";
            $result = $conn->query($sql);
            if ($result->rowCount() > 0) {
                echo "Suppression effectuer";
                } else {
                echo "Suppression non effectuer";
                }
            }
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
?>
