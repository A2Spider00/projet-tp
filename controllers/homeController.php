<?php 

require_once '../models/productsModel.php';

$product = new Products;
$productsList = $product->getList();






















//Toujours à la fin
require_once '../views/parts/header.php';
require_once '../views/home.php';
require_once '../views/parts/footer.php';