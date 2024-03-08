<?php

class CardMaker
{
    public static function createProductCard(string $name, string $price, string $img, string $description, string $category)
    {
        echo '<div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-white">
        <p>Name : ' . $name . '</p>
        <p>Price : ' . $price . '€</p>
        <p><img src="' . $img . '" alt="Image">
        <p>Description : ' . $description . '</p>
        <p>Category : ' . $category . '
        </p>
        </div>';
    }

    public static function createCategoryCard(string $name)
    {
        echo '<div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:text-white">
        <p>Name : ' . $name . '</p>
        </div>';
    }
}
