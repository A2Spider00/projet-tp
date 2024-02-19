<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="boxshadow w-75">
                    <p class="fs-5"><strong>MON COMPTE</strong></p>
                    <form action="/mon-compte" method="POST">
                        <input type="submit" name="deleteAccount" value="Supprimer">
                    </form>
            
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 text-center mt-5">
                <h1 class="text-white text-center">Modifier mon compte</h1>
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
                <div class="formContainer text-white">
                    <div class="mt-3">
                        <form action="/mon-compte" method="POST">
                            <label for="firstname">prénom:</label><br>
                            <input type="text" id="firstname" name="firstname"
                                placeholder="<?= $userAccount->firstname ?>" value="<?= $userAccount->firstname ?>">
                            <?php if (isset($errors['firstname'])) { ?>
                                <p>
                                    <?= $errors['firstname'] ?>
                                </p>
                            <?php } ?>
                    </div>
                    <div class="mt-2">
                        <label for="lastname">Nom de famille:</label><br>
                        <input type="text" id="lastname" name="lastname" placeholder="<?= $userAccount->lastname ?>" value="<?= $userAccount->lastname ?>">
                        <?php if (isset($errors['lastname'])) { ?>
                            <p>
                                <?= $errors['lastname'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="mt-2">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" placeholder="<?= $userAccount->email ?>" value="<?= $userAccount->email ?>">
                        <?php if (isset($errors['email'])) { ?>
                            <p>
                                <?= $errors['email'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="mt-2">
                        <label for="birthdate">Date de naissance:</label><br>
                        <input type="date" id="birthdate" name="birthdate" placeholder="<?= $userAccount->birthdate ?>" value="<?= $userAccount->birthdate ?>">
                        <?php if (isset($errors['birthdate'])) { ?>
                            <p>
                                <?= $errors['birthdate'] ?>
                            </p>
                        <?php } ?>
                    </div>
                    <div class="mt-4">
                        <input type="submit" name="updateInfos" value="Update Information">
                        </form>
                    </div>
                </div>


                <?php if (isset($errors['updatePassword'])) { ?>
                    <p>
                        <?= $errors['updatePassword'] ?>
                    </p>
                <?php } ?>

                <div class="formContainer">
                    <form action="/mon-compte" method="POST">
                        <br>
                        <br>
                        <h2 class="text-white">Modifier mon mot de passe</h2>

                        <label for="password" class="text-white" >Mot de passe</label>
                        <br>
                        <input type="password"  name="password" id="password">

                        <br>
                        <?php if (isset($errors['password'])) { ?>
                            <br>
                            <p>
                                <?= $errors['password'] ?>
                            </p>
                            <br>
                        <?php } ?>

                        <label for="password_confirm" class="text-white mt-1" >Confirmation du mot de passe</label>
                        <br>
                        <input type="password" name="password_confirm" id="password_confirm">
                        <?php if (isset($errors['password_confirm'])) { ?>
                            <p>
                                <?= $errors['password_confirm'] ?>
                            </p>
                        <?php } ?>
                        <br><br>
                        <input type="submit" value="Modifier" name="updatePassword">
                    </form>
                </div>
            </div>
        </div>
</section>