<?php
  include('./confs/auth.php');
include("./confs/confs.php");
$name = $_POST["name"];
$remark = $_POST["remark"];
$sql ="INSERT INTO categories (name,remark,created_at,modified_at) VALUES ('$name','$remark',now(),now())";
mysqli_query($conn,$sql);
header("location: cat-list.php");


?>