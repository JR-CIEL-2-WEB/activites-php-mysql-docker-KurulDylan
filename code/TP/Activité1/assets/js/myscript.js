namee = document.querySelector('[name="name"]');
prenom = document.querySelector('[name="prenom"]');
email = document.querySelector('[name="email"]');
password = document.querySelector('[name="password"]');
passwordError = document.querySelector('.text-danger');
message = document.querySelector('[name="message"]');
checkbox = document.getElementById('formCheck-1');
labelElement = document.querySelector('.form-check-label');


function verifierFormulaire(event) {
    let isFormValid = true;

    // Vérification des champs individuels
    if (namee.value === "") {
        namee.style.borderColor = "red";
        isFormValid = false;
    } else {
        namee.style.borderColor = "green";
    }

    if (prenom.value === "") {
        prenom.style.borderColor = "red";
        isFormValid = false;
    } else {
        prenom.style.borderColor = "green";
    }

    if (email.value === "") {
        email.style.borderColor = "red";
        isFormValid = false;
    } else {
        // Vérification du format de l'email avec une expression régulière
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            email.style.borderColor = "red";
            email.setCustomValidity("Veuillez inclure '@' dans l'adresse email.");
            isFormValid = false;
        } else {
            email.style.borderColor = "green";
            email.setCustomValidity("");  // Réinitialiser le message d'erreur personnalisé
        }
    }

    if (password.value.length < 8) {
        password.style.borderColor = "red";
        passwordError.classList.remove('invisible');
        isFormValid = false;
    } else {
        password.style.borderColor = "green";
        passwordError.classList.add('invisible');
    }

    if (message.value === "") {
        message.style.borderColor = "red";
        isFormValid = false;
    } else {
        message.style.borderColor = "green";
    }

    if (!checkbox.checked) {
        labelElement.style.color = "red";
        isFormValid = false;
    } else {
        labelElement.style.color = "green";
    }

    // Si le formulaire est valide, envoyez les données via fetch
    if (isFormValid) {
        alert("Formulaire valide");

    } else {
        // Si le formulaire est invalide
        event.preventDefault();  // Empêcher la soumission

        alert("Veuillez remplir correctement tous les champs.");
    }
}
