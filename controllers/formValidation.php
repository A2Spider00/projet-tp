<?php 
//FONCTIONS
/**
 * Nettoie la chaîne de caractères
 * @param string $string La chaîne à nettoyer
 * @return string La chaîne nettoyée
 */
function clean($string)
{
    $string = trim($string); //supprime les espaces vides en début et en fin de la chaîne de caractères
    $string = strip_tags($string); //supprime toutes les balises html et php ,prevenir les attaques XSS Cross-Site Scripting
    return $string; // chaîne de caractères nettoyée
}

/**
 * Fonction qui permet de vérifier la validité d'une date
 * @param string $date - La date à vérifier (au format mysql)
 * @return bool - true si la date est valide, false sinon
 */
function checkDateValidity($date) {
    $dateArray = explode('-', $date);
    return checkdate($dateArray[1], $dateArray[2], $dateArray[0]);
}

/**
 * Vérifie si une image est valide
 * @param array $image - L'image à vérifier
 * @return bool - true si l'image est valide, false sinon
 */
function checkImage($image) {
    $errors['image'] = '';

    if($image['error'] != 4) {
        if($image['error'] != 1 &&  $image['size'] > 0 && $image['size'] <= 1000000) {
            if($image['error'] == 0) {

                $extensionArray = [
                    'jpg' => 'image/jpeg', 
                    'jpeg' => 'image/jpeg', 
                    'png' => 'image/png', 
                    'gif' => 'image/gif', 
                    'webp' => 'image/webp',
                ];

                $imgExtension = pathinfo($image['name'], PATHINFO_EXTENSION);

                if(!array_key_exists($imgExtension, $extensionArray) || mime_content_type($image['tmp_name']) != $extensionArray[$imgExtension]) {
                    $errors['image'] = PRODUCT_IMAGE_ERROR_EXTENSION;
                }

            } else {
                $errors['image'] = PRODUCT_IMAGE_ERROR;
            }
        } else {
            $errors['image'] = PRODUCT_IMAGE_ERROR_SIZE;
        }
    } else {
        $errors['image'] = PRODUCT_IMAGE_ERROR_EMPTY;
    }

    return $errors['image'];
}



// MESSAGES D'ERREUR
define('USERS_firstname_ERROR_EMPTY', 'Le prenom d\'utilisateur est requis');
define('USERS_firstname_ERROR_INVALID', 'Le prenom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des espaces, des tirets et des apostrophes');
define('USERS_firstname_ERROR_EXISTS', 'Le prenom d\'utilisateur existe déjà');

define('USERS_lastname_ERROR_EMPTY', 'Le nom d\'utilisateur est requis');
define('USERS_lastname_ERROR_INVALID', 'Le nom d\'utilisateur est invalide. Il ne peut contenir que des lettres, des espaces, des tirets et des apostrophes');
define('USERS_lastname_ERROR_EXISTS', 'Le nom d\'utilisateur existe déjà');

define('USERS_EMAIL_ERROR_EMPTY', 'L\'adresse email est requise');
define('USERS_EMAIL_ERROR_INVALID', 'L\'adresse email est invalide. Elle ne peut contenir que des lettres, des chiffres, des tirets, des underscores, des points et des arobases');
define('USERS_EMAIL_ERROR_EXISTS', 'L\'adresse email existe déjà');

define('USERS_PASSWORD_ERROR_EMPTY', 'Le mot de passe est requis');
define('USERS_PASSWORD_ERROR_INVALID', 'Le mot de passe est invalide. Il doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial');
define('USERS_PASSWORD_CONFIRM_ERROR_INVALID', 'La confirmation du mot de passe est invalide. Les mots de passe ne correspondent pas');
define('USERS_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est requise');

define('USERS_BIRTHDATE_ERROR_EMPTY', 'La date de naissance est requise');
define('USERS_BIRTHDATE_ERROR_INVALID', 'La date de naissance est invalide. Elle doit être au format YYYY-MM-DD');

define('USERS_LOGIN_ERROR', 'Votre adresse mail ou votre mot de passe est incorrect');

define('USERS_UPDATE_SUCCESS', 'Votre compte a bien été mis à jour');
define('USERS_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre compte');

define('USERS_PASSWORD_UPDATE_SUCCESS', 'Votre mot de passe a bien été mis à jour');
define('USERS_PASSWORD_UPDATE_ERROR', 'Une erreur est survenue lors de la mise à jour de votre mot de passe');

define('USERS_ADD_SUCCESS', 'Votre compte a bien été créé');
define('USERS_ADD_ERROR', 'Une erreur est survenue lors de la création de votre compte');


// PRODUCTS

define('PRODUCTS_NAME_ERROR_INVALID', 'Le nom du produit est invalide. Il ne peut contenir que des lettres, des apostrophes et des espaces.');
define('PRODUCTS_NAME_ERROR_EMPTY', 'Le nom du produit est requise.');

//PRODUCTS PRICE
define('PRODUCTS_PRICE_ERROR_INVALID', 'Le prix du produit est invalide. Il ne peut contenir des lettres, des apostrophes et des espaces.');
define('PRODUCTS_PRICE_ERROR_EMPTY', 'Le prix du produit est requise.');

//PRODUCTS CATEGORIES
define('PRODUCTS_categories_ERROR_INVALID', 'La categorie du produit est invalide. Il ne peut contenir des lettres, des apostrophes et des espaces.');
define('PRODUCTS_categories_ERROR_EMPTY', 'La categorie du produit est requise.');

//PRODUCTS BRANDS
define('PRODUCTS_BRANDS_ERROR_INVALID','La brands du produit est invalide');
define('PRODUCTS_BRANDS_ERROR_EMPTY','La brands du produit est requise');

//PRODUCTS UPDATE

define('PRODUCT_NAME_ERROR_INVALID','Le nom du produit est invalide');
define('PRODUCT_NAME_ERROR_EMPTY','Le nom du produit est requise');
define('PRODUCT_PRICE_ERROR_INVALID','Le prix du produit est invalide');
define('PRODUCT_PRICE_ERROR_EMPTY','Le prix du produit est requise');


//PRODUCTS IMAGES
define('PRODUCT_ADD_SUCCESS','Votre produit a été ajouté avec succès');
define('PRODUCT_IMAGE_ERROR_EMPTY', 'L\'image est requise');
define('PRODUCT_IMAGE_ERROR_INVALID', 'L\'image est invalide');
define('PRODUCT_IMAGE_ERROR_EXTENSION', 'L\'image est invalide. Elle doit être au format jpg, jpeg, png, gif ou webp');
define('PRODUCT_IMAGE_ERROR_SIZE', 'L\'image est invalide. Elle doit faire moins de 1Mo');
define('PRODUCT_IMAGE_ERROR', 'Une erreur est survenue lors de l\'envoi de l\'image');
// REGEX
$regex = [
    'name' => '/^[A-zÄ-ÿ]{1,}([ \'-]{1}[A-zÄ-ÿ]{1,}){0,}$/',
    'date' => '/^[0-9]{4}(-[0-9]{2}){2}$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/',
    'title' => '/^[A-zÄ-ÿ0-9]{1,}[ \-\',A-zÄ-ÿ0-9\?\!\:\/]{1,}$/',
    'content' => '/(<script>|(&lt;script&gt;))/',
    'productsName' => '/^[A-Za-z0-9 Ä-ÿ]{1,50}$/',
    'price' => '/^\$?\d+$/',
];




