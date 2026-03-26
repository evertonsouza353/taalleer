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

    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $password, $role);

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