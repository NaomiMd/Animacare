<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/AppointmentController.php";
require_once _ROOT_ . "/Controller/AppointmentTypeController.php";
require_once _ROOT_ . "/Controller/SpeciesController.php";


$appointmentController = new AppointmentController();
$appointmentTypeController = new AppointmentTypeController();
$appointmentTypes = $appointmentTypeController->getAll();
$speciesController = new SpeciesController();
$species = $speciesController->getAll();
if($_POST)
{
  $name = htmlspecialchars($_POST['name']);
  $appointment_day = htmlspecialchars($_POST['appointment_day']);
  $appointment_time = htmlspecialchars($_POST['appointment_time']);
  $species = htmlspecialchars($_POST['appointment_specie']);
  $types = htmlspecialchars($_POST['appointment_type']);
  
  $appointment = new Appointment($_POST);
  $appointmentController->createAppointment($appointment);
}

?>

<div class="container connexion">
    <h4 class="text-center">Prendre rendez-vous</h4>
    <h5>Pour toute urgence merci de nous contacter par téléphone au <strong>02 4513 3</strong> </h5>

  <form method="post" enctype="multipart/form-data">

  <div class="mt-4 mb-4">
    <label for="name" class="form-label"></label>
    <input type="text" name="name" placeholder="Nom" class="form-control text-center" required>
  </div>

  <div class="mb-4">
     <select name="appointment_specie" class="form-select text-center" aria-label="Default select example" required>
        <option selected>Choississez l'espèce de votre animal</option>
        <?php foreach($species as $specie): ?>
        <option value="<?= $specie->getId();?>"><?= $specie->getName();?></option>
        <?php endforeach; ?>
     </select>
  </div>  

  <div>
    <select name="appointment_type" class="form-select text-center" aria-label="Default select example" required>
        <option selected>Choississez le type de consultation</option>
        <?php foreach($appointmentTypes as $appointmentType): ?>
        <option value="<?= $appointmentType->getId();?>"><?= $appointmentType->getName();?></option>
        <?php endforeach; ?>
    </select>
  </div>  

  <div>
    <label for="appointment_day" class="form-label"></label>
    <input type="text" name="appointment_day" id="datepicker"  placeholder="Jour" class="form-control text-center dateTimePicker" required>
  </div>

  <div class="mb-4">
    <label for="appointment_time" class="form-label"></label>
    <input type="text" name="appointment_time" id="timepicker"  placeholder="Heure" class="form-control text-center dateTimePicker" required>
  </div>

    <div class="mt-5 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion" id="appointment">prendre rendez-vous</button>
    </div>
  </form>
  </div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>