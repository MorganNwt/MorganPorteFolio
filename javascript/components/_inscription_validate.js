document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('passwd');
    
    // Sélectionner chaque critère de mot de passe
    const lengthCriteria = document.getElementById('length');
    const numberCriteria = document.getElementById('number');
    const uppercaseCriteria = document.getElementById('uppercase');
    const lowercaseCriteria = document.getElementById('lowercase');
    const specialCriteria = document.getElementById('special');

    // Écouter les événements d'entrée dans le champ de mot de passe
    passwordInput.addEventListener('input', function() {
        const value = passwordInput.value;

        // Vérifier chaque critère et changer la classe correspondante
        if (value.length >= 13) {
            lengthCriteria.classList.remove('red');
            lengthCriteria.classList.add('green');
        } else {
            lengthCriteria.classList.remove('green');
            lengthCriteria.classList.add('red');
        }

        if (/\d/.test(value)) { // Contient un chiffre
            numberCriteria.classList.remove('red');
            numberCriteria.classList.add('green');
        } else {
            numberCriteria.classList.remove('green');
            numberCriteria.classList.add('red');
        }

        if (/[A-Z]/.test(value)) { // Contient une majuscule
            uppercaseCriteria.classList.remove('red');
            uppercaseCriteria.classList.add('green');
        } else {
            uppercaseCriteria.classList.remove('green');
            uppercaseCriteria.classList.add('red');
        }

        if (/[a-z]/.test(value)) { // Contient une minuscule
            lowercaseCriteria.classList.remove('red');
            lowercaseCriteria.classList.add('green');
        } else {
            lowercaseCriteria.classList.remove('green');
            lowercaseCriteria.classList.add('red');
        }

        if (/[?!*$%§@#+]/.test(value)) { // Contient un caractère spécial
            specialCriteria.classList.remove('red');
            specialCriteria.classList.add('green');
        } else {
            specialCriteria.classList.remove('green');
            specialCriteria.classList.add('red');
        }
    });
});