<?php
include("../includes/logincheck.php");
include("../includes/header.php");

$id = $_GET['id'];
if(!isset($id))
{
    echo "No ID is existing";
    exit();
}

$result = mysqli_query($con, "DELETE FROM craft WHERE item_id = '$id'") or die(mysqli_error($con));
header("Location: edit.php");
?>