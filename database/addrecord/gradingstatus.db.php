<?php 
session_start(); 
include "../dbconnection.db.php";

if (isset($_POST['status']))
{
    $con = mysqli_query($conn, "UPDATE gradingstatus set status = 'open' 
    where id = 1");
header("Location: ../../admin/management/index.admin.php?success=Grading System is Now Open");
}
else{
    $con = mysqli_query($conn, "UPDATE gradingstatus  set status = 'close' 
                where id = 1");
            header("Location: ../../admin/management/index.admin.php?success=Grading System is Now Close");
}


    