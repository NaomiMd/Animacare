<?php
require_once _ROOT_ . '/Entity/Admin.php';

class AdminController
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=animacare;charset=utf8mb4', 'root', 'root');
        }catch(Exception $e){
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

    public function getAll(): array
    {
        $admins = [];
        $req = $this->pdo->query("SELECT * FROM `administrator`");
        $data = $req->fetchAll();
        foreach($data as $admin)
        {
            $admins[] = new Admin($admin);
        }
        return $admins;
    }

    public function getById($id): Admin
    {
        $req = $this->pdo->prepare("SELECT * FROM `administrator` WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $admin = new Admin($data);
        return $admin;
    }

    public function createAdmin(Admin $newAdmin)
    {
        $req = $this->pdo->prepare("INSERT INTO `administrator` (email, password, role) VALUES (:email, :password, :role)");
        $passwordHash = password_hash($newAdmin->getPassword(), PASSWORD_BCRYPT);
        $role = "admin";
        $req->bindValue(":email", $newAdmin->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $passwordHash, PDO::PARAM_STR);
        $req->bindValue(":role", $role, PDO::PARAM_STR);
        $req->execute();
    }

    public function verifyAdminLogin(string $email, string $password)
    {
        $req = $this->pdo->prepare("SELECT * FROM `administrator` WHERE email=:email");
        $req->bindParam(":email", $email, PDO::PARAM_STR);
        $req->execute();
        $admin = $req->fetch();
        if($admin && password_verify($password, $admin['password']))
        {
            return $admin;
        }else{
            return false;
        }
    }

}