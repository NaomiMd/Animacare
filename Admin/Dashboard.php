<?php
require_once("../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Admin/templates/navbarSide.php";

if(!isset($_SESSION['admin']))
{
    header('location: ../index.php');
}
?>
<!-- Ajouter la logique $SESSION pour que la page ne soit accessible qu'à un admin -->

<div class="container home text-center">
<h3>Gestion de l'administration de la clinique</h3>
</div>

<?php 
require_once _ROOT_ . "/Admin/templates/footer.php";
?>