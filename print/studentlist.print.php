<?php
session_start();
include_once '../database/dbconnection.db.php';
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $year = $_GET['year'];

?>
    <!-- header -->
    <title>CSIS</title>
    <!-- Custom fonts for this template-->
    <link rel="icon" href="../assets/img/logo.png">
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/font.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../assets/css/print.css" rel="stylesheet" media="print">
    <!-- end of header -->
   
    <div class="p-5">
        <div class="title mb-3 row text-center">
            <div class="col-1 "><img src="../assets/img/logo.jpg" alt=""></div>
        </div>
        <div class=" mb-3">
        <h5 class="title text-dark mb-5">Student List in <?php echo $_GET['sub'];?> subject</h5>
       <table class="table">
    <thead class="bg-primary text-light ">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Year</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
      
    <?php


                    include_once '../database/dbconnection.db.php';
                    $sub = $_GET['sub'];

                    $sql = "SELECT *
                   FROM studentsubs
                   WHERE subject = '$sub' and student_id NOT IN (SELECT student_id FROM withdrawns);";
                    $result = $conn-> query($sql);

                    
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $id = $row['student_id'];
                            $sql2 = "SELECT * from studentrecords where student_id = '$id' and year = '$year'";
                            $result2 = $conn-> query($sql2);

                            if($result2-> num_rows > 0 ){
                                while($row2 = $result2-> fetch_assoc()){
                           
                            echo "<tr><td>".$row2['student_id']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['year']."</td>
                            <td>".$row2['gender']."</td>
                            <td>".$row2['cellphone']."</td>
                            <td>".$row2['course']."</td>
                            </tr>";
                                }
                            }
                        }
                    }
                    else{
                        echo "<tr><td>No records</td></tr>";
                    }
                    
                ?>
              
        
    </tbody>
</table>
                <br>
                <a class="btn btn-danger" id="print-btn" href="../teacher/list/studentlist.teacher.php?sub=<?php echo $_GET['sub'];?>&year=<?php echo $year;?>"><i class="fas fa-arrow-circle-left"></i></a>
                <button class="btn btn-danger" onclick="window.print();" id="print-btn"><i class="fas fa-print"></i></button>
          

        </div>
    </div>
<?php
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>