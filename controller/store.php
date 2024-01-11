<?php
session_start();
include "../db/env.php";
$title =$_REQUEST["title"];
$details =$_REQUEST["details"];
$author =$_REQUEST["author"];
$errors=[];
 if(empty($title)){
    $errors["title_errors"]="where's title?";
 }
 elseif(strlen($title)>100){
    $errors["title_errors"]="how much!";
 }
 if(empty($details)){
    $errors["details_errors"]="where's details?";
 }
if(count($errors)>0){
   $_SESSION["data"]=$_REQUEST;
   $_SESSION["errors"]=$errors;
   header("location: ../index.php");
}else{
   $query="INSERT INTO posts(title, details, author) VALUES ('$title','$details','$author')";
   $res=mysqli_query($conn,$query);
   if($res){
      $_SESSION["msg"]="my data has been inserted!";
      header("location: ../index.php");
   }
}

?>