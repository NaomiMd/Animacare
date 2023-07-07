<?php
require_once("config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/UserController.php";
require_once _ROOT_ . "/Controller/AdminController.php";
if(isset($_SESSION['user']) || isset($_SESSION['admin']))
{
  header('location: index.php');
}

var_dump(empty($_SESSION['user']));
$userController = new UserController();
$adminController = new AdminController();

if($_POST)
{
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $user = $userController->verifyUserLogin($email, $password);
  $admin = $adminController->verifyAdminLogin($email, $password);
  if($user)
  {
    $_SESSION['user'] = ['email' => $user['email']];
    $_SESSION['user_id'] = ['id' => $user['id']];
    header('location: Client/Profil/profil.php?id='.$_SESSION['user_id']['id']);
  }elseif($admin)
  {
    $_SESSION['admin'] = ['email' => $admin['email']];
    header('location: Admin/Dashboard.php');
  }else{
    echo '<h4 class="text-center mt-5 pt-5" style="color: #F6B352">Identifiants invalides</h4>';
  }
}
?>

<div class="container connexion">
    <h4 class="text-center mb-5" >Se connecter</h4>

  <form method="post">
  <div class="mb-3 mt-4">
    <label for="email" class="form-label login">Adresse email</label>
    <input type="email" name="email" class="form-control" placeholder="JDave@exemple.com" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>

  <div class="mb-3">
    <label for="password" class="form-label login">Mot de passe</label>
    <input type="password" name="password" placeholder="******" class="form-control" id="exampleInputPassword1" required>
  </div>

    <div class="mt-4 mb-4 d-flex justify-content-center" >
    <button type="submit" class="btn btn-connexion">Se connecter</button>
    </div>
  </form>

  <div class="mb-3 d-flex justify-content-end">
    <label for="exampleInputPassword1" class="form-label login"></label>
    <a href="">Mot de passe oublié ?</a> 
    </div>
  <hr>
  <div class="text-center create-account">
  <p>Pas encore de compte ?</p>
  <a href="<?= generateLink("register.php") ?>">Créer un compte</a>
  </div>
  </div>







<?php 
require_once _ROOT_ . "/templates/footer.php";
?>