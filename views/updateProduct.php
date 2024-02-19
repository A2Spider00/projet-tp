<?php if(isset($success)) { ?>
    <p class="successContainer"><?= $success ?></p>
<?php } else if(isset($errors['update'])){ ?>
    <p class="errorsContainer"><?= $errors['update'] ?></p>
<?php } ?>

<?php
if ($_SESSION['user']['id_usersRoles'] == 246) {
?>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Modifier la pièce <?= $productDetails->name ?></h1>

        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= $productDetails->name ?>">


        <label for="price">Prix :</label>
        <input type="number" id="price" name="price" value="<?= $productDetails->price ?>">


        <input hidden type="text" value="<?= $productDetails->id?>" name="id">
        <input type="submit" value="Valider">
    </form>
<?php } ?>