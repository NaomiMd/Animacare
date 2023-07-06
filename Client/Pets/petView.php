<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/AnimalController.php";
require_once _ROOT_ . "/Controller/UserController.php";

$userController = new UserController();
$animalController = new AnimalController();

if(isset($_GET['id']))
{
    $getId = intval($_GET['id']);
    $user = $userController->getById($getId);
    $userAnimal = $userController->getUserAndAnimalInformation($user);
}


?>
    <h4 class="profil text-center">Mes animaux</h4>
    
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="./petAdd.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn btn-modify">Ajouter un animal</a>
        </div>

    <div class="container d-flex justify-content-between profil-name" >
        <h5><?= $userAnimal['name']?></h5>
        <h5><?= $userAnimal['age']?> an(s)</h5>
    </div>
    <div class="container text-center form-profil">    
        <p>Sexe : <?= $userAnimal['sex']?></p>
        <p>Espèce : <?= $userAnimal['species_name']?></p>
        <div class="pb-3 pt-4 d-flex justify-content-center">
        <a href="./petDelete.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn btn-modify">Supprimer</a>
        </div>
    </div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>