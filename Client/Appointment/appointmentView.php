<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>


    <h4 class="profil text-center">Mes rendez-vous</h4>
    
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="<?= generateLink("appointment.php") ?>" class="btn btn-modify">Prendre rendez-vous</a>
        </div>

    <div class="container d-flex justify-content-between profil-name" >
        <h5>Nom de l'animal</h5>
        <h5>Date</h5>
    </div>
    <div class="container text-center form-profil">    
        <p>Nom du vétérinaire</p>
        <p>Type de consultation</p>
        <div class="pb-3 pt-4 d-flex justify-content-center">
        <a href="<?= generateLink("Client/Appointment/appointmentDelete.php") ?>" class="btn btn-modify">Annuler</a>
        </div>
    </div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>