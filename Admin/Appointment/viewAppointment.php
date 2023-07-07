<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . "/Controller/AppointmentController.php";
require_once _ROOT_ . "/Controller/AppointmentTypeController.php";

if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$appointmentController = new AppointmentController();
$appointments = $appointmentController->getAll();
$appointmentTypeController = new AppointmentTypeController();
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Liste des rendez-vous</h3>
    <div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Jour</th>
      <th scope="col">Heures</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <?php foreach($appointments as $appointment) :
    $appointmentsType = $appointmentTypeController->getById($appointment->getAppointment_Type()); 
  ?>
  <tbody>
    <tr>
      <td><?= $appointment->getId();?></td>
      <td><?= $appointment->getName();?></td>
      <td><?= $appointment->getAppointment_Day();?></td>
      <td><?= $appointment->getAppointment_Time();?></td>
      <td><?= $appointmentsType->getName();?></td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>