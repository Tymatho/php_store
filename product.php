<?php
require_once __DIR__ . '/classes/Products.php';
require_once __DIR__ . '/layout/header.php';

$id = intval($_GET['id']); // TODO: Vérifier que la clé 'id' existe

$productsDb = new Products();
$product = $productsDb->find($id);

if ($product === null) {
    http_response_code(404);
    echo "Product non trouvée";
    exit;
}
?>

<h1><?php echo $product['name']; ?></h1>
<?php echo '<img src=".\uploaded_files\\'.$product['cover'].'" alt="Image">'; ?>


<?php require_once __DIR__ . '/layout/footer.php';