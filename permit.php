<?php
include 'connection.php';
$sno = $_GET['sno'];
 $username = $_GET['username'];
 $email = $_GET['email'];
 $password = $_GET['password'];
 $photo = $_GET['photo'];
 $post = $_GET['post'];
$passHash = md5($password);
 $sql = "INSERT INTO `accounts` (`username`, `email`, `password`, `photo`, `post`, `status`, `create_on`) VALUES ('$username', '$email', '$passHash', '$photo', '$post', 'offline', current_timestamp());";
 $res = mysqli_query($conn, $sql);
 if($res){
    echo 'Inserted';
 }

$sql1 = "UPDATE `requests` SET status = 'permitted' WHERE sno = $sno";
$result = mysqli_query($conn, $sql1);

header('location: managereq.php');
?>