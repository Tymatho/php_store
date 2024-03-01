<?php
require_once __DIR__ . '/functions/error.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/layout/header.php';
?>

<main>
    <h1>Nouveau produit</h1>

    <?php if (isset($_GET['error'])) { ?>
    <p style="color: white; background-color: red;">
        <?php echo productErrorMessage(intval($_GET['error'])); ?>
    </p>
    <?php } ?>

    <form action="add-product-process.php" method="POST">
        <div>
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" />
        </div>
        <div>
            <label for="price">Prix :</label>
            <input type="text" name="price_vat_free" id="name" />
        </div>
        <div>
            <label for="cover">Cover :</label>
            <input type="text" name="cover" id="name" />
        </div>
        <div>
            <label for="description">Description :</label>
            <input type="text" name="description" id="name" />
        </div>
        <div>
            <label for="category_id">Category id :</label>
            <select name="category_id" id="category-select">
                <option value="">--Catégories--</option>
                <?php 
                    $pdo= Database::getConnection();
                    $query = $pdo-> prepare("SELECT * FROM category");
                    $stmt = $query->execute(); 
                while ($result = $query->fetch()) {
                    echo '<option value="'.$result['id'].'">'.$result['name'].'</option>'; 
                }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" value="Enregistrer" />
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>