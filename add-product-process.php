<?php

require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/functions/utils.php';
require_once __DIR__ . '/classes/ProductError.php';

if (!isset($_POST['name']) || !isset($_POST['price']) || !isset($_FILES['cover']) || !isset($_POST['description']) || !isset($_POST['category'])) {
    redirect('/');
}

$productName = trim($_POST['name']);
$productPrice = trim($_POST['price']);
$productCover = trim($_FILES['cover']['name']);
$productDescription = trim($_POST['description']);
$productCategory = $_POST['category'];
$destination = __DIR__ . "./uploaded_files/" . $productCover;

if (empty($productName)) {
    redirect('/add-category.php?error=' . ProductError::NAME_REQUIRED);
}
if (empty($productPrice)) {
    redirect('/add-category.php?error=' . ProductError::PRICE_REQUIRED);
}
if (empty($productCover)) {
    redirect('/add-category.php?error=' . ProductError::COVER_REQUIRED);
}
if (empty($productDescription)) {
    redirect('/add-category.php?error=' . ProductError::DESCRIPTION_REQUIRED);
}

try {
    $pdo = Database::getConnection();
} catch(PDOException $ex) {
    echo "Erreur lors de la connexion à la base de données";
    exit;
}

$stmt = $pdo->prepare("INSERT INTO product (name, price_vat_free, cover, description, category_id) VALUES (:productName, :productPrice, :productCover, :productDescription, :productCategory)");
$stmt->execute([
    'productName' => $productName,
    'productPrice' => $productPrice,
    'productCover' => $productCover,
    'productDescription' => $productDescription,
    'productCategory' => $productCategory
]);

if ($stmt === false) {
    echo "Erreur lors de la requête";
    exit;
}
if(!file_exists($destination.'/'.$productCover)){
    if (move_uploaded_file($_FILES['cover']['tmp_name'], $destination)) {
        echo $productCover . " correctement enregistré<br />";
      }
}

session_start();
$_SESSION['message'] = "Le produit a bien été enregistré";

redirect('products.php');