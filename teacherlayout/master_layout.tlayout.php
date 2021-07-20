<?php 
session_start();

if (isset($_SESSION['user_id'])) {
 
 include "head.tlayout.php"; ?>

                 
<?php include "footer.tlayout.php";
    }else{
        header("Location: ../canossa/master.blade.php");
        exit();
   }
?>