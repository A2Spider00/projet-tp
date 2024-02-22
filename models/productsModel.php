<?php
class Products {
    //déclaration des attributs
public int $id;
public string $name;
public int $price;
public int $id_categories;
public string $image;
public int $id_brands;
private PDO $pdo;


public function __construct()
{
    /*Normalement, lorsqu'un utilisateur crée un mot de passe sur macOS, cela ne fonctionne pas. Quand je crée un utilisateur, il disparaît.*/
    try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=A2Spider;charset=utf8', 'root', '');

    } catch (PDOException $e) {
        header('location: /index.php');
    }

}
public function create()
{
        $sql = 'INSERT INTO `H743w_products` (`name`,`price`,`image`,`id_categories`,`id_brands`) 
    VALUES (:name, :price, :image, :id_categories , :id_brands)'; 
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':price', $this->price, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $req->execute();
}
//recupere lensemble des produits
public function getList(){
    $sql = 'SELECT `p`.`id`,`p`.name, price,image, id_categories, `c`.`name` AS `category`, `b`.`name` AS `brand`
    FROM `H743w_products` AS `p`
    INNER JOIN `H743w_categories` AS `c` ON `c`.`id` = `p`. `id_categories`
    INNER JOIN `H743w_brands` AS `b` ON `b`.`id` = `p`.`id_brands`';
    $req = $this->pdo->query($sql);
    return $req->fetchAll(PDO::FETCH_OBJ);
}


//recupere produit par son id
public function getProductById() {
    $sql = 'SELECT id,name,price,id_categories,image FROM `H743w_products` WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_OBJ);
}


//verifie larticle existe dans la base
public function checkIfExistsById() {
    $sql = 'SELECT COUNT(*) FROM `H743w_products` WHERE id = :id';
    $req =  $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_COLUMN);
}



public function updateProducts () {
    $sql = 'UPDATE H743w_products SET name = :name, price = :price, id_categories = :id_categories , id_brands = :id_brands  WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':name', $this->name, PDO::PARAM_STR);
    $req->bindValue(':price', $this->price, PDO::PARAM_INT);
    $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
    $req->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $req->execute();
}

public function deleteProducts()
{
    $sql = 'DELETE FROM H743w_products WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $req->execute();
}



}