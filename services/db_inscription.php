<?php
    session_start();
    // Import des ressources
    require_once 'db_connexion.php';

    // Récupérer les données issus du formulaire APRES validation
    // 1 - Le code doit être execute que si $_POST est définie
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'nom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email'=>FILTER_SANITIZE_EMAIL,
            'mot_de_passe'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        
        // 2- J'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // - Hachage du mot de passe
        $hachage_password = password_hash($mot_de_passe, PASSWORD_BCRYPT);

        // 3-j'écris ma requête paramétrées nommées
        $requete = 'INSERT INTO UTILISATEUR VALUES (DEFAULT, :nom, :prenom, :email, :mot_de_passe)';

        // 4- Je prpare la requête
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':mot_de_passe',$hachage_password);

        // 6 - Execution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();
        
        if($nb > 0) {
            $flash_success = '<p>L\'inscription à bien été effectuée ! </p>';
        }
    }
?>