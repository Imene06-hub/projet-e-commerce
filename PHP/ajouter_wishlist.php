<?php
session_start();
require 'config.php';

header('Content-Type: application/json');

// Vérification de la session
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['message' => 'Erreur : Vous devez être connecté.']);
    exit;
}

// Récupération des données JSON envoyées par le JS
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $nom = $data['nom'];
    $prix = $data['prix'];
    $image = $data['image'];
    $user_id = $_SESSION['user_id'];

    try {
        $stmt = $pdo->prepare("INSERT INTO wishlist (user_id, product_name, product_price, product_image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $nom, $prix, $image]);
        echo json_encode(['message' => 'Produit ajouté à votre liste !']);
    } catch (PDOException $e) {
        echo json_encode(['message' => 'Erreur lors de l\'ajout : ' . $e->getMessage()]);
    }
}
?>