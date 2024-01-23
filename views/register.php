<div class="row">
    <div class="col-6">
<div class="bgimageregister"></div>
    </div>


    <div class="col-6">
        <h1 class="inscription text-center text-white mt-5">Inscription</h1>
        <?php if (isset($success)) { ?>
            <p>
                <?= $success ?>
            </p>
        <?php } ?>
        <form action="/register" method="post">
            <div>
                <label for="firstname">firstmail</label>
                <input type="firstname" name="firstname" id="firstname" placeholder="Ali" class="w-100">
                <?php if (isset($errors['firstname'])) { ?>
                    <p>
                        <?= $errors['firstname'] ?>
                    </p>
                <?php } ?>
            </div>
            <div>
                <label for="lastname">lastname</label>
                <input type="text" name="lastname" id="lastname" placeholder="ebrahimi">
                <?php if (isset($errors['ebrahimi'])) { ?>
                    <p>
                        <?= $errors['ebrahimi'] ?>
                    </p>
                <?php } ?>
            </div>
            <label for="email">email</label>
            <input type="email" name="email" id="email" placeholder="ali12345@gmail.com!">
            <?php if (isset($errors['email'])) { ?>
                <p>
                    <?= $errors['email'] ?>
                </p>
            <?php } ?>


            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Azerty123!">
            <?php if (isset($errors['password'])) { ?>
                <p>
                    <?= $errors['password'] ?>
                </p>
            <?php } ?>

            <label for="password_confirm">Confirmation du mot de passe</label>
            <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!">
            <?php if (isset($errors['password_confirm'])) { ?>
                <p>
                    <?= $errors['password_confirm'] ?>
                </p>
            <?php } ?>

            <label for="birthdate">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate">
            <?php if (isset($errors['birthdate'])) { ?>
                <p>
                    <?= $errors['birthdate'] ?>
                </p>
            <?php } ?>

            <input type="submit" value="S'inscrire">
        </form>
    </div>
</div>