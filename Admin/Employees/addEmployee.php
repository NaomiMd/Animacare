<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Ajouter un employé</h3>

    <form method="post" class="schedule-form" >
        <div class="mb-3">
            <label for="lname" class="form-label">Nom</label>
            <input type="text" name="lname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="fname" class="form-label">Prénom</label>
            <input type="text" name="fname" class="form-control">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="text" name="photo" class="form-control">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-modify">Ajouter</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>