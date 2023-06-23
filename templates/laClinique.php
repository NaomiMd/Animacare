<?php
require_once _ROOT_ . "/Controller/EmployeeController.php";
$employeeController = new EmployeeController();
$employees = $employeeController->getAll();
?>
<div class="container-fluid clinique-header">
    <h1>La Clinique</h1>
    <h3>Découvrez la clinique et son équipe</h3>
</div>

<div class="container equipement">
    <h4>La clinique et son équipement</h4>
    <p>Notre clinique vétérinaire est équipée d'un matériel de pointe pour fournir des soins vétérinaires de qualité supérieure. <br>
    Des scanners aux laboratoires d'analyses, en passant par nos salles d'opérations , 
    nous sommes déterminés à offrir à vos animaux de compagnie les meilleurs traitements possibles.</p>
</div>
    <div class="container image-equipement" >
        <img src="<?= generateLink("assets/img/equipement.jpg") ?>" alt="equipement de la clinique">
        <img src="<?= generateLink("assets/img/laborantin.jpg") ?>" alt="équipier de la clinique">
    </div>


<div class="container-fluid bloc">
</div>

<div class="container equipe">
    <h4>L'équipe</h4>
    <div class="doctor">
        <?php foreach($employees as $employee) : ?>
    <div class="doctor-img">
        <img alt="Photo de <?= $employee->getFname();?>" src="./assets/img/<?= $employee->getPhoto();?>"  class="round d-flex">
        <h5 class="mt-2" ><?= $employee->getLname();?> <?= $employee->getFname();?></h5>
        <h5><?= $employee->getTitle();?></h5>
    </div>
        <?php endforeach ?>
    </div>
</div>