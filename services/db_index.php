<?php
    require_once 'db_pdo.php'; 

    // Récupérer les données issues du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Filtrer les entrées
        $_POST = filter_input_array(INPUT_POST, [
            'nom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email' => FILTER_SANITIZE_EMAIL,
            'telephone' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'sujet' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'message' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        
        // Hydrater les variables
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $sujet = $_POST['sujet'];
        $message = $_POST['message'];
        
        // Requête d'insertion dans la table formulaire_contact
        $requete_form_contact = 'INSERT INTO formulaire_contact (nom, prenom, email, telephone, sujet, message) VALUES (:nom, :prenom, :email, :telephone, :sujet, :message)';
        $stmt_form_contact = $pdo->prepare($requete_form_contact);
        $stmt_form_contact->bindParam(':nom', $nom);
        $stmt_form_contact->bindParam(':prenom', $prenom);
        $stmt_form_contact->bindParam(':email', $email);
        $stmt_form_contact->bindParam(':telephone', $telephone);
        $stmt_form_contact->bindParam(':sujet', $sujet);
        $stmt_form_contact->bindParam(':message', $message);
        
        // Exécution de la requête
        if ($stmt_form_contact->execute()) {
            echo "Nouveau contact ajouté avec succès";
        } else {
            echo "Erreur lors de l'ajout du contact";
        }
    }
