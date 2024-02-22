<!--background image-->
<div class="container">
    <div class="row"> <!--C'est une ligne qui contient les colonnes du formulaire-->
        <div class="col">
            <div class="bgimage"></div> <!-- pour background image -->
        </div>
        <div class="col">
            <h1 class="h11111 text-white text-center"><strong>VOUS AVEZ DEJA UN COMPTE</strong></h1>
            <form action="#" method="POST">
                <div>
                    <label class="text-white mt-4" for="email"><strong>Adresse mail</strong></label>
                </div>
                <div>
                    <!--c'est pour afficher un message d'erreur associé au champ d'e-mail s'il y a des erreurs lors de la validation du formulaire Le même schéma est utilisé pour le champ de mot de passe -->
                    <input type="email" name="email" id="email" placeholder="jean.dupont@mail.fr" class="w-100"
                        value="<?= @$_COOKIE['email'] ?>">
                    <?php if (isset($errors['email'])) { ?>
                        <p class="errorsMessage text-danger">
                            <?= $errors['email'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white">
                    <label class="mt-4" for="password"><strong>Mot de passe</strong></label>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Azerty123!" class="w-100"
                        value="<?= @$_COOKIE['password'] ?>">
                    <?php if (isset($errors['password'])) { ?>
                        <p class="errorsMessage text-danger ">
                            <?= $errors['password'] ?>
                        </p>
                    <?php } ?>
                </div>
                <div class="text-white ">
                    <input type="checkbox" name="remember" id="remember"><label class="mt-2" for="remember">Se souvenir de moi</label>
                </div>
                <!--un bouton de soumission du formulaire avec le texte "Se connecter"-->
                <div class="d-flex justify-content-center align-items-center">
                    <input type="submit" class="seconnecter mt-3" value="Se connecter">
                </div>
            </form>
            <!--j'ai utilisé pour séparer visuellement le formulaire de connexion des autres éléments de la page-->
            <div class="or-separator mt-3 d-flex justify-content-center align-items-center">
            <a href="/inscription "> <!-- le lien vers la page d'inscription-->
                <button class="buttoncree "><strong>cree un compte</strong></button>
                <!-- un bouton avec le texte (créer un compte)-->
            </a>
        </div>
    </div>
</div>