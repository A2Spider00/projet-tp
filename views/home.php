<!-- (py-5)ajoute un espace uniforme en haut et en bas de l'élément-->
<!--j'ai fais une carte sur bootstrap avec une image, un nom de produit, une description, un prix et un bouton pour voir plus de détails sur le produit-->
<div class="album py-5 ">
    <div class="container">

        <div class="row">
<?php foreach($productsList as $p) { ?>


            <div class="col-md-4">
                <div class="card mb-4">
                    <!-- Affichage de l'image du produit -->
                    <img src="assets/img/products/<?php echo $p->image ?>" class="card-img-top img-fluid"
                        alt="Responsive image">
                    <div class="card-body">
                        <!-- Affichage de la catégorie et de la marque du produit -->
                        <span class="tag"><?php echo $p->category ?></span>
                        <span class="tag"><?php echo $p->brand ?></span>
                        <!-- Affichage du nom du produit et de sa description -->
                        <p class="card-text"><strong><i><?php echo $p->name ?></i></strong> <br>description de produit </p>
                        <!-- Affichage du prix du produit -->
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="price"><?php echo $p->price ?> €</span>
                            <!-- Affichage du prix du produit -->
                            <a href="/produit-<?php echo $p->id ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']['id_roles'] == 535) { ?>
                    <a href="/modifier-produit-<?php echo $p->id ?>">Modifier</a>
                <?php } ?>
            </div>
<?php } ?>
        </div>
    </div>
</div>