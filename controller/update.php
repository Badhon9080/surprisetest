<?php
session_start();
include "../db/env.php";
$title =$_REQUEST["title"];
$details =$_REQUEST["details"];
$author =$_REQUEST["author"];
$id=$_REQUEST["id"];
$errors=[];

if(empty($title)){
    $errors["title_errors"]="where's title?";
 }

 if(empty($details)){
    $errors["details_errors"]="where's details?";
 }
 if(strlen($author)>100){
    $errors["author_errors"]="your name so long!";
 }
 if(count($errors)>0){
    $_SESSION["errors"]=$errors;
    header("location: ../edit.php?post_id=$id");
 }else{
    $query="UPDATE posts SET title='$title',details='$details',author='$author' WHERE id = $id";
    $res=mysqli_query($conn,$query);
    if($res){
        header("location: ../allpost.php"); 
    }
 }