<?php
session_start();
 if($_SESSION['loggedIn'] != true){
    header('location: login.php');
 }
?>
<?php
include 'connection.php';
$sym_num = $_POST['sym'];
if($sym_num == ''){
    header('location: home.php');
}
else{
    header('location: search_result.php?search_id='.$sym_num);
}
?>