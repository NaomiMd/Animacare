<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/UserController.php";

$userController = new UserController();

if($_POST)
{
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $email= htmlspecialchars( $_POST["email"]);
  $phone= htmlspecialchars( $_POST["phone_number"]);
  $password = htmlspecialchars($_POST['password']);
  $confirmedPassword = htmlspecialchars($_POST['confirmedPassword']);

  if($emailVerify = $userController->verifyIfEmailExist($email))
  {
    echo '<h4 class="text-center mt-5 pt-5" style="color: #F6B352">Cet email est déjà utilisé.<br/> Merci d\'en choisir un autre</h4>';
  }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
    echo '<h4 class="text-center mt-5 pt-5" style="color: #F6B352">Votre email n\'est pas valide</h4>';
  }elseif($password === $confirmedPassword)
  {
    unset($confirmedPassword);
    $newUser = new User($_POST);
    $userController->createUser($newUser);
    $_SESSION['user']['email'] = $_POST['email'];
    header('location: index.php');
  }else{
    echo '<h4 class="text-center mt-5 pt-5" style="color: #F6B352">Vos mots de passe ne correspondent pas</h4>';
  }

}
?>

<div class="container connexion">
    <h4 class="text-center mb-5" >S'inscrire</h4>
    
  <form method="post">
  <div class="mb-3 mt-4">
    <label for="fname" class="form-label login">Nom</label>
    <input type="text" name="fname" placeholder="Nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>  

  <div class="mb-3">
    <label for="lname" class="form-label login">Prénom</label>
    <input type="text" name="lname" class="form-control" placeholder="Prénom" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>  

  <div class="mb-3">
    <label for="email" class="form-label login">Adresse email</label>
    <input type="email" name="email" placeholder="JDave@exemple.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <label for="phone_number" class="form-label login">Téléphone</label>
    <input type="tel" name="phone_number" placeholder="Téléphone" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label login">Mot de passe</label>
    <input type="password" name="password" placeholder="*******" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="mb-3">
    <label for="confirmedPassword" class="form-label login">Confirmez votre mot de passe</label>
    <input type="password" name="confirmedPassword"  placeholder="*******"  class="form-control" id="exampleInputPassword1" required>
  </div>

    <div class="mt-4 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion">S'inscrire</button>
    </div>
  </form>
  </div>



<?php 
require_once _ROOT_ . "/templates/footer.php";
?>