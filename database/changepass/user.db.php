<?php 

include "../dbconnection.db.php";

$password = $_POST['password'];
$id = $_POST['userid'];

  $sql = "SELECT * FROM users WHERE user_id ='$id'";
  $result = mysqli_query($conn, $sql);


 if (mysqli_num_rows($result) === 1) {
  $sql = "UPDATE users SET password = '$password' WHERE user_id = '$id'";
  $result = mysqli_query($conn, $sql);

    header("Location: ../../admin/management/userlist.admin.php?success=Password is successfuly changed");
    exit();
  } 
  