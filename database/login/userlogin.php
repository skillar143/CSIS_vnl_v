<?php 
session_start(); 
include "../dbconnection.db.php";

	$uname = $_POST['id'];
	$pass = $_POST['pass'];

	
		$sql = "SELECT * FROM users WHERE user_id ='$uname' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_id'] === $uname && $row['password'] === $pass) {
            	$_SESSION['user_id'] = $row['user_id'];
            	$_SESSION['role'] = $row['role'];

                if($_SESSION['role'] == "student"){
                    header("Location: ../../student/sublist.student.php");
		        exit();
                }elseif($_SESSION['role'] == "faculty"){
                    header("Location: ../../teacherlayout/master_layout.tlayout.php");
		        exit();
                }
            	
            }
			else{
				header("Location: ../../index.php?error=Pls check the details");
				exit();
			}
		}else{
			header("Location: ../../index.php?error=Pls check the details");
	        exit();
		}