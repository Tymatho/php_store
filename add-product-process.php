<?php

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Categories.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/ProductError.php';

if (!isset($_POST['name']) || !isset($_POST['price_vat_free']) || !isset($_POST['cover']) || !isset($_POST['description'])
|| !isset($_POST['category_id'])) {
    redirect('/');
}

// ['name' => $productName] = $_POST;
$productName = trim($_POST['name']);
$productPrice = trim($_POST['price_vat_free']);
$productCover = trim($_POST['cover']);
$productDescription = trim($_POST['description']);
$categoryId = $_POST['category_id'];

if (empty($productName) || empty($productPrice) || empty($productCover) || empty($productDescription) || empty($categoryId)) {
    redirect('add-product.php?error=' . ProductError::PARAMETERS_REQUIRED);
}

try {
    $pdo = Database::getConnection();
} catch (PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO product (name, price_vat_free, cover, description, category_id) 
    VALUES (:productName, :productPrice, :productCover, :productDescription, :categoryId)");
    $stmt->execute(
        ['productName' => $productName, 'productPrice' => $productPrice, 'productCover' => $productCover, 'productDescription' => $productDescription,
    'categoryId' => $categoryId]);
} catch (PDOException $ex) {
    echo "Erreur lors de l'insertion des données";
    exit;
}

if ($stmt === false) {
    echo "Erreur lors de la requête";
    exit;
}
session_start();
$_SESSION['message'] = "Produit enregistré";
redirect('/');