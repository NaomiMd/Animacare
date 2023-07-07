<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . '/Controller/EmployeeController.php';

if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$employeeController = new EmployeeController();
$employee = $employeeController->getEmployeeById($_GET['id']); 

if(isset($_POST["submit"]))
{
    $file_name = strip_tags($_FILES["photo"]["name"]);
    $file_size = $_FILES["photo"]["size"];
    $file_tmp = $_FILES["photo"]["tmp_name"];
    $file_type = $_FILES["photo"]["type"];
    $file_ext = explode(".", $file_name);
    $file_end = strtolower(end($file_ext));
    $extentions = ["jpg", "jpeg", "png", "svg"];

    if(in_array($file_end, $extentions) === false)
    {
        echo 'Veuillez utiliser les extentions suivantes : jpg, png, jpeg ou svg';
    }elseif($file_size > 3000000)
    {
        echo 'Le fichier est trop volumineux';
    }
    else{
        $file_end = preg_replace('/[^A-Za-z0-9\-]/', '', $file_end);
        $targetDirectory = "../../assets/img/";
        $targetFilePath = $targetDirectory . basename($file_name);
        if(move_uploaded_file($file_tmp, $targetFilePath))
        {
            echo'Le fichier a été téléchargé';
        }else{
            echo'Une erreur s\'est produite';
        }
    }


    $title = htmlspecialchars($_POST["title"]);
    $employee->hydrate($_POST);
    $employeeController->updateEmployee($employee);
}
?>

<div class="container table-container">
    <h3 class="text-center mb-5" >Modifier les informations de l'employé</h3>

    <form method="post" enctype="multipart/form-data" class="schedule-form" >
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" value="<?= $employee->getTitle(); ?>">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" name="submit" class="btn btn-modify">Modifier</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>