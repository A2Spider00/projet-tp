<?php


require_once '../models/productsModel.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = new products();
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->id_categories = $_POST['id_categories'];
    $productsList = $product->create();
}









require_once '../views/parts/header.php';
require_once '../views/createProduct.php';
require_once '../views/parts/footer.php';

