<?php
require_once("../../config.php");
require_once _ROOT_ . '/templates/header.php';
require_once _ROOT_ . '/Admin/templates/navbarSide.php';
require_once _ROOT_ . '/Controller/ScheduleController.php';

if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$scheduleController = new ScheduleController();
$schedules = $scheduleController->getAll();
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Les horaires de la clinique</h3>
    <div class="table-responsive">
      <?php foreach($schedules as $schedule) : 
        ?>
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Heure d'ouverture</th>
      <th scope="col">Heure de fermeture</th>
      <th scope="col">Opération</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?= $schedule->getOpening_time(); ?></td>
      <td><?= $schedule->getClosing_time(); ?></td>
      <td><a href="updateSchedule.php?id=<?= $schedule->getId();?>" class="btn btn-modify">Modifier</a></td>
    </tr>
  </tbody>
</table>
<?php endforeach; ?>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>