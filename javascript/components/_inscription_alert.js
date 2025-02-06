document.addEventListener("DOMContentLoaded", function() {
    var alertDiv = document.createElement("div");
    alertDiv.className = "alert-banner"; 
    alertDiv.innerHTML = `<p>Le mot de passe doit contenir au moins 13 caractères, dont au moins une majuscule,
                              une minuscule, un chiffre et un caractère spécial.</p>
                              <button id="returnButton">Retour au formulaire</button>`;

    document.body.appendChild(alertDiv);

    // Ajouter un écouteur d'événements pour le bouton
    document.getElementById("returnButton").addEventListener("click", function() {
    
        // Rediriger vers le formulaire 
        window.location.href = "inscription.php"; // Si vous souhaitez recharger la page du formulaire
    });
});