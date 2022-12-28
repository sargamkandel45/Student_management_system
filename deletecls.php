<?php
include 'connection.php';
include 'checkLogin.php';

 $id = $_GET['id'];
 $ref = $_GET['ref'];

 $sql = "DELETE FROM `classes` WHERE sno=$id";
 $res = mysqli_query($conn, $sql);

 $sql1 = "DELETE FROM `students` WHERE class_id=$id";
 $res1 = mysqli_query($conn, $sql1);
 if($res && $res1){
    header('location: '.$ref);
 }
?>
