<?php
include('./confs/auth.php');
include("./confs/confs.php");

$title = $_POST["title"];
$author =$_POST["author"];
$summary =$_POST["summary"];
$price =$_POST["price"];
$category_id = $_POST["category_id"];
$cover =$_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];

if($cover){
    move_uploaded_file($tmp ,"covers/$cover");
}
$sql = "INSERT INTO books(title,author,summary,price,category_id,cover,created_at,modified_at) VALUES ('$title','$author','$summary','$price','$category_id','$cover',now(),now())";

mysqli_query($conn,$sql);
header("Location:book-list.php");exit;

?>