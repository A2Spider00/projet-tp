<div class="container">
    <div class="row">
        <div class="bgproducts">
            <h2 class="text-white text-center mt-2"><strong>Products</strong></h2>
            <div class="shadowcreate">
                <form action="/creer-produit" method="POST">
                    <div class="text-white">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="mt-5" id="name">
                    </div>
                    <div class="text-white">
                        <label for="price">Price</label>
                        <input type="number" name="price"  class="mt-3" id="price">
                    </div>
                    <div>
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
                    </div>
                    <input type="submit"  class="mt-5" value="Créer">
                </form>
            </div>
        </div>
    </div>
</div>
<?php foreach ($prodList as $p) { ?>
    <p>
        <?= $p->name ?>
    </p>
<?php } ?>