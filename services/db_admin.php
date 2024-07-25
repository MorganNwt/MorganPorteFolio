<?php
    // Ouvrir la sessions
    session_start();

    // Je vérifie que $_SESSION a bien récupérer un utilisateur
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }
    else{
        header('Location: connect.php');
    }

