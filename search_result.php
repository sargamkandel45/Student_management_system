<?php
session_start();
 if($_SESSION['loggedIn'] != true){
    header('location: login.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dosis:wght@600&display=swap');
        *{
            margin: 0;
            padding: 0;
            font-family: cursive;
        }
        body{
            height: 84vh;
        }
        .main-container{
            background-color: rgb(241, 241, 241);
            display: flex;
            /* width: 100%; */
            height: 90vh;
            justify-content: center;
            align-items: center;
        }
        .con{
            display: flex;
            height: 100%;
            width: 100%;
            justify-content: center;
            align-items: center;
        }
        section{
            box-shadow: 3px 4px 10px rgb(57, 57, 57);
            width: 30%;
            margin: 0 0 0 20px;
            border-radius: 8px;
        }
        section header{
            text-align: center;
            background: rgb(10,83,248);
background: linear-gradient(90deg, rgba(10,83,248,0.9363095580028886) 8%, rgba(0,35,255,0.5329482134650736) 100%);
            color: white;
            font-size: 25px;
        }
        h2{
            padding: 10px;
            text-align: center;
            border-bottom: 2px solid silver;
        }
        section .details{
            font-size: 22px;
            margin: 10px 0 0 10px;
        }
        section ul{
            margin: 0 0 0 -10px;
            list-style: none;
        }
        section ul li{
            width: 90%;
            margin-top: 10px;
            border-bottom: 2px solid silver;
            padding: 2px;
        }
        section ul li a{
            float: right;
            margin-top: -4px;
        }
        section img{
            height: 440px;
            width: 99%;
            margin: 1px 0 0 2px;
        }
        @media (max-width: 1036px) {
            .con{
                display: block;
            }
            section{
                margin-top: 12px;
                position: relative;
                right: 0%;
                width: 93%;
            }
        }
        .buttom{
            position: fixed;
            bottom: 0;
            left: 47%;
        }
        a{
            background-color: rgb(69, 69, 236);
            border-radius: 5px;
            font-size: 22px;
            padding: 4px 10px;
            position: absolute;
            left: 10px;
            top: 8px;
            
        }
        a:hover{
            transition: 1s;
            box-shadow: 2px 3px 10px rgb(28, 66, 255), -2px -2px 2px rgb(28, 66, 255);
        }
    </style>
</head>
<?php
error_reporting(0);
     include 'bootstrap.php';
    ?>
<body>
    <a href="home.php" style="text-decoration: none;
    color: white;
}">Back</a>
    <h2>Search Results for <i>'<?php echo $_GET['search_id'] ?>'</i></h2>
    <?php
    include 'connection.php';
    $sn = $_GET['search_id'];
    $found = false;
    $sn = $_GET['search_id'];
    $sql = "SELECT * FROM `students` WHERE sym_number='$sn'";
$res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
    $found = true;
}
    ?>
     <?php
      if($found == true){
     ?>
    <?php
       $sql = "SELECT * FROM `students` WHERE sym_number = '$sn'";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_array($result)){
        $firstname = $row['firstname'];
    $sym_num = $row['sym_number'];
    $gender = $row['gender'];
    $phone = $row['contact'];
    $dob = $row['dob'];
    $class = $row['class_name'];
    $batch = $row['batch'];
    $address = $row['address'];
       }
     ?>
<div class="main-container">
    <div class="con">
    <section class="sec-1">
        <header>User Details</header>
        <div class="details">
            <p>Student Name: <?php echo $firstname?></p>
            <p>Batch Number : <?php echo $batch?></p>
            <p>Gender : <?php echo $gender?></p>
            <p>Phone: <?php echo $phone?></p>
            <p>Date Of Birth: <?php echo $dob?></p>
            <p>Address: <?php echo $address?></p>
            <p>Class: <?php echo $class?></p>
        </div>
    </section>
</div>
</div>
<?php
      }
      else{
        echo '<h3 class="text-center my-5">No details found from '. $sn.'</h3>';
      }

?>
</body>
</html>