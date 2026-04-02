<?php
require 'config.php'; // config.php est dans le même dossier php/ donc c'est bon
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$email, $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        // On remonte d'un dossier pour trouver dashboard.php à la racine
        header("Location: ../dashboard.php"); 
        exit();
    } else {
        $_SESSION['login_error'] = "Identifiants invalides.";
        // On remonte d'un dossier pour revenir à l'index.html à la racine
        header("Location: ../index.html?error=1");
        exit();
    }
}
?>