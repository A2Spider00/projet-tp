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

// Méthode pour vérifier si une marque existe déjà en se basant sur son ID
public function checkIfExistsById() {
    $sql = 'SELECT COUNT(*) FROM `H743w_brands` WHERE id = :id'; // Requête SQL pour compter le nombre d'occurrences de l'ID spécifié
    $req =  $this->pdo->prepare($sql); // Préparation de la requête SQL
    $req->bindValue(':id',$this->id,PDO::PARAM_INT); // Liaison du paramètre :id avec la valeur de $this->id
    $req->execute();
    return $req->fetch(PDO::FETCH_COLUMN); // Récupération du résultat sous forme de colonne unique

}


// Méthode pour récupérer la liste de toutes les marques
public function getList() {
    $sql = 'SELECT * FROM H743w_brands'; // Requête SQL pour sélectionner toutes les marques
    $req = $this->pdo->query($sql); // Exécution de la requête SQL
    return $req->fetchAll(PDO::FETCH_OBJ); // Récupération de tous les résultats sous forme d'objets
}









}