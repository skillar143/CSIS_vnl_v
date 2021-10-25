<?php 
session_start();

if (isset($_SESSION['user_id'])) {
 $sub = $_GET['sub'];
    include "../teacherlayout/head.tlayout.php"; $sql2 = "SELECT * from subjects where description = '$sub'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $subcode = $row2['subcode'];
        }
    }?>
       <!-- content here -->
       <h5 class="title text-dark mb-5">Student List in <?php echo "(".$subcode.")-".$sub?></h5>
       <div class="table-responsive">
       <table class="table" id="studentlist">
    <thead class="bg-primary text-light ">
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Cell No.</th>
            <th>Course</th>
            <th>Status</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
      
    <?php
                    include_once '../database/dbconnection.db.php';
                    $sub = $_GET['sub'];
                    $sql = "SELECT * from studentsubs where subject = '$sub'";
                    $result = $conn-> query($sql);

                    
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $id = $row['student_id'];
                            $sql2 = "SELECT * from studentrecords where student_id = '$id'";
                            $result2 = $conn-> query($sql2);

                            if($result2-> num_rows > 0 ){
                                while($row2 = $result2-> fetch_assoc()){
                           
                            echo "<tr><td>".$row2['student_id']."</td>
                            <td>".$row2['name']."</td>
                            <td>".$row2['gender']."</td>
                            <td>".$row2['cellphone']."</td>
                            <td>".$row2['course']."</td>
                            <td>".$row2['status']."</td>
                            <td>".$row2['address']."</td>
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
       </div>
<a class="btn btn-sm btn-outline-primary" href="../print/studentlist.print.php?sub=<?php echo $sub;?>"><i class="fas fa-print"></i></a>
       <!-- end of content here -->
       <?php include "../teacherlayout/footer.tlayout.php";
    }else{
        header("Location: ../canossa/master.blade.php");
        exit();
   }
?>
