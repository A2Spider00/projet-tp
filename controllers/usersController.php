<?php
require_once '../models/usersModel.php';
require_once '../controllers/formValidation.php';


// Démarrage de la session
session_start();

// Vérification si l'utilisateur est connecté
if(!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}


$user = new Users;
$user->id = $_SESSION['user']['id'];

if(isset($_POST['updateInfos'])) {

    if (!empty($_POST['firstname'])) {
        if (preg_match($regex['name'], $_POST['firstname'])) {
            $user->firstname = clean($_POST['firstname']);
        } else {              
            $errors['firstname'] = USERS_firstname_ERROR_INVALID;
        }
    } else {
        $errors['firstname'] = USERS_firstname_ERROR_EMPTY;
    }
    
    
    if (!empty($_POST['lastname'])) {
        if (preg_match($regex['name'], $_POST['lastname'])) {
            $user->lastname = clean($_POST['lastname']);
        } else {
            $errors['lastname'] = USERS_lastname_ERROR_INVALID;
        }
    } else {
        $errors['lastname'] = USERS_lastname_ERROR_EMPTY;
    }
    
    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user->email = clean($_POST['email']);
            if ($user->checkIfExistsByEmail() == 1) {
                $errors['email'] = USERS_EMAIL_ERROR_EXISTS;
            }
        } else {
            $errors['email'] = USERS_EMAIL_ERROR_INVALID;
        }
    } else {
        $errors['email'] = USERS_EMAIL_ERROR_EMPTY;
    }
    
    
    if (!empty($_POST['password'])) {
        if (preg_match($regex['password'], $_POST['password'])) {
            if (!empty($_POST['password_confirm'])) {
                if ($_POST['password'] == $_POST['password_confirm']) {
                    $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_INVALID;
                }
            } else {
                $errors['password_confirm'] = USERS_PASSWORD_CONFIRM_ERROR_EMPTY;
            }
        } else {
            $errors['password'] = USERS_PASSWORD_ERROR_INVALID;
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
    if(empty($errors)) {
        if($user->update()){
            $_SESSION['user']['username'] = $user->firstname;
            $_SESSION['user']['username'] = $user->lastname;
            $_SESSION['user']['username'] = $user->birthdate;
            $_SESSION['user']['email'] = $user->email;
            $_SESSION['user']['username'] = $user->password;
            $success = USERS_UPDATE_SUCCESS;
        } else {
            $errors['updateAccount'] = USERS_UPDATE_ERROR;
        }
    }
}



if(isset($_POST['deleteAccount'])) {
    if($user->delete()) {
        unset($_SESSION);
        session_destroy();
        header('Location: /home ');
        exit;
    }
}
$userAccount = $user->getById();




require_once '../views/parts/header.php';
require_once '../views/updateAccount.php';
require_once '../views/parts/footer.php';