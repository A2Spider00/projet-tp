<?php

require_once '../models/productsModel.php';
require_once 'formValidation.php';
require_once '../models/categoriesModel.php';
require_once '../models/brandsModel.php';

session_start();

if(empty($_SESSION['user']) || $_SESSION['user']['id_roles'] != 535){
    header('Location: /connexion');
    exit;
}

$categories = new categories;
$categoriesList = $categories->getList();

$brands = new brands;
$brandsList = $brands->getList();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product = new products();


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
        $product->create();
    }
}

require_once '../views/parts/header.php';
require_once '../views/createProduct.php';
require_once '../views/parts/footer.php';

