<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>


<?php
  

  include 'connection.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $username = $_POST['username'];
    $filename = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $post = $_POST['post'];
    $folder = 'images/'.$filename;
    move_uploaded_file($tmp_name, $folder);
    if($email != '' && $password != '' && $username != ''){
    $sql = "INSERT INTO `requests` (`username`, `email`, `password`, `photo`, `post`, `status`, `create_on`) VALUES ('$username', '$email', '$password', '$filename', '$post', 'notpermited', current_timestamp());";
    $result = mysqli_query($conn, $sql);
}

  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');


*{
    margin: 0;
    padding: 0;
    font-family: 'Rubik', sans-serif;
    outline: none;
}
body{
    overflow: hidden;
}
.login-page{
    background-color: rgb(255, 255, 255);
    width: 400px;
    padding: 15px 10px;
    border-radius: 5px;
    box-shadow: 3px 4px 40px rgb(52 52 52), -3px -4px 40px rgb(52 52 52);
    display: flex;
    flex-direction: column;
    position: absolute;
    top: 23%;
    left: 35%;
    align-items: center;
    z-index: 999;
    opacity: 0.9;
}
.input-boxes{
    width: 100%;
    position: relative;
    left: 10px;
}
.input-boxes .input{
    margin-top: 10px;
}
.login-page h2{
    padding-bottom: 20px;
}
.login-page .input input{
    border: none;
    box-shadow: 20px 15px 50px rgb(41, 41, 41);
    position: relative;
    border-radius: 4px;
    padding: 0 5px;
    width: 90%;
    height: 40px;
    font-size: 15px;
}
.login-page .input button{
    cursor: pointer;
    border-radius: 5px;
    background-color: black;
    color: wheat;
    margin-top: 20px;
    width: 94%;
    height: 40px;
    font-size: 15px;
}
.login-page .input input:hover{
    box-shadow: 2px 5px 12px grey inset;
    border: none;
    transition: 0.5s;
}
.con{
    display: flex;
}
.img{
    height: 100%;
    width: 100%;
    position: absolute;
    z-index: -9999;
    top: 0;
    left: 0;
    opacity: 2;
    animation: hello 9s infinite;
}
@keyframes hello {
    0%{
       top: 0;
    }
    25%{
        top: 40%;
        scale: 1;
    }
    50%{
       bottom: 20%;
    }
    100%{
    top: 0;
    }
}
.samc{
    height: 120px;
    opacity: 0.6;
    display: none;
    
}

.banner{
    height: 450px;
    width: 100%;
    position: absolute;
    left: 0;
    z-index: -99644;
}
.ca{
 position: relative;
 left: 10%;
 margin-top: 10px;
}
@media (max-width: 814px) {
    .login-page{
        left: 15%; 
    }
}
@media (max-width: 532px) {
    .login-page{
        width: 350px;
        left: 5%; 
    }
}
    </style>
</head>
<body>
<img src="images/banner.gif" class="banner" alt="banner">
<form action="<?php $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    <div class="con">
    <img src="images/Untitled design.png" class="img" alt="Image">
    <div class="rr">
    <section class="login-page">
        <section class="sainik-img">
            <img src="images/samc.png" class="samc" alt="">
        </section>
        <h2>Request To Signing</h2>
        <div class="input-boxes">
        <div class="input">
                <input type="text" name="username" id="username" placeholder="Your username">
            </div>
            <div class="input">
                <input type="email" name="email" id="gmail" placeholder="Your email">
            </div>
            <div class="input">
                <input type="password" name="pass" id="password" placeholder="Your password...">
            </div>
            <div class="input">
                <input type="file" name="file" id="file" placeholder="Your file">
            </div>
            <div class="input">
            <label for="email">Post</label>
                        <select name="post" id="" class="form-control">
                            <option value="parent/student">Parent/Student</option>
                            <option value="teacher">Teacher</option>
                        </select>
            </div>
            <div class="input">
                <button class="btn">Send Request For Signing Up</button>
                <a href="login.php" class="ca my-3">Already Have an account? LogIn Here</a>
            </div>
    </section>
    </div>
</div>
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

    // let email = document.getElementById('email');
    // let pass = document.getElementById('password');
    // let  = document.getElementById('password');
    // let pass = document.getElementById('password');
    // let pass = document.getElementById('password');
    // let 
    // $.ajax({
    //     url: 'sendRequest.php',
    //     type: 'POST',
    //     data: {

    //     }
    // })

</script>
</body>
</html>