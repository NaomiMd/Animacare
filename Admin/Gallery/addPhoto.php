<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Ajouter une photo</h3>

    <form method="post" class="schedule-form" >
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'image</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Url de l'image</label>
            <input type="text" name="image_url" class="form-control">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-modify">Ajouter</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>