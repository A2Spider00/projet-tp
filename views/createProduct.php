<div class="bgproducts"></div>
<h2 class="text-white text-center mt-2"><strong>Products</strong></h2>
<div class="shadowcreate">
<form action="/creer-produit" method="POST">
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price">
    </div>
    <div>
        <select name="categories" id="">
            <option value="1">shoes</option>
            <option value="2">clothes</option>
        </select>
    </div>
    <input type="submit" value="Créer">

</form>
</div>