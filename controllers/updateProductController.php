<?php
require_once '../models/productsModel.php';
require_once 'formValidation.php';
require_once '../models/categoriesModel.php';
require_once '../models/brandsModel.php';

session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}

$product = new Products();
$productDetails = $product->getProductById();
if (isset($_GET['id'])) {
    $product->id = (int) $_GET['id'];

    if ($product->checkIfExistsById() == 0) {
        header('Location: /productsList');
        exit;
    }

}

$errors = [];

if (!empty($_POST['name'])) {
    if (preg_match($regex['productsName'], $_POST['name'])) {
        $product->name = strip_tags($_POST['name']);
    } else {
        $errors['name'] = PRODUCTS_NAME_ERROR_INVALID;
    }
} else {
    $errors['name'] = PRODUCTS_NAME_ERROR_EMPTY;
}

if (!empty($_POST['price'])) {
    if (preg_match($regex['price'], $_POST['price'])) {
        $product->price = (int) strip_tags($_POST['price']);
    } else {
        $errors['price'] = PRODUCTS_PRICE_ERROR_INVALID;
    }
} else {
    $errors['price'] = PRODUCTS_PRICE_ERROR_EMPTY;
}

if (!empty($_POST['categories'])) {
    $categories->id = $_POST['categories'];

    if (preg_match($regex['price'], $_POST['categories'])) {
        $product->id_categories = (int) clean($_POST['categories']);
        if ($categories->checkIfExistsById() != 1) {
            $errors['categories'] = 'rr';
        }
    } else {
        $errors['categories'] = PRODUCTS_categories_ERROR_INVALID;
    }
} else {
    $errors['categories'] = PRODUCTS_categories_ERROR_EMPTY;
}


if (!empty($_POST['brands'])) {
    $brands->id = $_POST['brands'];

    if (preg_match($regex['price'], $_POST['brands'])) {
        $product->id_brands = $_POST['brands'];
        if ($brands->checkIfExistsById() != 1) {
            $errors['brands'] = 'rr';
        }
    } else {
        $errors['brands'] = PRODUCTS_BRANDS_ERROR_INVALID;
    }
} else {
    $errors['brands'] = PRODUCTS_BRANDS_ERROR_EMPTY;
}



if (empty($errors)) {
    $productDetails->create();
}


require_once '../views/parts/header.php';
require_once '../views/updateProduct.php';
require_once '../views/parts/footer.php';


























