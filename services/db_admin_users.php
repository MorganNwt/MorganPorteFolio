<?php
    require_once 'db_pdo.php';

    try {
        // Requête SELECT pour récupérer toutes les entrées du formulaire de contact avec les rôles
        $requete_select = 'SELECT u.id, u.email, i.nom, i.prenom, i.adresse, i.date_naissance, r.role_name, r.id as role_id 
                        FROM users u 
                        LEFT JOIN infos_users i ON u.id = i.users_id
                        LEFT JOIN user_roles o ON u.id = o.users_id
                        LEFT JOIN roles r ON o.role_id = r.id';
                        
        $stmt_select = $pdo->prepare($requete_select);
        $stmt_select->execute();

        // Récupérer les résultats dans un tableau associatif
        $users_infos = $stmt_select->fetchAll(PDO::FETCH_ASSOC);

        // Requête SELECT pour récupérer tous les rôles disponibles
        $requete_roles = 'SELECT id, role_name FROM roles';
        $stmt_roles = $pdo->prepare($requete_roles);
        $stmt_roles->execute();
        $roles = $stmt_roles->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo '<p>Erreur lors de la récupération des informations : ' . $e->getMessage() . '</p>';
        $users_infos = []; // Initialiser un tableau vide en cas d'erreur
        $roles = []; // Initialiser un tableau vide en cas d'erreur
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_role'])) {
        try {
            $user_id = $_POST['id'];
            $new_role_id = $_POST['role'];

            // Requête UPDATE pour mettre à jour le rôle de l'utilisateur
            $requete_update_role = 'UPDATE user_roles SET role_id = :role_id WHERE users_id = :user_id';
            $stmt_update = $pdo->prepare($requete_update_role);
            $stmt_update->bindParam(':role_id', $new_role_id, PDO::PARAM_INT);
            $stmt_update->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt_update->execute();

            echo '<p>Rôle mis à jour avec succès.</p>';
        } catch (Exception $e) {
            echo '<p>Erreur lors de la mise à jour du rôle : ' . $e->getMessage() . '</p>';
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])){
        try{
            $user_id = $_POST['id'];

            // Requête DELETE pour supprimer les utilisateurs
            $requete_delete ='DELETE FROM users where id = :id';
            $stmt_delete = $pdo->prepare($requete_delete);
            $stmt_delete->bindParam(':id', $user_id, PDO::PARAM_INT);
            $stmt_delete->execute();

            echo'<p> Utilisateur supprimer avec succès</p>';
        }catch(Exception $e){
            echo'<p>Erreur pendant la suppression de l\'utilisateur : ' . $e->getMessage() .'</p>';
        }
    }
