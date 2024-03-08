<div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-white">
    <p>Name : <?php echo $name ?> </p>
    <p>Price : <?php echo $price ?>€</p>
    <p><img src="<?php echo $img ?>" alt="Image">
    <p>Description : <?php echo $description ?></p>
    <a href="category.php?id=<?php echo $category['id'] ?>" >Category : <?php echo $category['name'] ?>
    </a>
</div>