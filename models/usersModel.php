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
    public int $id;
    private $pdo;
    public string $firstname;
    public string $lastname;
    public string $birthdate;
    public string $email;
    public string $password;
    public int $id_roles;

    public function __construct()
    {
        /*jai utiliser root juste pour le developement de mon projet sinon cava changer en fonction des utilisateurs*/
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=A2Spider;charset=utf8', 'root', '');

        } catch (PDOException $e) {
            header('location: /index.php');
        }

    }
    // checkIfExistsByEmail vérifier si email existe déja dans la BD
    // (COUNT)pour compter le nombre de fois que l'adresse e-mail apparaît dans la table
    //  j'ai utiliser (bindvalue) pour éviter les attaques par injection SQL
    // envoie le nombre d'occurrences de l'adresse e-mail spécifiée dans la base de données
    public function checkIfExistsByEmail() 
    {
        $sql = 'SELECT COUNT(`email`) FROM `H743w_users` WHERE `email` = :email'; // pour compter le nombre de fois que l'adresse e-mail apparaît dans la table
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->execute();
        return $req->fetch(PDO::FETCH_COLUMN);
    }

    public function create()
    {
        $sql = 'INSERT INTO `H743w_users` (`firstname`,`lastname`,`email`,`password`,`birthdate`,`id_roles`) 
    VALUES (:firstname,:lastname,:email,:password,:birthdate,1)';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':password', $this->password, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        return $req->execute();
    }

    public function getByEmail()
    {
    $sql = 'SELECT `id`,`firstname`,`email`,`id_roles` FROM `H743w_users`WHERE`H743w_users`.`email`= :email';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_ASSOC);
    }

public function getPassword()
{
    $sql = 'SELECT `password` FROM `H743w_users` WHERE `email` = :email';
    $req = $this->pdo->prepare($sql);
    $req->bindValue(':email', $this->email, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch(PDO::FETCH_COLUMN);
}




    public function delete()
    {
        $sql = 'DELETE FROM `H743w_users` WHERE `id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }

    public function getById()
    {
        $sql = 'SELECT `firstname`,`lastname`,`email`, DATE_FORMAT(`birthdate`, "%d/%m/%Y") AS `birthdateFr`, `birthdate`, `name` AS `roleName` FROM `H743w_users` INNER JOIN `H743w_roles` ON `id_roles` = `H743w_roles`.`id` WHERE`H743w_users`.`id` = :id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetch(PDO::PARAM_INT);
    }

    public function getList()
    {

    }

    public function update()
    {
        $sql = 'UPDATE `H743w_users` SET `firstname` = :firstname, `lastname` = :lastname, `birthdate` = :birthdate, `email` = :email WHERE `id`=:id';
        $req = $this->pdo->prepare($sql);
        $req->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $req->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $req->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $req->bindValue(':email', $this->email, PDO::PARAM_STR);
        $req->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $req->execute();
    }
}
