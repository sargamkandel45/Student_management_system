<?php

include 'addTeacher.php';
include 'bootstrap.php';
include 'connection.php';
 session_start();
 if($_SESSION['loggedIn'] != true){
    header('location: login.php');
 }
if($_SESSION['admin'] != true){
    header('location: checkPass.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        .main{
            border-bottom: 4px solid silver;
        }
        .b{
            width: 100%;
        }
    </style>
</head>
<body>
  <?php
   $sql = "SELECT * FROM `requests` WHERE status = 'notpermited'";
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
  ?>
    <div class="container">
        <div class="main">
        <div class="container teacher my-4">
          <a href="home.php" class="btn btn-secondary">Back</a>
          <a href="managereq.php" class="btn btn-danger">Sign Up Requests (<?php echo $num ?>)</a>
        <h3 class="text-center">Manage  Users</i></small></h3>
    <table class="table my-4">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Created On</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $sql = "SELECT * FROM `accounts` WHERE email != 'admin@gmail.com'";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
        $id++;
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$row['email'].'</td>
        <td>'.$row['username'].'</td>
        <td>'.$row['create_on'].'</td>
        <td><a href="deleteadmin.php?id='.$row['sno'].'"<button class="btn btn-danger">Delete</button>
        </td>
        <td><a href="editAdmin.php?email='.$row['email'].'&username='.$row['username'].'&password='.$row['password'].'"><ion-icon name="create-outline" style="font-size: 20px; cursor: pointer; font-weight: 800"></ion-icon></a></td>
      </tr>';
     }
    }
    else{
      echo '<h6 class="text-center">No admins except you. Try to add admins</h6>';
    }
    ?>
  </tbody>
</table>
<a data-bs-toggle="modal" data-bs-target="#addteacher" class="btn btn-primary w-100">Add Admins</a>
    </div>
        </div>
        <div class="main">
        <?php include 'modal.php' ?>
    <h2 class="text-center my-3">Manage Classes</h2>
   <div class="container my-5">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Class Name</th>
      <th scope="col">Created_On</th>
      <th scope="col">Created_By</th>
      <th scope="col-2">Action</th>
    </tr>
  </thead>
  <tbody>
   <?php 
 

    $sql = "SELECT * FROM `classes`";
    $res = mysqli_query($conn, $sql);
    $sn = 0;
    if(mysqli_num_rows($res) > 0){
    while($row = mysqli_fetch_assoc($res)){
      $sn++;
     echo ' <tr>
      <th scope="row">'.$sn.'</th>
      <td>'.$row['class_name'].'</td>
      <td>'.$row['sdate'].'</td>
      <td>'.$row['created_by'].'</td>
      <td> <a href="class.php?id='.$row['sno'].'&classname='.$row['class_name'].'"" class="btn btn-primary" title="Manage Class">Visit</a><a title="Delete Class" href="deletecls.php?id='.$row['sno'].'&ref=adminPage.php" class="mx-3 my-3"><ion-icon name="trash-outline"style="font-size: 25px; color: red; cursor: pointer; font-weight: 800"></ion-icon></a></td>
      <td><a class="mx-2" href="editClass.php?id='.$row['sno'].'&value='.$row['class_name'].'&ref=adminPage.php"><ion-icon name="create-outline" style="font-size: 20px; cursor: pointer; font-weight: 800"></ion-icon></a></td>
    </tr>';
    }
   }
   else{
      echo '
      <th></th>
      <th></th>
      <th>No classes created yet</th>
      <th></th>
      <th></th>
      ';
   }
   ?>
  </tbody>
</table></div>
<!-- <button class="btn btn-primary b" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Class</button> -->

    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>