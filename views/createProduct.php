<div class="bgcoloree"> <!-- pour mettre colorbg-->
    <div class="container"> 
    <div class="row"> <!--organiser le contenu en lignes-->

            <h2 class=" producth2 text-white text-center mt-2"><strong>Products</strong></h2>
            <?php if (isset($success)) { ?> <!--affiche un message de succès si une variable $success est définie-->
                <p class="text-primary text-center mt-3">
                    <?= $success ?>
                </p>
            <?php } ?>
                <!--en utilisant la méthode POST j'envoie les données à la page /creer-produit -->
                <form action="/creer-produit" method="POST" enctype="multipart/form-data"><!--j'ai utiliser enctype pour permettre l'envoi de fichiers-->
                    <div class="text-white mt-5 text-center">
                        <label for="name">NOM</label>
                        <input type="text" name="name" class="mt-5" id="name">
                        <?php if (isset($errors['name'])) { ?> <!-- c'est pour verifier une erreur est présente dans le champ de name-->
                            <p class="errorsMessage text-danger">
                                <?= $errors['name'] ?> <!-- afficher le message d'erreur -->
                            </p>
                        <?php } ?>
                    </div>
                    <div class="text-white mt-4 text-center">
                        <label for="price">Prix :</label>
                        <input type="number" name="price" class="mt-3" id="price">
                        <?php if (isset($errors['price'])) { ?> <!-- c'est pour verifier un message d'erreur si une erreur est présente dans le champ de price-->
                            <p class="errorsMessage text-danger">
                                <?= $errors['price'] ?> <!--afficher le message d'erreur -->
                            </p>
                        <?php } ?>
                    </div>
                    <div class="mt-5 text-center">
                        <input type="file" name="image" id="image">
                        <?php if (isset($errors['image'])) { ?> <!-- c'est pour verifier un message d'erreur si une erreur est présente dans le champ de l'image-->
                            <p class="errorsMessage text-danger">
                                <?= $errors['image'] ?> <!-- afficher le message d'erreur -->
                            </p>
                        <?php } ?>
                    </div>

                    <!--pour getList() --> 
                    <div class="mt-4 text-center">
                        <select name="categories" class="mt-4 center" id=""> <!-- pour sélectionner la catégorie  du produit -->
                            <?php foreach ($categoriesList as $c) { ?>
                                <option value="<?= $c->id ?>">
                                    <?= $c->name ?> <!-- afficher le nom de la categorie-->
                                </option>
                            <?php } ?>
                        </select>
                        <select name="brands" id=""><!--une liste déroulante pour sélectionner la marque du produit-->
                            <?php foreach ($brandsList as $b) { ?>
                                <option value="<?= $b->id ?>">
                                    <?= $b->name ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                    <input type="submit" class="mt-5" value="Créer"> <!--un bouton de soumission pour envoyer le formulaire. Une fois cliqué, les données saisies dans le formulaire seront envoyées à la page /creer-produit-->
                </div>
                </form>
            </div>
    </div>
    </div>