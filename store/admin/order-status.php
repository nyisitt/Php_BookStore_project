<?php 
include("./confs/confs.php");
$id =$_GET['id'];
$status = $_GET['status'];

mysqli_query($conn,"UPDATE `order` SET status=$status,modified_at=now() WHERE id=$id");
header('location:orders.php')

?>