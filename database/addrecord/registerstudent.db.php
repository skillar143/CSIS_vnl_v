<?php

include_once '../dbconnection.db.php';
include_once '../passgen.db.php';

if (isset($_POST['ok'])) {
    $studentid = $_POST['studentid'];
    $fn = $_POST['fn'];
    $mi = $_POST['mi'];
    $ln = $_POST['ln'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $bday = $_POST['bday'];
    $bplace = $_POST['bplace'];
    $status = $_POST['status'];
    $year = $_POST['year'];

    $name = $ln.", ".$fn." ".$mi;

    $sqlstudent = "INSERT INTO studentrecords (student_id, name, gender, cellphone, bday, bplace, address, course, status) 
    VALUES ('$studentid', '$name', '$gender', '$contact', '$bday', '$bplace', '$address', '$course', '$status');";

    $sqladmin = "INSERT INTO users (user_id, password, role) 
    VALUES ('$studentid', '$gen_pass', 'student');";

    $sq = "SELECT * from studentrecords where student_id = '$studentid'";
    $resul = $conn->query($sq);
    if ($resul->num_rows > 0) {
        while ($row = $resul->fetch_assoc()) {
            $id = $row['student_id'];
        }
    }

    if ($studentid == $id) {
        header("Location: ../../admin/student/studentlist.admin.php?error=A student I.D. can't be duplicated.");
        exit();
    } 
    else if($status == "regular") {

        $sql = "SELECT * from programs where course = '$course' && year = '$year'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sqlcourse = "INSERT INTO studentsubs (student_id, subject) 
                VALUES ('$studentid', '$row[subject]');";
                $query = mysqli_query($conn, $sqlcourse) or die(mysqli_error($conn));
            }
            $query = mysqli_query($conn, $sqlstudent) or die(mysqli_error($conn));
            $quey = mysqli_query($conn, $sqladmin) or die(mysqli_error($conn));

            header("Location: ../../admin/student/studentlist.admin.php?succesfull");;
        } else {
            header("Location: ../../admin/student/studentlist.admin.php?error= The course is not yet done");;
        }
    }
    else{
        $query = mysqli_query($conn, $sqlstudent) or die(mysqli_error($conn));
        $quey = mysqli_query($conn, $sqladmin) or die(mysqli_error($conn));

        header("Location: ../../admin/student/studentlist.admin.php?");
        exit();
    }
}
