<?php
include 'connection.php';
 $postid = $_GET['postid'];

 $sql = "DELETE FROM `posts` WHERE post_id = $postid";
 $result = mysqli_query($conn, $sql);

 if($result){
    header('location: home.php');
 }
?>