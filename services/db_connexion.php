<?php
    session_start();

    // Import des ressources
    require_once 'db_pdo.php';
    
    // Création de constantes pour les erreurs
    const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
    const ERROR_PASSWORD_NUMBER_OF_CARACTERS = 'Le mot de passe ne répond pas aux nombres de caractères requis (13)';
    
    // Création d'un tableau pour les erreurs possibles
    $errors = [
        'email' => '',
        'passwd' => ''
    ];
    $message = '';
    
    // Traitement des données si la méthode du formulaire soumis est bien POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_POST = filter_input_array(INPUT_POST, [
            'email' => FILTER_SANITIZE_EMAIL,
            'passwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
    
        // Initialisation des variables qui vont recevoir les données des champs du formulaire
        $email = $_POST['email'] ?? '';
        $passwd = $_POST['passwd'] ?? '';
    
        // Remplissage du tableau concernant les erreurs possibles
        if (empty($email)) {
            $errors['email'] = ERROR_REQUIRED;
        }
        if (empty($passwd)) {
            $errors['passwd'] = ERROR_REQUIRED;
        } elseif (mb_strlen($passwd) < 13) {
            $errors['passwd'] = ERROR_PASSWORD_NUMBER_OF_CARACTERS;
        }
    
        // Exécuter la requête SELECT si les champs sont valides
        if (empty($errors['email']) && empty($errors['passwd'])) {
            $sql = 'SELECT id, passwd FROM USERS WHERE email = :email';
    
            if (isset($pdo)) {
                $db_statement = $pdo->prepare($sql);
                $db_statement->bindParam(':email', $email, PDO::PARAM_STR);
                $db_statement->execute();
    
                $data = $db_statement->fetch(PDO::FETCH_ASSOC);
    
                if ($data && password_verify($passwd, $data['passwd'])) {
                    $_SESSION['userId'] = $data['id'];
                    header('Location: ../index.php');
                    exit();
                } else {
                    $message = "<span class='message'>Mot de passe incorrect ou utilisateur non trouvé !</span>";
                }
            } else {
                $message = "<span class='message'>Erreur de connexion à la base de données.</span>";
            }
        } else {
            $message = "<span class='message'>Veuillez corriger les erreurs et réessayer.</span>";
        }
    }