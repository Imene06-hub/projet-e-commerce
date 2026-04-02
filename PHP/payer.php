<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['message' => 'Non connecté']);
    exit;
}

$user_id = $_SESSION['user_id'];

// 1. Récupérer le montant du paiement depuis la wishlist (simulé ici à $215.14)
$amount = 215.14;

// 2. Enregistrer le paiement
$stmt = $pdo->prepare("INSERT INTO payments (user_id, amount) VALUES (?, ?)");
$stmt->execute([$user_id, $amount]);

// 3. Supprimer les articles de la wishlist
$stmt = $pdo->prepare("DELETE FROM wishlist WHERE user_id = ?");
$stmt->execute([$user_id]);

echo json_encode(['message' => 'Paiement effectué avec succès. Wishlist vidée.']);