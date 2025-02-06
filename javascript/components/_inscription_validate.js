document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('passwd');
    const confirmPasswordInput = document.getElementById('confirm_passwd');
    
    // Sélectionner chaque critère de mot de passe
    const lengthCriteria = document.getElementById('length');
    const numberCriteria = document.getElementById('number');
    const uppercaseCriteria = document.getElementById('uppercase');
    const lowercaseCriteria = document.getElementById('lowercase');
    const specialCriteria = document.getElementById('special');

    // Utiliser l'ID correct pour la correspondance des mots de passe
    const matchCriteria = document.getElementById('match');

    // Écouter les événements d'entrée dans le champ de mot de passe
    passwordInput.addEventListener('input', function() {
        const value = passwordInput.value;

        // Vérifier chaque critère et changer la classe correspondante
        // Si value.length >= 13 est vrai : Alors la classe className de lengthCriteria devient 'green'.
        lengthCriteria.className = value.length >= 13 ? 'green' : 'red';
        numberCriteria.className = /\d/.test(value) ? 'green' : 'red';
        uppercaseCriteria.className = /[A-Z]/.test(value) ? 'green' : 'red';
        lowercaseCriteria.className = /[a-z]/.test(value) ? 'green' : 'red';
        specialCriteria.className = /[?!*$%§@#+]/.test(value) ? 'green' : 'red';

        // Vérifier si les mots de passe correspondent
        if (value === confirmPasswordInput.value && value !== '') {
            matchCriteria.classList.remove('red');
            matchCriteria.classList.add('green');
        } else {
            matchCriteria.classList.remove('green');
            matchCriteria.classList.add('red');
        }
    });

    // Ajouter un événement d'entrée pour le champ de confirmation de mot de passe
    confirmPasswordInput.addEventListener('input', function() {
        if (passwordInput.value === confirmPasswordInput.value && confirmPasswordInput.value !== '') {
            matchCriteria.classList.remove('red');
            matchCriteria.classList.add('green');
        } else {
            matchCriteria.classList.remove('green');
            matchCriteria.classList.add('red');
        }
    });
});