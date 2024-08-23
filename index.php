<?php
    require_once 'services/db_admin.php';
    require_once 'services/db_index.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Portefolio de développeur web et web mobile">

    <title>Accueil - Nawrot Morgan </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
    <header>
           <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/components/_header.php'); ?> 
    </header>
    <main>
        <section class="accueil_introduction">
            <div>
                <h1>Morgan NAWROT Développeur WEB</h1>
                <p>
                    En tant que <em> développeur web débutant </em>. Ce portfolio est le reflet
                    de mon parcours jusqu'à présent. Vous y découvrirez mes réalisations, 
                    mes expérimentations et mes projets en cours. Je suis impatient de partager
                    avec vous ma passion pour le développement web.
                </p>
                <a href="#contact" class="cta">UN PROJET ? ÉCRIVEZ-MOI</a>
            </div>
            <img src="images/morgan.png" alt="Portrait avec la photo de morgan" class="img_morgan">
        </section>

        <section id="jeux" class="accueil_section_photos">
            <h2>Plongez dans l'action et venez tester mes créations interactives codés en Javascript.</h2>
            <div class="accueil_grid_paysages">
                <a href="view/jeux/pendu.html" class="lien_conteneur_photo">
                    <img src="images/pendu.png" alt="Jeu du pendu">
                    <div class="photo_hover">Jouer au Pendu</div>
                </a>
                <a href="view/jeux/mouton.html" class="lien_conteneur_photo">
                    <img src="images/mouton.png" alt="Jeu du saute mouton" >
                    <div class="photo_hover">Jouer au Saute Mouton</div>
                </a>
                <a href="view/jeux/tir.html" class="lien_conteneur_photo">
                    <img src="images/tir.png" alt="Jeux de tir" >
                    <div class="photo_hover">Jouer au Tir</div>
                </a>
                <a href="view/jeux/azertype.html" class="lien_conteneur_photo">
                    <img src="images/azertype.png" alt="Jeux pour apprendre à écrire plus vite">
                    <div class="photo_hover">Jouer à Azertype</div>
                </a>
            </div>
        </section>

        <section id="contact" class="section_contact">

            <h2>Parlons de votre projet ! </h2>
            
            <form action="#" method="POST">
                <div class="form_nom_email">
                    <div class="form_column">
                        <label for="nom">Nom <span class="red">*</span></label>
                        <input type="text" name="nom" id="nom" placeholder="Dujardin" required>
                    </div>
                    <div class="form_column">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" placeholder="Jean">
                    </div>
                </div>
                <div class="form_nom_email">
                    <div class="form_column">
                        <label for="email">Email <span class="red">*</span></label>
                        <input type="email" name="email" id="email" placeholder="j.Dujardin@hotmail.fr" required>
                    </div>
                    <div class="form_column">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" name="telephone" id="telephone" placeholder="06 00 00 00 00">
                    </div>
                </div>
                <div class="form_column">
                    <label for="sujet">Sujet <span class="red">*</span></label>
                    <input type="text" name="sujet" id="sujet" placeholder="A propos du sujet..." required>
                </div>
                <label for="message">Message <span class="red">*</span></label>
                <textarea name="message" id="message" rows="10" placeholder="Des questions ? N'hésitez pas !" required></textarea>
                <input type="submit" value="ENVOYER" class="cta">
            </form>

        </section>

    </main>
    <footer>
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/components/_footer.php'); ?>
    </footer>
</body>
</html>
