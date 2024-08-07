<?php
    // Commencer la session
    session_start();

    // Détruire toutes les données de la session
    session_destroy();

    // Vérifier l'URI de la page actuelle pour ajuster la redirection
    $current_page = basename($_SERVER['PHP_SELF']);
    if ($current_page === 'index.php') {
        header('Location: index.php');
        var_dump($current_page);
    } else {
        header('Location: ../index.php');
    }
    exit();