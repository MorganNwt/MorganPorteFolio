<?php
    $basePath = ($_SERVER['SCRIPT_NAME'] == '/index.php') ? './' : '../';
?>

<nav class="nav-flex-2">
    <a href="<?php echo $basePath; ?>index.php" class="lien_icone">
        <img src="<?php echo $basePath; ?>images/logoM1.png" alt="Logo de NAWROT Morgan">
    </a>
    <?php
        // Vérifiez que vous n'êtes pas sur les pages de connexion ou d'inscription
        $currentPage = basename($_SERVER['SCRIPT_NAME']); // Obtient le nom de la page actuelle
        
        if (isset($_SESSION['userPrenom'])) {
            $prenom = htmlspecialchars($_SESSION['userPrenom']); 
            echo '<p class="nav-log"> Bonjour ' . $prenom . '</p>';
        } elseif ($currentPage != 'connexion.php' && $currentPage != 'inscription.php') {
            echo "";
        }
    ?>
    <div class="nav-flex">
        <?php if (!isset($_SESSION['userId'])): ?>
            <a href="<?php echo $basePath; ?>index.php" class="nav-bar">Accueil</a>
            <a href="<?php echo $basePath; ?>view/a_propos.php" class="nav-bar">À propos</a>
            <a href="<?php echo $basePath; ?>view/gallerie_photos.php" class="nav-bar">Gallerie Photos</a>
            <a href="<?php echo $basePath; ?>index.php#jeux" class="nav-bar">Jeux</a>
            <a href="<?php echo $basePath; ?>view/connexion.php" class="nav-bar">Connexion</a>
            <a href="<?php echo $basePath; ?>view/inscription.php" class="nav-bar">Inscription</a>
        <?php else : ?>
            <a href="<?php echo $basePath; ?>index.php" class="nav-bar">Accueil</a>
            <a href="<?php echo $basePath; ?>view/a_propos.php" class="nav-bar">À propos</a>
            <a href="<?php echo $basePath; ?>view/gallerie_photos.php" class="nav-bar">Gallerie Photos</a>
            <a href="<?php echo $basePath; ?>index.php#jeux" class="nav-bar">Jeux</a>
            <a href="<?php echo $basePath; ?>view/admin.php" class="nav-bar">Admin</a>
            <a href="<?php echo $basePath; ?>services/db_deconnexion.php"> 
            <img src="../images/Deco.jpg" alt="Image de rawpixel.com sur Freepik" class="nav-deconnexion"></a>
        <?php endif; ?>
    </div>
</nav>
