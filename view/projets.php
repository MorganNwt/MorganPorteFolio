<?php
    require_once '../services/db_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gallerie de paysages et de portraits">

    <title>Projets - NAWROT Morgan</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/projets.css">
</head>

<body>
    <header>
        <nav>
            <a href="../index.php" class="lien_icone">
                <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan">
            </a>
            <?php
                if ($loginUser) {
                    // Sécurise le login pour éviter les injections XSS
                    $login = htmlspecialchars($loginUser['prenom']); 
                    echo "Bonjour $login !!!";
                }else{
                    echo "Utilisateur non trouvé.";
                }
            ?>
            <div>
                <a href="../index.php" class="lien_icone">Accueil</a>
                <?php if (!isset($userId)): ?>
                    <a href="connexion.php" class="lien_icone">Connexion</a>
                    <a href="inscription.php" class="lien_icone">Inscription</a>
                <?php endif; ?>
                <a href="a_propos.php" class="lien_icone">À propos</a>
                <a href="projets.php" class="lien_icone">Projets</a>
                <a href="../index.php#jeux" class="lien_icone">Jeux</a>
                <?php if (isset($userId)): ?>
                    <a href="../services/db_deconnexion.php" class="box-3">Déconnexion</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main>
        <section>
            <h1>Projets</h1>
            <section class="container">
                <h2>Paysages</h2>
                <div class="image_container">
                    <div class="image"><img src="../images/projets/paysage1.jpg" alt="Mont Aoraki - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage2.jpg" alt="Parc National d'Abel Tasman - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage3.jpg" alt="Lac Rotorua - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage4.jpg" alt="Lac Wanaka - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage5.jpg" alt="Mont Taranaki - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage6.jpg" alt="Milford Sound - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage7.jpg" alt="Twelve Apostle - Australie"></div> 
                    <div class="image"><img src="../images/projets/paysage8.jpg" alt="Wai-O-Tapu - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/projets/paysage9.jpg" alt="Mont Cook - Nouvelle Zélande"></div>         
                </div>

                <div class="popup_image">
                    <span>&times;</span>
                    <img src="../images/projets/paysage1.jpg" alt="">  
                </div>

                <h2>Portraits</h2>    
                <div class="image_container">
                    <div class="image"><img src="../images/projets/portrait1.jpg" alt="Portrait jeune femme 1"></div>
                    <div class="image"><img src="../images/projets/portrait2.jpg" alt="Portrait jeune femme 2"></div>
                    <div class="image"><img src="../images/projets/portrait3.jpg" alt="Portrait jeune homme 3"></div>
                    <div class="image"><img src="../images/projets/portrait4.jpg" alt="Portrait jeune femme 4"></div>
                    <div class="image"><img src="../images/projets/portrait5.jpg" alt="Portrait jeune femme 5"></div>
                    <div class="image"><img src="../images/projets/portrait6.jpg" alt="Portrait jeune femme 6"></div>
                </div>

                <div class="popup_image">
                    <span>&times;</span>
                    <img src="../images/projets/portrait1.jpg" alt=""> 
                </div>
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

    <script src="../javascript/projets.js"></script>
    <script src="../javascript/jeux.js"></script>
</body>

</html>