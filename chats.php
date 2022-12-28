<?php
error_reporting(0);
  include 'connection.php';
 include 'bootstrap.php';
    session_start();
  $post = $_SESSION['post'];
    $cur_user = $_SESSION['username'];
    $sql = "SELECT * FROM `accounts` WHERE email = '$cur_user'";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($res)){
        $username = $row['username'];
        $image = $row['photo'];
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chats</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap');

        * {
            outline: none;
            margin: 0;
            padding: 0;
            font-family: 'Rubik', sans-serif;
        }

        .messagebox {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .interface {
            box-shadow: 3px 4px 10px rgb(59, 59, 59);
            height: 600px;
            padding: 10px 15px;
        }

        .message {
            padding: 15px 0;
            margin: 8px 0;
        }

        .message .div {
            border-radius: 10px;
            padding: 8px;
            width: 35%;
        }

        .message .message-right {
            background-color: rgb(0, 98, 255);
            /* margin-top: 30px; */
            opacity: 0.8;
            box-shadow: 3px 4px 7px rgb(102, 135, 255);
            position: relative;
            left: 65%;
        }

        .message .message-left {
            opacity: 0.7;
            box-shadow: 2px 3px 12px rgb(76, 76, 76);
            background-color: rgb(92, 92, 92);
        }

        .interface {
            width: 60%;
            height: 94%;
        }

        .inner-part {
            height: 86%;
            overflow-y: scroll;
        }

        .inner-part::-webkit-scrollbar {
            display: none;
        }

        .text-center {
            border-bottom: 4px solid rgb(102, 102, 102);
        }

        .message .div p {
            color: white;
        }

        .message .div span {
            color: cyan;
            margin-left: 20px;
        }

        .img-txt {
            display: flex;
        }

        .img-txt img {
            width: 60px;
            border: 4px solid rgb(231, 231, 231);
            height: 50px;
            border-radius: 50%;
        }

        .img-txt p {
            position: relative;
            top: 15px;
            left: 12px;
        }

        .text {
            padding: 6px 15px;
            margin: 10px;
        }

        .form {
            border-top: 2px solid black;
            padding: 6px 0;
            width: 100%;
        }

        form {
            width: 100%;
        }

        form input {
            padding: 0 10px;
            height: 45px;
            width: 80%;
        }

        form button {
            border: none;
            background-color: rgb(0, 89, 255);
            color: white;
            font-weight: 600;
            font-family: cursive;
            font-size: 18px;
            border-radius: 6px;
            height: 45px;
            width: 15%;
        }

        .text-center1 {
            text-align: center;
            margin-top: 50px;
            font-weight: 600;
            font-size: 25px;
            border: 4px solid silver;
            padding: 5px 10px;
            font-family: cursive;
        }

        .teacher-details {
            padding: 10px 15px;
            box-shadow: 5px 9px 16px rgb(39, 39, 39);
            height: 90%;
            width: 30%;
        }
        .list{
            z-index: -99999;
            margin-top: 20px;
            box-shadow: 7px 6px 15px rgb(68, 68, 68) inset;
            padding: 9px 10px;
            border-radius: 5px;
            display: flex;
            width: 90%;
            position: relative;
            left: 5%;
        }
        .list:hover{
            box-shadow: 7px 6px 15px rgb(68, 68, 68), -3px -3px 8px rgb(68, 68, 68);

        }
        .list img{
            margin-top: 4px;
            box-shadow: 2px 3px 5px grey, -3px -2px 6px grey;
            height: 50px;
            border-radius: 50%;
        }
        .list p{
            color: rgb(6, 6, 6);
            position: relative;
            line-height: 58px;
            left: 7%;
        }
        .all{
            height: 90%;
            overflow-y: scroll;
        }
        .all::-webkit-scrollbar-button{
            border-radius: 10%;
        }
        .name{
            display: flex;
        }
        @media (max-width: 1451px) {
            .interface{
                width: 90%;
            }
            .teacher-details{
                display: none;
            }
        }

        h5{
            text-align: center;
        }
        .name span{
            margin: 0 0 0 90px;
        }
        .user-image{
            height: 50px;
            width: 60px;
        }
        .center{
            text-align: center;
            margin-top: 40px;
            text-decoration: underline;
        }

        @media (max-width: 958px) {
            .div span{
                display: none;
            }
            .message .div{
           width: 60%;
        }
        .message .message-right{
            left: 40%;
        }
        }
        .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.2;
        }
        @media (max-width: 1200px) {
            .bg{
                display: none;
            }
        }
    </style>
</head>

<body>
    
<img src="images/samc.png" alt="bg" class="bg">
    <div class="messagebox">
        <div class="teacher-details">
            <h3 class="text-center">Teacher</h3>
            <div class="all">
                <div class="on">
                <?php
     $sql = "SELECT * FROM `accounts` WHERE status='online' AND email != '$cur_user' AND post = '$post'";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
        $id++;
        echo '<div class="list">
        <img src="images/'.$row['photo'].'" id="user-image" alt="">
        <p class="name">'.$row['username'].' <span>🟢</span> </p>
        </div>';
     }
    }
    else{
        echo '<span style="margin: 0 20px 0 0">No User To Chat</span>';
    }
    ?>
</div>
    <?php
     $sql = "SELECT * FROM `accounts` WHERE status='offline' AND email !=' $cur_user' AND post = '$post'";
     $result = mysqli_query($conn, $sql);
     $id = 0;
     if(mysqli_num_rows($result) > 0){
     while($row = mysqli_fetch_assoc($result)){
        $id++;
        echo '<div class="list">
        <img src="images/'.$row['photo'].'" alt="">
        <p class="name">'.$row['username'].'  <span>🔴</span> </p>
        </div>';
     }
    }
     $sql1 = "SELECT * FROM `accounts`";
     $res = mysqli_query($conn, $sql1);

    if(mysqli_num_rows($res)< 0){
        echo '<h4 class="center">No users Found</h4>'. mysqli_num_rows($res);
    }
    ?>
        </div>
    </div>
        <div class="interface">
            <h2 class="text-center">Discussion Room</h2>
            <div class="inner-part">
            <!-- <div class="message">
        <div class="message-left div">
        <div class="img-txt">
        <img src="images/'.$row['image'].'" alt="">
        <p class="name">Sargam Kandel<span>9:30 AM</span></p>
    </div>
        <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto excepturi ut natus adipisci nemo ipsum modi sit iure explicabo assumenda?</p>
    </div>
</div>
<div class="message">
    <div class="message-right div">
    <div class="img-txt">
    <img src="images/'.$row['image'].'" alt="">
    <p class="name">Sargam Kandel<span>9:30 AM</span></p>
</div>
    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto excepturi ut natus adipisci nemo ipsum modi sit iure explicabo assumenda?</p>
</div>
</div> -->
            </div>
            <?php
             $num = mysqli_num_rows($result);

             if($num != 0){
                echo '<div class="form">
                    <form action="" method="POST">
                        <input type="text" placeholder="Write a message...">
                        <button>Send</button>
                    </form>
                </div>';
             }
            ?>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>



        $('form button').on('click', (e) => {
            e.preventDefault();
            if ($('input').val() != '') {
                $.ajax({
                    url: 'sendData.php',
                    type: 'POST',
                    data: {
                        messageBy: '<?php echo $username ?>',
                        messageText: $('input').val(),
                    },
                    success: function (data) {
                        console.log(data);
                    }
                })
            }
            $('input').val('')
        })
        setInterval(() => {
            $.ajax({
                url: 'getData.php',
                type: 'POST',
                data: {

                },
                success: function (data) {
                    console.log(data)
                    $('.inner-part').html(data)
                }
            })

        }, 1);
    </script>
</body>

</html>
