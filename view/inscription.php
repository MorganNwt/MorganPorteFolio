<?php
    // Import des ressources
    require_once '../services/db_inscription.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ici ce trouve la page de création de compte">

    <title>Création de compte</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">
    
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/inscription.css">
</head>

<body>
    <header>
        <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/header.php'); ?> 
    </header>
    <main>
        <section id="contact" class="section_contact">
        <?php if(isset($flash_success)){
                     echo $flash_success;
                 }
             ?>
            <h2>Inscription</h2>
            

            <form  action="#" method="POST">

            <div class="form_column">
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" name="email" id="email" placeholder="j.Dujardin@hotmail.fr">
                </div>
            
                <div class="form_column">
                    <label for="passwd">Mot de passe <span class="red">*</span></label>
                    <input type="password" name="passwd" id="passwd" placeholder="Votre mot de passe">
                    <ul class="margin_top">
                        <li class="red">Doit contenir 8 à 16 caractères</li>
                        <li class="red">Doit contenir 1 chiffre</li>
                        <li class="red">Doit contenir 1 majuscule</li>
                        <li class="red">Doit contenir 1 minuscule</li>
                        <li class="red">Doit contenir 1 caractère spécial parmis : ?!*$%§@#+ </li>
                    </ul>
                </div>
           
                <div class="form_column">
                    <label for="nom">Nom <span class="red">*</span></label>
                    <input type="text" name="nom" id="nom" placeholder="Dujardin">
                </div>

                <div class="form_column">
                    <label for="prenom">Prénom <span class="red">*</span></label>
                    <input type="text" name="prenom" id="prenom" placeholder="Jean">
                </div>

                <div class="form_column">
                    <label for="adresse">Adresse <span class="red">*</span></label>
                    <input type="text" name="adresse" id="adresse" placeholder="5 chemin des vaches">
                </div>

                <div class="form_column">
                    <label for="date">Date de naissance <span class="red">*</span></label>
                    <input type="date" name="date_naissance" id="date_naissance" placeholder="5 chemin des vaches">
                </div>
            
                <!-- <div class="form_column">
                    <label for="mot_de_passe">Confirmation du mot de passe <span class="red">*</span></label>
                    <input type="text" name="mot_de_passe" id="mot_de_passe" placeholder="Retapez votre mot de pass">
                </div>
                <div>
                    <input type="checkbox" id="user_rgpd" name="user[rgpd]" required="required" value="1">   
                    <label for="user_rgpd">J'ai lu et j'accepte la
                        <a target="_blank" href="politiqueDeConfidentialité.html"><span class="aqua">politique de confidentialité</span></a> 
                    </label> 
                </div> -->
                <input type="submit" value="VALIDER" class="cta">
            </form>
        </section>
    </main>
    <footer>
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/../components/footer.php'); ?>
    </footer>
</body>
</html>