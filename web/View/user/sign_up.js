document.addEventListener("DOMContentLoaded", function () {
    function showError(elementId, message) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = message;
    errorElement.style.color = 'white';
}

function clearError(elementId) {
    var errorElement = document.getElementById(elementId);
    errorElement.innerHTML = '';
}

    // Function to validate first name
    function validateFirstName() {
        var firstName = document.getElementById("FirstName").value;
        var firstNameRegex = /^[a-zA-Z]{2,20}$/;

        if (!firstNameRegex.test(firstName)) {
            showError('errorFirstName', 'Invalid first name. It should contain only letters and be between 2 and 20 characters.');
            return false;
        }
        clearError('errorFirstName');
        return true;
    }

    // Function to validate last name
    function validateLastName() {
        var lastName = document.getElementById("LastName").value;
        var lastNameRegex = /^[a-zA-Z]{2,20}$/;

        if (!lastNameRegex.test(lastName)) {
            showError('errorLastName', 'Invalid last name. It should contain only letters and be between 2 and 20 characters.');
            return false;
        }
        clearError('errorLastName');
        return true;
    }

    // Function to validate email
    function validateEmail() {
        var email = document.getElementById("email").value;
        var emailRegex = /^[\w-]+(\.[\w-]+)*@gmail\.com$/;

        if (!emailRegex.test(email)) {
            showError('errorEmail','Invalid email. It should be a valid Gmail address.');
            return false;
        }
        clearError('errorEmail');
        return true;
    }

    // Function to validate password and confirmation
    function validatePassword() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("password_confirm").value;

        if (password !== confirmPassword) {
            showError('errorPassword','Passwords do not match.');
            return false;
        }
        clearError('errorPassword');
        return true;
    }

    // Function to handle form submission
    function handleSubmit(event) {
        if (
            !validateFirstName() ||
            !validateLastName() ||
            !validateEmail() ||
            !validatePassword()
        ) {
            event.preventDefault();
        }
    }

    // Attach the validation functions to the form submission
    document.getElementById("form").addEventListener("submit", handleSubmit);
});