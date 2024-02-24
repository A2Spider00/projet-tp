<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="bgimageregister"></div> <!--pour mettre une image  de fond à gauche-->
        </div>


        <div class="col-6">
            <h1 class="inscription text-center text-white mt-5">Inscription</h1>
            <?php if (isset($success)) { ?>
                <p>
                    <?= $success ?>
                </p>
            <?php } ?>
            <form action="/inscription" method="post">
                <div class="text-white text-center mt-4">
                    <!-- c'est pour afficher un message d'erreur associé au champ (firstname)(lastname)(email)(password)(confirmation du met de passe)(date de naissance) s'il y a des erreurs lors de la validation du formulaire Le même schéma est utilisé pour le champ de mot de passe -->
                    <label for="firstname">firstname</label>
                    <input type="firstname" name="firstname" id="firstname" placeholder="Ali" class="w-100">
                    <?php if (isset($errors['firstname'])) { ?>
                        <p class="text-danger">
                            <?= $errors['firstname'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white text-center mt-3">
                    <label for="lastname">lastname</label>
                    <input type="text" name="lastname" id="lastname" placeholder="ebrahimi" class="w-100">
                    <?php if (isset($errors['ebrahimi'])) { ?>
                        <p>
                            <?= $errors['ebrahimi'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white text-center mt-3">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" placeholder="ali12345@gmail.com!" class="w-100">
                    <?php if (isset($errors['email'])) { ?>
                        <p class="text-danger">
                            <?= $errors['email'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white text-center mt-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" placeholder="Azerty123!" class="w-100">
                    <?php if (isset($errors['password'])) { ?>
                        <p class="text-danger">
                            <?= $errors['password'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white text-center mt-3">
                    <label for="password_confirm">Confirmation du mot de passe</label>
                    <input type="password" name="password_confirm" id="password_confirm" placeholder="Azerty123!"
                        class="w-100">
                    <?php if (isset($errors['password'])) { ?>
                        <p class="text-danger">
                            <?= $errors['password'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white text-center mt-3">
                    <label for="birthdate">Date de naissance</label>
                    <input type="date" name="birthdate" id="birthdate" class="w-100">
                    <?php if (isset($errors['birthdate'])) { ?>
                        <p class="text-danger">
                            <?= $errors['birthdate'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-center">
                <input type="submit" class="mt-3 ml-3 " value="S'inscrire" class="w-50 ">
            </div>
            </form>
        </div>
    </div>
</div>