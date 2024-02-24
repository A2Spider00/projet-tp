<?php if (isset($success)) { ?>
    <p class="successContainer">
        <?= $success ?>
    </p>
<?php } else if (isset($errors['update'])) { ?>
        <p class="errorsContainer">
        <?= $errors['update'] ?>
        </p>
<?php } ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Colonne Bootstrap avec une largeur de 6 colonnes sur les appareils moyens -->
            <!-- Formulaire pour modifier les détails du produit -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- En-tête du formulaire avec le nom du produit -->
                <h1 class="text-white text-center mt-3 w-100"> Modifier la pièce
                    <?= $productDetails->name ?>
                </h1>
                <!-- Champ de saisie pour le nom du produit -->
                <div class="form-group text-center mt-5"> <!-- Début d'un groupe de formulaire centré avec une marge supérieure de 5 -->
                    <label for="name" class="text-white fs-4">Nom</label> <!-- Étiquette pour le champ de saisie de nom -->
                    <input type="text" id="name" name="name" class="form-control" value="<?= $productDetails->name ?>">
                </div>
                <div class="form-group text-white text-center mt-3"> <!-- Début d'un groupe de formulaire centré avec une marge supérieure de 3 -->
                    <label for="price" class="fs-4">Prix</label> <!-- Étiquette pour le champ de saisie de prix -->
                    <input type="number" id="price" name="price" class="form-control" 
                        value="<?= $productDetails->price ?>"> <!-- Champ de saisie de prix -->
                </div>
                <div class="form-group text-center mt-3"> <!-- Début d'un groupe de formulaire centré avec une marge supérieure de 3 -->
                    <label for="categories" class="text-white fs-4">Catégories</label> <!-- Étiquette pour la liste déroulante de catégories -->
                    <select name="categories" class="form-control center">
                        <?php foreach ($categoriesList as $c) { ?> <!-- Boucle pour chaque catégorie dans la liste -->
                            <option value="<?= $c->id ?>"> <!-- Liste déroulante de catégories -->
                                <?= $c->name ?><!-- Option avec la valeur de l'ID de la catégorie et le nom de la catégorie -->
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group text-center mt-3">
                    <label for="brands" class="text-white fs-4">Marques</label>
                    <select name="brands" class="form-control">
                        <?php foreach ($brandsList as $b) { ?>
                            <option value="<?= $b->id ?>">
                                <?= $b->name ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group text-center mt-2 d-flex justify-content-center align-items-center ">
                    <input type="hidden" name="id" value="<?= $productDetails->id ?>">
                    <input type="submit" value="Valider" class="btn btn-primary  w-100">
                </div>
            </form>

<form action="/modifier-produit-<?= $productDetails->id ?>" method="post"
class="d-flex justify-content-center align-items-center">
<!-- Définition du formulaire avec une action pour soumettre vers modifier-produit suivi de l'ID du produit -->
<input type="submit" value="Supprimer" name="deleteProducts" class="btn btn-danger  mt-2 w-100 ">
<!-- Champ de soumission du formulaire qui envoie une demande de suppression avec le nom "deleteProducts" -->
</form>
        </div>
    </div>
</div>