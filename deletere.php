<?php
 include 'connection.php';

 $id = $_GET['id'];
 $classid = $_GET['classid'];
 $classname = $_GET['classname'];

 $sql = "DELETE FROM `remark` WHERE sno = '$id'";
  $res = mysqli_query($conn, $sql);
  if($res){
    header('location: remark.php?name='.$_GET['name'].'&classid='.$classid.'&classname='.$classname);
  }
?>