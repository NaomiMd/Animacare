<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >La galerie photo</h3>
    <div class="table-responsive">
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Url de l'image</th>
      <th class="col">Opérations</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Mark</td>
      <td>Otto</td>
      <td>
        <a href="<?= generateLink("Admin/Gallery/deletePhoto.php")?>" class="btn btn-modify">Supprimer</a>
    </td>
    </tr>
  </tbody>
</table>

    <div class="text-center mt-5" >
    <a href="<?= generateLink("Admin/Gallery/addPhoto.php")?>" class="btn btn-modify">Ajouter</a>
    </div>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>