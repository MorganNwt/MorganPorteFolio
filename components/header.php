<?php
$basePath = ($_SERVER['SCRIPT_NAME'] == '/index.php') ? './' : '../';
?>

<nav>
    <a href="<?php echo $basePath; ?>index.php" class="lien_icone">
        <img src="<?php echo $basePath; ?>images/logoM1.png" alt="Logo de NAWROT Morgan">
    </a>
    <?php
        // Vérifiez que vous n'êtes pas sur les pages de connexion ou d'inscription
        $currentPage = basename($_SERVER['SCRIPT_NAME']); // Obtient le nom de la page actuelle
        
        if (isset($loginUser)) {
            $login = htmlspecialchars($loginUser['prenom']); 
            echo "Bonjour $login !";
        } elseif ($currentPage != 'connect.php' && $currentPage != 'inscription.php') {
            echo "Utilisateur non trouvé.";
        }
    ?>
    <div>
        <a href="<?php echo $basePath; ?>index.php" class="lien_icone">Accueil</a>
        <?php if (!isset($userId)): ?>
            <a href="<?php echo $basePath; ?>view/connect.php" class="lien_icone">Connexion</a>
            <a href="<?php echo $basePath; ?>view/inscription.php" class="lien_icone">Inscription</a>
        <?php endif; ?>
        <a href="<?php echo $basePath; ?>view/a_propos.php" class="lien_icone">À propos</a>
        <a href="<?php echo $basePath; ?>view/gallerie_photos.php" class="lien_icone">Gallerie Photos</a>
        <a href="<?php echo $basePath; ?>index.php#jeux" class="lien_icone">Jeux</a>
        <?php if (isset($userId)): ?>
            <a href="<?php echo $basePath; ?>view/admin.php" class="lien_icone">Admin</a>
            <a href="<?php echo $basePath; ?>services/db_deconnexion.php" class="box-3">Déconnexion</a>
        <?php endif; ?>
    </div> 
</nav>
