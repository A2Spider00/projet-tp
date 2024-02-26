<!-- j'ai créé une nouvelle classe appelée users-->
<!-- Déclare une propriété publique $id qui représente l'identifiant de l'utilisateur-->
<!-- Déclare une propriété private $pdo qui sera utiliser pour connexion a la base de données-->
<!-- Déclare une propriété publique $firstname qui représente le prénom de l'utilisateur-->
<!-- Déclare une propriété publique $lastname qui représente le nom de famille de l'utilisateur-->
<!-- Déclare une propriété publique $birthdate qui représente la date de naissance de l'utilisateur-->
<!-- Déclare une propriété publique $email qui représente l'adresse e-mail de l'utilisateur-->
<!-- Déclare une propriété publique $password qui représente le mot de passe de l'utilisateur -->
<!-- Déclare une propriété publique $id_roles qui représente le rôle de l'utilisateur -->

<?php
class Users 
{
    // Propriétés de la classe
    public int $id;
    private $pdo;
    public string $firstname;
    public string $lastname;
    public string $birthdate;
    public string $email;
    public string $password;
    public int $id_roles;





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



    





    // checkIfExistsByEmail vérifier si email existe déja dans la BD
    // (COUNT)pour compter le nombre de fois que l'adresse e-mail apparaît dans la table
    //  j'ai utiliser (bindvalue) pour éviter les attaques par injection SQL
    // envoie le nombre d'occurrences de l'adresse e-mail spécifiée dans la base de données
    
    // Méthode pour vérifier si l'email de l'utilisateur existe déjà dans la base de données
    public function checkIfExistsByEmail() 
    {
        $sql = 'SELECT COUNT(`email`) FROM `H743w_users` WHERE `email` = :email'; // pour compter le nombre de fois que l'adresse e-mail apparaît dans la table
        $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
        $req->bindValue(':email', $this->email, PDO::PARAM_STR); // Liaison de la valeur de l'email avec le paramètre de la requête
        $req->execute(); // Exécution de la requête
        return $req->fetch(PDO::FETCH_COLUMN); // Récupération du résultat sous forme d'un entier
    }

    // Méthode pour créer un nouvel utilisateur dans la base de données
    public function create()
    {
        $sql = 'INSERT INTO `H743w_users` (`firstname`,`lastname`,`email`,`password`,`birthdate`,`id_roles`) 
    VALUES (:firstname,:lastname,:email,:password,:birthdate,1)';  // Requête SQL pour insérer un nouvel utilisateur
        $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR); // Liaison des valeurs avec les paramètres de la requête
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $req->execute(); // Exécution de la requête
    }

    // Méthode pour récupérer les informations de l'utilisateur par son email
    public function getByEmail()
    {
    $sql = 'SELECT `id`,`firstname`,`email`,`id_roles` FROM `H743w_users`WHERE`H743w_users`.`email`= :email';// Requête SQL pour sélectionner les informations de l'utilisateur par email
    $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
    $req->bindValue(':email', $this->email, PDO::PARAM_STR); // Liaison de la valeur de l'email avec le paramètre de la requête
    $req->execute(); // Exécution de la requête
    return $req->fetch(PDO::FETCH_ASSOC); // Récupération du résultat sous forme d'un tableau associatif
    }

    // Méthode pour récupérer le mot de passe de l'utilisateur par son email
public function getPassword()
{
    $sql = 'SELECT `password` FROM `H743w_users` WHERE `email` = :email'; // Requête SQL pour sélectionner le mot de passe de l'utilisateur par email
    $req = $this->pdo->prepare($sql);  // Préparation de la requête SQL
    $req->bindValue(':email', $this->email, PDO::PARAM_STR); // Liaison de la valeur de l'email avec le paramètre de la requête
    $req->execute(); // Exécution de la requête
    return $req->fetch(PDO::FETCH_COLUMN);  // Récupération du résultat sous forme d'une seule colonne (le mot de passe)
}



 // Méthode pour supprimer un utilisateur de la base de données par son ID
    public function delete()
    {
        $sql = 'DELETE FROM `H743w_users` WHERE `id` = :id'; // Requête SQL pour supprimer un utilisateur par son ID
        $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
        $req->bindValue(':id', $this->id, PDO::PARAM_INT); // Liaison de la valeur de l'ID avec le paramètre de la requête
        return $req->execute(); // Exécution de la requête
    }

    // Méthode pour récupérer les informations de l'utilisateur par son ID
    public function getById()
    {
        $sql = 'SELECT `firstname`,`lastname`,`email`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdateFr`, `birthdate`, `name` AS `roleName` FROM `H743w_users` INNER JOIN `H743w_roles` ON `id_roles` = `H743w_roles`.`id` WHERE`H743w_users`.`id` = :id'; // Requête SQL pour sélectionner les informations de l'utilisateur par son ID
        $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
        $req->bindValue(':id', $this->id, PDO::PARAM_INT); // Liaison de la valeur de l'ID avec le paramètre de la requête
        $req->execute();  // Exécution de la requête
        return $req->fetch(PDO::PARAM_INT); // Récupération du résultat sous forme d'un tableau associatif
    }

     // Méthode pour mettre à jour les informations de l'utilisateur dans la base de données
    public function update()
    {
        $sql = 'UPDATE `H743w_users` SET `firstname` = :firstname, `lastname` = :lastname, `birthdate` = :birthdate, `email` = :email WHERE `id`=:id'; // Requête SQL pour mettre à jour les informations de l'utilisateur par son ID
        $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR); // Liaison des valeurs avec les paramètres de la requête
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    // Méthode pour mettre à jour le mot de passe de l'utilisateur dans la base de données

public function updatePassword()
{
    $sql = 'UPDATE `H743w_users` SET password = :password WHERE id = :id';// Requête SQL pour mettre à jour le mot de passe de l'utilisateur par son ID
    $req = $this->pdo->prepare($sql); // Préparation de la requête SQL
    $req->bindValue(':password', $this->password, PDO::PARAM_STR); // Liaison de la valeur du nouveau mot de passe avec le paramètre de la requête
    $req->bindValue(':id', $this->id, PDO::PARAM_INT); // Liaison de l'ID de l'utilisateur avec le paramètre de la requête
    return $req->execute(); // Exécution de la requête

}

}