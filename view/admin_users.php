<?php
    require_once '../services/db_admin.php';
    require_once '../services/db_admin_users.php'; 
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

    <script src="../javascript/components/_confirm_delete.js" defer></script>
    <script src="../javascript/components/_auto_load_role.js" defer></script>
</head>
<body>
    <header>
           <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/_header.php'); ?> 
    </header>
    <main>
        <h1>Admin : gestion des utilisateurs</h1>
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
                <th class="border">Modifier le Rôle</th>
                <th class="border">Supprimer</th>
            </tr>

            <?php foreach($users_infos as $user_info): ?>
                <tr class="border">
                    <td class="border"><?= htmlspecialchars($user_info['id'] ?? '') ?></td>
                    <td class="border"><?= htmlspecialchars($user_info['nom'] ?? '') ?></td>
                    <td class="border"><?= htmlspecialchars($user_info['prenom'] ?? '') ?></td>
                    <td class="border"><?= htmlspecialchars($user_info['email'] ?? '') ?></td>
                    <td class="border"><?= htmlspecialchars($user_info['adresse'] ?? '') ?></td>
                    <td class="border"><?= htmlspecialchars($user_info['date_naissance'] ?? '') ?></td>
                    <td class="border" id="role-display-<?= htmlspecialchars($user_info['id'] ?? '') ?>">
                        <?= htmlspecialchars($user_info['role_name'] ?? '') ?>
                    </td>
                    <td class="border">
                        <!-- Sélecteur de rôle et bouton AJAX -->
                        <select id="role-select-<?= htmlspecialchars($user_info['id'] ?? '') ?>" name="role">
                            <?php foreach($roles as $role): ?>
                                <option value="<?= $role['id'] ?>" <?= $user_info['role_id'] == $role['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($role['role_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button class="update-role-btn btn-green-admin" data-user-id="<?= htmlspecialchars($user_info['id'] ?? '') ?>">
                            Modifier
                        </button>
                    </td>
                    <td class="border">
                        <form action="admin_users.php" method="POST">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($user_info['id'] ?? '') ?>">
                            <input type="submit" name="delete" class="btn-red-admin2" value="Supprimer" onclick="return confirmDelete()">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
    <footer>
        <?php require_once(__DIR__ . '/../components/_footer.php'); ?>
    </footer>
</body>
</html>