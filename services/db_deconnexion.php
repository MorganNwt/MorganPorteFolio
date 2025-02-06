<?php
    session_start();
    // Détruire toutes les données de la session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion
    header("Location:../view/connexion.php");
    exit();
