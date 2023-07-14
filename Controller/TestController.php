<?php /*
require_once __DIR__. "../../Entity/Appointment.php";

class TestController
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



    public function test()
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

$controller = new TestController();

// Vérifier si la méthode test() a été appelée via une requête Ajax
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Appeler la méthode test() du contrôleur et renvoyer les données en tant que réponse Ajax
    $controller->test();
}
      

  
    }*/

  
     
    

   /*   public function getAll(): array
    {
        $appointments = [];
        $req = $this->pdo->query("SELECT * FROM `appointment` LIMIT 10");
        $data = $req->fetchAll();
        foreach($data as $appointment)
        {
            $appointments[] = new Appointment($appointment);
        }
        echo 'test';
        return $appointments;
    }
    

  public function countAppointment($numberAppointment)
    {            
        $req = $this->pdo->prepare("SELECT  COUNT(*) AS total FROM `appointment` WHERE appointment_day=:appointment_day ");
        $req->bindParam(":appointment_day", $numberAppointment, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();
        return $result['total'];
        
    }
    public function getAppointment()
    {
        if(!empty($_POST['appointment_day']) && !empty($_POST['appointment_time']))
        {
            $appointment_day = $_POST['appointment_day'];
            $appointment_time = $_POST['appointment_time'];
    
            $req = $this->pdo->prepare("SELECT * FROM `appointment` WHERE appointment_day=:appointment_day AND appointment_time=:appointment_time");
            $req->bindParam(":appointment_day", $appointment_day, PDO::PARAM_STR);
            $req->bindParam(":appointment_time", $appointment_time, PDO::PARAM_STR);
    
            $req->execute();
            $result = $req->fetchAll();
            echo json_encode($result);

            $appointmentCount = $this->countAppointment($appointment_day);
            if(!empty($result) || $appointmentCount > 10)
            {
                echo 'Plus de place disponible';
            }            
        }
    }*/
    

