
<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>
<?php
$created_by = $_SESSION['username'];
  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    if($name != ""){
    $sql = "INSERT INTO `classes` (`class_name`, `created_by`, `sdate`) VALUES ('$name', '$created_by', current_timestamp());";
    $res = mysqli_query($conn, $sql);
    }

  }
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Your Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <b class="my-2">Class Name</b>
        <input type="text" style="text-transform: uppercase;" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        <hr>
        <button class="btn btn-primary w-100" name="submit">Create Class</button></form>
      </div>
    </div>
  </div>
</div>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>