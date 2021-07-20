<?php

include_once '../dbconnection.db.php';

if (isset($_POST['submit'])) {
    if ($_POST['npass'] === $_POST['cpass']) {
        $username = $_POST['username'];
        $opwd = $_POST['pass'];
        $npwd = $_POST['npass'];
        $cpwd = $_POST['cpass'];

        $query = mysqli_query($conn, "SELECT username,password from admins 
            where username = '$username' AND password = '$opwd'");
        $num = mysqli_fetch_array($query);

        if ($num > 0) {
            $con = mysqli_query($conn, "UPDATE admins set password='$npwd' 
                where username = '$username'");
            header("Location: ../../admin/changepass.admin.php?success=Password is successfuly changed");
        } else {
            header("Location: ../../admin/changepass.admin.php?error=invalid username or password");
        }
    } else {
        header("Location: ../../admin/changepass.admin.php?error=New password does not match into confirm password");
    }
}
