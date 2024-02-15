<?php
require_once '../models/productsModel.php';


session_start();

$product = new products;
$product->id=$_GET['id'];
if($product->checkIfExistsById() == 0) {
header('Location: /home');
exit;
}
$productDetails=$product->getProductById();











require_once '../views/parts/header.php';
require_once '../views/product.php';
require_once '../views/parts/footer.php';
