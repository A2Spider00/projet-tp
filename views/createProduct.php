<div class="bgimagee">
    <div class="row">
            <h2 class=" producth2 text-white text-center mt-2"><strong>Products</strong></h2>
            <div class="shadowcreate">
                <form action="/creer-produit" method="POST" enctype="multipart/form-data">
                    <div class="text-white mt-5 text-center">
                        <label for="name">NOM</label>
                        <input type="text" name="name" class="mt-5" id="name">
                        <?php if (isset($errors['name'])) { ?>
                            <p class="errorsMessage">
                                <?= $errors['name'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="text-white mt-4 text-center">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" class="mt-3" id="price">
                        <?php if (isset($errors['price'])) { ?>
                            <p class="errorsMessage">
                                <?= $errors['price'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="file" name="image" id="image">
                        <?php if (isset($errors['image'])) { ?>
                            <p class="errorsMessage">
                                <?= $errors['image'] ?>
                            </p>
                        <?php } ?>

                    </div>
                    <div class="mt-4 text-center">
                        <select name="categories" class="mt-4 center" id="">
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
                    </div>
                    <div class="d-flex justify-content-center">
                    <input type="submit" class="mt-5" value="Créer">
                </div>
                </form>
            </div>
        </div>
    </div>
    