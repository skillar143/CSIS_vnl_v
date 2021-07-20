<?php

include_once '../dbconnection.db.php';

if(isset($_POST['submit'])){
    if($_POST['npass'] === $_POST['cpass']){
        $teacherid = $_POST['teacherid'];
        $opwd = $_POST['pass'];
        $npwd = $_POST['npass'];
        $cpwd = $_POST['cpass'];

        $query = mysqli_query($conn,"SELECT teacher_id,password from teachers 
            where teacher_id = '$teacherid' AND password = '$opwd'");
        $num = mysqli_fetch_array($query);

            if($num>0){
                $con = mysqli_query($conn,"UPDATE teachers set password='$npwd' 
                where teacher_id = '$teacherid'");
                header("Location: ../../teacher/changepass.teacher.php?success=Password is successfuly changed");
                close();
            }
            else{
                header("Location: ../../teacher/changepass.teacher.php?error=invalid username or password");
            }  
    }      
    else{
        header("Location: ../../teacher/changepass.teacher.php?error=New password does not match into confirm password");
    }

    
}
