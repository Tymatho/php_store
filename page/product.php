<?php
require_once __DIR__ . '/../classes/Categories.php';
require_once __DIR__ . '/../layout/CardMaker.php';
require_once __DIR__ . '/../classes/Products.php';
require_once __DIR__ . '/../layout/header.php';

if (!isset($_GET['id']) || !intval($_GET['id'])) {
    exit;
}

$id = intval($_GET['id']);
$productsDb = new Products();
$product = $productsDb->find($id);

if ($product === null) {
    http_response_code(404);
    echo "Product not found";
    exit;
}
$categoriesDb = new Categories();

CardMaker::createProductCard(
    $product['name'],
    $product['price_vat_free'],
    '..\uploaded_files\\' . $product['cover'],
    $product['description'],
    $categoriesDb->find($product['category_id'])['name']
);

require_once __DIR__ . '/../layout/footer.php';
