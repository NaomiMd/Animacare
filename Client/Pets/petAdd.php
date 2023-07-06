<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/templates/navbar.php";
require_once _ROOT_ . "/Controller/UserController.php";
require_once _ROOT_ . "/Controller/AnimalController.php";
require_once _ROOT_ . "/Controller/SpeciesController.php";

$userController = new UserController();
$animalController = new AnimalController();
$speciesController = new SpeciesController();
$species = $speciesController->getAll();

if(isset($_GET['id']))
{
    $getId = intval($_GET['id']);
    $user = $userController->getById($getId);
    $userAnimal = $userController->getUserAndAnimalInformation($user);
}

if($_POST)
{
    $name = htmlspecialchars($_POST['name']);
    $sexe = htmlspecialchars ($_POST["sex"]);
    $age = htmlspecialchars($_POST['age']);
    $specie = htmlspecialchars($_POST['species']);
    $user = htmlspecialchars($_POST['user']);

    $newAnimal = new Animal($_POST);
    $animalController->createAnimal($newAnimal);
    header('location: ./petView.php?id='.$_SESSION['user_id']['id']);
}

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
            <label for="age" class="form-label">Age de l'animal</label>
            <input type="number" min="1" max="30" name="age" class="form-control">
        </div>

        <div class="m-3">
            <label for="sex" class="form-label">Sexe de l'animal</label>
            <select name="sex" class="form-select" aria-label="Default select example">
                <option selected>Choissisez le sexe</option>
                <option value="Femelle">Femelle</option>
                <option value="Mâle">Mâle</option>
            </select>
        </div>
        <div class="m-3">
             <label for="species" class="form-label">Espèce de l'animal</label>
             <select name="species" class="form-select" aria-label="Default select example">
                <option selected>Choisissez l'espèce</option>
                <?php foreach($species as $specie) : ?>
                <option value="<?= $specie->getId()?>"><?= $specie->getName();?></option>
                <?php endforeach;?>
            </select>
        </div>
    
        <div class="m-3">
            <label hidden for="user" class="form-label"></label>
            <input hidden type="text" name="user" value="<?= $_SESSION['user_id']['id'] ?>" class="form-control">
        </div>

        <div class="pb-3 pt-4 d-flex justify-content-center">
            <button type="submit" class="btn btn-modify">Ajouter</button>
        </div>
       </form>
</div>

<?php 
require_once _ROOT_ . "/templates/footer.php";
?>