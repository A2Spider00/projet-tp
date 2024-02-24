<?php
// Inclusion du fichier contenant la définition de la classe pour gérer les produits
require_once '../models/productsModel.php';

// Démarrage de la session 
session_start();

// Création d'une instance de la classe pour gérer les produits
$product = new products;

// Récupération de l'identifiant du produit à afficher depuis les paramètres de la requête GET
$product->id = $_GET['id'];

// Vérification si le produit existe dans la base de données en utilisant son identifiant
if ($product->checkIfExistsById() == 0) {
    header('Location: /home');// Redirection vers la page d'accueil si le produit n'existe pas
    exit;
}
// Récupération des détails du produit à afficher en utilisant son identifiant
$productDetails = $product->getProductById();

// Inclusion des fichiers pour afficher la page complète
require_once '../views/parts/header.php';
require_once '../views/product.php';
require_once '../views/parts/footer.php';
