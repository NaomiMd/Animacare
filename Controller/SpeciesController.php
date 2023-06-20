<?php
require_once _ROOT_ . '/Entity/Species.php';

class SpeciesController
{
    
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=mysql;dbname=Animacare;charset=utf8mb4', 'root', 'root');
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
    public function getAll(): array
    {
        $species = [];
        $req = $this->pdo->query("SELECT * FROM `species`");
        $data = $req->fetchAll();
        foreach($data as $specie)
        {
            $species[] = new Species($specie);
        }
        return $species;
    }
    public function getById($id): Species
    {
        $req = $this->pdo->prepare("SELECT * FROM `species` WHERE id=:id");
        $req->bindValue(':id',$id,PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $species = new Species($data);
        return $species;
    }
}