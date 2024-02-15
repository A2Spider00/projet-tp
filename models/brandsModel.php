<?php

class brands {
    public int $id;
    public string $name;
    private $pdo;




    public function __construct()
    {
        /*jai utiliser root juste pour le developement de mon projet sinon cava changer en fonction des utilisateurs*/
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=A2Spider;charset=utf8', 'root', '');

        } catch (PDOException $e) {
            header('location: /index.php');
        }

    }


public function checkIfExistsById() {
    $sql = 'SELECT COUNT(*) FROM `H743w_brands` WHERE id = :id';
    $req =  $this->pdo->prepare($sql);
    $req->bindValue(':id',$this->id,PDO::PARAM_INT);
    $req->execute();
    return $req->fetch(PDO::FETCH_COLUMN);

}



public function getList() {
    $sql = 'SELECT * FROM H743w_brands';
    $req = $this->pdo->query($sql);
    return $req->fetchAll(PDO::FETCH_OBJ);
}









}