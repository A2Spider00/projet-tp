<?php
// Inclusions des fichiers nécessaires
require_once '../models/productsModel.php'; // Inclure le modèle pour gérer les produits
require_once 'formValidation.php'; // Inclure le fichier pour la validation des formulaires
require_once '../models/categoriesModel.php'; // Inclure le modèle pour gérer les catégories
require_once '../models/brandsModel.php';  // Inclure le modèle pour gérer les marques

// Démarrage de la session
session_start(); // Démarrer ou reprendre une session utilisateur
// Vérification des autorisations
if(empty($_SESSION['user']) || $_SESSION['user']['id_roles'] != 535){
    header('Location: /connexion'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté ou n'a pas les autorisations requises
    exit;
}
// Récupération des catégories depuis la base de données
$categories = new categories;
$categoriesList = $categories->getList();
// Récupération des marques depuis la base de données
$brands = new brands;
$brandsList = $brands->getList();
// Traitement du formulaire si soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Initialisation du modèle de produit
    $product = new products();

 // Initialisation du tableau des erreurs
    $errors = [];
// Validation du nom du produit
    if (!empty($_POST['name'])) { 
        if (preg_match($regex['productsName'], $_POST['name'])) { // Vérification du format du nom du produit
            $product->name = strip_tags($_POST['name']); // Nettoyage et assignation du nom du produit
        } else {
            $errors['name']  = PRODUCTS_NAME_ERROR_INVALID; // Ajout d'une erreur si le nom du produit est invalide
        }
    } else {
        $errors['name'] = PRODUCTS_NAME_ERROR_EMPTY; // Ajout d'une erreur si le nom du produit est vide
    }
// Validation du prix du produit
    if (!empty($_POST['price'])) {
        if (preg_match($regex['price'], $_POST['price'])) { // Vérification du format du prix
            $product->price = (int) strip_tags($_POST['price']); // Nettoyage et assignation du prix du produit
        } else {
            $errors['price'] = PRODUCTS_PRICE_ERROR_INVALID; // Ajout d'une erreur si le prix du produit est invalide
        }
    } else {
        $errors['price'] = PRODUCTS_PRICE_ERROR_EMPTY; // Ajout d'une erreur si le prix du produit est vide
    }
// Validation de l'image du produit
    if (!empty($_FILES['image'])) {
        $imageMessage = checkImage($_FILES['image']); // Validation de l'image téléchargée

        if ($imageMessage != '') {
            $errors['image'] = $imageMessage; // Ajout d'une erreur si l'image est invalide
        } else {
            // Assignation d'un nom unique à l'image et déplacement vers un dossier sur le serveur
            $product->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

            while(file_exists('../assets/img/products/' . $product->image)) {
                $product->image = uniqid() . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            }
        }
    }

// Validation de la catégorie du produit
    if (!empty($_POST['categories'])) {
        $categories->id = $_POST['categories']; // Assignation de l'ID de la catégorie

        if (preg_match($regex['price'], $_POST['categories'])) { // Vérification du format de l'ID de la catégorie
            $product->id_categories = (int) clean($_POST['categories']); // Nettoyage et assignation de l'ID de la catégorie
            if ($categories->checkIfExistsById() != 1) {
                $errors['categories'] = 'rr'; // Ajout d'une erreur si la catégorie n'existe pas
            }
        } else {
            $errors['categories'] = PRODUCTS_categories_ERROR_INVALID; // Ajout d'une erreur si l'ID de la catégorie est invalide
        }
    } else {
        $errors['categories'] = PRODUCTS_categories_ERROR_EMPTY; // Ajout d'une erreur si la catégorie est vide
    }

    
 // Validation de la marque du produit
    if (!empty($_POST['brands'])) {
        $brands->id = $_POST['brands'];  // Assignation de l'ID de la marque

        if (preg_match($regex['price'], $_POST['brands'])) { // Vérification du format de l'ID de la marque
            $product->id_brands = $_POST['brands'];  // Assignation de l'ID de la marque
            if ($brands->checkIfExistsById() != 1) {
                $errors['brands'] = 'rr'; // Ajout d'une erreur si la marque n'existe pas
            }
        } else {
            $errors['brands'] = PRODUCTS_BRANDS_ERROR_INVALID; // Ajout d'une erreur si l'ID de la marque est invalide
        }
    } else {
        $errors['brands'] = PRODUCTS_BRANDS_ERROR_EMPTY; // Ajout d'une erreur si la marque est vide
    }


// Si aucune erreur, téléchargement de l'image
    if(empty($errors)) {
        if(move_uploaded_file($_FILES['image']['tmp_name'], '../assets/img/products/' . $product->image)) {
            if($product->create()){ // Si le téléchargement réussit, création du produit dans la base de données
                $success = PHOTO_ADD_SUCCESS; // Message de succès
            } else {
                unlink('../assets/img/products/' . $product->image);
                $errors['add'] = PRODUCT_IMAGE_ERROR_EMPTY;  // Ajout d'une erreur si la création du produit échoue
            }
        } else {
            $errors['add'] = PRODUCT_IMAGE_ERROR_INVALID; // Ajout d'une erreur si le téléchargement de l'image échoue
        }
    
    }

// Création du produit si aucune erreur n'est présente
    if (empty($errors)) {
        if($product->create()) {  // Si aucune erreur, création du produit dans la base de données
            $success = 'Produit a bien été créé'; // Message de succès
        }
    }
}


// Inclusion des fichiers pour afficher la page
require_once '../views/parts/header.php';
require_once '../views/createProduct.php';
require_once '../views/parts/footer.php';

