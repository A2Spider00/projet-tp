<?php

// Propriétés de la classe
class Categories {
    public int $id;
    public string $name;
    private $pdo;



// Constructeur de la classe
    public function __construct()
    {
        /*jai utiliser root juste pour le developement de mon projet sinon cava changer en fonction des utilisateurs*/
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=A2Spider;charset=utf8', 'root', '');

        } catch (PDOException $e) {
            header('location: /index.php'); // En cas d'erreur, redirige vers index.php
        }

    }

 // Méthode pour vérifier si une catégorie existe en fonction de son ID
public function checkIfExistsById() {
    // Requête SQL pour compter le nombre de catégories ayant l'ID spécifié
    $sql = 'SELECT COUNT(*) FROM `H743w_categories` WHERE id = :id';
    $req =  $this->pdo->prepare($sql);// Préparation de la requête SQL
    $req->bindValue(':id',$this->id,PDO::PARAM_INT); // Liaison de la valeur de l'ID avec le paramètre de la requête
    $req->execute(); // Exécution de la requête
    return $req->fetch(PDO::FETCH_COLUMN); // Récupération du résultat sous forme d'un entier

}


// Méthode pour récupérer la liste de toutes les catégories
public function getList() {
     // Requête SQL pour sélectionner toutes les colonnes de la table des catégories
    $sql = 'SELECT * FROM H743w_categories';
    $req = $this->pdo->query($sql);  // Exécution de la requête SQL
    return $req->fetchAll(PDO::FETCH_OBJ); // Récupération de tous les résultats sous forme d'objets et retour
}

}