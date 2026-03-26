function showForm(formId) {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'none';

    document.getElementById(formId).style.display = 'block';
}

// Simpele demo login
function handleLogin(event) {
    event.preventDefault();
    alert("Login succesvol (demo)");
}

// Simpele demo registratie
function handleRegister(event) {
    event.preventDefault();
    alert("Registratie succesvol (demo)");
}