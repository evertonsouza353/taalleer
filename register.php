<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST["name"], $_POST["email"], $_POST["password"], $_POST["role"])) {
        die("Form data ontbreekt");
    }

    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role     = $_POST["role"];
    $xp       = 0; // ⭐ Nieuwe gebruikers beginnen met 0 XP

    // Let op: xp kolom is toegevoegd
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, xp) VALUES (?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssi", $name, $email, $password, $role, $xp);

    if ($stmt->execute()) {
        // 🔥 TERUG NAAR LOGIN
        header("Location: index.html?registered=1");
        exit();
    } else {
        echo "❌ Fout: " . $stmt->error;
    }

    $stmt->close();
}
?>