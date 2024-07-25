<?php
    session_start();
    // Import des ressources
    require_once '../service/db_connect.php';

     // Création de constantes pour les erreurs
     const ERROR_REQUIRED = 'Veuillez renseigner ce champ';
     const ERROR_PASSWORD_NUMBER_OF_CARACTERS = 'Le mot de pass ne répond pas aux nombres de caractère requis ( 10 )';
 
     // Cr'ation d'un tableau qui recevra les erreurs possibles
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
        elseif(mb_strlen($passwd) < 10 ){
            $errors['passwd'] = ERROR_PASSWORD_NUMBER_OF_CARACTERS;
        }
    
        // Executer la requête SELECT
        if ( (!empty($email)) && (!empty($passwd)) && (mb_strlen($passwd) >= 10 ) ){
            // vérifier que l'utilisateur n'existe pas en BDD avec une requête SELECT
            $sql = 'SELECT * FROM utilisateur WHERE email = :email';
        
            if(isset($pdo)){
                $db_statement = $pdo->prepare($sql);
            }
            $db_statement->execute(
                array(
                    ':email' => $email
                )
            );

            $data = $db_statement->fetch(PDO::FETCH_ASSOC);
            var_dump($data);
            if(password_verify($passwd, $data['passwd'])) {
                $_SESSION['userId'] = $data['id'];
                header('Location: admin.php');
            }
            else{
                 $message = "<span class='message'>Mot de pass incorrecte !</span>";
            }

        }
        else{
            $message = "<span class='message'>Veuillez renseigner tous les champs et avec un MDP de 10 cractères !</span>";
        }
    }

?>>


<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ici ce trouve la Page de connexion de compte">

    <title>Page de Connexion </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">
    
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/connexion.css">
</head>
<body>
<header>
        <nav>
            <a href="../index.php" class="lien_icone">
                <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan">
            </a>
            <div>
                <a href="../index.php" class="lien_icone">Accueil</a>
                <a href="connexion.php" class="lien_icone">Connexion</a>
                <a href="inscription.php" class="lien_icone">Inscription</a>
                <a href="a_propos.html" class="lien_icone">À propos</a>
                <a href="projets.html" class="lien_icone">Projets</a>
                <a href="../index.php#jeux" class="lien_icone">Jeux</a>
            </div>
        </nav>
</header>
<main>
    <section id="contact" class="section_contact">
        <h2>Se connecter</h2>
        <form action="#" method="POST">
            <div class="form_nom_email">
            <?= $message ?>
                <div class="form_column">
                    <label for="email">Adresse email<span class="red">*</span></label>
                    <input type="email" name="email" id="email" placeholder="j.Dujardin@hotmail.fr">
                    <?= $errors['email'] ? '<p class="text-error">' . $errors['email'] . '</p>' : " " ?>
                </div>
                <div class="form_column">
                    <label for="passwd">Mot de passe<span class="red">*</span></label>
                    <input type="password" name="passwd" id="passwd" placeholder="***************">
                    <?= $errors['passwd'] ? '<p class="text-error">' . $errors['passwd'] . '</p>' : "" ?>
                </div>
            </div>
            <input type="submit" value="VALIDER" class="cta" >
        </form>

        <h2>Vous n'avez pas de compte ?</h2>

        <a href="inscription.php">
            <input type="submit" value="Créer un compte" class="cta">
        </a>
        
    </section>
    
</main>
<footer>
    <a href="../index.php" class="lien_icone">
        <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan">
    </a>
    <div>
        <a target="_blank" href="https://twitter.com/" class="lien_icone">
            <img src="../images/twitter.png" alt="Logo Twitter" >
        </a>
        <a target="_blank" href="https://www.instagram.com/" class="lien_icone">
            <img src="../images/instagram.png" alt="Logo Instagram" >
        </a>
    </div>
</footer>


</body>
</html>