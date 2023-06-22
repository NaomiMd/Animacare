<?php
require_once _ROOT_ . '/Entity/AppointmentType.php';

class AppointmentTypeController
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

    public function getAll(): array
    {
        $appointment_types = [];
        $req = $this->pdo->query("SELECT * FROM `appointment_type`");
        $data = $req->fetchAll();
        foreach($data as $appointment_type)
        {
            $appointment_types[] = new AppointmentType($appointment_type);
        }
        return $appointment_types;
    }
    public function getById($id): AppointmentType
    {
        $req = $this->pdo->prepare("SELECT * FROM `appointment_type` WHERE id=:id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $appointment_type = new AppointmentType($data);
        return $appointment_type;
    }
}