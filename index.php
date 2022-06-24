<?php include 'header.php'; ?>
    <style type="text/css">
      .head{
        overflow:hidden;
      }
      .bd{
        box-shadow: 1px 1px 3px rgba(255,0,0,1.0);
      }

    </style>


      <div class="container">
      <div class="row">
        
        <div class="col-md-10 offset-md-1 bd p-3">
        <div class="head p-4 my-2 bg-primary text-white">
          <h3 class="float-start">User List User Name:
            <?php
            session_start();
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
              }
              // if(isset($_SESSION['password'])){
              //   echo $_SESSION['password'];
              // }

            ?>
          </h3>
          <a href="addUser.php" class="btn btn-warning float-end"><i class="fa fa-add mx-1"></i>Add User</a>

        </div>
        <div class="p-3">
        <table id="mydata" class="display border" >
        <thead>
          <tr>
            <th>SL No</th>
            <th>Name</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Pass</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          </thead>


        <tbody>

          <?php
            include 'database/function.php';
            if (isset($_GET['id'])){
              $data = deleteUser($_GET['id']);
            }
            if (isset($_GET['aId'])){
              $data = deleteActive($_GET['aId']);
            }
            if (isset($_GET['dId'])){
              $data = deleteDeactive($_GET['dId']);
            }


            $con = new mysqli("localhost","root","","batch1");
            $command = "SELECT *FROM tbl_student";
            $result = $con->query($command);
            $users =  dataShow();
            
            
            if($result->num_rows>0){
              $sl =1;
              while($data = $result->fetch_assoc()){
                 ?>
                  <tr>
                  <td> <?php echo $sl; ?></td>
                    <td> <?php echo $data["Name"]; ?></td>
                    <td> <?php echo $data["userName"]; ?></td>
                    <td> <?php echo $data["Email"]; ?></td>
                    <td> <?php echo $data["pass"]; ?></td>
                    <td> <?php echo $data["Phone"]; ?></td>
                    <td> 
                      <?php 
                        if ($data["Status"]==1) {
                          echo '<a href="index.php?aId='.$data["id"].'">Active</a>';
                        }
                        
                        else{
                          echo '<a href="index.php?dId='.$data["id"].'">Deactive</a>';
                        }
                        
                      ?>
                    </td>
                    <td>
                        <a href="editUser.php?userId=<?php echo $data["id"]; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete"><i class="fa fa-trash-can"></i></button>
                    </td>
                  </tr>
                 

                 <?php
                 $sl++;

                 ?>
                 <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delete this user?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <a href="index.php?id=<?php echo $data["id"]; ?>" type="button" class="btn btn-danger">Confirm</a>
                        </div>
                      </div>
                    </div>
                  </div>

                        <?php
              }

            }
            else{
              echo "Data not found";

            }

          

          ?>
          </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>





<?php include 'footer.php'; ?>