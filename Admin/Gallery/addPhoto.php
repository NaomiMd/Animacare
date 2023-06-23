<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";
require_once _ROOT_ . "/Controller/GalleryController.php";

$galleryController = new GalleryController();

if(isset($_POST['submit']))
{
    $file_name = strip_tags($_FILES['image_url']['name']);
    $file_tmp = $_FILES['image_url']['tmp_name'];
    $file_size = $_FILES['image_url']['size'];
    $file_type = $_FILES['image_url']['type'];

    $file_ext = explode(".", $file_name);
    $file_end = strtolower(end($file_ext));
    $extentions = ['jpg', 'jpeg', 'png', 'svg'];

    if(in_array($file_end, $extentions) === false)
    {
        echo 'Veuillez utiliser les extentions suivantes : jpg, png, jpeg ou svg';
    }elseif($file_size > 3000000)
    {
        echo 'Le fichier est trop volumineux';
    }else{
          //on nettoie le nom du fichier en supprimant les characs spéciaux
          $file_end = preg_replace('/[^A-Za-z0-9\-]/', '', $file_end);
          $targetDirectory = '../../assets/img/';
          $targetFilePath = $targetDirectory . basename($file_name);
          if(move_uploaded_file($file_tmp, $targetFilePath)){
            echo'Le fichier a été téléchargé';
          }else{
            echo'Une erreur s\'est produite';
        }
    }

    $name = htmlspecialchars($_POST['name']);

    $newPhoto = new Gallery($_POST);
    $newPhoto->setImage_url($file_name);
    $galleryController->createGallery($newPhoto);

}
?>


<div class="container table-container">
    <h3 class="text-center mb-5" >Ajouter une photo</h3>

    <form method="post" enctype="multipart/form-data" class="schedule-form" >
        <div class="mb-3">
            <label for="name" class="form-label">Nom de l'image</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image</label>
            <input type="file" name="image_url" class="form-control">
        </div>
        <div class="mt-5 text-center">
            <button type="submit" name="submit" class="btn btn-modify">Ajouter</button>
        </div>
    </form>

</div>
<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>