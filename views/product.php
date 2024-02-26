<!-- Titre du produit -->
<h1 class="text-white text-center"> <?php echo $productDetails->name; ?></h1>

<!-- Prix du produit -->
<p class="text-white text-center fs-3"><?php echo $productDetails->price; ?></p>

        <div class="container">
            <!-- organiser le contenu en colonnes -->
            <div class="row justify-content-between">
                <!-- Première colonne -->
                <div class="col-6">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" src="assets/img/products/<?php echo $productDetails->image; ?>" alt="Card image cap">
                    </div>
                </div>
                <div class="col-6">

                    <hr>
                    <label for="size" class="text-white" >Choisissez votre taille</label>
                    <select name="size" id="size" class="form-control">
                        <!-- sélection de taille -->
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    </select>
                    <p>
                        <a href="#" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart text-white"></i> Ajouter au Panier</a>
                    </p>

                </div>
            </div>
        </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3><strong>Nous vous conseillons :</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="assets/img/products/shoes/1/nike1.webp" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="assets/img/products/shoes/1/nike2.webp" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="assets/img/products/shoes/1/nike3.webp" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

