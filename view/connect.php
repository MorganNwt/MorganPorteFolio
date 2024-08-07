<?php  
    require_once '../services/db_connect.php';
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
    <link rel="stylesheet" href="../style/main.css">
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
                <a href="connect.php" class="lien_icone">Connexion</a>
                <a href="inscription.php" class="lien_icone">Inscription</a>
                <a href="a_propos.php" class="lien_icone">À propos</a>
                <a href="projets.php" class="lien_icone">Projets</a>
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