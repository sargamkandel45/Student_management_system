<?php
 include 'connection.php';
 $postid = $_POST['postid'];
 $sql = "SELECT * FROM `comments` WHERE postid = $postid ORDER BY sno DESC";
 $result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_assoc($result)){
    echo ' <div class="comment">
    <p class="nam">'.$row['comment_by'].'</p>
    <p class="txt">'.$row['comment_text'].'</p>
</div>';
 }
}else{
    echo '<h3 class="center">No Comment Yet</h3>';
}
?>