<?php


require_once '../models/productsModel.php';

$product = new products();
$product->name = 'test';
$product->price = 20;
$product->id_categories = 2;
$productsList = $product->create();








require_once '../views/parts/header.php';
require_once '../views/createProduct.php';
require_once '../views/parts/footer.php';

