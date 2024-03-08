<?php
require_once __DIR__ . '/../classes/Products.php';
require_once __DIR__ . '/../classes/Settings.php';
require_once __DIR__ . '/../layout/header.php';

$actionLocation = "../functions/search.php";
$type = "product";

require_once __DIR__ . '/../layout/searchBarTemplate.php';
?>

<h1>Produits</h1>

<?php
if (!isset($_GET['page']) || $_GET['page'] < 1 || !is_numeric($_GET['page'])) {
  $_GET['page'] = 1;
}
$productPerPage = intval(Settings::getSettings()['PRODUCT_PAGE_COUNT']);
$offset = ($_GET['page'] - 1) * $productPerPage;
$productsDb = new Products();
$products = $productsDb->findWithOffset($productPerPage, $offset);
?>

<a href="add-product.php">Ajouter un produit</a>

<div class="list-container">
  <div class="list-header">
    <div>ID</div>
    <div>Nom</div>
  </div>

  <?php foreach ($products as $product) { ?>
    <div class="product-item">
      <div><?php echo $product['id']; ?></div>
      <div><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></div>
    </div>
  <?php } ?>
</div>

<?php

$numberOfpages = ceil($productsDb->getNumberOfObjects() / 5);
$page = "products.php";
$GETArgumentPage = "page";
require_once __DIR__ . '/../layout/paginationTemplate.php';

require_once __DIR__ . '/../layout/footer.php'; ?>