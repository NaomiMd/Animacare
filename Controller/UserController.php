<?php
require_once _ROOT_ . '/Entity/User.php';

class UserController
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost;dbname=animacare;charset=utf8mb4', 'root', 'root');
        } catch(Exception $e) {
            echo('Erreur :' .$e->getMessage());
        }
    }
    
    public function getPdo()
    {
        return $this->pdo;
    }
    public function setPdo(PDO $pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }
    public function getAll():array
    {
        $users = [];
        $req = $this->pdo->query("SELECT * FROM `user`");
        $data = $req->fetchAll();
        foreach($data as $user)
        {
            $users[] = new User($user);
        }
        return $users;
    }
    public function getById($id): User
    {
        $req = $this->pdo->prepare("SELECT * FROM `user` WHERE id=:id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $user = new User($data);
        return $user;
    }
    public function createUser(User $newUser)
    {
        $req = $this->pdo->prepare("INSERT INTO `user` (fname, lname, email, password, phone_number, role) VALUES (:fname, :lname, :email, :password, :phone_number,:role)");
        $role = "user";
        $passwordHash = password_hash($newUser->getPassword(), PASSWORD_BCRYPT);
        $req->bindValue(":fname", $newUser->getFname(), PDO::PARAM_STR);
        $req->bindValue(":lname", $newUser->getLname(), PDO::PARAM_STR);
        $req->bindValue(":email", $newUser->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password",$passwordHash, PDO::PARAM_STR);
        $req->bindValue(":phone_number", $newUser->getPhone_number(), PDO::PARAM_STR);
        $req->bindValue(':role',$role, PDO::PARAM_STR);
        $req->execute();
    }
    public function updateUser(User $user)
    {
        $req = $this->pdo->prepare("UPDATE `user` SET email=:email, password=:password, phone_number=:phone_number WHERE id=:id");
        $req->bindValue(":id", $user->getId(), PDO::PARAM_INT);
        $req->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $passwordHash = password_hash($user->getPassword(), PASSWORD_BCRYPT);
        $req->bindValue(":password",$passwordHash, PDO::PARAM_STR);
        $req->bindValue(":phone_number", $user->getPhone_number(), PDO::PARAM_STR);
        $req->execute();
    }
    
    public function verifyUserLogin(string $email, string $password)
    {
        $req = $this->pdo->prepare("SELECT * FROM `user` WHERE email=:email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();
        $user = $req->fetch();
        if($user && password_verify($password, $user['password']))
        {
            return $user;
        }else{
            return false;
        }
    }

    public function verifyIfEmailExist(string $email)
    {
        $req = $this->pdo->prepare("SELECT COUNT(*) AS count FROM `user` WHERE email=:email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();

        $result = $req->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];
        if($count > 0)
        {
            return true;
        }else{
            return false;
        }

    }

    public function UpdateUserInformationProfil(User $updateInformationUser)
    {
        $req = $this->pdo->prepare("UPDATE `user` SET phone_number=:phone_number, password=:password WHERE id=:id");
        $req->bindValue(":phone_number", $updateInformationUser->getPhone_number(), PDO::PARAM_STR);
        $passwordHash = password_hash($updateInformationUser->getPassword(), PASSWORD_BCRYPT);
        $req->bindValue(":password",$passwordHash, PDO::PARAM_STR);
        $req->bindValue(":id", $updateInformationUser->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function getUserAndAnimalInformation(User $userAnimal)
    {
        $req = $this->pdo->prepare("SELECT u.*, a.*, s.name as species_name FROM user u LEFT JOIN animal a ON u.id = a.user LEFT JOIN species s ON a.species = s.id WHERE u.id = :id");
        $req->bindValue(":id", $userAnimal->getId(), PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
    public function getAllAnimalFromUser(User $userAnimal)
    {
        $req = $this->pdo->prepare("SELECT u.*, a.*, s.name as species_name FROM user u LEFT JOIN animal a ON u.id = a.user LEFT JOIN species s ON a.species = s.id WHERE u.id = :id");
        $req->bindValue(":id", $userAnimal->getId(), PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
    public function getAppointment(User $userAppointment)
    {
        $req = $this->pdo->prepare("SELECT u.*, a.*, an.*, s.name as species_name, t.name as appointment_type_name FROM user u LEFT JOIN appointment a ON u.id = a.user LEFT JOIN animal an ON u.id = an.user LEFT JOIN species s ON an.species = s.id LEFT JOIN appointment_type t ON a.appointment_type = t.id WHERE u.id = :id");
        $req->bindValue(":id", $userAppointment->getId(), PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll();
        return $result;
    }
    public function getIdOfAppointmentUser(User $userAppointment)
    {
        $req = $this->pdo->prepare("SELECT u.*, a.* FROM user u LEFT JOIN appointment a ON u.id = a.user WHERE u.id = :id");
        $req->bindValue(":id", $userAppointment->getId(), PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
        return $result;
    }
}