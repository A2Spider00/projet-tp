<!--background image-->
<div class="container">
    <div class="row">
        <div class="col">
            <div class="bgimage"></div>
        </div>
        <div class="col">
            <h1 class="h11111 text-white text-center"><strong>VOUS AVEZ DEJA UN COMPTE</strong></h1>
            <form action="#" method="POST">
                <div>
                    <label class="text-white mt-4" for="email"><strong>Adresse mail</strong></label>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="jean.dupont@mail.fr" class="w-100" 
                        value="<?= @$_COOKIE['email'] ?>">
                    <?php if (isset($errors['email'])) { ?>
                        <p class="errorsMessage">
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
                    <p class="errorsMessage">
                        <?= $errors['password'] ?>
                    </p>
                <?php } ?>
            </div>
                <div class="text-white">
                    <input type="checkbox" name="remember" id="remember"><label class="mt-2" for="remember">Se souvenir de
                        moi</label>
                </div>
                <input type="submit" class="mt-5" value="Se connecter">
            </form>
            <div class="or-separator">
    <hr>
    <p>ou</p>
</div>
        </div>
    </div>
</div>
<a href="/register">
    <button>cree un compte</button>
</a>
