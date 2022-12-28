<?php
include 'connection.php';
 session_start();
 $cur_user = $_SESSION['username'];
 session_unset();
 session_destroy();
 $sql = "UPDATE `accounts` SET status='offline' WHERE email = '$cur_user'";
 $result = mysqli_query($conn, $sql);
 header('location: login.php');
 exit;
?>
