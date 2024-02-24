<?php
require_once '../models/productsModel.php';
require_once 'formValidation.php';
require_once '../models/categoriesModel.php';
require_once '../models/brandsModel.php';

session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
     // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: /connexion');
    exit;
}
 // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
$categories = new categories;
$categoriesList = $categories->getList(); // Récupération de la liste des catégories

// Création d'un objet pour récupérer la liste des marques
$brands = new brands;
$brandsList = $brands->getList(); // Récupération de la liste des marques

// Création d'un objet pour gérer les produits
$product = new Products();

// Vérification si un identifiant de produit est spécifié dans l'URL
if (isset($_GET['id'])) {
    // Récupération de l'identifiant de produit et conversion en entier
    $product->id = (int) $_GET['id'];


    // Vérification si le produit correspondant à l'identifiant existe dans la base de données
    if ($product->checkIfExistsById() == 0) {
         // Redirection vers la page d'accueil si le produit n'existe pas
        header('Location: /home');
        exit;
    }

}

if (isset($_POST['deleteProducts'])) { // Vérifie si la clé 'deleteProducts' existe dans les données envoyées via la méthode POST
    if ($product->deleteProducts()) { // Appelle la méthode deleteProducts() de l'objet $product pour supprimer le produit
        header('Location: /home'); // Redirige l'utilisateur vers la page d'accueil après la suppression du produit
        exit;
    } else {
        echo "Erreur lors de la suppression du produit."; // Affiche un message d'erreur
    }
}

// Initialisation du tableau d'erreurs
$errors = [];

// Vérification du champ 'name' du formulaire
if (!empty($_POST['name'])) {
    // Vérification si le nom du produit correspond à une expression régulière spécifique
    if (preg_match($regex['productsName'], $_POST['name'])) {
        // Si le nom est valide, il est assigné à la propriété 'name' de l'objet produit
        $product->name = strip_tags($_POST['name']);
    } else {
        // Si le nom est invalide, une erreur est enregistrée dans le tableau d'erreurs
        $errors['name'] = PRODUCTS_NAME_ERROR_INVALID;
    }
} else {
    // Si le champ 'name' est vide, une erreur est enregistrée dans le tableau d'erreurs
    $errors['name'] = PRODUCTS_NAME_ERROR_EMPTY;
}
// Vérification du champ 'price' du formulaire
if (!empty($_POST['price'])) {
     // Vérification si le prix correspond à une expression régulière spécifique
    if (preg_match($regex['price'], $_POST['price'])) {
         // Si le prix est valide, il est converti en entier et assigné à la propriété 'price' de l'objet produit
        $product->price = (int) strip_tags($_POST['price']);
    } else {
         // Si le prix est invalide, une erreur est enregistrée dans le tableau d'erreurs
        $errors['price'] = PRODUCTS_PRICE_ERROR_INVALID;
    }
} else {
    // Si le champ 'price' est vide, une erreur est enregistrée dans le tableau d'erreurs
    $errors['price'] = PRODUCTS_PRICE_ERROR_EMPTY;
}
// Vérification du champ 'categories' du formulaire
if (!empty($_POST['categories'])) {
     // Affectation de l'identifiant de catégorie à l'objet 'categories'
    $categories->id = $_POST['categories'];
// Vérification si l'identifiant de catégorie correspond à une expression régulière spécifique
    if (preg_match($regex['price'], $_POST['categories'])) {
        // Si l'identifiant de catégorie est valide, il est assigné à la propriété 'id_categories' de l'objet produit
        $product->id_categories = (int) clean($_POST['categories']);
         // Vérification si la catégorie existe dans la base de données
        if ($categories->checkIfExistsById() != 1) {
            // Si la catégorie n'existe pas, une erreur est enregistrée dans le tableau d'erreurs
            $errors['categories'] = 'rr';
        }
    } else {
         // Si l'identifiant de catégorie est invalide, une erreur est enregistrée dans le tableau d'erreurs
        $errors['categories'] = PRODUCTS_categories_ERROR_INVALID;
    }
} else {
    // Si le champ 'categories' est vide, une erreur est enregistrée dans le tableau d'erreurs
    $errors['categories'] = PRODUCTS_categories_ERROR_EMPTY;
}

// Vérification du champ 'brands' du formulaire
if (!empty($_POST['brands'])) {
    // Affectation de l'identifiant de marque à l'objet 'brands'
    $brands->id = $_POST['brands'];
 // Vérification si l'identifiant de marque correspond à une expression régulière spécifique
    if (preg_match($regex['price'], $_POST['brands'])) {
        // Si l'identifiant de marque est valide, il est assigné à la propriété 'id_brands' de l'objet produit
        $product->id_brands = $_POST['brands'];
         // Vérification si la marque existe dans la base de données
        if ($brands->checkIfExistsById() != 1) {
            // Si la marque n'existe pas, une erreur est enregistrée dans le tableau d'erreurs
            $errors['brands'] = 'rr';
        }
    } else {
         // Si l'identifiant de marque est invalide, une erreur est enregistrée dans le tableau d'erreurs
        $errors['brands'] = PRODUCTS_BRANDS_ERROR_INVALID;
    }
} else {
      // Si le champ 'brands' est vide, une erreur est enregistrée dans le tableau d'erreurs
    $errors['brands'] = PRODUCTS_BRANDS_ERROR_EMPTY;
}


// Si le tableau d'erreurs est vide, la mise à jour du produit est effectuée
if (empty($errors)) {
    $product->updateProducts();
}
// Récupération des détails du produit par son identifiant
$productDetails = $product->getProductById();

require_once '../views/parts/header.php';
require_once '../views/updateProduct.php';
require_once '../views/parts/footer.php';


























