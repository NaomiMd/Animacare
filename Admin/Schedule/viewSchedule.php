<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Les horaires de la clinique</h3>
    <div class="table-responsive">
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
      <td>Mark</td>
      <td>Otto</td>
      <td><a href="<?= generateLink("Admin/Schedule/updateSchedule.php")?>" class="btn btn-modify">Modifier</a></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>