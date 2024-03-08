<?php
require_once __DIR__ . '/../classes/Categories.php';
require_once __DIR__ . '/../classes/Settings.php';
require_once __DIR__ . '/../layout/header.php';

$actionLocation = "../functions/search.php";
$type = "category";

require_once __DIR__ . '/../layout/searchBarTemplate.php';
?>

<h1>Catégories</h1>

<?php
if (!isset($_GET['page']) || $_GET['page'] < 1 || !is_numeric($_GET['page'])) {
    $_GET['page'] = 1;
  }

$categoriesDb = new Categories();
$categoriePerPage = intval(Settings::getSettings()['CATEGORY_PAGE_COUNT']);
$offset = ($_GET['page'] - 1) * $categoriePerPage;
$categories = $categoriesDb->findWithOffset($categoriePerPage, $offset);
?>

<a href="add-category.php">Ajouter une catégorie</a>

<div class="list-container">
    <div class="list-header">
        <div>ID</div>
        <div>Nom</div>
    </div>

    <?php foreach ($categories as $category) { ?>
        <div class="category-item">
            <div><?php echo $category['id']; ?></div>
            <div><a href="category.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></div>
        </div>
    <?php } ?>
</div>

<?php 
$numberOfpages = ceil($categoriesDb->getNumberOfObjects() / 5);
$page = "categories.php";
$GETArgumentPage = "page";
require_once __DIR__ . '/../layout/paginationTemplate.php';

require_once __DIR__ . '/../layout/footer.php'; ?>