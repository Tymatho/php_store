<?php
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/../classes/Categories.php';
require_once __DIR__ . '/../classes/Products.php';

if (!isset($_GET["searchText"]) || !isset($_GET["type"])) {
    exit;
}

switch ($_GET["type"]) {
    case "category":
        $categoriesDb = new Categories();
        $categories = $categoriesDb->findByName($_GET["searchText"]);
        if ($categories === null || empty($categories)) {
            echo 'Nothing found';
            exit;
        }
        foreach ($categories as $category) { ?>
            <div class="category-item">
                <div><a href="../page/category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></div>
            </div>
        <?php }
        break;
    case "product":
        $productsDb = new Products();
        $products = $productsDb->findByName($_GET["searchText"]);
        if ($products === null || empty($products)) {
            echo 'Nothing found';
            exit;
        }
        foreach ($products as $product) { ?>
            <div class="product-item">
                <div><a href="../page/product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></div>
            </div>
        <?php }
        break;
}
