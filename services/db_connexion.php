<?php
    session_start();
    // Import des ressources
    require_once 'db_pdo.php';

     // Création de constantes pour les erreurs
     const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
     const ERROR_PASSWORD_NUMBER_OF_CARACTERS = 'Le mot de pass ne répond pas aux nombres de caractère requis ( 13 )';
 
     // Création d'un tableau qui recevra les erreurs possibles
     $errors = [
         'email' => '',
         'passwd' => ''
     ];
     $message = '';

      // Traitement des données si la méthode du formulaire soumis est bien POST
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_POST = filter_input_array(INPUT_POST, [
            'email' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'passwd' => FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        // Initialisation des variables qui vont recevoir les dates des champs du formulaire
        $email = $_POST['email'] ?? '';
        $passwd = $_POST['passwd'] ?? '';

        // Remplissage du tableau qui concerne les erreurs possibles.
        if(!$email){
            $errors['email'] = ERROR_REQUIRED;
        }
        if(!$passwd){
            $errors['passwd'] = ERROR_REQUIRED;
        }
        elseif(mb_strlen($passwd) < 13 ){
            $errors['passwd'] = ERROR_PASSWORD_NUMBER_OF_CARACTERS;
        }
    
        // Executer la requête SELECT
        if ( (!empty($email)) && (!empty($passwd)) && (mb_strlen($passwd) >= 13 ) ){
            // vérifier que l'utilisateur n'existe pas en BDD avec une requête SELECT
            $sql = 'SELECT * FROM USERS WHERE email = :email';
        
            if(isset($pdo)){
                $db_statement = $pdo->prepare($sql);
            }
            $db_statement->execute(
                array(
                    ':email' => $email
                )
            );

            $data = $db_statement->fetch(PDO::FETCH_ASSOC);
            if(password_verify($passwd, $data['passwd'])) {
                $_SESSION['userId'] = $data['id'];
                header('Location: ../index.php');
            }
            else{
                 $message = "<span class='message'>Mot de pass incorrecte !</span>";
            }
        }
        else{
            $message = "<span class='message'>Veuillez renseigner tous les champs et avec un MDP de 10 cractères !</span>";
        }
    }