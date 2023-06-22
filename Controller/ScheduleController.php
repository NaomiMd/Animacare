<?php
require_once _ROOT_ . '/Entity/Schedule.php';

class ScheduleController
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
        $schedules = [];
        $req = $this->pdo->query("SELECT * FROM `schedule`");
        $data = $req->fetchAll();
        foreach($data as $schedule)
        {
            $schedules[] = new Schedule($schedule);
        }
        return $schedules;
    }public function getSchedulebyId($id) : Schedule
    {
        $req = $this->pdo->prepare("SELECT * FROM `schedule` WHERE id = :id");
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $schedule = new Schedule($data);
        return $schedule;
    }
    public function updateSchedule(Schedule $schedule)
    {
        $req = $this->pdo->prepare("UPDATE `schedule` SET opening_time=:opening_time, closing_time=:closing_time WHERE id=:id");
        $req->bindValue(":id", $schedule->getId(), PDO::PARAM_INT);
        $req->bindValue(":opening_time",$schedule->getOpening_time(), PDO::PARAM_STR);
        $req->bindValue(":closing_time",$schedule->getClosing_time(), PDO::PARAM_STR);
        $req->execute();
    }

}