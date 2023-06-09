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
}

if(!isset($_SESSION['user_id']['id']) || $_SESSION['user_id']['id'] !== $getId)
{
    header('location: ../../index.php');
}

if(isset($_GET['id']))
{
    $userAnimal = $userController->getUserAndAnimalInformation($user);
}


?>
    <h4 class="profil text-center">Mes animaux</h4>
    <div class="me-5 pb-3 d-flex justify-content-end">
            <a href="./petAdd.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn btn-modify">Ajouter un animal</a>
        </div>
<?php
        // si l'user n'a pas d'animal enregistré on cache la boxe //
        // if($userAnimal && count($userAnimal) > 0)//
       if($userAnimal && $userAnimal['id'])
       {
         $allAnimals = $userController->getAllAnimalFromUser($user);
         foreach($allAnimals as $animal) :
        ?>

    <div class="container d-flex justify-content-between profil-name" >
        <h5>Nom : <?= $animal['name']?></h5>
        <h5>Age :<?= $animal['age']?> an(s)</h5>
    </div>
    <div class="container text-center form-profil">    
        <p>Sexe : <?= $animal['sex']?></p>
        <p>Espèce : <?= $animal['species_name']?></p>

        <div class="pb-3 pt-4 d-flex justify-content-center">
        <a href="./petDelete.php?id=<?=$_SESSION['user_id']['id'] ?>" class="btn btn-modify">Supprimer</a>
        </div>
    </div>
    <?php 
    endforeach;
    }else{
        echo '<h4 class="text-center m-5 p-5" style="color: #F68657">Veuillez ajouter votre animal pour voir ses informations ici</h4>';
    }?>      
<?php 
require_once _ROOT_ . "/templates/footer.php";
?>