# PHP - CNAM 2024

## Préambule

En essayant de faire du style grâce à Flowbite et Tailwind il se peut que ce ne soit pas très clair à comprendre le site. Il y'a ainsi une navbar en haut de chaque page (sauf pour la page de la recherche de produits/catégories) afin d'accéder facilement aux pages principales.

## Base de données - Configuration

Créer un fichier `db.ini` dans le dossier `config`, inscrire ensuite vos propres données de configuration :

```ini
HOST=127.0.0.1
PORT=3306
DB_NAME=db_name
CHARSET=utf8mb4
USER=user
PASSWORD=pass
```

## Pagination - Configuration

Créer un fichier `settings.ini` dans le dossier `config`, inscrire ensuite vos propres données de configuration :

```ini
PRODUCT_PAGE_COUNT=5
CATEGORY_PAGE_COUNT=5
```

La pagination est effectuée dans les fichiers `page/products.php` et `page/categories.php`.
Au début de page il y'a un check pour savoir à quelle page des produits on se trouve, puis on fait
une requête SQL afin de récupérer des données selon une limite et un offset. À la fin des deux fichiers
on fait un seuil pour savoir combien de pages vont être créer, puis on fait appel au template
`layout/paginationTemplate.php`

## Upload de de la cover d'un produit

Situé dans `page/add-product.php` qui fait appel à `functions/process/add-product-process.php`.
Ce dernier fichier s'occupe de mettre les valeurs dans la base de données puis de sauvegarder dans le serveur les images. Il n'y a un système d'écrasement de fichier du même nom lors de l'ajout d'un fichier dans le serveur. Un fichier `.gitkeep` existe à l'intérieur du dossier `uploaded_files` qui permet de juste pousser le dossier pour les autres développeurs afin d'avoir la même arborescence tout en laissant un dossier vide pour mettre les images que l'on veut.

## Barre de recherche

La barre de recherche est disponible dans `page/products.php` et `page/categories.php`.
À l'instar de la pagination, on utilise aussi un template de pagination. On vient appeler d'abord `functions/search.php` qui vient chercher selon le type de valeur voulu (produit, catégorie) et qui ainsi va faire une requête avec une clause LIKE. `functions/search.php` va ainsi afficher les occurences existantes, puis lorsqu'on clique sur une des valeurs on atterrit sur la page du produit ou de la categorie.

## Refactor - Clean/Up

J'ai essayé d'organiser les fichiers dans les bons dossiers, j'ai aussi essayé de mettre des noms compréhensibles et essayer de factoriser un maximum.

## Renseignements

J'ai beaucoup utilisé :
- ChatGPT pour des exemples.
- Votre cours pour approfondir certains sujets.
- Le site de TailWind et FlowBite pour essayer de faire du css (je ne suis pas bon dedans donc ça ne se voit pas tant que ça).
