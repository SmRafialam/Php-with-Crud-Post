
<?php include 'header.php'; ?>
    <style type="text/css">
      .head{
        overflow:hidden;
      }
      .bd{
        box-shadow: 1px 1px 3px rgba(255,0,0,1.0);
      }

    </style>

  <!--|.....................................|
      |============Content Here=============|
      |.....................................| -->
  
      <div class="container-fluid">
      <div class="row">

      <div class="col-md-10 offset-md-1 bd p-3">
        <div class="head p-4 my-2 bg-primary text-white">
          <h3 class="float-start">User List</h3>
          <a href="index.php" class="btn btn-warning float-end"><i class="fa fa-eye mx-1"></i>User</a>
      </div>    

        <div class="col-md-8 offset-md-2">
            <h3 class="text-center py-3"><b>Student Information Form</b></h3>
        

        <?php

          include 'database/function.php';

          
          if(isset($_POST["save"])){
            $name = $_POST["sname"];
            $userName = $_POST["uname"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            $phone = $_POST["phone"];
            $status = $_POST["status"];

            if(empty($name)){
              echo '<div class="alert alert-danger" role="alert">
              Name field is empty </div>';
            }
            if(empty($userName)){
              echo '<div class="alert alert-danger" role="alert">
              userName field is empty </div>';
            }
            if(empty($email)){
              echo '<div class="alert alert-danger" role="alert">
              email field is empty </div>';
            }
            if(empty($pass)){
              echo '<div class="alert alert-danger" role="alert">
              password field is empty </div>';
            }
            if(empty($phone)){
              echo '<div class="alert alert-danger" role="alert">
              phone field is empty </div>';
            }
            if($status == 0){
              echo '<div class="alert alert-danger" role="alert">
              status field is empty </div>';
            }

            // $com = "INSERT INTO tbl_student(name,userName,email,phone,status)VALUES('$name','$userName','$email','$pass','$phone',' $status')";
            // $result = $con->query($com);
            // if($result){
            //   echo "data saved";
            // }
            else{
              $id = $_GET['userId'];
              $msg = userUpdate($name,$userName,$email,$pass,$phone,$status,$id);
              echo $msg;
            }
          }
          

        ?>
        <?php

    

    if(isset($_GET['userId'])){
    $id = $_GET['userId'];
    $data = dataShowForEdit($id);
    while($show = $data->fetch_assoc()){ ?>

      <form method="POST">
        <div class="mb-3">
          <label for="sname" class="form-label">Student Name</label>
          <input type="text" class="form-control" id="sname" aria-describedby="emailHelp" placeholder="Student Name" name="sname" value="<?php echo $show["Name"]; ?>">
          
        </div>
        <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" class="form-control" id="uname" aria-describedby="emailHelp" placeholder="Student User Name" name="uname" value="<?php echo $show["userName"]; ?>">
            
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email Address" name="email" value="<?php echo $show["Email"]; ?>" >
            
          </div>
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input type="pass" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="Password" name="pass" value="<?php echo $show["pass"]; ?>" >
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="phone" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone No." name="phone" value="<?php echo $show["Phone"]; ?>">
            
          </div>

          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="0">-----select status-----</option>
                <option value="1">active</option>
                <option value="2">deactive</option>
            </select>
            
          </div>
        
        <button type="submit" class="btn btn-primary" name="save">Submit</button>
        </form>
        <?php

        }

    }
    else{
        header('location: index.php');

    }


?>
        </div>
      </div>
    </div>