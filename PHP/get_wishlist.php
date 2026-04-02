<?php
session_start();
require 'config.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['message' => 'Non connecté']);
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM wishlist WHERE user_id = ?");
$stmt->execute([$user_id]);

$wishlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($wishlist);
?>