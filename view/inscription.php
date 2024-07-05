<?php
    session_start();
    // Import des ressources
    require_once '../service/db_connect.php';

    // Récupérer les données issus du formulaire APRES validation
    // 1 - Le code doit être execute que si $_POST est définie
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $_POST = filter_input_array( INPUT_POST, [
            'nom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'prenom'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            'email'=>FILTER_SANITIZE_EMAIL,
            'mot_de_passe'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);
        
        // 2- J'hydrate les variables à utiliser pour remplacer les paramètres de la requête
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // - Hachage du mot de passe
        $hachage_password = password_hash($mot_de_passe, PASSWORD_BCRYPT);

        // 3-j'écris ma requête paramétrées nommées
        $requete = 'INSERT INTO UTILISATEUR VALUES (DEFAULT, :nom, :prenom, :email, :mot_de_passe)';

        // 4- Je prpare la requête
        $stmt = $pdo->prepare($requete);

        // 5 - Je remplace les paramètres par des variables qui possèdent les valeurs à persister
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom',$prenom);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':mot_de_passe',$hachage_password);

        // 6 - Execution de la requête
        $stmt->execute();

        $nb = $stmt->rowCount();
        
        if($nb > 0) {
            $flash_success = '<p>L\'inscription à bien été effectuée ! </p>';
        }
    }
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
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/inscription.css">
</head>

<body>
    <header>
        <nav>
            <a 
                href="../index.php" class="lien_icone">
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
        <?php if(isset($flash_success)){
                     echo $flash_success;
                 }
             ?>
            <h2>Inscription</h2>
            

            <form  action="#" method="POST">
           
                <div class="form_column">
                    <label for="nom">Nom <span class="red">*</span></label>
                    <input type="text" name="nom" id="nom" placeholder="Dujardin">
                </div>

                <div class="form_column">
                    <label for="prenom">Prénom <span class="red">*</span></label>
                    <input type="text" name="prenom" id="prenom" placeholder="Jean">
                </div>
            
                <div class="form_column">
                    <label for="email">Email <span class="red">*</span></label>
                    <input type="email" name="email" id="email" placeholder="j.Dujardin@hotmail.fr">
                </div>
            
                <div class="form_column">
                    <label for="mot_de_passe">Mot de passe <span class="red">*</span></label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Votre mot de passe">
                    <ul class="margin_top">
                        <li class="red">Doit contenir 8 à 16 caractères</li>
                        <li class="red">Doit contenir 1 chiffre</li>
                        <li class="red">Doit contenir 1 majuscule</li>
                        <li class="red">Doit contenir 1 minuscule</li>
                        <li class="red">Doit contenir 1 caractère spécial parmis : ?!*$%§@#+ </li>
                    </ul>
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