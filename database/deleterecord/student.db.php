<?php
include_once '../dbconnection.db.php';

$studentid = $_GET['stid']; 

$query = "DELETE from studentrecords where student_id = '$studentid'";
$data = mysqli_query($conn, $query);

$query = "DELETE from users where user_id = '$studentid'";
$dat = mysqli_query($conn, $query);

$query = "DELETE from studentsubs where student_id = '$studentid'";
$dat = mysqli_query($conn, $query);

if($data && $dat){
    header("Location: ../../admin/student/studentlist.admin.php");
}