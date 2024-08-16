<?php
    session_start();

    // Import des ressources
    require_once 'db_connexion.php'; // Assurez-vous que $pdo est défini ici

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
        
        // Hachage du mot de passe
        $hachage_password = password_hash($passwd, PASSWORD_BCRYPT);

        try {
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
            $requete_infos_users = 'INSERT INTO infos_users (user_id, nom, prenom, adresse, date_naissance) VALUES (:user_id, :nom, :prenom, :adresse, :date_naissance)';
            $stmt_infos_users = $pdo->prepare($requete_infos_users);
            $stmt_infos_users->bindParam(':user_id', $user_id);
            $stmt_infos_users->bindParam(':nom', $nom);
            $stmt_infos_users->bindParam(':prenom', $prenom);
            $stmt_infos_users->bindParam(':adresse', $adresse);
            $stmt_infos_users->bindParam(':date_naissance', $date_naissance);
            $stmt_infos_users->execute();

            // Valider la transaction
            $pdo->commit();

            echo '<p>L\'inscription a bien été effectuée !</p>';
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            $pdo->rollBack();
            echo '<p>Échec de l\'inscription : ' . $e->getMessage() . '</p>';
        }
    }