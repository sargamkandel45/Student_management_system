<?php
session_start();
include 'connection.php';
$cur_user = $_SESSION['username'];
$post = $_SESSION['post'];
$sql = "SELECT * FROM `accounts` WHERE email = '$cur_user'";
$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($res)){
    $username = $row['username'];
    $image = $row['photo'];
}

 $sql = "SELECT * FROM `chats` WHERE post = '$post' ORDER BY sno DESC ";
 $res = mysqli_query($conn, $sql);
 $html = '';
if(mysqli_num_rows($res)>0){
 while($row = mysqli_fetch_array($res)){
    if($row['message_by'] == $username){
        $html = $html . '
        <div class="message">
            <div class="message-right div">
            <div class="img-txt">
                <img src="images/'.$row['image'].'" alt="">
            <p class="name">'.$row['message_by'].'<span>'.$row['sdate'].'</span></p>
        </div>
            <p class="text">'.$row['message_text'].'</p>
        </div>
    </div>
        ';
    }
    else{
        $html = $html . '
    <div class="message">
        <div class="message-left div">
        <div class="img-txt">
        <img src="images/'.$row['image'].'" alt="">
        <p class="name">'.$row['message_by'].'<span>'.$row['sdate'].'</span></p>
    </div>
        <p class="text">'.$row['message_text'].'</p>
    </div>
</div>
    ';
    }
 }
}
else{
    echo '<h4 class="text-center1">No message till now</h4>';
}
 echo $html;
?>