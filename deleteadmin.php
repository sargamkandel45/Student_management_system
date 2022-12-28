<?php
include 'connection.php';
$id = $_GET['id'];
$sql = "DELETE FROM `accounts` WHERE sno=$id";
$result = mysqli_query($conn, $sql);

if($result){
    header('location: adminPage.php');
}
?>