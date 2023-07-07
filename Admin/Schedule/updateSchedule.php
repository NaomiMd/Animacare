<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . '/Controller/ScheduleController.php';
if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$scheduleController = new ScheduleController();
$schedule = $scheduleController->getSchedulebyId(($_GET['id']));

if($_POST)
{
    $schedule->hydrate($_POST);
    $scheduleController->updateSchedule($schedule);
    header('location: viewSchedule.php');
}

?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Modifier les horaires de la clinique</h3>

    <form method="post" class="schedule-form" >
        <div class="mb-3">
            <label for="opening_time" class="form-label">Heure d'ouverture</label>
            <input type="time" name="opening_time" class="form-control" value="<?= $schedule->getOpening_time();?>">
        </div>
        <div class="mb-3">
            <label for="closing_time" class="form-label">Heure d'ouverture</label>
            <input type="time" name="closing_time" class="form-control" value="<?= $schedule->getClosing_time();?>">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-modify">Modifier</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>