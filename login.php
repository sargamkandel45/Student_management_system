<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>


<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['pass'];


    if($email != NULL){
        $sql = "SELECT * FROM `accounts` WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
              $username = $row['email'];
              $realPass = $row['password'];

              $hashedPass = md5($password);
              
        
              if($hashedPass == $realPass){
                    $sql1 = "UPDATE `accounts` SET `status` = 'online' WHERE email='$username'";
                    $result2 = mysqli_query($conn, $sql1);
                    session_start();
                    $_SESSION['admin'] = false;
                      $_SESSION['loggedIn'] = true;
                      $_SESSION['username'] = $username;
                      $_SESSION['post'] = $row['post'];
                      if($row['post'] == 'teacher'){
                          header('location: home.php');
                          
                      }
                      else{
                          header('location: stuparent.php');
                  }
             
              }
              else{
              echo "<script>alert(Hashes Password is ".$hashedPass." and Real Password is ".$realPass.");</script>";  
                header('location: login.php?hash='.$hashedPass);
              }
        }
      }
    }
    else{
        echo "<script>alert('Please enter your email address to contiune');</script>";
    }

  }



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');


        * {
            margin: 0;
            padding: 0;
            font-family: 'Rubik', sans-serif;
            outline: none;
        }

        body {
            overflow: hidden;
        }

        .login-page {
            background-color: rgb(255, 255, 255);
            width: 400px;
            padding: 20px 10px;
            border-radius: 5px;
            box-shadow: 3px 4px 40px rgb(52, 52, 52),
                -3px -4px 40px rgb(52, 52, 52);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            top: 7%;
        }

        .input-boxes {
            width: 100%;
            position: relative;
            left: 10px;
        }

        .input-boxes .input {
            margin-top: 10px;
        }

        .login-page h2 {
            padding-bottom: 20px;
        }

        .login-page .input input {
            border: none;
            box-shadow: 20px 15px 50px rgb(41, 41, 41);
            position: relative;
            border-radius: 4px;
            padding: 0 5px;
            width: 90%;
            height: 40px;
            font-size: 15px;
        }

        .login-page .input button {
            cursor: pointer;
            border-radius: 5px;
            background-color: black;
            color: wheat;
            margin-top: 20px;
            width: 94%;
            height: 40px;
            font-size: 15px;
        }

        .login-page .input input:hover {
            box-shadow: 2px 5px 12px grey inset;
            border: none;
            transition: 0.5s;
        }

        .con {
            display: flex;
        }

        .img {
            height: 100%;
            width: 100%;
            position: absolute;
            z-index: -9999;
            top: 0;
            left: 0;
            opacity: 2;
            animation: hello 10s infinite;
            scale: 2;
        }

        @keyframes hello {

            0% {
                top: 0;
            }

            25% {
                top: 40%;
                left: 5%;
            }

            50% {
                right: 0;
                top: 20%;
                left: 0;
            }

            100% {
                bottom: 0%;
            }
        }

        .samc {
            height: 120px;

        }

        .banner {
            height: 400px;
            width: 90%;
            position: absolute;
            left: 5%;
            z-index: -99994745644;
        }

        .ca {
            position: relative;
            left: 30%;
            margin-top: 10px;
        }

        .rr {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 423px) {
            .login-page {
                width: 90%;
            }
        }
        /* .error{
            width: 95%;
            padding: 10px;
            color: red;
            border-radius: 8px;
            border: 1px solid red;
            background-color: rgb(255, 234, 234);
        } */
    </style>
</head>

<body>

    <img src="images/banner.gif" class="banner" alt="banner">
    <form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" target="_self">
        <div class="con">
            <img src="images/collage.png" class="img" alt="Image">
            <div class="rr">
                <section class="login-page">
                    <section class="sainik-img">
                        <img src="images/samc.png" class="samc" alt="">
                    </section>
                    <h2>Enter Details To login</h2>
                    <div class="input-boxes">
                        <div class="input">
                            <input type="text" name="email" id="gmail" placeholder="Your id">
                        </div>
                        <div class="input">
                            <input type="password" name="pass" id="password" placeholder="Your password...">
                        </div>
                        <div class="input">
                            <button class="btn">Login</button>
                            <a href="signUp.php" class="ca my-3">Create Account</a>
                        </div>
                </section>
            </div>
        </div>
        </div>
    </form>
    </div>
</body>
<script>
    
    if (window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</html>