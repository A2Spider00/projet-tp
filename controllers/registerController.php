<?php
require_once '../models/usersModel.php';
require_once 'formValidation.php';

// Démarre une session PHP
session_start();
// Vérifie si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
/* les -> ca sert a atache lobjet*/

// Instancie un nouvel objet Users
$user = new Users;

// Vérification et nettoyage du prénom
if (!empty($_POST['firstname'])) {
    if (preg_match($regex['name'], $_POST['firstname'])) {
        $user->firstname = clean($_POST['firstname']); // Attribue le prénom nettoyé à l'objet utilisateur
    } else {              
        $errors['firstname'] = USERS_firstname_ERROR_INVALID; // Enregistre une erreur si le prénom est invalide
    }
} else {
    $errors['firstname'] = USERS_firstname_ERROR_EMPTY; // Enregistre une erreur si le prénom est vide
}

// Vérification et nettoyage du nom de famille
if (!empty($_POST['lastname'])) {
    if (preg_match($regex['name'], $_POST['lastname'])) {
        $user->lastname = clean($_POST['lastname']); // Attribue le nom de famille nettoyé à l'objet utilisateur
    } else {
        $errors['lastname'] = USERS_lastname_ERROR_INVALID; // Enregistre une erreur si le nom de famille est invalide
    }
} else {
    $errors['lastname'] = USERS_lastname_ERROR_EMPTY; // Enregistre une erreur si le nom de famille est vide
}
 // Vérification et nettoyage de l'email
if (!empty($_POST['email'])) {
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $user->email = clean($_POST['email']); // Attribue l'email nettoyé à l'objet utilisateur
          // Vérifie si l'email existe déjà dans la base de données
        if ($user->checkIfExistsByEmail() == 1) {
            $errors['email'] = USERS_EMAIL_ERROR_EXISTS; // Enregistre une erreur si l'email existe déjà
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_INVALID; // Enregistre une erreur si l'email est invalide
    }
} else {
    $errors['email'] = USERS_EMAIL_ERROR_EMPTY;// Enregistre une erreur si l'email est vide
}

// Vérification et hachage du mot de passe
if (!empty($_POST['password'])) {
    if (preg_match($regex['password'], $_POST['password'])) {
          // Vérification du mot de passe confirmé
        if (!empty($_POST['password_confirm'])) {
            if ($_POST['password'] == $_POST['password_confirm']) {
                $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hache le mot de passe
            } else {
                $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_INVALID; // Enregistre une erreur si le mot de passe confirmé est invalide
            }
        } else {
            $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_EMPTY; // Enregistre une erreur si le mot de passe confirmé est vide
        }
    } else {
        $errors['password'] = USERS_PASSWORD_ERROR_INVALID; // Enregistre une erreur si le mot de passe est invalide
    }
} else {
    $errors['password'] = USERS_PASSWORD_ERROR_EMPTY;
}

if (!empty($_POST['birthdate'])) {
    if (preg_match($regex['date'], $_POST['birthdate'])) {
        if (checkDateValidity($_POST['birthdate'])) {
            $user->birthdate = $_POST['birthdate'];
        } else {
            $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
        }
    } else {
        $errors['birthdate'] = USERS_BIRTHDATE_ERROR_INVALID;
    }
} else {
    $errors['birthdate'] = USERS_BIRTHDATE_ERROR_EMPTY;
}
// Création de l'utilisateur s'il n'y a pas d'erreurs
if (empty($errors)) {
    if($user->create()) {
        $success = 'L\'utilisateur a bien été créé'; // Affiche un message de succès si l'utilisateur est créé avec succès
    }
}
}

require_once '../views/parts/header.php';
require_once '../views/register.php';
require_once '../views/parts/footer.php'; 