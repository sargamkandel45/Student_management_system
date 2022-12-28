<?php
include 'connection.php';
include 'bootstrap.php';
  session_start();
  $cur_user = $_SESSION['username'];
  $post = $_SESSION['post'];
  $sql = "SELECT * FROM `accounts` WHERE email = '$cur_user'";
  $res = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($res)){
      $username = $row['username'];
      $image = $row['photo'];
  }


 $messageBy = $_POST['messageBy'];
 $messageText = $_POST['messageText'];
 echo $image;

 $sql = "INSERT INTO `chats` (`message_by`, `message_text`, `image`, `post`, `sdate`) VALUES ('$messageBy', '$messageText', '$image', '$post', current_timestamp());";
 $result = mysqli_query($conn, $sql);
?>