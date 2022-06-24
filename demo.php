<?php

    include 'database/function.php';

    if(isset($_GET['userId'])){
        $id = $_GET['userId'];
        $data = dataShowForEdit($id);
        var_dump($data);

    }
    else{
        header('location: index.php');

    }


?>