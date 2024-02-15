<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>A2Spider drop 23</title>
  <!--font google-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
  <!--fin du font-->
  <!--le lien d mon boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!--fin de mon boostrap-->
  <!--mon css -->
  <link rel="stylesheet" href="assets/css/header.css">
  <link rel="stylesheet" href="assets/css/account.css">
  <link rel="stylesheet" href="assets/css/pgmain.css">
  <link rel="stylesheet" href="assets/css/createproduct.css">
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/register.css">
  <link rel="stylesheet" href="assets/css/updateAccount.css">
  <!--fin du mon css-->
</head>
<!--J'ai ajouté une barre de navigation de chez Bootstrap dans laquelle j'ai inclus mon logo et l'icone du panier et des liens de connexion et de déconnexion-->
<body>

<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/img/newa2s.jpg" alt="Votre Logo" class="logonav">
        </a>

        <!-- Bouton pour afficher le menu en version mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenu de la barre de navigation -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liens</a>
                </li>
                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id_roles'] == 535) { ?>
                    <a href="/home" class="ajtdesproducts" >
                    <li>Ajouter des products</li>
                </a>
                    <?php }?>
                <li class="nav-item">
                    <a href="/panier" class="nav-link">
                        <i class="fas fa-cart-shopping fs-2 custom-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <!-- Lien de connexion -->
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a href="/logout" class="nav-link connexionn">
                            <strong>Déconnexion</strong>
                        </a>
                    <?php } else { ?>
                        <a href="/login" class="nav-link connexionn">
                            <strong>Connexion</strong>
                        </a>
                    <?php } ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
