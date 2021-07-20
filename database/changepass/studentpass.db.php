<?php

include_once '../dbconnection.db.php';

if(isset($_POST['submit'])){
    if($_POST['npass'] === $_POST['cpass']){
        $studentid = $_POST['studentid'];
        $opwd = $_POST['pass'];
        $npwd = $_POST['npass'];
        $cpwd = $_POST['cpass'];

        $query = mysqli_query($conn,"SELECT user_id,password from users 
            where user_id = '$studentid' AND password = '$opwd'");
        $num = mysqli_fetch_array($query);

            if($num>0){
                $con = mysqli_query($conn,"UPDATE users set password='$npwd' 
                where user_id = '$studentid'");
                header("Location: ../../student/changepass.student.php?success=Password is successfuly changed");
            }
            else{
                header("Location: ../../student/changepass.student.php?error=invalid username or password");
            }  
    }      
    else{
        header("Location: ../../student/changepass.student.php?error=New password does not match into confirm password");
    }

    
}
