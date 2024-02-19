<?php if(isset($success)) { ?>
    <p class="successContainer"><?= $success ?></p>
<?php } else if(isset($errors['update'])){ ?>
    <p class="errorsContainer"><?= $errors['update'] ?></p>
<?php } ?>


    <form action="" method="post" enctype="multipart/form-data">
        <h1>Modifier la pièce <?= $productDetails->name ?></h1>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= $productDetails->name ?>">


        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" value="<?= $productDetails->price ?>">

        <select name="categories"  class="mt-4 center" id="">
                            <?php foreach ($categoriesList as $c) { ?>
                                <option value="<?= $c->id ?>">
                                    <?= $c->name ?>
                                </option>
                            <?php } ?>
                        </select>
                        <select name="brands" id="">
                            <?php foreach ($brandsList as $b) { ?>
                                <option value="<?= $b->id ?>">
                                    <?= $b->name ?>
                                </option>
                            <?php } ?>
                        </select>
        <input hidden type="text" value="<?= $productDetails->id?>" name="id">
        <input type="submit" value="Valider">
    </form>
    <form action="/modifier-produit-<?= $productDetails->id ?>" method="post">
    <input type="submit" value="Supprimer" name="deleteProducts">
    <form