<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>


    <h4 class="profil text-center">Mon profil</h4>
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="<?= generateLink("Client/Appointment/appointmentView.php") ?>" class="btn me-3 btn-modify">Voir mes rendez-vous</a>
            <a href="<?= generateLink("Client/Pets/petView.php") ?>" class="btn me-5 btn-modify">Voir mes animaux</a>
        </div>
    <div class="container profil-name" >
        <h5>Nom - Prénom</h5>
    </div>
    <div class="container form-profil">    
       <form class="profil-information" method="post">
        <div class="m-3">
            <label for="phone_number" class="form-label">Numéro de téléphone</label>
            <input type="tel" name="phone_number" class="form-control">
        </div>
        <div class="m-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="m-3">
            <label for="password" class="form-label">Confirmez le mot de passe</label>
            <input type="password" name="password" class="form-control">
        </div>    

        <div class="pb-3 pt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-modify">Modifier</button>
        </div>

       </form>
</div>









<?php 
require_once _ROOT_ . "/templates/footer.php";
?>