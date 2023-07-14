<?php
include_once __DIR__. '../../config.php';
require_once _ROOT_. '/Entity/Appointment.php';

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

    public function getMore()
    {
    
        echo'TEST';
    }

    public function getAll(): array
    {
        $appointments = [];
        $req = $this->pdo->query("SELECT * FROM `appointment` LIMIT 5");        
        $data = $req->fetchAll();
        foreach($data as $appointment)
        {
            $appointments[] = new Appointment($appointment);

        }
        return $appointments;
    }
    public function getById($id): Appointment
    {
        $req = $this->pdo->prepare("SELECT * FROM `appointment` WHERE id=:id");
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

    public function deleteAfterAppointment()
    {
        $req = $this->pdo->prepare("DELETE FROM `appointment` WHERE appointment_day < NOW() - INTERVAL 1 MONTH");
        $req->execute();
    }



    public function seeMoreData()
    {   
        $limit = $_POST['limit'];
        $start = $_POST['start'];
        $appointments = [];
        $req = $this->pdo->query("SELECT a.*, at.name AS appointment_type_name FROM `appointment` AS a INNER JOIN `appointment_type` AS at ON a.appointment_type = at.id LIMIT $start, $limit");
        $data = $req->fetchAll();
        foreach($data as $appointment) {
            $appointments[] = new Appointment($appointment);
        }
        // Renvoyez les données au format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
         
    }
}

$controller = new AppointmentController();

// Vérifier si la méthode test() a été appelée via une requête Ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Appeler la méthode test() du contrôleur et renvoyer les données en tant que réponse Ajax
    $controller->seeMoreData();



}