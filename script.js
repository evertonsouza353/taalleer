// Toon login of registratie form
function showForm(formId) {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('register-form').style.display = 'none';
    document.getElementById(formId).style.display = 'block';
}

// Login afhandelen
function handleLogin(event) {
    event.preventDefault(); // voorkomt dat het formulier direct verstuurd wordt

    // Hier zou je normaal ajax of php login call doen
    alert("Login succesvol (demo)");

    // Als je wilt dat het na login naar menu gaat:
    window.location.href = "startmenutaal.html"; // pas aan naar jouw menu pagina
}

// Registratie afhandelen
function handleRegister(event) {
    event.preventDefault(); // voorkomt standaard versturen

    alert("Registratie succesvol (demo)");

    // Na registratie terug naar login
    showForm('login-form');
}