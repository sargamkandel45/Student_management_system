<?php

include 'bootstrap.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Request</title>
    <style>
        h3{
            position: absolute;
            top: 30%;
            left: 38%;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center">Manage Sign Up Request</h2>
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
    include 'connection.php';
     $sql = "SELECT * FROM `requests`";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
        $id++;
        echo ' <tr>
        <th scope="row">'.$row['sno'].'</th>
        <td>'.$row['username'].'</td>
        <td>'.$row['email'].'</td>
        <td><a href="images/'.$row['photo'].'"><img src="images/'.$row['photo'].'" height="50px"></a></td>
        <td>'.$row['post'].'</td>
        <td><a href="deletereq.php?id='.$row['sno'].'"<button class="btn btn-danger">Delete</button>
        </td>';
        if($row['status'] == 'notpermited'){
       echo '<td><a href="permit.php?sno='.$row['sno'].'&email='.$row['email'].'&username='.$row['username'].'&password='.$row['password'].'&photo='.$row['photo'].'&post='.$row['post'].'" class="btn btn-success">Permit</a></td>';
        }
        else{
       echo '<td><a class="btn btn-success">Permitted</a></td>';

        }
      echo '</tr>';
     }
    }
    else{
        echo '<h3> No requests till now</h3>';
    }
    ?>
  </tbody>
</table>
    </div>
</body>
</html>