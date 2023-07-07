<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/AppointmentController.php";
require_once _ROOT_ . "/Controller/UserController.php";
require_once _ROOT_ . "/Controller/AnimalController.php";


$userController = new UserController();
$animalController = new AnimalController();
$appointmentController = new AppointmentController();

if(isset($_GET['id']))
{
    $getId = intval($_GET['id']);
    $user = $userController->getById($getId);
    $userAnimal = $userController->getUserAndAnimalInformation($user);

}
?>


    <h4 class="profil text-center">Mes rendez-vous</h4>
    
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="../../appointment.php?id=<?=$_SESSION['user_id']['id']?>" class="btn btn-modify">Prendre rendez-vous</a>
        </div>

        <?php 
            if($userAnimal && $userAnimal['id']){
                $allAppointment = $userController->getAppointment($user);
                foreach($allAppointment as $appointment) :
            
        ?>
        
    <div class="container d-flex justify-content-between profil-name" >
        <h5>Nom : <?= $appointment['name'] ?></h5>
        <h5>Le : <?= $appointment['appointment_day'] ?> à : <?= $appointment['appointment_time'] ?></h5>
    </div>
    <div class="container text-center form-profil">    
        <p>Nom : <?= $appointment['species_name']?></p>
        <p>Type de consultation : <?= $appointment['appointment_type_name'] ?></p>
        <div class="pb-3 pt-4 d-flex justify-content-center">
        <a href="./appointmentDelete.php?id=<?=$_SESSION['user_id']['id']?>" class="btn btn-modify">Annuler</a>
        </div>
    </div>
    <?php 
    endforeach;
    }else{
        echo '<h4 class="text-center m-5 p-5" style="color: #F68657">Retrouvez vos rendez-vous et leurs informations ici</h4>';
    }
    ?>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>