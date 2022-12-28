<?php
 include 'connection.php';

 $addBy = $_POST['name'];
 $messageText = $_POST['message'];
 $postid = $_POST['postid'];

 if($messageText !=''){
    $sql = "INSERT INTO `comments` (`comment_by`, `comment_text`, `postid`, `comment_on`) VALUES ('$addBy', '$messageText', $postid, current_timestamp());";
    $result = mysqli_query($conn, $sql);
 }

?>