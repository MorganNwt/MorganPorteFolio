<?php
    session_start();
    require_once 'db_pdo.php';

    // Récupérer les données issues du formulaire APRES validation
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Filtrer les entrées
        $_POST = filter_input_array(INPUT_POST, [
            'email' => FILTER_SANITIZE_EMAIL,
            'passwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'adresse' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'date_naissance' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        
        // Hydrater les variables
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $date_naissance = $_POST['date_naissance'];
        
        // Validation du mot de passe
        if (mb_strlen($passwd) >= 13 && preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{13,}$/', $passwd)) {
            // Hachage du mot de passe
            $hachage_password = password_hash($passwd, PASSWORD_BCRYPT);
        } else {
            echo ' <link rel="stylesheet" href="../style/inscription.css"><script src="../javascript/components/_inscription_alert.js"></script>';
            exit(); // Arrêter l'exécution du script
        }
    
        try {
            // Vérifier si l'email existe déjà
            $requete_check_email = 'SELECT id FROM users WHERE email = :email';
            $stmt_check_email = $pdo->prepare($requete_check_email);
            $stmt_check_email->bindParam(':email', $email);
            $stmt_check_email->execute();
    
            // Si l'email existe déjà, arrêter le processus d'inscription
            if ($stmt_check_email->rowCount() > 0) {
                echo '<p>Cette adresse email est déjà utilisée. Veuillez en choisir une autre.</p>';
                exit();
            }
    
            // Démarrer une transaction
            $pdo->beginTransaction();
    
            // Requête d'insertion dans la table users
            $requete_users = 'INSERT INTO users (email, passwd) VALUES (:email, :passwd)';
            $stmt_users = $pdo->prepare($requete_users);
            $stmt_users->bindParam(':email', $email);
            $stmt_users->bindParam(':passwd', $hachage_password);
            $stmt_users->execute();
    
            // Récupérer l'ID de l'utilisateur inséré
            $user_id = $pdo->lastInsertId();
    
            if (!$user_id) {
                throw new Exception("Échec de la récupération de l'ID de l'utilisateur.");
            }
    
            // Requête d'insertion dans la table infos_users
            $requete_infos_users = 'INSERT INTO infos_users (users_id, nom, prenom, adresse, date_naissance) VALUES (:users_id, :nom, :prenom, :adresse, :date_naissance)';
            $stmt_infos_users = $pdo->prepare($requete_infos_users);
            $stmt_infos_users->bindParam(':users_id', $user_id);
            $stmt_infos_users->bindParam(':nom', $nom);
            $stmt_infos_users->bindParam(':prenom', $prenom);
            $stmt_infos_users->bindParam(':adresse', $adresse);
            $stmt_infos_users->bindParam(':date_naissance', $date_naissance);
            $stmt_infos_users->execute();
    
            // Requête pour obtenir l'ID du rôle "ROLE_USER"
            $requete_role_user = 'SELECT id FROM roles WHERE role_name = :role_name';
            $stmt_role_user = $pdo->prepare($requete_role_user);
            $role_name = 'ROLE_USER'; // Le nom du rôle par défaut
            $stmt_role_user->bindParam(':role_name', $role_name);
            $stmt_role_user->execute();
            $role_id = $stmt_role_user->fetchColumn();
    
            if (!$role_id) {
                throw new Exception("Échec de la récupération de l'ID du rôle 'ROLE_USER'.");
            }
    
            // Requête d'insertion dans la table user_roles pour attribuer le rôle par défaut
            $requete_user_roles = 'INSERT INTO user_roles (users_id, role_id) VALUES (:users_id, :role_id)';
            $stmt_user_roles = $pdo->prepare($requete_user_roles);
            $stmt_user_roles->bindParam(':users_id', $user_id);
            $stmt_user_roles->bindParam(':role_id', $role_id);
            $stmt_user_roles->execute();
    
            // Valider la transaction
            $pdo->commit();
    
            echo '<p>L\'inscription a bien été effectuée !</p>';
            header('Location: ../index.php');
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            $pdo->rollBack();
            echo '<p>Échec de l\'inscription : ' . $e->getMessage() . '</p>';
        }
    }