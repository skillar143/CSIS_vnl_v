<?php

include_once '../dbconnection.db.php';
$studentid = $_POST['studentid'];
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$bday = $_POST['bday'];
$bplace = $_POST['bplace'];
$bplace = $_POST['bplace'];



$sql = "UPDATE studentrecords set student_id ='$studentid' ,name ='$name'
,gender = '$gender' ,cellphone = '$contact' ,address = '$address' ,bday ='$bday' ,bplace ='$bplace'
    where student_id = '$id';";

                $result = mysqli_query($conn, $sql);
            header("Location: ../../admin/editstudentrecord.admin.php?success=New record is saved &stid=$studentid");
       