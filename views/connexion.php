<?php
    session_start();
    // Import des ressources
    require_once '../service/db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        // 1- Je nettoie les données du formulaire
        $_POST = filter_input_array( INPUT_POST, [
            'email'=>FILTER_SANITIZE_EMAIL,
            'mot_de_passe'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        // 2- J'hydrate les variables à utiliser pour remplacer les param de la requête
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // 3- J'écris ma requête paramétré
        $requete = 'SELECT email, mot_de_passe FROM inscription WHERE email = :email AND mot_de_passe = :mot_de_passe';
        
        // 4- Je prépare ma requête
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
       

        // 6 - Execution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();

        // si $nb vos 1, ALORS j'autorise la connexion et je redirige l'utilisateur vers une page de 
        // modification de profil
        // ATTENTION n'oubliez pas d'ouvrir une session et de stocker l'id de l'utilisateur 
        // dans $_SESSION
        if ($nb > 0) {
            $_SESSION['email'] = $email;
            header('Location: ../index.html');
        }
    }

?>


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
            <a href="../index.html" class="lien_icone">
                <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan">
            </a>
            <div>
                <a href="../index.html" class="lien_icone">Accueil</a>
                <a href="connexion.php" class="lien_icone">Connexion</a>
                <a href="inscription.php" class="lien_icone">Inscription</a>
                <a href="a_propos.html" class="lien_icone">À propos</a>
                <a href="projets.html" class="lien_icone">Projets</a>
                <a href="../#jeux" class="lien_icone">Jeux</a>
            </div>
        </nav>
</header>
<main>
    <section id="contact" class="section_contact">
        <h2>Se connecter</h2>
        <form action="#" method="get">
            <div class="form_nom_email">
                <div class="form_column">
                    <label for="nom">Adresse email<span class="red">*</span></label>
                    <input type="email" name="email" id="email" placeholder="j.Dujardin@hotmail.fr" >
                </div>
                <div class="form_column">
                    <label for="mot_de_passe">Mot de passe<span class="red">*</span></label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="***************">
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
    <a href="../index.html" class="lien_icone">
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