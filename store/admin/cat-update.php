<?php
  include('./confs/auth.php');
include("./confs/confs.php");
$id =$_POST["id"];
$name =$_POST["name"];
$remark =$_POST["remark"];
$sql ="UPDATE categories SET name='$name',remark='$remark',modified_at=now() WHERE id=$id";
mysqli_query($conn,$sql);
header("location:cat-list.php")
?>