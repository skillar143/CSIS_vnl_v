<?php

include_once '../dbconnection.db.php';

    $subcode = $_POST['subcode'];
    $des = $_POST['des'];
    $unit = $_POST['unit'];
  

    $sql = "INSERT INTO sublists (subject_code, description, units) 
    VALUES ('$subcode', '$des', '$unit');";

    $query=mysqli_query($conn,$sql) or die (mysqli_error($conn));    
            header("Location: ../../admin/program/subjectlist.admin.php?succesfull");