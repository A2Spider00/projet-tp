<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="boxshadow">
                    <p class="fs-5"><strong>MON COMPTE</strong></p>
                    <a href="/mon-compte" class="lelieninfo">
                        <p class="mesinformation"><strong>Mes information personnelles</strong></p>
                    </a>
                    <a href="/users">
                        <p class="mesinformation"><strong>Supprimer votre compte</strong></p>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <h1>Modifier mon compte</h1>
                <?php if (isset($success)) { ?>
                    <p>
                        <?= $success ?>
                    </p>
                <?php } ?>
                <?php if (isset($errors['updateAccount'])) { ?>
                    <p>
                        <?= $errors['updateAccount'] ?>
                    </p>
                <?php } ?>
                <div class="formContainer">

                    <form action="/users" method="POST">
                        <label for="firstname">First Name:</label><br>
                        <input type="text" id="firstname" name="firstname" required
                            placeholder="<?= $userAccount->firstname ?>">
                        <?php if (isset($errors['firstname'])) { ?>
                            <p>
                                <?= $errors['firstname'] ?>
                            </p>
                        <?php } ?>
                        <br>

                        <label for="lastname">Last Name:</label><br>
                        <input type="text" id="lastname" name="lastname" required
                            placeholder="<?= $userAccount->lastname ?>">
                        <?php if (isset($errors['lastname'])) { ?>
                            <p>
                                <?= $errors['lastname'] ?>
                            </p>
                        <?php } ?>
                        <br>

                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" required placeholder="<?= $userAccount->email ?>">
                        <?php if (isset($errors['email'])) { ?>
                            <p>
                                <?= $errors['email'] ?>
                            </p>
                        <?php } ?>
                        <br>

                        <label for="birthdate">Birthdate:</label><br>
                        <input type="date" id="birthdate" name="birthdate" required
                            placeholder="<?= $userAccount->birthdate ?>">
                        <?php if (isset($errors['birthdate'])) { ?>
                            <p>
                                <?= $errors['birthdate'] ?>
                            </p>
                        <?php } ?>
                        <br><br>

                        <input type="submit" name="updateInfos" value="Update Information">
                    </form>

                </div>


                <?php if (isset($errors['updatePassword'])) { ?>
                    <p>
                        <?= $errors['updatePassword'] ?>
                    </p>
                <?php } ?>

                <div class="formContainer">

                    <form action="/mon-compte" method="POST">
                        <h2>Modifier mon mot de passe</h2>

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
                        <input type="submit" value="Modifier" name="updatePassword">

                    </form>
                </div>
            </div>
        </div>
</section>