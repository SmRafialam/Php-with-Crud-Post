
<?php include 'header.php'; 
    // session_start();
    // if (!isset($_SESSION['username'])){
    //     header('location: login.php');
    // }

?>
    <style type="text/css">
      .head{
        overflow:hidden;
      }
      .bd{
        box-shadow: 1px 1px 3px rgba(255,0,0,1.0);
      }

    </style>

  
  
      <div class="container-fluid">
      <div class="row">

      <div class="col-md-10 offset-md-1 bd p-3">
        <div class="head p-4 my-2 bg-primary text-white">
          <h3 class="float-start">User List</h3>
          <a href="index.php" class="btn btn-warning float-end"><i class="fa fa-eye mx-1"></i>User</a>
      </div>    

        <div class="col-md-8 offset-md-2">
            <h3 class="text-center py-3"><b>Login</b></h3>
        

        <?php
            if(isset($_POST['savee'])){
                $userName = $_POST['uname'];
                $passWord = $_POST['pass'];
                if($userName=="smrafi" && $password=="12345"){
                    session_start();
                    $_SESSION['username']=$userName;
                    // $_SESSION['password']=$passWord;
                    header('location: index.php');
                }
            }
          
          

        ?>

      
        <div class="mb-3">
            <label for="uname" class="form-label">User Name</label>
            <input type="text" class="form-control" id="uname" aria-describedby="emailHelp" placeholder="Student User Name" name="uname">
            
          </div>
          
        <div class="mb-3">
          <label for="pass" class="form-label">Password</label>
          <input type="pass" class="form-control" id="pass" aria-describedby="emailHelp" placeholder="Password" name="pass">
        </div>


          
        
        <button type="submit" class="btn btn-primary" name="savee">Login</button>
        </form>
        </div>
      </div>
    </div>
    <?php include 'footer.php'; ?>