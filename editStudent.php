<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>
<?php include 'checkLogin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            outline: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }
        .con{
            margin-top: 10px;
            width: 100%;
        }
        button{
            margin: 10px 0;
            padding: 5px 10px;
            color: white;
            background-color: black;
        }
        input{
            height: 45px;
            padding: 10px;
        }
        input, select{
            opacity: 0.8;
        }
        .con input,button{
            position: relative;
            left: 60px;
            width: 500px;
        }
        .o{
            display: flex;
        }
        .gen{
            display: flex;
            align-items: center;
            width: 500px;
            font-size: 20px;
            justify-content: center;
        }
        select{
          height: 45px;
          width: 50%;
          margin-left: 60px;
          margin-top: 10px;
        }
        .studentList{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.2;
        }
        .g{
           position: relative;
           left: 45px;
        }
        input{
            margin: 10px 0 0 0;
        }
    </style>
    <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_GET['id'];
        $classid = $_GET['classid'];
        $classname = $_GET['classname'];
        $name = $_POST['name'];
        $number = $_POST['num'];
        $contact = $_POST['contact'];
        $gender = $_POST['gender'];
        $date = $_POST['date'];
        $location = $_POST['loco'];

        if($name && $number && $contact && $gender && $date != ""){
    
        $sql = "UPDATE students SET firstname='$name', sym_number='$number', contact='$contact',gender='$gender',dob='$date', address='$location' WHERE sno=$id";
        $res = mysqli_query($conn, $sql);
        if($res){
            echo 'Success';
            header('location: class.php?id='.$classid.'&classname='.$classname);
        }
      }
    }
    ?>
</head>
<body>
    
<img src="images/samc.png" alt="bg" class="bg">
<?php include 'navbar.php' ?>
    <h2 class="text-center my-2">Update Student</h2>
<div class="container">
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <div class="con">
    <input type="text" name="name" value="<?php echo $_GET['name'] ?>" id="name" placeholder="Student's name...">
    <input type="text" name="num" value="<?php echo $_GET['number'] ?>"id="num" placeholder="Student's roll number...">
  </div>
  <div class="con o">
    <input type="text" name="contact" value="<?php echo $_GET['contact'] ?>" id="contact" maxlength="10" placeholder="Add contact number...">
    <div class="gen">
    <label for="gender" class="g">Gender</label>
    <select name="gender" id="gender">
        <?php
        if($_GET['gender'] == 'Female'){
        echo ' <option value="Female">Female</option>';
        echo ' <option value="Male">Male</option>';
        }
        if($_GET['gender'] == 'Male'){
            echo ' <option value="Male">Male</option>';
            echo ' <option value="Female">Female</option>';
            }
        ?>
        
    </select></div>
  </div>
  <div class="con">
    
  <input type="date" name="date" value="<?php echo $_GET['dob'] ?>" id="date" placeholder="Date of birth">
  <input type="text" name="loco" value="<?php echo $_GET['address'] ?>" id="loco">
  </div>
  <button type="submit">Update Data</button>
</form></div>
</div>
<hr>

</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>