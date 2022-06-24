<?php

//    $serverName = "localhost";
//    $userNmae = "root" ;
 //   $pass = "12345";
 //   $dbName = "batch1";
 //   $con = new_mysql($serverName,$userName,$pass,$dbName);

 //   if($con){
 //       echo "database connection successful";
 //   }
 ///   else{
 ///       echo "Failed".$con->connect_error();
 //   }
    $con = new mysqli("localhost","root","","batch1");
    function userInsert($name,$userName,$email,$pass,$phone,$status){
        global $con;

        $command = "INSERT INTO tbl_student(name,userName,email,pass,phone,status)VALUES('$name','$userName','$email','$pass','$phone','$status')";
        $result = $con->query($command);

        if($result){
            return '<div class="alert alert-success" role="alert">
            Data successfully saved </div>';
        }
        else{
            return $msg = '<div class="alert alert-danger" role="alert">
            Error: ".$con->error." </div>';
        }
    }
    
    function dataShow(){
        global $con;
        $command = "SELECT *FROM tbl_student";
        $result = $con->query($command);
        return $result;

    }
    function dataShowForEdit($id){
        global $con;
        $command = "SELECT *FROM tbl_student WHERE id = '$id'";
        $result = $con->query($command);
        return $result;
    }
    function userUpdate($name,$userName,$email,$pass,$phone,$status,$id){
        global $con;

        $command = "UPDATE tbl_student SET name='$name',userName='$userName',email='$email',pass='$pass',phone='$phone',status='$status' WHERE id ='$id' ";
        $result = $con->query($command);

        if($result){
            header('location:index.php');
        }
        else{
            return $msg = '<div class="alert alert-danger" role="alert">
            Error: ".$con->error." </div>';
        }
    }
    function deleteUser($id){
        global $con;
        $command="DELETE FROM tbl_student WHERE id='$id'";
        $result=$con->query($command);
        if ($result) {
            header("location: index.php");
        }
    }
    

    function deleteActive($id){
        global $con;

        $command = "UPDATE tbl_student SET status='2' WHERE id = '$id' ";
        $result = $con->query($command);

        if($result){
            header('location:index.php');
        }
        else{
            return $msg = '<div class="alert alert-danger" role="alert">
            Error: ".$con->error." </div>';
        }
    }
    function deleteDeactive($id){
        global $con;

        $command = "UPDATE tbl_student SET status='1' WHERE id = '$id' ";
        $result = $con->query($command);

        if($result){
            header('location:index.php');
        }
        else{
            return $msg = '<div class="alert alert-danger" role="alert">
            Error: ".$con->error." </div>';
        }
    }
