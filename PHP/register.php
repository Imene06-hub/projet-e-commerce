<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");

    try {
        $stmt->execute([$username, $email, $password]);
        // Redirige avec un statut de succès
        header("Location: register.html?status=success");
        exit();
    } catch (PDOException $e) {
        // Redirige avec une erreur (ex: doublon)
        header("Location: register.html?status=error&message=" . urlencode($e->getMessage()));
        exit();
    }
}
?>