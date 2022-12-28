
<?php
  include 'connection.php';
  session_start();
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
    <title>Reply to
        <?php echo $_GET['cap']; ?>
    </title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
        }
        .body{
            border-bottom: 4px solid silver;
        }
        .post{
            height: 80%;
            width: 40%;
            padding: 0 10px;
            box-shadow: 3px 4px 10px grey;
        }

        .post-main {
            width: 60%;
            background: var(--postColor);
            border-radius: 3px;
            margin-top: 10px;
            box-shadow: 3px 5px 10px rgb(41, 41, 41);
        }

        .post .head-post {
            border-bottom: 2px solid silver;
            padding: 10px;
        }

        .post .head-post img {
            box-shadow: -3px -4px 10px rgb(11, 11, 11);
            height: 50px;
            width: 60px;
            border-radius: 50%;
        }

        .name {
            position: relative;
            top: -20px;
        }

        .date {
            float: right;
            line-height: 55px;
        }

        .post .body {
            padding: 10px;
        }

        .post .photo img {

            width: 100%;
            border-radius: 4px;
        }
        .head-post input{
            height: 40px;
            padding: 5px 10px;
            width: 60%;
        }
        .head-post button{
            height: 40px;
            width: 24%;
            background-color: rgb(93, 93, 255);
            color: white;
            font-size: 19px;
            border: none;
        }
        .post1{
            width: 100%;
        }
        .body img{
            width: 100%;
            height: 100%;
        }
        .img{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 704px) {
            .post{
            width: 90%;
            }
            .container{
                flex-direction: column;
            }
        }
        .comment-area{
            height: 180px;
            overflow-y: scroll;
        }
        form button{
            cursor: pointer;
        }
        .comment{
            margin: 10px 0 0 0;
            background-color: rgb(45, 45, 45);
            opacity: 0.8;
            border-radius: 5px;
            padding: 5px 10px;
            box-shadow: 3px 4px 10px rgb(26, 26, 26);
        }
        .comment .nam{
         font-weight: 700;
         font-size: 18px;
         font-family: sans-serif;
         color:rgb(178, 205, 255);
        }
        .comment .txt{
         font-size: 17px;
         color: white;
         font-family: sans-serif;
        }
        .center{
            position: relative;
            top: 30px;
            text-align: center;
        }
        h2 a{ 
           border: 2px solid black;
           padding: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
    <div class="post">
    <h2><a href="home.php"><img src="images/Untitled design (3).png" alt="" height="50px"></a> <?php echo $_GET['postby'] ?>'s POST....</h2>
    <div class="post1">
        <div class="head-post">
            <img src="images/<?php echo $_GET['userimage'];?>" alt="profile">
            <span class="name"><?php echo $_GET['postby'];?></span>
            <span class="date"><?php echo $_GET['poston'];?></span>
        </div>
        <div class="body">
            <div class="caption">
                <p class="text" id="textt"><?php echo $_GET['cap'];?></p>
                <?php
                 if($_GET['postimage'] == ''){

                 }
                 else{
                    echo '<div class="img">
                    <a href="images/'.$_GET['postimage'].'"><img src="images/'.$_GET['postimage'].'" alt="post-image"></a>
                </div>';
                 }
                ?>
            </div>
        </div>
    </div>
<div class="head-post">
            <form action="" method="post">
            <input type="text" name="cmt" id="cmt" placeholder="Comment...">
            <button type="submit">Post</button>
        </form>
        </div>
        <h3>All Comments</h3>
        <div class="comment-area">
            <div class="comment-list">
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>
         if (window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    let form = document.querySelector('form');
    let cmtText = document.getElementById('cmt');

    form.onsubmit=(e)=>{
        e.preventDefault();
        $.ajax({
            url: 'sendComment.php',
            type: 'post',
            data: {
               name: '<?php echo $username ?>',
               message: cmtText.value,
               postid: <?php echo $_GET['postid'] ?>
            },
            success: function(data){
               console.log('Success ',data)
            }
        })
        cmtText.value = '';
    }
    setInterval(() => {
            $.ajax({
                url: 'getComment.php',
                type: 'POST',
                data: {
                    postid: <?php echo $_GET['postid'] ?>
                },
                success: function (data) {
                    console.log(data)
                    $('.comment-list').html(data)
                }
            })

        }, 1);
    </script>
</body>

</html>