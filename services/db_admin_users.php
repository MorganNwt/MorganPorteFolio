<?php
    require_once 'db_pdo.php';

    try {
    // Requête SELECT pour récupérer toutes les entrées du formulaire de contact avec les rôles
    $requete_select = 'SELECT u.id, u.email, i.nom, i.prenom, i.adresse, i.date_naissance, r.role_name 
                       FROM users u 
                       LEFT JOIN infos_users i ON u.id = i.users_id
                       LEFT JOIN user_roles ur ON u.id = ur.users_id
                       LEFT JOIN roles r ON ur.role_id = r.id';
                     
    $stmt_select = $pdo->prepare($requete_select);
    $stmt_select->execute();

    // Récupérer les résultats dans un tableau associatif
    $users_infos = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo '<p>Erreur lors de la récupération des informations : ' . $e->getMessage() . '</p>';
    $users_infos = []; // Initialiser un tableau vide en cas d'erreur
}