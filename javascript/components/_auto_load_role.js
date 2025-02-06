document.addEventListener('DOMContentLoaded', function() {
    const updateRoleButtons = document.querySelectorAll('.update-role-btn');

    updateRoleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const userId = this.dataset.userId; // Récupère l'ID de l'utilisateur à partir de l'attribut data
            const newRoleId = document.getElementById(`role-select-${userId}`).value; // Récupère l'ID du nouveau rôle sélectionné

            // Créer une instance FormData(); pour contenir les données à envoyer à la requête
            const formData = new FormData();
            formData.append('update_role', true);
            formData.append('id', userId);
            formData.append('role', newRoleId);

            // Envoyer la requête AJAX au serveur
            fetch('../view/admin_users.php', {
                method: 'POST',
                body: formData
            })

            // Gérer la réponse du serveur
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Mettre à jour l'affichage du rôle de l'utilisateur
                    document.getElementById(`role-display-${userId}`).textContent = data.new_role_name;
                    alert('Rôle mis à jour avec succès !');
                } else {
                    alert('Erreur lors de la mise à jour du rôle : ' + data.error);
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
});