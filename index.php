<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Bienvenue</h1>

<nav>
    <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="./page/categories.php">Catégories</a></li>
        <li><a href="./page/products.php">Produits</a></li>
        <li><a href="./page/add-category.php">Nouvelle catégorie</a></li>
        <li><a href="./page/add-product.php">Nouveau produit</a></li>
    </ul>
</nav>

<?php require_once __DIR__ . '/layout/footer.php'; ?>