<?php  
    require_once '../services/db_connexion.php';
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
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/connexion.css">
</head>
<body>
    <header>
        <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/_header.php'); ?> 
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
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/../components/_footer.php'); ?>
    </footer>
</body>
</html>