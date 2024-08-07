<?php
    require_once '../services/db_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A-propos et tarification de l'offre">

    <title>À propos - NAWROT Morgan</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link href="../style/main.css" rel="stylesheet">
    <link href="../style/a_propos.css" rel="stylesheet">
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
                    <a href="connexion.php"class="lien_icone">Connexion</a>
                    <a href="inscription.php" class="lien_icone">Inscription</a>
                <?php endif; ?>
                <a href="a_propos.php"class="lien_icone">À propos</a>
                <a href="projets.php"class="lien_icone">Projets</a>
                <a href="../index.php#jeux" class="lien_icone">Jeux</a>
                <?php if (isset($userId)): ?>
                    <a href="../services/db_deconnexion.php" class="box-3">Déconnexion</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="a_propos_main">
        <section>
            <h1>À propos</h1>
            <div class="carre_contenu">
                <p> 
                    Bienvenue dans mon univers digital ! Je suis passionné par l'art de créer des expériences 
                    interactiveset fonctionnelles sur le web.
                </p>
                <br><br>
                <p>
                    En tant que développeur web débutant, je me lance avec enthousiasme dans ce voyage excitant
                     où chaque ligne de code représente un pas de plus vers la réalisation de projets captivants.
                </p> 
                <br><br>
                <p>
                    Avec une curiosité insatiable et une volonté d'apprendre sans cesse, je me plonge dans les
                    langages de programmation tels que HTML, CSS et JavaScript pour donner vie à mes idées.
                </p>
                <br><br>
                <p>
                    Chaque projet est pour moi une opportunité d'explorer de nouvelles techniques, de 
                    perfectionner mes compétences et de relever de nouveaux défis. Ce portfolio est le reflet
                    de mon parcours jusqu'à présent.
                </p>
                <br><br>
                <p>
                    Vous y découvrirez mes réalisations, mes expérimentations et mes projets en cours.
                    Je suis impatient de partager avec vous ma passion pour le développement web et de vous
                    emmener dans un voyage au cœur de mes créations.
                </p>
                <br><br>
                <p>
                    Que ce soit pour créer des sites web élégants, des applications interactives ou des projets
                    innovants, je suis prêt à relever tous les défis et à explorer toutes les possibilités que 
                    le monde du développement web a à offrir. Rejoignez-moi dans cette aventure passionnante et
                    ensemble, donnons vie à vos idées les plus audacieuses sur le web.
                </p>
                
                <h2>Services</h2>
                <ul>
                    <li>Création de votre site web</li>
                    <li>Mise en ligne de votre site web</li>
                    <li>Service de controle du trafic sur votre site</li>
                    <li>Mise à jour et suivi de votre site</li>
                    
                </ul>
            </div>
            <div>
                <a href="projets.html" class="cta">VOIR MES PROJETS </a>
            </div>
        </section>
        <section>
            <h2>Tarifs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Starter pack</th>
                        <th>Pack confort</th>
                        <th>Pack Premium</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> 
                            Création de votre site web
                            <br><br>
                            Mise en ligne de votre site web
                        </td>
                        <td>
                            Création de votre site web
                            <br><br>
                            Mise en ligne de votre site web
                            <br><br>
                            Service de controle du trafic sur votre site
                        </td>
                        <td> Création de votre site web
                            <br><br>
                            Mise en ligne de votre site web
                            <br><br>
                            Service de controle du trafic sur votre site
                            <br><br>
                            Mise à jour et suivi de votre site 1 an inclus
                        </td>
                    </tr>
                    <tr>
                        <td>2500€</td>
                        <td>4000€</td>
                        <td>6000€</td>
                    </tr>
                </tbody>
            </table>

        </section>
    </main>
    <footer>
        <a href="../index.php" class="lien_icone">
            <img src="../images/logoM1.png" alt="Logo de NAWROT Morgan" >
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


    <script src="../javascript/jeux.js"></script>
</body>
</html>