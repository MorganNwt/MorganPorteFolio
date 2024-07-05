<?php
    // Ouvrir la sessions
    session_start();

    // Je vérifie que $_SESSION a bien récupérer un utilisateur
    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }
    else{
        header('Location: connexion.php');
    }

    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ouverture de session<</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<header>
        <nav>
            <a href="../index.php" class="lien_icone">
                <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan">
            </a>
            <div>
                <a href="index.php" class="lien_icone">Accueil</a>
                <a href="view/connexion.php" class="lien_icone">Connexion</a>
                <a href="/view/inscription.php" class="lien_icone">Inscription</a>
                <a href="view/a_propos.html" class="lien_icone">À propos</a>
                <a href="view/projets.html" class="lien_icone">Projets</a>
                <a href="#jeux" class="lien_icone">Jeux</a>
            </div>
        </nav>
    </header>

    <main>
        <h1>Zone autorisée pour Admin</h1>

        <br>
        <p> Bonjour  <?=  $userId ?> .</p>
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