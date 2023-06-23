<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . "/Controller/EmployeeController.php";

$employeeController = new EmployeeController();
$employees = $employeeController->getAll();
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
  <?php 
    foreach($employees as $employee) :
  ?>
  <tbody>
    <tr>
      <td><?= $employee->getId();?></td>
      <td><?= $employee->getFname();?></td>
      <td><?= $employee->getLname();?></td>
      <td><?= $employee->getTitle();?></td>
      <td><img alt="Photo de <?= $employee->getFname();?>" src="../../assets/img/<?= $employee->getPhoto();?>" class="d-block mx-lg-auto img-fluid"  width="200" loading="lazy"></td>
      <td>
        <a href="updateEmployee.php?id=<?= $employee->getId();?>" class="btn btn-modify">Modifier</a> 
       <a href="deleteEmployee.php?id=<?= $employee->getId();?>?>" class="btn btn-modify">Supprimer</a>
    </td>
    </tr>
  </tbody>
  <?php endforeach; ?>
</table>
<div class="text-center mt-5" >
    <a href="<?= generateLink("Admin/Employees/addEmployee.php")?>" class="btn btn-modify mb-5">Ajouter</a>
    </div>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>