<?php  
    require_once '../services/db_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Page de la zone connecté pour admin">

    <title>Ouverture de session<</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">
    
    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
    <header>
        <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/_header.php'); ?> 
    </header>

    <main>
        <h1>Zone Admin</h1>
        <div class="flex-admin">
            <a href="admin_users.php" class="btn-red-admin1">Gestion des utilisateurs</a>
            <a href="admin_form_contact.php" class="btn-red-admin2">Gestion des demandes de projet</a>
        </div>
    </main>

    <footer>
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/../components/_footer.php'); ?>
    </footer>
</body>
</html>