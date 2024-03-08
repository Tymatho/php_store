<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/classes/Settings.php';
require_once __DIR__ . '/layout/header.php';
?>

<h1>Catégories</h1>

<?php
if (!isset($_GET['page'])){
  $_GET['page']=1;
}
$productPerPage = intval(Settings::getSettings()['PRODUCT_PAGE_COUNT']);
$offset = ($_GET['page'] - 1) * $productPerPage;
$productsDb = new Products();
$products = $productsDb->findWithOffset($productPerPage, $offset);
?>

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

<nav aria-label="Page navigation example">
  <ul class="flex items-center -space-x-px h-8 text-sm">
    <li>
      <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Previous</span>
        <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
        </svg>
      </a>
    </li>
    <?php $numberOfpages = ceil($productsDb->getNumberOfObjects() / 5);
    for($i=1;$i<=$numberOfpages;$i++){
      echo'
      <li>
        <a href="products.php?page='.$i.'" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">'.$i.'</a>
      </li>';
    }
    ?>
      <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
        <span class="sr-only">Next</span>
        <svg class="w-2.5 h-2.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
      </a>
    </li>
  </ul>
</nav>

<?php require_once __DIR__ . '/layout/footer.php'; ?>