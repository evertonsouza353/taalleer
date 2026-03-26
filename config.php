<?php
$host = "localhost";
$user = "root";        // vaak root bij XAMPP
$password = "";        // vaak leeg bij XAMPP
$database = "LanguageLearn";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connectie mislukt: " . $conn->connect_error);
}
?>