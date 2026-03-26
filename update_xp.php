<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    die("Niet ingelogd");
}

// XP dat verdiend wordt
$earned_xp = intval($_POST["xp"]); 

$user_id = $_SESSION["user_id"];

// Update database
$sql = "UPDATE users SET xp = xp + ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $earned_xp, $user_id);

if ($stmt->execute()) {
    // Sessie ook bijwerken
    $_SESSION["user_xp"] += $earned_xp;
    echo "✅ XP bijgewerkt: " . $_SESSION["user_xp"];
} else {
    echo "❌ Fout bij XP update: " . $stmt->error;
}
?>