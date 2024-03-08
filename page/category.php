<?php
require_once __DIR__ . '/../classes/Categories.php';
require_once __DIR__ . '/../layout/CardMaker.php';
require_once __DIR__ . '/../layout/header.php';


if (!isset($_GET['id']) || !intval($_GET['id'])) {
    exit;
}

$id = intval($_GET['id']);
$categoriesDb = new Categories();
$category = $categoriesDb->find($id);

if ($category === null) {
    http_response_code(404);
    echo "Catégorie non trouvée";
    exit;
}

CardMaker::createCategoryCard($category['name']);

require_once __DIR__ . '/../layout/footer.php';