<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>
<?php include 'checkLogin.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SPHU</title>
   <style>
      .card {
         padding: 20px;
         display: flex;
         box-shadow: 4px 5px 10px rgb(40, 40, 40);
      }

      .card p {
         float: right;
         font-size: 24px;
      }

      .h {
         display: flex;
      }

      .h a {
         position: absolute;
         right: 5%;
         top: 33%;
         padding: 8px 15px;
         color: white;
         background-color: black;
         border-radius: 4px;
         text-decoration: none;

      }
   </style>
</head>
<?php
include 'connection.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $classname = $_POST['classname'];
   $email = $_SESSION['username'];
   $sql = "INSERT INTO `classes` (`class_name`, `created_by`, `sdate`) VALUES ('$classname', '$email', current_timestamp());";
   $result = mysqli_query($conn, $sql);
  }
?>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Give a name to your class</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <input type="text" class="form-control" name="classname" placeholder="Classname...">
        <button type="button" class="btn btn-success my-2">Create</button>
      </div>
   </form>
    </div>
  </div>
</div>
   <div class="container my-5">
      <h2 class="text-center">All Classes</h2>
      <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New Class</a>
      <div class="con my-4">
         <?php 
                    $sql = "SELECT * FROM `classes`";
                    $res = mysqli_query($conn, $sql);
                    $sn = 0;
                    $num = mysqli_num_rows($res);
                    echo 'Total Classes : <B>'.$num.'</B>';
                    if($num > 0){
                    while($row = mysqli_fetch_assoc($res)){
                      $sn++;

                     echo '<div class="card my-4">
                        <div class="h">
                           <p class="classname"><b>'.$row['class_name'].'</b></p>
                        </div>
                        <div class="h">
                           <a href="class.php?id='.$row['sno'].'&classname='.$row['class_name'].'"">Visit</a>
                        </div>
            
                     </div>';
                      }
                    }
                   ?>
      </div>
   </div>
   <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
   <script>
       if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
   </script>
</body>

</html>