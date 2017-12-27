<?php
include_once("utility_config.php");

if(isset($_POST['department']) &&
   isset($_POST['SC']) &&
   isset($_POST['year']) &&
   isset($_POST['desc']) &&
   isset($_POST['img']))
{
    $department = $_POST['department'];
    $course = $_POST['SC'];
    $semister = $_POST['year'];
    $desc = $_POST['desc'];
    $image = $_POST['img'];

    echo $department;
}
?>