<?php 

require_once '../models/productsModel.php';

// Démarrage de la session
session_start();

// Instanciation de la classe Products pour récupérer la liste des produits
$product = new Products;
$productsList = $product->getList();

//Toujours à la fin
require_once '../views/parts/header.php';
require_once '../views/home.php';
require_once '../views/parts/footer.php';