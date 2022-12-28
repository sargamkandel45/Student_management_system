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