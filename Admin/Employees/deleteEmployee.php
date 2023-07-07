<?php
require_once("../../config.php");
require_once _ROOT_ . "/templates/header.php";
require_once _ROOT_ . "/Controller/EmployeeController.php";

if(!isset($_SESSION['admin']))
{
    header('location: ../../index.php');
}

$employeeController = new EmployeeController();
$employeeController->deleteEmployee($_GET['id']);

header('location: viewEmployee.php');

