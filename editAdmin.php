
<?php
  include 'connection.php';
 include 'bootstrap.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <style>
    .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.2;
        }
        input{
            opacity: 0.7;
        }
</style>
<?php
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $sql = "UPDATE accounts SET username='$username', email='$email', password='$pass' WHERE email='$email'";
    $res = mysqli_query($conn, $sql);
    if($res){
        header('location: adminPage.php');
    }
 }
?>
    </head>
    <body>
<img src="images/samc.png" alt="bg" class="bg">
<h2 class="text-center my-4">Edit Admin Details</h2>
<div class="container my-4">
                <form action="" method="post" enctype="multipart/form-data">
                <div>
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $_GET['username'] ?>" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $_GET['email'] ?>" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="my-3">
                        <label for="email">Password</label>
                        <input type="password" class="form-control" name="pass" value="<?php echo $_GET['password'] ?>" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form></div>
</body>
</html>