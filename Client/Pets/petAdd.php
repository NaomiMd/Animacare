<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>
<!-- dans le if(post) ajouter un header location to profil -->

    <h4 class="profil text-center">Mes animaux</h4>
    <div class="container text-center profil-name" >
        <h5>Nouvel animal</h5>
    </div>
    <div class="container form-profil">    
       <form class="profil-information" method="post">
       <div class="m-3">
            <label for="name" class="form-label">Nom de l'animal</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="m-3">
            <label for="name" class="form-label">Sexe de l'animal</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Choisir une option</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="m-3">
             <label for="name" class="form-label">Espèce de l'animal</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Choisir une option</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
   
        <div class="pb-3 pt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-modify">Ajouter</button>
        </div>
       </form>
</div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>