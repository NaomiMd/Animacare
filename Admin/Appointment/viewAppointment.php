<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
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
  <tbody>
    <tr>
      <td>Id</td>
      <td>Nom</td>
      <td>Jour</td>
      <td>Heures</td>
      <td>Type</td>
    </tr>
  </tbody>
</table>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>