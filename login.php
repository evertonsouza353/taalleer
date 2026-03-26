<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user["password"])) {

            // Sla gebruiker op in session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["name"] = $user["name"];

            // 🔥 BELANGRIJK: redirect naar dashboard
            header("Location: dashboard.html");
            exit();

        } else {
            echo "Verkeerd wachtwoord";
        }
    } else {
        echo "Gebruiker niet gevonden";
    }
}
?>