<?php
require_once _ROOT_ . '/Entity/Appointment.php';

class AppointmentController
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
        $appoitnments = [];
        $req = $this->pdo->query("SELECT * FROM `appointment`");
        $data = $req->fetchAll();
        foreach($data as $appoitnment)
        {
            $appoitnments[] = new Appointment($appoitnment);
        }
        return $appoitnments;
    }
    public function getById($id): Appointment
    {
        $req = $this->pdo->prepare("SELECT * FROM `appoitment` WHERE id=:id");
        $req->bindValue(":id", $id, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetch();
        $appointment = new Appointment($data);
        return $appointment;
    }
    public function createAppointment(Appointment $newAppointment)
    {
        $req = $this->pdo->prepare("INSERT INTO `appointment` (name, appointment_time, appointment_day, appointment_type, appointment_specie, user) VALUES (:name, :appointment_time, :appointment_day, :appointment_type, :appointment_specie, :user)");
        $req->bindValue(":name", $newAppointment->getName(), PDO::PARAM_STR);
        $req->bindValue(":appointment_time", $newAppointment->getAppointment_time(), PDO::PARAM_STR);
        $req->bindValue(":appointment_day", $newAppointment->getAppointment_day(), PDO::PARAM_STR);
        $req->bindValue(":appointment_type", $newAppointment->getAppointment_type(), PDO::PARAM_INT);
        $req->bindValue(":appointment_specie", $newAppointment->getAppointment_specie(), PDO::PARAM_INT);
        $req->bindValue(":user", $newAppointment->getUser(), PDO::PARAM_INT);
        $req->execute();
    }

    public function updateAppointment(Appointment $appointment)
    {
        $req = $this->pdo->prepare("UPDATE `appointment` SET (name=:name, appointment_time=:appointment_time, appointment_day=:appointment_day, appointment_type=:appointment_type, appointment_specie=:appointment_specie, user=:user) WHERE id=:id");
        $req->bindValue(":id", $appointment->getId(), PDO::PARAM_INT);
        $req->bindValue(":name", $appointment->getName(), PDO::PARAM_STR);
        $req->bindValue(":appointment_time", $appointment->getAppointment_time(), PDO::PARAM_STR);
        $req->bindValue(":appointment_day", $appointment->getAppointment_day(), PDO::PARAM_STR);
        $req->bindValue(":appointment_type", $appointment->getAppointment_type(), PDO::PARAM_INT);
        $req->bindValue(":appointment_specie", $appointment->getAppointment_specie(), PDO::PARAM_INT);
        $req->bindValue(":user", $appointment->getUser(), PDO::PARAM_INT);
        $req->execute();
    }
    public function deleteAppointment($userId, $appointmentId)
    {
        $req = $this->pdo->prepare("DELETE FROM `appointment` WHERE user=:user AND id=:id");
        $req->bindValue(":id", $appointmentId, PDO::PARAM_INT);
        $req->bindValue(":user", $userId, PDO::PARAM_INT);
        $req->execute();
    }
}