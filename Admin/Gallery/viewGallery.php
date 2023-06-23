<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . "/Controller/GalleryController.php";

$galleryController = new GalleryController();
$galleries = $galleryController->getAll();
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >La galerie photo</h3>
    <div class="table-responsive">
<table class="table table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Image</th>
      <th class="col">Opérations</th>
    </tr>
  </thead>
  <?php foreach($galleries as $gallery) :?>
  <tbody>
    <tr>
      <td><?= $gallery->getName();?></td>
      <td><img src="../../assets/img/<?= $gallery->getImage_url(); ?>" alt="<?= $gallery->getName(); ?>"  class="d-block mx-lg-auto img-fluid"  width="200" loading="lazy"></td>
      <td>
        <a href="deletePhoto.php?id=<?= $gallery->getId(); ?>" class="btn btn-modify">Supprimer</a>
    </td>
    </tr>
  </tbody>
  <?php endforeach;?>
</table>

    <div class="text-center mt-5 mb-5" >
    <a href="<?= generateLink("Admin/Gallery/addPhoto.php")?>" class="btn btn-modify">Ajouter</a>
    </div>
</div>
</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>