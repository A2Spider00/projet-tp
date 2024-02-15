<?php
class Products {
public int $id;
public string $name;
public int $price;
public int $id_categories;
public int $id_brands;
private PDO $pdo;


public function __construct()
{
    /*jai utiliser root juste pour le developement de mon projet sinon cava changer en fonction des utilisateurs*/
    try {
        $this->pdo = new PDO('mysql:host=localhost;dbname=A2Spider;charset=utf8', 'root', '');

    } catch (PDOException $e) {
        header('location: /index.php');
    }

}
public function create()
{
        $sql = 'INSERT INTO `H743w_products` (`name`,`price`,`id_categories`,`id_brands`) 
    VALUES (:name, :price, :id_categories , :id_brands)'; 
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':price', $this->price, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $req->execute();
}

public function getList(){
    $sql = 'SELECT id,name,price,id_categories FROM `H743w_products`';
    $req = $this->pdo->query($sql);
    return $req->fetchAll(PDO::FETCH_OBJ);
}



public function getProductById() {
    $sql = 'SELECT id,name,price,id_categories FROM `H743w_products` WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_OBJ);
}



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
    $req->bindValue(':categories', $this->id_categories, PDO::PARAM_INT);
    $req->bindValue(':brands', $this->id_brands, PDO::PARAM_INT);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $req->execute();

}

public function deleteProducts()
{
    $sql =  'DELETE FROM H743w_products WHERE id = :id';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':id', $this->id, PDO::PARAM_INT);
    return $req->execute();
}



}