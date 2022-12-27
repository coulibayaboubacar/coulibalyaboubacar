<?php
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["mdp"]);
    header("location: indexconn.php?msg= Vous venez de vous  deconnecter");
?>