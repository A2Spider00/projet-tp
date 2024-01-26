<h1>products</h1>
<?php if (isset($success)) { ?>
    <p class="successContainer">
        <?= $success ?>
    </p>
<?php } else if (isset($errors['add'])) { ?>
        <p class="errorsContainer">
        <?= $errors['add'] ?>
        </p>
<?php } ?>

<div class="formContainer">
    <form action="/ajout-article" method="POST" enctype="multipart/form-data">
        <h1 class="text-white text-center">Ajouter votre produit</h1>
        <label for="title">Name</label>
        <input type="text" name="title" id="title">
        <?php if (isset($errors['title'])) { ?>
            <p class="errorsMessage">
                <?= $errors['title'] ?>
            </p>
        <?php } ?>
<div>
        <label for="image">Image d'illustration</label>
        <input type="file" name="image" id="image">
        <?php if (isset($errors['image'])) { ?>
            <p class="errorsMessage">
                <?= $errors['image'] ?>
            </p>
        <?php } ?>
</div>
<div>
        <label for="categories">Catégorie</label>
        <select name="categories" id="categories">
            <option selected disabled>Choisissez une catégorie</option>
            <?php foreach ($categoriesList as $c) { ?>
                <option value="<?= $c->id ?>">
                    <?= $c->name ?>
                </option>
            <?php } ?>
        </select>
        <?php if (isset($errors['categories'])) { ?>
            <p class="errorsMessage">
                <?= $errors['categories'] ?>
            </p>
        <?php } ?>
</div>
<div>
        <label for="content">Contenu</label>
        <textarea name="content" id="content"></textarea>
        <?php if (isset($errors['content'])) { ?>
            <p class="errorsMessage">
                <?= $errors['content'] ?>
            </p>
        <?php } ?>
</div>
        <input type="submit" value="Créer">

    </form>
</div>