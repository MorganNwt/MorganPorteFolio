<?php
    // Ouvrir la sessions
    session_start();

    // Je vérifie que $_SESSION a bien récupérer un utilisateur
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }
    else{
        header('Location: ../index.php');
    }


    // afficher dynamiquement le login de l'utilisateur connecté dans la nav barre de la page admin
    require_once 'db_connexion.php';

    // requête avec jointure de la table infos_user pour récupérer le prénom avec jointure sur 
    // la table users sur les id ( i. et u. sont les alias)

    $requete = 'SELECT i.prenom FROM INFOS_USERS i JOIN USERS u ON u.id = i.user_id WHERE u.id = :id';
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $loginUser = $stmt->fetch(PDO::FETCH_ASSOC);