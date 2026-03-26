<?php
$host = "localhost";   // meestal localhost
$user = "root";        // standaard bij Laragon
$pass = "";            // standaard leeg bij Laragon
$db   = "languagelearn"; // moet exact dezelfde naam zijn als je database
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}
?>