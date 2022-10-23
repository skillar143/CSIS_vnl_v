<?php
session_start();
$page ="gsheet";
if (isset($_SESSION['username'])) {
   
    $sub = $_GET['sub'];
    $course = $_GET['course'];
    $year = $_GET['year'];
    //$term = $_GET['term'];
    include_once '../adminlayout/head.admin.php' ;

    
    $sql2 = "SELECT * from subjects where description = '$sub'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $subcode = $row2['subcode'];
        }
    }


    $sql2 = "SELECT teacher_id from subjects where description = '$sub'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $id = $row2['teacher_id'];
        }
    }

    include "teacher_score_computation.php";

      

  $current = "lec";
         $lab = "lab_gradingst.admin.php";
         $lec = "gradingst.admin.php";

    ?>




<!-- content here -->

<?php 
if($trep == 0 && $tcs == 0 && $tex == 0){
    ?>
    <h1>No Record To Show</h1>
    
    <?php
    }else{
        ?>
        <h5 class="title text-dark mb-3; text-capitalize"><?php echo $term." "."Grade"?></h5>
        <h5 class="title text-dark mb-3"><?php echo $course?></h5>
        <h5 class="title text-dark mb-3"><?php echo $subcode." - ".$sub?></h5>
        <h5 class="title text-dark mb-3"><?php echo "Instructor: ".$name?></h5>
        <?php include "lab.admin.php"; ?>
<div class="float-right m-1">
    <!-- <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AddCS"><i class="fas fa-plus"></i>Add
        Class Record</i></a> -->
        <a class="btn btn-sm btn-outline-primary" href="../../print/adminsheet.print.php?sub=<?php echo $sub;?>&course=<?php echo $course;?>&term=<?php echo $term;?>&year=<?php echo $year?>"><i class="fas fa-print"></i> Print
        Records</a>
</div>
<div class="table-responsive">
<table class="table table-bordered text-center" id="">
    <thead class="bg-primary text-light ">
        <tr>
            <th class="">Student ID</th>
            <th class="">Name</th>
            <th class="">Attendance</th>
            <th class="">10%</th>
            <th class="">Class Standing</th>
            <th class="">25%</th>
            <th class="">Reporting</th>
            <th class="">25%</th>
            <th class="">Exam</th>
            <th class="">40%</th>
            <th class="<?php echo $display; ?>">Lec Grade</th>
            <th class="<?php echo $display; ?>">Lab Grade</th>
            <th class="<?php echo $dis; ?>">Pre-Final</th>
            <th class="<?php echo $dis; ?>"><?php echo $th; ?></th>
            <th class="">Final Grade</th>
        </tr>
       
    </thead>

    <tbody>
    <tr>
                <td></td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic">100</td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic"><?php echo $tcs; ?></td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic"><?php echo $trep; ?></td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic"><?php echo $tex; ?></td>
                <td></td>
                <td></td>
                
    </tr>

        <?php
       $sql = "SELECT *
            FROM studentrecords
            WHERE course = '$course' and student_id NOT IN (SELECT student_id FROM withdrawns) and year = '$year'";
            
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sid = $row['student_id'];
                    $name =$row['name'];
                    $sql2 = "SELECT * from student_attendance where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                    $result2 = $conn->query($sql2);
                    $attendance = 0;
?>
        <tr>
            <td><?php echo $sid; ?></td>
            <td><?php echo $name; ?></td>
            <td class = "p-0">

            <table style = "margin:0px; width: 100%; " class = "text-center">
                    <tr>
                        <?php
                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {    
                                    $score = $row2['score']; 

                                    $attendance = $score + $attendance;
                                    echo "<td> $score </td>"; 
                                }
                            }
                        ?>
                    </tr>
                </table>
            </td>

                    <td> 
                        <?php  $atotal = number_format($attendance*.10, 0); 
                        echo $atotal;
                        ?> 
                    </td>

                    <?php $classrecord = "SELECT * from student_cs where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                    $resulte = $conn->query($classrecord);
                    $cs = 0;
                    ?> 
                    
                    
                    <td class = "p-0">

                        <table style = "margin:0px; width: 100%; " class = "text-center">
                            <tr>
                                <?php
                                    if ($resulte->num_rows > 0) {
                       
                                        while ($rowe = $resulte->fetch_assoc()) { 
                                            $scoree = $rowe['score']; 
                
                                            $cs = $scoree + $cs;
                                    echo "<td> $scoree </td>"; 
                                         }
                                    }?>
                            </tr>
                        </table>
                    </td>


                 <td> <?php  $cstotal = number_format(($cs/$tcs*50+50)*.25, 0);
                 echo $cstotal;?> </td>
                 <!-- reporting -->
                    <?php $report = "SELECT * from student_reporting where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                    $resulte = $conn->query($report);
                    $rep = 0;
                    ?> 
                    
                                
                    <td class = "p-0">
                        <table style = "margin:0px; width: 100%; " class = "text-center">
                            <tr>
                                <?php
                                     if ($resulte->num_rows > 0) {
                                    
                                        while ($rowe = $resulte->fetch_assoc()) { 
                                            $scoree = $rowe['score']; 
                                        
                                            $rep = $scoree + $rep;
                                            echo "<td> $scoree </td>"; 
                                         }
                                    }
                                ?>
                            </tr>
                        </table>
                    </td>


                 <td> <?php  $reptotal = number_format(($rep/$trep*50+50)*.25, 0);
                 echo $reptotal; ?> </td>
<!-- exam -->
                <?php $exam = "SELECT * from student_exam where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                    $resultr = $conn->query($exam);
                    $exam = 0;
                    ?>
                    
                    
                    <td class = "p-0">
                        <table style = "margin:0px; width: 100%; " class = "text-center">
                            <tr>
                            <?php
                                if ($resultr->num_rows > 0) {
                                
                                    while ($rowt = $resultr->fetch_assoc()) { 
                                        $scoree = $rowt['score']; 
                                        $exam = $scoree + $exam;
                                        echo "<td> $scoree </td>"; 
                                     }
                                }
                            ?>
                            </tr>
                        </table>
                    </td>

                         <td> <?php  $examtotal = number_format(($exam/$tex*50+50)*.40, 0);  
                            echo $examtotal;?> </td>
                            
                            
                         <td> <?php  
                                    $prefinal = $atotal+$cstotal+$reptotal+$examtotal;
                            echo $prefinal; 
                         ?> </td>

<td class="<?php echo $display; ?>">
<?php include "lab.php"; ?>
</td>

                <td class="<?php echo $display; ?>">
                <?php $sfinal = number_format(($prefinal*.60)+($lab_g*.40), 0);
                            echo $sfinal; ?>
                 </td>
                    
                         <td class="<?php echo $dis; ?>"><?php
                            $prev = "SELECT * from $table where student_id = '$sid' and subject = '$sub'";
                            $res = $conn->query($prev);
                            if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {    
                                     echo $row['grade'];    
                                     $preg = $row['grade'];   
                                    }
                            }
                            ?></td>
                            <td class="<?php echo $dis; ?>">
                                <?php 
                                

                                if($sb_st == "with lab")
                                {
                                    $finalg = number_format(($sfinal*.70)+($preg*.30), 0);
                                echo $finalg;
                                
                                }else{
                                    $finalg = number_format(($prefinal*.70)+($preg*.30), 0);
                                    echo $finalg;
                                }
                                
                                
                                
                                ?>
                            </td>
                         <?php 
                        }
                    }?>     
           </tr>
    </tbody>
</table>
</div>
        <?php
    }
?>

<!-- end of content here -->
<?php include "../adminlayout/footer.admin.php";
} else {
    header("Location: ../../canossa/master.blade.php");
    exit();
}
?>