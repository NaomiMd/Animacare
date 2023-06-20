<?php
require_once _ROOT_ . '/Entity/Animal.php';

class AnimalController
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host=mysql;dbname=Animacare;charset=utf8mb4', 'root', 'root');
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
        $animals = [];
        $req = $this->pdo->query("SELECT * FROM `animal`");
        $data = $req->fetchAll();
        foreach($data as $animal)
        {
            $animals[] = new Animal($animal);
        }
        return $animals;
    }
    public function getById($id): Animal
    {
        $req = $this->pdo->prepare("SELECT * FROM `animal` WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $animal = new Animal($data);
        return $animal;
    }
    public function createAnimal(Animal $newAnimal)
    {
        $req = $this->pdo->prepare("INSERT INTO `animal`(name, age, sex, user, species) VALUES (:name, :age, :sex, :user, :species)");
        $req->bindValue(":name", $newAnimal->getName(), PDO::PARAM_STR);
        $req->bindValue(":age",$newAnimal->getAge(),PDO::PARAM_INT);
        $req->bindValue(":sex",$newAnimal->getSex(),PDO::PARAM_STR);
        $req->bindValue(":user", $newAnimal->getUser(), PDO::PARAM_INT);
        $req->bindValue(":species", $newAnimal->getSpecies(), PDO::PARAM_INT);
        $req->execute();
    }
    public function UpdateAnimal(Animal $animal)
    {
        $req = $this->pdo->prepare("UPDATE `animal` SET (name=:name, age=:age, sex=:sex, user=:user, species=:species) WHERE id=:id");
        $req->bindValue(":id", $animal->getId(), PDO::PARAM_INT);
        $req->bindValue(":name", $animal->getName(), PDO::PARAM_STR);
        $req->bindValue(":age",$animal->getAge(),PDO::PARAM_INT);
        $req->bindValue(":sex",$animal->getSex(),PDO::PARAM_STR);
        $req->bindValue(":user", $animal->getUser(), PDO::PARAM_INT);
        $req->bindValue(":species", $animal->getSpecies(), PDO::PARAM_INT);
        $req->execute();
    }
    public function deleteAnimal($id)
    {
        $req = $this->pdo->prepare("DELETE FROM `animal` WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

}