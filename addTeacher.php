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
    $folder = 'images/'.$filename;
    $post = $_POST['post'];
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
<div class="modal fade" id="addteacher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                        <input type="file" class="form-control" name="file" id="img">
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
            </form>
        </div>
    </div>
</div>