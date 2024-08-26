<?php
    require_once '../services/db_admin_users.php';
    require_once '../services/db_admin.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ici ce trouve la page d'administration des utilisateurs">

    <title>Gestion des utilisateurs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/admin.css">
    <link rel="stylesheet" href="../style/admin_users.css">
</head>
<body>
    <header>
           <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/_header.php'); ?> 
    </header>
    <main>
        <h1>Gestion des utilisateurs</h1>
        <div class="flex-admin">
            <a href="admin.php" class="btn-red-admin1">Retour</a>
        </div>
        
        <table class="border">
    <tr>
        <th class="border">Id</th>
        <th class="border">Nom</th>
        <th class="border">Prenom</th>
        <th class="border">Email</th>
        <th class="border">Adresse</th>
        <th class="border">Date de Naissance</th>
        <th class="border">Rôle</th>
        <th class="border">Supprimer</th>
    </tr>

    <?php
        // Affichage des données
        foreach($users_infos as $user_info){
            echo '<tr class="border">';  
            echo '<td class="border">' . htmlspecialchars($user_info['id'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['nom'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['prenom'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['email'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['adresse'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['date_naissance'] ?? '') . '</td>';
            echo '<td class="border">' . htmlspecialchars($user_info['role_name'] ?? '') . '</td>';
            echo '<td class="border">';
            echo '<form action="admin_form_contact.php" method="POST">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($user_info['id'] ?? '') . '">';
            echo '<input type="submit" name="delete" class="btn-red-admin2" value="Supprimer">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
    ?>
</table>
    </main>
    <footer>
        <!-- inclusion du bas de page du site -->
        <?php require_once(__DIR__ . '/../components/_footer.php'); ?>
    </footer>
</body>
</html>