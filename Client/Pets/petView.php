<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>


    <h4 class="profil text-center">Mes animaux</h4>
    
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="<?= generateLink("Client/Pets/petAdd.php") ?>" class="btn btn-modify">Ajouter un animal</a>
        </div>

    <div class="container d-flex justify-content-between profil-name" >
        <h5>Nom de l'animal</h5>
        <h5>Date de naissance</h5>
    </div>
    <div class="container text-center form-profil">    
        <p>Sexe</p>
        <p>Espèce</p>
        <div class="pb-3 pt-4 d-flex justify-content-center">
        <a href="" class="btn btn-modify">Modifier</a>
        <a href="" class="btn ms-4 btn-modify">Supprimer</a>
        </div>
    </div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>