<?php include 'bootstrap.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remark of <?php echo $_GET['name'] ?></title>
    <style>
        .img{
            height: 40px;
            box-shadow: 2px 3px 6px grey;
            width: 50px;
            border-radius: 50%;
        }
        .t-r{
            width: 50%px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 3px 4px 18px rgb(82, 82, 82), -2px -3px 16px grey;
            border-radius: 3px;
        }
        .remark{
            display: flex;
        }
        .main{
            margin-left: 20px;
        }
        .main span{
            margin-left: 10px;
        }
        .main .name{
            font-size: 18px;
            font-weight: 600;
        }
        .remark-text{
            padding-top: 10px;
            position: relative;
            left: 7%;
            font-weight: 600;
        }
        .del{
            position: relative;
            left: 95%;
            font-size: 25px;
        }
        .h2{
            text-align: center;
        }
        .input{
            background-color: rgb(45, 45, 45);
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
        form{
            display: flex;
        }
        form input{
            width: 80%;
        }
        form button{
            cursor: pointer;
            width: 10%;
            background-color: rgb(20, 105, 252);
            color: white;
        }
        h5{
            padding-bottom: 4px;
        }
        .main-container{
            overflow: scroll;
            height: 550px;
            padding: 5px 40px;
        }
        .main-container::-webkit-scrollbar{
            display: none;
        }
        .c{
            display: inline-block;
            margin-left: 400px;
            padding: 5px 15px;
            border: 2px solid black;
        }
        .del{
            text-decoration: none;
        }
        .d{
            background: black;
            position: absolute;
            left: 10%;
            top: 10%;
            color: white;
            padding: 5px 30px;
            text-decoration: none;
        }
        .d:hover{
           color: cyan;
        }
        .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.5;
        }
    </style>
</head>
<?php
error_reporting(0);
include 'connection.php';
  session_start();
  $ad = $_SESSION['username'];
 $sql = "SELECT * FROM `accounts` WHERE email = '$ad'";
 $res = mysqli_query($conn, $sql);

while($r = mysqli_fetch_assoc($res)){
    $admin = $r['username'];
$photo = $r['photo'];
}
$nameOfStu = $_GET['name'];
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $remark = $_POST['remark'];
     if($remark != NULL){
        $sql1 = "INSERT INTO `remark` (`student_name`, `remark_by`, `remark_text`, `image`, `sdate`) VALUES ('$nameOfStu', '$admin', '$remark', '$photo', current_timestamp());";
        $result = mysqli_query($conn, $sql1);
     } 
 } 
?>
<body>
    <img src="images/samc.png" alt="bg" class="bg">
    <div class="container mx-3 my-5">
        <?php
   
    echo '<a href="class.php?id='.$_GET['classid'].'&classname='.$_GET['classname'].'" class="d">Back</a> <h2 class="h2">Remarks of '.$_GET['name'].'</h2>';
        ?>
        <div class="main-container">
           
            <?php
             $stu = $_GET['name'];
             $sql = "SELECT * FROM `remark` WHERE student_name='$stu' ORDER BY sdate DESC";
             $res = mysqli_query($conn, $sql);
if(mysqli_num_rows($res) > 0){
             while($row = mysqli_fetch_assoc($res)){
                echo '<div class="t-r">
                <div class="remark-main">
                    <div class="remark">
                    ';
                    if($row['remark_by'] == $admin){
echo ' <span class="del"><a href="deletere.php?id='.$row['sno'].'&name='.$row['student_name'].'&classid='.$_GET['classid'].'&classname='.$_GET['classname'].'" class="del">❌</a></span>';
                    }
                       echo ' 
                    <img class="img" src="images/'.$row['image'].'">
                    <div class="main">
                        <span class="name">'.$row['remark_by'].'</span>
                        <span class="date">Remark added on '.$row['sdate'].'</span>
                    </div>
                </div>
                <p class="remark-text">
                   '.$row['remark_text'].'
                </p>
            </div>
         </div>';
             }
            }
            else{
                echo "<h3 class='text-center my-5 c'>No Remark of this student till now</h3>";
            }
            ?>
        <div class="input">
            <h5 class="text-light">
                Write remark about <?php echo $_GET['name'] ?>
            </h5>
            <form action="" method="post">
                <input type="text" class="form-control" name='remark' placeholder="Write your remark">
                <button type="submit">Send</button>
            </form>
        </div>
    </div>
    <script>
        if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
    </script>
</body>
</html>