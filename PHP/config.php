<?php
$host = 'localhost';
$dbname = 'auth_system';
$user = 'root';
$pass = ''; // pas de mot de passe avec WAMP par défaut

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>