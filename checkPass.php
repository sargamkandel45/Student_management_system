<?php include 'bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Pass</title>
</head>
<?php
$password = 'samc111@';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $pass = $_POST['password'];
    if($pass == $password){
        session_start();
        $_SESSION['admin'] = true;
        header('location: adminPage.php');
    }
}
?>
<body>
    <h2 class="text-center my-5">Enter Password to enter page</h2>
    <div class="container my-5">
     <form action="" method="POST">
       <input type="password" placeholder="Enter the code..." name="password" class="form-control">
       <button class="btn btn-primary my-4">Visit</button>
     </form>
    </div>
</body>
</html>