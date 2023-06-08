<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>

<div class="container connexion">
    <h4 class="text-center mb-5" >S'inscrire</h4>
  <form method="post">
  <div class="mb-3 mt-4">
    <label for="fname" class="form-label">Nom</label>
    <input type="fname" placeholder="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>  

  <div class="mb-3">
    <label for="lname" class="form-label">Prénom</label>
    <input type="lname" class="form-control" placeholder="Prénom" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>  

  <div class="mb-3">
    <label for="email" class="form-label">Adresse email</label>
    <input type="email" placeholder="JDave@exemple.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" placeholder="*******" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="confirmed_password" class="form-label">Confirmez votre mot de passe</label>
    <input type="confirmed_password"  placeholder="*******"  class="form-control" id="exampleInputPassword1">
  </div>

    <div class="mt-4 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion">S'inscrire</button>
    </div>
  </form>
  </div>



<?php 
require_once _ROOT_ . "/templates/footer.php";
?>