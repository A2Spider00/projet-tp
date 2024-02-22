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
            <form action="" method="post" enctype="multipart/form-data">
                <h1 class="text-white text-center mt-3 w-100"> Modifier la pièce <?= $productDetails->name ?></h1>
                <div class="form-group text-center mt-5">
                    <label for="name" class="text-white fs-4">Nom</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $productDetails->name ?>">
                </div>
                <div class="form-group text-white text-center mt-3">
                    <label for="price" class="fs-4">Prix</label>
                    <input type="number" id="price" name="price" class="form-control"
                        value="<?= $productDetails->price ?>">
                </div>
                <div class="form-group text-center mt-3">
                    <label for="categories" class="text-white fs-4">Catégories</label>
                    <select name="categories" class="form-control center">
                        <?php foreach ($categoriesList as $c) { ?>
                        <option value="<?= $c->id ?>"><?= $c->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group text-center mt-3">
                    <label for="brands" class="text-white fs-4">Marques</label>
                    <select name="brands" class="form-control">
                        <?php foreach ($brandsList as $b) { ?>
                        <option value="<?= $b->id ?>"><?= $b->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group text-center mt-2 d-flex justify-content-center align-items-center ">
                    <input type="hidden" name="id" value="<?= $productDetails->id ?>">
                    <input type="submit" value="Valider" class="btn btn-primary  w-100">
                </div>
            </form>

            <form action="/modifier-produit-<?= $productDetails->id ?>" method="post" class="d-flex justify-content-center align-items-center" >
                <input type="submit" value="Supprimer" name="deleteProducts"
                    class="btn btn-danger  mt-2 w-100 ">
            </form>
        </div>
    </div>
</div>