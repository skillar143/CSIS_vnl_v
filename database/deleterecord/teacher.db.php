<?php
include_once '../dbconnection.db.php';

$teacherid = $_GET['tid']; 

$query = "DELETE from teacherrecords where teacher_id = '$teacherid'";
$data = mysqli_query($conn, $query);

$query = "DELETE from users where user_id = '$teacherid'";
$dat = mysqli_query($conn, $query);

$query = "DELETE from subjects where teacher_id = '$teacherid'";
$dat = mysqli_query($conn, $query);





if($data && $dat){
    header("Location: ../../admin/teacher/teacherlist.admin.php?success=deleted");
}