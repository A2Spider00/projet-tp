<?php
class products {
public int $id;
public string $name;
public int $price;
public int $id_categories;
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
        $sql = 'INSERT INTO `H743w_products` (`name`,`price`,`id_categories`) 
    VALUES (:name, :price, :id_categories)'; 
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':price', $this->price, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_STR);
        return $req->execute();
}









}