<?php
require_once __DIR__ . '/functions/error.php';
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
            <label for="name">Prix :</label>
            <input type="text" name="price_vat_free" id="name" />
        </div>
        <div>
            <label for="name">Cover :</label>
            <input type="text" name="cover" id="name" />
        </div>
        <div>
            <label for="name">Description :</label>
            <input type="text" name="description" id="name" />
        </div>
        <div>
            <label for="name">Category id :</label>
            <input type="text" name="category_id" id="name" />
        </div>
        <div>
            <input type="submit" value="Enregistrer" />
        </div>
    </form>
</main>

<?php require_once __DIR__ . '/layout/footer.php'; ?>