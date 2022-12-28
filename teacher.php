<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>
<?php include 'checkLogin.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title>
    <style>
      .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.2;
        }
        button{
          opacity: 0.5;
        }
    </style>
</head>
<body>
<img src="images/samc.png" alt="bg" class="bg">
<?php include 'navbar.php' ?>
<?php include 'addTeacher.php' ?>

<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Are you sure you want to delete this class?
        <hr>
        <?php
        echo '<a href="deleteadmin.php?id='.$row['id'].'" class="btn btn-danger">Delete</a>';
        
        ?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancle</button>
        </div>
      </div>
    </div>
  </div>
<?php
  if(isset($_POST['submit'])){
    $name = $_POST['name'];

    if($name != ""){
    $sql = "INSERT INTO `classes` (`class_name`, `sdate`) VALUES ('$name', current_timestamp());";
    $res = mysqli_query($conn, $sql);
    }

  }
?>
    <div class="container teacher my-4">
        <h3 class="text-center">All Admin <small><i>(To delete admin contact the developer)</i></small></h3>
    <table class="table my-4">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Created On</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $sql = "SELECT * FROM `accounts`";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     while($row = mysqli_fetch_assoc($result)){
        $id++;
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$row['email'].'</td>
        <td>'.$row['username'].'</td>
        <td>'.$row['create_on'].'</td>
      </tr>';
     }
    ?>
  </tbody>
</table>
<a data-bs-toggle="modal" data-bs-target="#addteacher" class="btn btn-primary w-100">Add Admins</a>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>