<?php
require_once _ROOT_ . '/Entity/Employee.php';

class EmployeeController
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
        $employees = [];
        $req = $this->pdo->query("SELECT * FROM `employee`");
        $data =$req->fetchAll();
        foreach($data as $employee)
        {
            $employees[] = new Employee($employee);
        } 
        return $employees;
    }
    public function getById($id): Employee
    {
        $req = $this->pdo->prepare("SELECT * FROM `employee` WHERE id=:id");
        $req->bindParam(":id", $id, PDO::PARAM_INT);
        $data = $req->fetch();
        $employee = new Employee($data);
        return $employee;
    }
    public function createEmployee(Employee $newEmployee)
    {
        $req = $this->pdo->prepare("INSERT INTO `employee` (fname, lname, title, photo) VALUES (:fname, :lname, :title, :photo)");
        $req->bindValue(":fname", $newEmployee->getFname(), PDO::PARAM_STR);
        $req->bindValue(":lname", $newEmployee->getLname(), PDO::PARAM_STR);
        $req->bindValue(":title", $newEmployee->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":photo", $newEmployee->getPhoto(), PDO::PARAM_STR);
        $req->execute();
    }
    public function updateEmployee(Employee $employee)
    {
        $req = $this->pdo->prepare("UPDATE `employee` SET (fname=:fname, lname=:lname, title=:title, photo=:photo) WHERE id=:id");
        $req->bindValue(":id", $employee->getId(), PDO::PARAM_INT);
        $req->bindValue(":fname", $employee->getFname(), PDO::PARAM_STR);
        $req->bindValue(":lname", $employee->getLname(), PDO::PARAM_STR);
        $req->bindValue(":title", $employee->getTitle(), PDO::PARAM_STR);
        $req->bindValue(":photo", $employee->getPhoto(), PDO::PARAM_STR);
        $req->execute();
    }
    public function deleteEmployee($id)
    {
        $req = $this->pdo->prepare("DELETE FROM employee WHERE id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }
}