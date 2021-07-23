<?php 

include "../dbconnection.db.php";

$password = $_POST['password'];
$id = $_POST['id'];
$uid = array();
$pass = array();


foreach( $id as $id ) {
array_push($uid, $id);  
  }
  foreach( $password as $password ) {
    array_push($pass, $password);  
      }

$i = count($pass);
$j = 0;

//print_r(array_values($pass));
//print_r(array_values($uid));

for($j = 0; $j < $i; $j++) {
  print $uid[$j];
  print $pass[$j];

  $sql = "UPDATE users
  SET password = '$pass[$j]' 
  WHERE user_id = '$uid[$j]';";
  $result = mysqli_query($conn, $sql);
 header("Location: ../../admin/userlist.admin.php?success=Password is successfuly changed");
}


//header("Location: ../../admin/irregular.admin.php?success=Successfully enroll&stid=$id");