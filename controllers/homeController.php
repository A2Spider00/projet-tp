<?php 

require_once '../models/productsModel.php';

session_start();

$product = new Products;
$productsList = $product->getList();

//Toujours à la fin
require_once '../views/parts/header.php';
require_once '../views/home.php';
require_once '../views/parts/footer.php';