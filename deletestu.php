<?php
include 'connection.php';
include 'checkLogin.php';

$id = $_GET['id'];
$cn = $_GET['classname'];
$class = $_GET['class'];
 $sql = "DELETE FROM `students` WHERE sno=$id";
 $res = mysqli_query($conn, $sql);
 if($res){
   header('location: class.php?id='.$class.'&classname='.$cn.'');
 }
?>
