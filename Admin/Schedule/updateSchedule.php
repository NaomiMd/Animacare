<?php
require_once("../../config.php");
require_once _ROOT_ . "./templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Modifier les horaires de la clinique</h3>

    <form method="post" class="schedule-form" >
        <div class="mb-3">
            <label for="opening_hour" class="form-label">Heure d'ouverture</label>
            <input type="time" name="opening_hour" class="form-control">
        </div>
        <div class="mb-3">
            <label for="opening_hour" class="form-label">Heure d'ouverture</label>
            <input type="time" name="opening_hour" class="form-control">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-modify">Modifier</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>