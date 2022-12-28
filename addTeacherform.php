<?php 
include 'connection.php';
include 'bootstrap.php';
?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $username = $_POST['username'];
    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $post = $_POST['post'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tmp_name, $folder);

    if($filename == NULL){
        $filename = 'defaultuser.png';
    }
$sql = "SELECT * FROM `accounts` WHERE email='$email'";
$r = mysqli_query($conn, $sql);
if(mysqli_num_rows($r) < 1){
    if($email && $password != NULL){
        if(strlen($password) > 4){
            $hash = md5($password);
            $sql = "INSERT INTO `accounts` (`username`, `email`, `password`, `photo`, `post`, `status`, `create_on`) VALUES ('$username', '$email', '$hash', '$filename', '$post', 'offline', current_timestamp());";
            $res = mysqli_query($conn, $sql);
        }
        else{
        echo "<script>alert('Your password should be greater than 4');</script>";
        }
    }
    else{
        echo "<script>alert('Please enter the email and password');</script>";
    }
}
else{
    echo "<script>alert('Sorry email is already registered');</script>";
}
} 
?>
<?php include 'navbar.php'; ?>
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
<img src="images/samc.png" alt="bg" class="bg">
<h2 class="text-center my-4">Add admin</h2>
<div class="container my-4">
                <form action="" method="post" enctype="multipart/form-data">
                <div>
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div>
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="my-3">
                        <label for="email">Password</label>
                        <input type="password" class="form-control" name="pass" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="my-3">
                        <label for="email">Image</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                    <div class="my-3">
            <label for="email">Post</label>
                        <select name="post" id="" class="form-control">
                            <option value="parent/student">Parent/Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
            </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form></div>