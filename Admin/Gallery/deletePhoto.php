<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Controller/GalleryController.php";

if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$galleryController = new GalleryController();
$galleryController->deleteGallery($_GET['id']);

header('location: viewGallery.php');

