<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/AnimalController.php";
require_once _ROOT_ . "/Controller/UserController.php";

$userController = new UserController();
$animalController = new AnimalController();

if(isset($_GET['id'])) {
    $getId = intval($_GET['id']);
    $user = $userController->getById($getId);
}
if(!isset($_SESSION['user_id']['id']) || $_SESSION['user_id']['id'] !== $getId)
{
    header('location: ../../index.php');
}
    if($user) {
        $userAnimal = $userController->getUserAndAnimalInformation($user);

        if($userAnimal) {
            $animalId = $userAnimal['id'];
            $animalController->deleteAnimal($user->getId(), $animalId);
            echo '<h4 class="text-center m-5 p-5" style="color: #F68657">Les informations de l\'animal ont bien été supprimé</h4>';
        }
    }
?>

<div class="m-5 p-5">
<div class="p-5 d-flex m-5 justify-content-center">
<a href="./petView.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn btn-modify">Retour au profil</a>
</div>
</div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>