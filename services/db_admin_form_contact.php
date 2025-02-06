<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        try {
            $id = $_POST['id'];
            
            // Requête DELETE pour supprimer l'enregistrement
            $requete_delete = 'DELETE FROM formulaire_contact WHERE id = :id';
            $stmt_delete = $pdo->prepare($requete_delete);
            $stmt_delete->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_delete->execute();
    
            echo '<p>Enregistrement supprimé avec succès.</p>';
        } catch (Exception $e) {
            echo '<p>Erreur lors de la suppression de l\'enregistrement : ' . $e->getMessage() . '</p>';
        }
    }
    
    // Requête SELECT pour récupérer toutes les entrées du formulaire de contact
    try {
        $requete_select = 'SELECT id, nom, prenom, email, telephone, sujet, message FROM formulaire_contact';
        $stmt_select = $pdo->prepare($requete_select);
        $stmt_select->execute();
    
        // Récupérer les résultats dans un tableau associatif
        $form_contacts = $stmt_select->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo '<p>Erreur lors de la récupération des informations : ' . $e->getMessage() . '</p>';
        $form_contacts = []; // Initialiser un tableau vide en cas d'erreur
    }