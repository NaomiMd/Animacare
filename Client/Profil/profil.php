<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/UserController.php";

$userController = new UserController();

if(isset($_GET['id']))
{
    $getId = intval($_GET['id']);
    $user = $userController->getById($getId);
}
?>
    <h4 class="profil text-center">Mon profil</h4>
<?php
if($_POST)
{
    $password = htmlspecialchars($_POST['password']);
    $passwordConfirmed = htmlspecialchars($_POST['passwordConfirmed']);

    if($password === $passwordConfirmed)
    {
        $userId= $_SESSION['user_id']['id'];
        unset($confirmedPassword);
        $user->hydrate($_POST);
        $userController->UpdateUserInformationProfil($user);
        echo'<h4 class="text-center mt-2" style="color: #F6B352">Vos informations ont été mise à jour</h4>';
    }else{
        echo '<h4 class="text-center mt-5 pt-5" style="color: #F6B352">Vos mots de passe ne correspondent pas</h4>';
    }
}
?>

    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="../Appointment/appointmentView.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn me-3 btn-modify">Voir mes rendez-vous</a>
            <a href="../Pets/petView.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn me-5 btn-modify">Voir mes animaux</a>
        </div>
    <div class="container profil-name" >
        <h5>Nom - Prénom</h5>
    </div>
    <div class="container form-profil">    
       <form class="profil-information" method="post">
        <div class="m-3">
            <label for="phone_number" class="form-label">Numéro de téléphone</label>
            <input type="tel" name="phone_number" value="<?= $user->getPhone_number();?>" class="form-control">
        </div>
        <div class="m-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" name="password" placeholder="********" class="form-control">
        </div>
        <div class="m-3">
            <label for="passwordConfirmed" class="form-label">Confirmez le mot de passe</label>
            <input type="password" name="passwordConfirmed" placeholder="********" class="form-control">
        </div>    

        <div class="pb-3 pt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-modify">Modifier</button>
        </div>

       </form>
</div>









<?php 
require_once _ROOT_ . "/templates/footer.php";
?>