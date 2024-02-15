<div class="bgproducts"></div>
<h2 class="text-white text-center mt-2"><strong>Products</strong></h2>
<div class="shadowcreate">
    <form action="/creer-produit" method="POST">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price">
        </div>
        <div>
            <select name="categories" id="">
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
        <input type="submit" value="Créer">

    </form>
</div>

<?php foreach ($prodList as $p) { ?>
    <p>
        <?= $p->name ?>
    </p>
<?php } ?>