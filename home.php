<!-- https://www.youtube.com/watch?v=CDo5WWBdrmk -->
<?php
error_reporting(0);
session_start();
if(isset($_SESSION['username']) == false){
    header('location: login.php');
}
if($_SESSION['post'] == 'parent/student'){
    header('location: stuparent.php');
}


include 'connection.php';
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
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="images/samc.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link rel="stylesheet" href="home.css"> -->
    <style>
       @import url('https://fonts.googleapis.com/css2?family=Andika&display=swap');
:root{
    --background: #fff;
    --colorTextCenter: rgb(15, 15, 15);
    --noPost: black;
    --classColor: rgb(255, 252, 247);
    --recentClass: rgb(15, 135, 255);
    --postColor: rgb(235, 238, 242);
    --addNewPostColor: white;
    --boxShadowPost: rgb(73, 73, 73);
    --idColor: rgb(217, 217, 217);
    --headColor: rgb(30, 30, 30);
    --navColorText: rgb(255, 255, 255);
    /* --postSection: rgb(213, 213, 213); */

}

*{
    text-decoration: none;
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    outline: none;
    list-style: none;
}
body{
    overflow: hidden;
}

.text-center{
    border-right: 4px solid rgb(70, 70, 70);
    text-align: center;
    padding: 10px;
    border-bottom: 4px solid rgb(75, 75, 75);
}
.text-center1{
    text-align: center;
    padding: 10px;
    border-bottom: 4px solid silver;
}
.container{
   width: 100%;
   display: flex;
   align-items: center;
}
.section-post{
    box-shadow: 4px 5px 8px rgb(53, 53, 53), -4px -5px 8px rgb(53, 53, 53);
    background: rgb(255, 255, 255);
    height: 92vh;
    width: 60%;
    margin-top: 4px;
}
.post-section{
    padding: 10px;
    width: 97%;
    height: 81vh;
    overflow-y: scroll;
    scrollbar-width: 10px;
    scrollbar-color: black;
}

.post-section::-webkit-scrollbar{
    display: none;
    
}
.post{
    background:var(--postColor);
    border-radius: 6px;
    margin-top: 10px;
    box-shadow: 3px 5px 10px rgb(41, 41, 41);
}
.post .head-post{
    border-bottom: 2px solid silver;
    padding: 15px;
}
.post .head-post img{
    box-shadow: -3px -4px 10px rgb(11, 11, 11);
    height: 50px;
    width: 60px;
    border-radius: 50%;
}
.name{
    position: relative;
    top: -20px;
    font-family: cursive;
    font-size: 19px;
    left: 10px;
    font-weight: 600;
}
.date{
    float: right;
    line-height: 55px;
    font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
.post .body{
    padding: 10px;
}
.post .photo img{
    width: 100%;
    border-radius: 4px;
}
.commentbox{
    border-top: 2px solid silver;
    /* width: 97.65%; */
    padding: 10px;
}
.commentbox input{
    padding: 0 10px;
    width: 74%;
    height: 40px;
}
.commentbox button{
    height: 40px;
    background-color: rgb(12, 126, 255);
    padding: 0 10px;
    color: white;
    border: none;
    font-size: 16px;
    border-radius: 4px;
}
.user-welcome{
    color: var(--navColorText);
    text-align: center;
    line-height: 58px;
    font-family: cursive;
    left: 42%;
    position: absolute;
    font-size: 22px;
}

nav{
    height: 65px;
    background: rgb(10,83,248);
background: linear-gradient(90deg, rgba(10,83,248,0.9363095580028886) 8%, rgba(0,35,255,0.5329482134650736) 100%);
    color: white;
    box-shadow: 4px 5px 10px rgb(21, 21, 21);
}
nav .h3{
    color: var(--navColorText);
    position: absolute;
    line-height: 50px;
    padding: 5px 0 0 15px;
    font-size: 22px;
}
nav ul{
    float: right;
    display: flex;
}

nav ul li{
    font-size: 19px;
    line-height: 60px;
    margin-right: 40px;
}
.caption .text{
    padding: 10px 0;
    font-weight: 600;
    font-size: 18px;
}
.caption #textt{
    font-size: 22px;
}

.section-class, .section-teacher{
    background-color: #fff;  
    width: 33.33%;
    height: 90vh;
    box-shadow: -2px -2px 7px rgb(55, 55, 55);
}
.section-class .all-classes a{
    position: relative;
    top: 20px;
    color: white;
    padding: 10px 35px;
    background-color: rgb(12, 109, 255);
    border-radius: 4px;
}
.section-class h2{
    margin: -3.8px 0 0 0;
}
.all{
    overflow-y: scroll;
    display: flex;
    align-items: center;
    flex-direction: column;
}
.class-sec{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}
.recent-class{
    margin-top: 50px;
}
.recent-class h3{
    letter-spacing: 1px;
    color: var(--recentClass);
    margin-left: 10px;
    padding: 20px;
    border-bottom: 6px solid silver;
}
.class{
    justify-content: space-between;
    width: 90%;
    background-color: var(--classColor);
    box-shadow: 3px 4px 9px rgb(0, 0, 0);
    padding: 8px 20px;
    display: flex;
    border-radius: 8px;
    margin: 20px 0 0 0;
}
.class p{
    font-size: 18px;
}
.class a{
    background-color: black;
    color: white;
    border-radius: 3px ;
    padding: 4px 8px;
}
.class a:hover{
    background-color: rgb(0, 85, 255);
    transition: 0.5s ease-in-out;
    box-shadow: 3px 4px 20px rgb(0, 115, 255);
}
.add-new-post{
    background-color: var(--addNewPostColor);
    position: absolute;
    bottom: 10%;
    left: 7%;
    font-size: 20px;
    border-radius: 9px;
    padding: 10px 15px;
    box-shadow: 4px 6px 12px rgb(0, 0, 0);
}
.add-new-post a{
    color: black;
}
.add-new-post span{
    background-color: rgb(255, 255, 255);
    box-shadow: 4px 4px 7px rgb(48, 48, 48) inset;
    padding: 0 10px;
    border-radius: 50%;
    font-size: 30px;
    color: rgb(44, 111, 255);
}
.add-new-post span:hover{
    box-shadow: 4px 4px 7px rgb(48, 48, 48);
}
.user{
    padding: 0 20px;
    display: flex;
}
.user img{
    padding: 5px 0;
   height: 50px;
   width: 60px;
   border-radius: 50%;
}
.user .user-name{
    color: var(--navColorText);
    padding: 0 10px;
    line-height: 55px;
}
.post-adding{
    z-index: 999;
    border-radius: 4px;
    position: absolute;
    bottom: 20%;
    left: 10%;
    display: none;
    padding: 20px;
    width: 300px;
    background-color: white;
    box-shadow: 3px 8px 20px rgb(22, 138, 255);
}
.post-adding h3{
    text-align: center;
    padding-bottom: 10px;
    border-bottom: 3px solid black;
}
.inputs{
    margin: 10px 0 0 0;
}
.input{
    margin-top: 10px;
}
.inputs input{
    width: 100%;
    height: 40px;
}
.inputs input, textarea{
    border-radius: 3px;
    padding: 0 3px;
}
.input textarea{
    width: 100%;
    height: 80px;
}
.post-adding button{
    width: 100%;
    padding: 8px 10px;
    color: white;
    border-radius: 4px;
    background-color: rgb(0, 119, 255);
    border: none;
    cursor: pointer;
    border-top: 2px solid silver;
    padding-top: 10px;
}
.post-adding a{
    float: right;
    cursor: pointer;
    margin-top: -10px;
}
.fa-power-off{
    margin-top: 15px;
    margin-right: 10px;
}
.id{
    display: flex;
}
.id:hover{
    transition: 1s;
    cursor:grab;
    box-shadow: 3px 4px 5px rgb(90, 90, 90);
}
.id img{
    width: 60px;
    height: 45px;
    border-radius: 50%;
}
.section-teacher{
    /* padding: 0 15px; */
}
.section-teacher h2{
    margin-top: -3.9px;
}
.head-teacher h3{
    margin: 10px 0 0 0;
    text-align: center;
    color: var(--headColor);
    width: 100%;
}
.id{
    margin: 10px 0 0;
    width: 90%;
    background-color: var(--idColor);
    box-shadow: 2px 2px 3px rgb(163, 163, 163);
    padding: 6px 12px;
    border-radius: 4px;
    border-bottom: 2px solid black;
}
.id .teacher-name{
    line-height: 30px;
    padding: 8px;
}
.id img{
    box-shadow: 2px 3px 6px grey;
}
.all::-webkit-scrollbar{
    display: none;
}
.more-btn{
    position: absolute;
    bottom: 0;
    width: 100%;
}
.more-btn .btn{
    margin-bottom: 10px;
    box-shadow: 4px 5px 12px rgb(22, 107, 255);
    padding: 10px 15px;
}
.more-btn .btn a{
    text-align: center;
    margin-left: 90px;
    font-size: 20px;
}
.logout img{
    margin-top: 10px;
    padding: 0 10px;
}
#post_title{
    font-family: cursive;
    font-size: 19px;
}
.nopost{
    color: var(--noPost);
}
.ano{
    position: relative;
    top: 6px;
    border: none;

    border-bottom: 4px solid rgb(75, 75, 75);
}
.subject-teacher{
    display: flex;
    align-items: center;
    flex-direction: column;
}
@media (max-width: 851px) {
    .section-class, .section-teacher{
        display: none;
    }
    .section-post{
        width: 100%;
    }
.user-welcome{
    display: none;
}
.icon{
   height: 40px;
}

.commentbox input{
    width: 50%;
}
.section-class input{
    padding: 5px 10px;
}
.another{
    bottom: 2%;
    left: 5%;
}
.user-name{
    display: none;
}
.section-post{
    height: 98vh;
}
.text-center{
    border-right: none;
}
}

.disscussion{
    height: 45px;
} 
  
#btn{
    cursor: pointer;
}

#dp{
    border: 2px solid black;
    padding: 5px 8px;
    margin: 0 10px 0 0;
    text-decoration: underline;
}
#vmc:hover{
    transition: 1s;
 box-shadow: 4px 5px 20px rgb(17, 61, 255);
}
#errorType{
    text-align: center;
    font-weight: 600;
    margin: 20px 0 00 0;
    border: 2px solid black;
    padding: 5px 10px;
    border-radius: 5px;
}

    </style>
</head>

<body>
    <nav>
        <h3 class="h3">SAMC</h3>
        <p class="user-welcome">Welcome <?php echo $cur_user;
       ?>!</p>        
        <ul>
            <div class="user">
                <p class="user-name">
                  <?php
                   echo $username;
                  ?>
                </p>
                <?php echo '<img src="images/'.$image.'">'; ?>
            </div>
           
<a href="logout.php" class="logout"><img src="images/logout(bg).png" alt="" height="30px"></a>

        </ul>
    </nav>

    <div class="container">
        <section class="section-class">
            <div class="search" style="display: flex; justify-content: center; flex-direction: column; border-bottom: 4px solid rgb(80, 80, 80); padding-bottom: 4px;">
                <span style="text-align: center;">Press Enter To Search</span>
                <form action="searchAvaibility.php" method="post">
            <input type="number" placeholder="Student Symbol Number..." name="sym" style="padding: 5px 10px; position: relative; margin: 10px 0 0 15px; height: 32px; width: 80%; 
            border-radius: 6px;
            border: 3px solid rgb(0, 119, 255);">
        </form>
        </div>
            <div class="class-sec">
                <div class="recent-class">
                    <h3>Recent Classes</h3>
                    <div class="classes">
                    <?php 
                    $sql = "SELECT * FROM `classes` LIMIT 4";
                    $res = mysqli_query($conn, $sql);
                    $sn = 0;
                    if(mysqli_num_rows($res) > 0){
                    while($row = mysqli_fetch_assoc($res)){
                      $sn++;
                     echo '<div class="class">
                     <p class="class-name">'.$row['class_name'].'</p>
                     <a href="class.php?id='.$row['sno'].'&classname='.$row['class_name'].'"">Visit</a>
                </div>';
                      }
                        echo ' <div class="all-classes">
                        <a href="home(man).php" id="vmc">View More Classes</a>
                    </div>';
                    }
                   ?>
        </div>
                </div>
            </div>
<?php
error_reporting(0);
            $title = $_POST['title'];
            $filename = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $folder = 'images/'.$filename;
            move_uploaded_file($tmp_name, $folder);

    // if($filename == NULL){
    //     $filename = '';
    // }
    if($title != NULL){
            $sql = "INSERT INTO `posts` (`post_title`, `post_by`, `user_photo`, `post_image`, `post_on`) VALUES ('$title', '$username', '$image', '$filename', current_timestamp());";
            $res = mysqli_query($conn, $sql);
    }
    // elseif($title == NULL AND isset($filename) != false){
    //     $sql = "INSERT INTO `posts` (`post_title`, `post_by`, `user_photo`, `post_image`, `post_on`) VALUES ('$title', '$username', '$image', '$filename', current_timestamp());";
    //     $res = mysqli_query($conn, $sql);
    // }
?>
<div class="post-adding tow">
                
    <a class="a">❌</a>
    <div class="section">
        <h3>Add Post</h3>
    </div>
    <div class="inputs">
        
    <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST" enctype="multipart/form-data">
        <div class="input">
            <input type="text" placeholder="Say Something..." name="title" id="post_title">
        </div>
        <div class="input">
           <input type="file" name="image" id="image"> 
        </div>
            <button type="submit">Post</button>
            
</form>
    </div>
</div>
            <div class="add-new-post another">
                <a href=""><span>+</span>Add New Post </a>
            </div>
        </section>
        <section class="section-post">
            <h2 class="text-center">All Posts</h2>
            <div class="post-section">
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
               
                  $sql = "SELECT * FROM `posts` ORDER BY post_id DESC";
                  $resu = mysqli_query($conn, $sql);

                  if(mysqli_num_rows($resu) > 0){
                  while($row = mysqli_fetch_assoc($resu)){
                    echo '<div class="post">
                    <div class="head-post">
                        <img src="images/'.$row['user_photo'].'" alt="profile">
                        <span class="name">'.$row['post_by'].'</span>
                        <span class="date">'.$row['post_on'].'
                        ';
                        if($row['post_by'] == $username){
echo '<a id="dp" href="deletePost.php?postid='.$row['post_id'].'">Delete</a>';
                        }
                        echo '</span>
                    </div>
                    <div class="body">
                        <div class="caption">
                            <div class="photo">
                            ';
                            if($row['post_image'] == ''){
                                echo '<p class="text" id="textt">'.$row['post_title'].'</p>';
                            }
                            else{
                            echo '
                            <p class="text">'.$row['post_title'].'</p><a href="reply.php?cap='.$row['post_title'].'&postby='.$row['post_by'].'&poston='.$row['post_on'].'&postimage='.$row['post_image'].'&userimage='.$row['user_photo'].'&postid='.$row['post_id'].'"><img src="images/'.$row['post_image'].'" alt="post-image"></a>';
                            }
                                
                            echo '</div>
                        </div>
                    </div>
                    <div class="commentbox">
                     <a href="reply.php?cap='.$row['post_title'].'&postby='.$row['post_by'].'&poston='.$row['post_on'].'&postimage='.$row['post_image'].'&userimage='.$row['user_photo'].'&postid='.$row['post_id'].'"><img src="images/cmt.png" height="40px"></a>
                    </div>
                </div>';
                  }
                }
                else{
                    echo '<h2 class="nopost" style="text-align: center;">No post Available</h2>';
                }
                ?>
            </div>
        </section>
        <section class="section-teacher">
            <h2 class="text-center ano">Discussion Room <a href="chats.php" style="margin-top: 10px; position: relative; top: 10px;"><img src="images/real.png" alt="" class="disscussion"></a></h2>
           <div class="teacher">
            <div class="head-teacher">
                <h3>Recently Joined Users</h3>
                <div class="all">
               <?php
                  $sql = "SELECT * FROM `accounts` WHERE email != '$cur_user'";
                  $resu = mysqli_query($conn, $sql);
                 if(mysqli_num_rows($resu) > 0){
                  while ($row2 = mysqli_fetch_assoc($resu)) {
                    echo ' <div class="id">
                    <img src="images/'.$row2['photo'].'" class="imagee" alt="">
                    <p class="teacher-name">'.$row2['username'].'</p>
                </div>';
                  }
                }
                else{
                    echo '<h4 id="errorType">No User Except You!</h4>';
                }
               ?>
               
                </div>
            </div>
           </div>
           <div class="more-btn">
            <div class="btn"><a href="adminPage.php">Admin Page</a></div>
         </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script>


  
        if (window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
        let button = document.querySelector('.add-new-post a');
        let area = document.querySelector('.post-adding');

        button.addEventListener('mouseenter',()=>{
           area.style.display = 'block';
        })

        document.querySelector('.a').addEventListener('click',(e)=>{
            area.style.display = 'none'
            console.log($('#image').src)

        })

     setInterval(() => {
        $.ajax({
            url: 'livePost.php',
            type: 'post',
            data: {
               
            },
            success: function(data){
                console.log(data)
              document.getElementsByClassName('post-section')[0].innerHTML = data;
            }
        })
 } , 600);
 
    </script>
</body>

</html>