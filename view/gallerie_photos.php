<?php
    require_once '../services/db_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Gallerie de paysages et de portraits">

    <title>Gallerie Photos - NAWROT Morgan</title>
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/projets.css">

    <script src="../javascript/gallerie_photos.js" defer></script>
</head>

<body>
    <header>
        <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/header.php'); ?> 
    </header>
    <main>
        <section>
            <h1>Gallerie Photos</h1>
            <section class="container">
                <h2>Paysages</h2>
                <div class="image_container">
                    <div class="image"><img src="../images/gallerie_photos/paysage1.jpg" alt="Mont Aoraki - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage2.jpg" alt="Parc National d'Abel Tasman - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage3.jpg" alt="Lac Rotorua - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage4.jpg" alt="Lac Wanaka - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage5.jpg" alt="Mont Taranaki - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage6.jpg" alt="Milford Sound - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage7.jpg" alt="Twelve Apostle - Australie"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage8.jpg" alt="Wai-O-Tapu - Nouvelle-Zélande"></div> 
                    <div class="image"><img src="../images/gallerie_photos/paysage9.jpg" alt="Mont Cook - Nouvelle Zélande"></div>         
                </div>

                <!-- structure de fenêtre modale (popup) -->
                <div class="popup_image">
                    <span>&times;</span>
                    <img src="../images/gallerie_photos/paysage1.jpg" alt="">  
                </div>

                <h2>Portraits</h2>    
                <div class="image_container">
                    <div class="image"><img src="../images/gallerie_photos/portrait1.jpg" alt="Portrait jeune femme 1"></div>
                    <div class="image"><img src="../images/gallerie_photos/portrait2.jpg" alt="Portrait jeune femme 2"></div>
                    <div class="image"><img src="../images/gallerie_photos/portrait3.jpg" alt="Portrait jeune homme 3"></div>
                    <div class="image"><img src="../images/gallerie_photos/portrait4.jpg" alt="Portrait jeune femme 4"></div>
                    <div class="image"><img src="../images/gallerie_photos/portrait5.jpg" alt="Portrait jeune femme 5"></div>
                    <div class="image"><img src="../images/gallerie_photos/portrait6.jpg" alt="Portrait jeune femme 6"></div>
                </div>

                 <!-- structure de fenêtre modale (popup) -->
                <div class="popup_image">
                    <span>&times;</span>
                    <img src="../images/gallerie_photos/portrait1.jpg" alt=""> 
                </div>
        </section>
    </main>
    <footer>
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    </footer>
</body>
</html>