<?php
  include 'connection.php';
 include 'bootstrap.php';

?>


<?php include 'checkLogin.php' ?>
<?php
$id = $_GET['id'];
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $owner = $_POST['select'];

    $sql = "UPDATE `classes` SET class_name='$name', created_by='$owner' WHERE sno=$id";
    $result = mysqli_query($conn, $sql);

    if($result){
        header('location: '.$_GET['ref']);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Class</title>
</head>
<body>
<?php include 'navbar.php' ?>
<div class="container my-4">
   <form method="post">
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Change Name</label>
    <input type="text" class="form-control w-80" value="<?php echo $_GET['value']; ?>" name="name" id="exampleInputEmail1" placeholder="Change class name..." aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Change Owner</label>
    <select name="select" id="select" class="form-control">
      <?php
       $idd = $_GET['id'];
       $sql = "SELECT * FROM `classes` WHERE sno=$idd";
       $resu = mysqli_query($conn, $sql);

       while($roww = mysqli_fetch_array($resu)){
         $email = $roww['created_by'];
       }
       echo '<option value="'.$email.'">'.$email.'</option>'
       ?>
      <?php
       $sql = "SELECT * FROM `accounts` WHERE email != '$email'";
       $res = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_array($res)){
        echo '<option value="'.$row['email'].'">'.$row['email'].'</option>';
       }
      ?>
    </select>
  </div>
  <button class="btn btn-primary my-2">Update</button>
   </form> </div>
</body>
</html>