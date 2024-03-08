<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Bienvenue</h1>

<nav>
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="./categories.php">Catégories</a></li>
                <li><a href="./add-category.php">Nouvelle catégorie</a></li>
                <li><a href="./add-product.php">Nouveau produit</a></li>
            </ul>
        </nav>

<?php
$productsDb = new Products();
$products = $productsDb->findAll();
var_dump($products);
?>

<?php require_once __DIR__ . '/layout/footer.php'; ?>