<?php
session_start();
// Si l'utilisateur n'est pas connecté, on le renvoie à l'index (ton login)
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Flora - Dashboard</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/home.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="product-card">
    <figure class="card-banner">
      <img src="assets/images/top-product-1.jpg" width="189" height="189" loading="lazy" alt="Produit 1">
    </figure>
    <div class="card-content">
      <h3 class="h3 card-title"><a href="#">Nom du Produit</a></h3>
      <div class="price">$45.00</div>
    </div>
  </div>

  <script src="assets/js/script.js"></script>
</body>
</html>