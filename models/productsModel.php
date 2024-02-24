<?php
class Products
{
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
        // Requête SQL d'insertion sécurisée avec des paramètres de liaison
        $sql = 'INSERT INTO `H743w_products` (`name`,`price`,`image`,`id_categories`,`id_brands`) 
    VALUES (:name, :price, :image, :id_categories , :id_brands)'; // une chaîne de requête SQL 
        $req = $this->pdo->prepare($sql); //c'est pour  prépare la requête SQL en utilisant la méthode prepare
        /*
    Ces lignes font en sorte que les valeurs soient insérées dans la base de données de manière sécurisée, 
    sans risque d'injection.
    ($req->bindValue) C'est une méthode qui associe une valeur à un paramètre de requête.
    (PDO::PARAM_STR , PDO::PARAM_INT )
    assure que la base de données comprendra correctement, 
    le type de données et pourra les traiter en conséquence
    (return $req->execute())cette ligne exécute la requête SQL, true ,false
        */
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':price', $this->price, PDO::PARAM_STR);
        $req->bindValue(':image', $this->image, PDO::PARAM_STR);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        return $req->execute();// La méthode execute() exécute la requête préparée avec les valeurs associées
    }

    
    //recupere lensemble des produits
    public function getList()
    {
         // Requête SQL pour récupérer les produits avec leurs catégories et marques associées
        $sql = 'SELECT `p`.`id`,`p`.name, price,image, id_categories, `c`.`name` AS `category`, `b`.`name` AS `brand`
    FROM `H743w_products` AS `p`
    INNER JOIN `H743w_categories` AS `c` ON `c`.`id` = `p`. `id_categories`
    INNER JOIN `H743w_brands` AS `b` ON `b`.`id` = `p`.`id_brands`';
    // Exécution de la requête SQL
        $req = $this->pdo->query($sql);
        // Récupération de tous les résultats sous forme d'objets
    // La méthode fetchAll(PDO::FETCH_OBJ) renvoie tous les résultats sous forme d'objets
        return $req->fetchAll(PDO::FETCH_OBJ);
    }


    //recupere produit par son id
    public function getProductById()
    {
        // Requête SQL pour sélectionner un produit en fonction de son identifiant
        $sql = 'SELECT id,name,price,id_categories,image FROM `H743w_products` WHERE id = :id';
        // Préparation de la requête SQL
        $req = $this->pdo->prepare($sql);
        // Liaison de la valeur de l'identifiant aux paramètres de la requête
    // Utilisation de paramètres de liaison pour éviter les injections SQL
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Exécution de la requête SQL préparée
        $req->execute();
            // Récupération du résultat sous forme d'objet
    // La méthode fetch() récupère la première ligne du résultat de la requête
    // Elle renvoie un objet contenant les données du produit

        return $req->fetch(PDO::FETCH_OBJ);
    }


    //verifie larticle existe dans la base
    public function checkIfExistsById()
    {
        // Requête SQL pour compter le nombre d'occurrences de l'identifiant dans la table
        $sql = 'SELECT COUNT(*) FROM `H743w_products` WHERE id = :id';
        // Préparation de la requête SQL
        $req = $this->pdo->prepare($sql);
        // Liaison de la valeur de l'identifiant aux paramètres de la requête
    // Utilisation de paramètres de liaison pour éviter les injections SQL
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Exécution de la requête SQL préparée
        $req->execute();
        // Récupération du résultat sous forme de colonne unique (un seul résultat)
    // La méthode fetch(PDO::FETCH_COLUMN) renvoie la valeur de la première colonne du résultat
    // Dans ce cas, le résultat sera un nombre représentant le nombre d'occurrences de l'identifiant
        return $req->fetch(PDO::FETCH_COLUMN);
    }


// Met à jour les produits dans la base de données
    public function updateProducts()
    {
        // Requête SQL pour mettre à jour les données du produit
        $sql = 'UPDATE H743w_products SET name = :name, price = :price, id_categories = :id_categories , id_brands = :id_brands  WHERE id = :id';
        // Préparation de la requête SQL
        $req = $this->pdo->prepare($sql);
        // Liaison des valeurs aux paramètres de la requête
    // Chaque valeur est associée à un paramètre nommé dans la requête SQL pour éviter les injections SQL
        $req->bindValue(':name', $this->name, PDO::PARAM_STR);
        $req->bindValue(':price', $this->price, PDO::PARAM_INT);
        $req->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $req->bindValue(':id_brands', $this->id_brands, PDO::PARAM_INT);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Exécution de la requête SQL préparée
    // La méthode execute() exécute la requête préparée avec les valeurs associées
    // Elle renvoie true si l'opération de mise à jour a réussi, sinon false
        return $req->execute();
    }

    // Supprime un produit de la base de données
    public function deleteProducts()
    {
        // Requête SQL pour supprimer un produit en fonction de son identifiant
        $sql = 'DELETE FROM H743w_products WHERE id = :id';
         // Préparation de la requête SQL
        $req = $this->pdo->prepare($sql);
        // Liaison de la valeur de l'identifiant aux paramètres de la requête
    // Utilisation de paramètres de liaison pour éviter les injections SQL
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        // Exécution de la requête SQL préparée
    // La méthode execute() exécute la requête préparée avec les valeurs associées
    // Elle renvoie true si l'opération de suppression a réussi, sinon false
        return $req->execute();
    }



}