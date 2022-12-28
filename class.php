<?php include 'bootstrap.php' ?>
<?php include 'connection.php' ?>

<?php include 'checkLogin.php' ?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $classname = $_GET['classname'];
    $name = $_POST['name'];
    $num = $_POST['num'];
    $id = $_GET['id'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $batch = $_POST['batch'];
    $location = $_POST['address'];
    if($name && $num && $contact && $gender && $date != ""){
    $sql = "INSERT INTO `students` (`class_id`, `class_name`, `firstname`, `sym_number`, `batch`, `contact`, `dob`, `gender`, `address`, `stime`) VALUES ($id, '$classname', '$name', '$num', '$batch', '$contact', '$date', '$gender', '$location', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    }
    else{
        echo "<script>alert('Please fill the details to add student');</script>";
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <style>
        *{
            outline: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }
        .con{
            margin-top: 10px;
            width: 100%;
        }
        button{
            margin: 10px 0;
            padding: 5px 10px;
            color: white;
            background-color: black;
        }
        input, select{
          opacity: 0.9;
            height: 45px;
            padding: 10px;
        }
        .con input,button{
            position: relative;
            left: 60px;
            width: 500px;
        }
        select{
          width: 50%;
          margin-left: 60px;
          margin-top: 10px;
        }
        .o{
            display: flex;
        }
        .gen{
            display: flex;
            align-items: center;
            width: 500px;
            font-size: 20px;
            justify-content: center;
        }
        .studentList{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .txt{
          text-decoration: none;
        }
        .bg{
            position: absolute;
            left: 33%;
            top: 15%;
            z-index: -498757465746584765734657348365734654;
            opacity: 0.2;
        }
        .g{
          position: relative;
          left: 35px;
        }
        input{
          margin: 10px 0 0 0;
        }
    </style>
</head>
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Modal body..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  
</div>
<body>
<img src="images/samc.png" alt="bg" class="bg">
<?php include 'navbar.php' ?>
    <h2 class="text-center my-2">Add Student</h2>
<div class="container">
<form action="" method="post">
  <div class="con">
    <input type="text" name="name" id="name" placeholder="Student's name...">
    <input type="text" name="num" id="num" placeholder="Student's roll number...">
  </div>
  <div class="con o">
    <input type="text" name="contact" id="contact" maxlength="10" placeholder="Add contact number...">
    <div class="gen">
    <label for="gender" class='g'>Gender</label>
    <select name="gender" id="gender">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select></div>
  </div>
  <div class="con">
    
  <input type="date" name="date" id="date" placeholder="Date of birth">
  <select class="" name="batch" aria-label="Default select example">
  <option value="1st">Batch : 1th</option>
  <option value="1st">1st</option>
  <option value="2nd">2nd</option>
  
  <option value="3rd">3rd</option>
  
  <option value="4th">4th</option>
  
  <option value="5th">5th</option>
  
  <option value="6th">6th</option>
  
  <option value="7th">7th</option>
  
  <option value="8th">8th</option>
  
  <option value="9th">9th</option>
  
  <option value="10th">10th</option>
  
  <option value="11th">11th</option>
</select>
<input type="text" name="address" id="add" maxlength="30" placeholder="Add your location...">
  </div>
  <button type="submit">Add Student</button>
</form></div>
</div>
<hr>

<h3 class="text-center"><i>_"<?php echo $_GET['classname'] ?>"_</i></h3>
    <h3 class="mx-3">See Students:</h3>
<div class="studentList">
    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">Student Name</th>
      <th scope="col">Roll Number</th>
      <th scope="col">Batch</th>
      <th scope="col">Contact</th>
      <th scope="col">Date of birth</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    error_reporting(0);
    $id = $_GET['id'];
      $sql = "SELECT * FROM `students` WHERE class_id=$id";
      $result = mysqli_query($conn, $sql);
      $sno = 0;
      if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
        $sno++;
         $sn = $row['sno'];

         echo '<tr>
         <th scope="row">'.$sno.'</th>
         <td><a href="remark.php?name='.$row['firstname'].'&classid='.$_GET['id'].'&classname='.$_GET['classname'].'" class="txt">'.$row['firstname'].'</a></td>
         <td>'.$row['sym_number'].'</td>
         <td>'.$row['batch'].'</td>
         <td>'.$row['contact'].'</td>
         <td>'.$row['dob'].'</td>
         <td>'.$row['gender'].'</td>
         <td>'.$row['address'].'</td>
         <td><a href="deletestu.php?id='.$row['sno'].'&class='.$id.'&classname='.$_GET['classname'].'" title="Delete Class"  class="btn btn-danger">Trash</a><a class="mx-2" href="editStudent.php?id='.$row['sno'].'&name='.$row['firstname'].'&gender='.$row['gender'].'&number='.$row['sym_number'].'&contact='.$row['contact'].'&dob='.$row['dob'].'&address='.$row['address'].'&classid='.$id.'&classname='.$_GET['classname'].'"><ion-icon name="create-outline" style="font-size: 20px; cursor: pointer; font-weight: 800"></ion-icon></a></td>
       </tr>';
      }
    }
    
    else{
        echo "
        <td></td>
        <td></td>
        <td>Sorry</td>
        <td>No</td>
        <td>Record</td>
        <td>Found</td>
        ";
    }
    ?>
  </tbody>
</table>
    </div>
</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>