<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
?>

<div class="container connexion">
    <h4 class="text-center mb-5" >Se connecter</h4>
  <form method="post">
  <div class="mb-3 mt-4">
    <label for="exampleInputEmail1" class="form-label">Adresse email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3 d-flex justify-content-end">
    <label for="exampleInputPassword1" class="form-label"></label>
    <a href="">Mot de passe oublié ?</a> 
    </div>
    <div class="mt-4 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion">Se connecter</button>
    </div>
  </form>
  <hr>
  <div class="text-center create-account">
  <p>Pas encore de compte ?</p>
  <a href="<?= generateLink("register.php") ?>">Créer un compte</a>
  </div>
  </div>







<?php 
require_once _ROOT_ . "/templates/footer.php";
?>