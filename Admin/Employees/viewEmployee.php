<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Liste des employés de la clinique</h3>
    <div class="table-responsive">
<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Titre</th>
      <th scope="col">Photo</th>
      <th scope="col">Opération</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Id</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>Véto</td>
      <td>Photo url</td>
      <td>
        <a href="<?= generateLink("Admin/Employees/updateEmployee.php")?>" class="btn btn-modify">Modifier</a> 
       <a href="<?= generateLink("Admin/Employees/deleteEmployee.php")?>" class="btn btn-modify">Supprimer</a>
    </td>
    </tr>
  </tbody>
</table>
<div class="text-center mt-5" >
    <a href="<?= generateLink("Admin/Employees/addEmployee.php")?>" class="btn btn-modify">Ajouter</a>
    </div>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>