<?php
    // Ouvrir la sessions
    session_start();

    // Je vérifie que $_SESSION a bien récupérer un utilisateur
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }else{
        header('Location: ../view/connexion.php');
    }

    // afficher dynamiquement le login de l'utilisateur connecté dans la nav barre de la page admin
    require_once 'db_pdo.php';

    // requête avec jointure de la table infos_user pour récupérer le prénom avec jointure sur 
    // la table users sur les id ( i. et u. sont les alias)


    

   
   