<?php
    require_once '../services/db_admin.php'; 
    require_once '../services/db_admin_form_contact.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ici ce trouve la page des demandes de projet">

    <title>Gestion des demandes de contact</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap">

    <link rel="stylesheet" href="../style/normalize.css">
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/admin_form_contact.css">

    <script src="../javascript/components/_confirm_delet.js"></script>
</head>
<body>
    <header>
           <!-- inclusion du haut de page du site -->
        <?php require_once(__DIR__ . '/../components/_header.php'); ?> 
    </header>
    <main>
        <h1>Gestion des demandes de contact</h1>
        <div class="flex-admin">
            <a href="admin.php" class="btn-red-admin1">Retour</a>
        </div>
        <table class="border">
            <tr>
                <th class="border">Id</th>
                <th class="border">Nom</th>
                <th class="border">Prenom</th>
                <th class="border">Email</th>
                <th class="border">Telephone</th>
                <th class="border">Sujet</th>
                <th class="border">Message</th>
                <th class="border">Supprimer</th>
            </tr>

            <?php
                // Affichage des données
                foreach($form_contacts as $form_contact){
                    echo '<tr class="border">';  
                    foreach($form_contact as $valeur){
                        echo '<td class="border">' . htmlspecialchars($valeur) . '</td>';
                    }
                        echo '<td class="border">'; // Cellule pour les actions
                        echo '<form  action="admin_form_contact.php" method="POST">';
                        echo '<input type="hidden" name="id" value="' . htmlspecialchars($form_contact['id']) . '">';
                        echo '<input type="submit" name="delete" class="btn-red-admin2" value="Supprimer" onclick="return confirmDelet()">';
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