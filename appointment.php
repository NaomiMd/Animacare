<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>

<div class="container connexion">
    <h4 class="text-center">Prendre rendez-vous</h4>
    <h5>Pour toute urgence merci de nous contacter par téléphone au <strong>02 4513 3</strong> </h5>
  <form method="post">

  <div class="mt-4 mb-4">
    <label for="name" class="form-label"></label>
    <input type="text" name="name" placeholder="Nom" class="form-control text-center">
  </div>

  <div class="mb-4">
     <select class="form-select text-center" aria-label="Default select example">
        <option selected>Choississez l'espèce de votre animal</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
     </select>
  </div>  

  <div class="mb-4">
    <select class="form-select text-center" aria-label="Default select example">
        <option selected>Choississez le type de consultation</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
  </div>  

  <div class="mb-4">
    <select class="form-select text-center" aria-label="Default select example">
        <option selected>Practicien</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
  </div>  

  <div class="mb-4">
    <select class="form-select text-center" aria-label="Default select example">
        <option selected>Choississez l'heure et le jour</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
  </div>  


    <div class="mt-5 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion" id="appointment">prendre rendez-vous</button>
    </div>
  </form>
  </div>



<?php 
require_once _ROOT_ . "/templates/footer.php";
?>