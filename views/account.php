<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="boxshadow">
                    <p class="fs-5"><strong>MON COMPTE</strong></p>
                    <a href="/mon-compte" class="lelieninfo">
                        <p class="mesinformation"><strong>Mes information personnelles</strong></p>
                    </a>
                    <a href="/mon-compte">
                        <p class="mesinformation"><strong>Supprimer votre compte</strong></p>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
            <h1>Modifier mon compte</h1>
<?php if (isset($success)) { ?>
    <p><?= $success ?></p>
<?php } ?>
<?php if (isset($errors['updateAccount'])) { ?>
    <p><?= $errors['updateAccount'] ?></p>
<?php } ?>
<div class="formContainer">
    <form action="/mon-compte" method="post">
        <h2>Modifier mes informations</h2>
        <label for="firstname">firstname</label>
        <input type="text" name="firstname" id="firstname" placeholder="" value="<?= $userAccount->firstname ?>">
        <?php if (isset($errors['firstname'])) { ?>
            <p><?= $errors['firstname'] ?></p>
        <?php } ?>

        <label for="lastname">lastname</label>
        <input type="text" name="lastname" id="lastname" placeholder="" value="<?= $userAccount->lastname ?>">
        <?php if (isset($errors['username'])) { ?>
            <p><?= $errors['username'] ?></p>
        <?php } ?>


        <label for="email">Adresse mail</label>
        <input type="email" name="email" id="email" placeholder="jean.dupont@gmail.com" value="<?= $userAccount->email ?>">
        <?php if (isset($errors['email'])) { ?>
            <p><?= $errors['email'] ?></p>
        <?php } ?>

        
        <label for="birthdate">Date de naissance</label>
        <input type="date" name="birthdate" id="birthdate" value="<?= $userAccount->birthdate ?>">
        <?php if (isset($errors['birthdate'])) { ?>
            <p><?= $errors['birthdate'] ?></p>
        <?php } ?>

        <input type="submit" value="Modifier" name="updateInfos">
    </form>
</div>

<?php if (isset($errors['updatePassword'])) { ?>
    <p><?= $errors['updatePassword'] ?></p>
<?php } ?>

<div class="formContainer">
    
    <form action="/mon-compte" method="POST">
        <h2>Modifier mon mot de passe</h2>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" placeholder="Azerty123!">
        <?php if (isset($errors['password'])) { ?>
            <p><?= $errors['password'] ?></p>
        <?php } ?>

        <label for="password_confirm">Confirmation du mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!">
        <?php if (isset($errors['password_confirm'])) { ?>
            <p><?= $errors['password_confirm'] ?></p>
        <?php } ?>
        <input type="submit" value="Modifier" name="updatePassword">

    </form>
</div>
    </div>
    </div>
</section>