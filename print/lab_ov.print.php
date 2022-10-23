<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sub = $_GET['sub'];
    $course = $_GET['course'];
    $term = $_GET['term'];
    $year = $_GET['year'];
    include_once '../database/dbconnection.db.php';
    
   

    include "../teacher/records/teacher_score_computation.php"; 
  

if($term === "prelim"){
    $table = "prelims";
    $th = " ";
}elseif($term === "midterm"){
    $table = "prelims";
    $th = "Prelim";
}elseif($term === "final"){
    $table = "midterms";
    $th = "Midterm";
}

    ?>
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
        <div class="text-right mb-3">
            <a class="btn btn-danger" id="print-btn" href="../teacher/records/ovview.teacher.php?sub=<?php echo $sub;?>&course=<?php echo $course;?>&term=<?php echo $term;?>&year=<?php echo $year?>"><i class="fas fa-arrow-circle-left"></i></a>
            <button class="btn btn-danger" onclick="window.print();" id="print-btn"><i class="fas fa-print"></i></button>
        </div>
        <h5 class="title text-dark mb-3; text-capitalize"><?php echo $term." "."Grade"?></h5>
        <h5 class="title text-dark mb-3"><?php echo $course?></h5>
        <h5 class="title text-dark mb-3"><?php echo $subcode." - ".$sub?></h5>
        <h5 class="title text-dark mb-3"><?php echo "Instructor: ".$name?></h5>

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
            <th class="<?php echo $display; ?>">Lab Grade</th>
            <th class="<?php echo $display; ?>">Lec Grade</th>
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
                <td class="text-primary font-weight-bold font-italic"><?php echo $lab_tcs; ?></td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic"><?php echo $lab_trep; ?></td>
                <td></td>
                <td class="text-primary font-weight-bold font-italic"><?php echo $lab_tex; ?></td>
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
                    $sql2 = "SELECT * from student_laboratory_attendance where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
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
                        <?php  $atotal = $attendance*.10; 
                        echo number_format($atotal, 1);
                        ?> 
                    </td>

                    <?php $classrecord = "SELECT * from student_laboratory_cs where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
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


                 <td> <?php  $cstotal = ($cs/$lab_tcs*50+50)*.25;
                 echo number_format($cstotal, 1);?> </td>
                 <!-- reporting -->
                    <?php $report = "SELECT * from student_laboratory_reporting where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
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


                 <td> <?php  $reptotal = ($rep/$trep*50+50)*.25;
                 echo number_format($reptotal, 1); ?> </td>
<!-- exam -->
                <?php $exam = "SELECT * from student_laboratory_exam where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
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

                         <td> <?php  $examtotal = ($exam/$tex*50+50)*.40;  
                            echo number_format($examtotal, 1);?> </td>
                            
                            

                    


                         <td> <?php  
                                    $prefinal = $atotal+$cstotal+$reptotal+$examtotal;
                            echo number_format($prefinal, 0); 
                         ?> </td>

<td class="<?php echo $display; ?>">
<?php include "../teacher/records/lec.php"; ?>
</td>

                <td class="<?php echo $display; ?>">
                <?php $sfinal = ($prefinal*.40)+($lec_g*.60);
                            echo number_format($sfinal, 0); ?>
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
                                
                                $finalg = ($prefinal*.70)+($preg*.30);
                                echo number_format($finalg, 0);
                                ?>
                            </td>
                         <?php 
                        }
                    }?>     
           </tr>
    </tbody>
</table>
</div>

<!-- end of content here -->
<?php //include "../teacher/teacherlayout/footer.tlayout.php";
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
}
?>


<!-- 
*
*
*
*
*
 -->


<!--  modal for record -->
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>

<div class="modal fade" id="AddCS" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Add New Score</h5>
                <button class="close text-light btn btn-sm" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <!-- end of modal header -->
            <form class="needs-validation" action="../database/grade/exam.db.php" method="post" novalidate>
                <!-- modal body -->
                <div class="modal-body">
                    <!-- text box student id -->
                    <a href="">Enter The Perfect Score</a>
                    <div class="form-group d-flex ">
                        <label for="studentid" class="p-1 m-1">Subject </label>
                        <input type="text" class="form-control m-1" style="width: 30%;" value="<?php echo $sub; ?>"
                            name="studentid" autocomplete="off" disabled>
                        <label for="studentid" class="p-1 m-1">Total Items: </label>
                        <input type="number" class="form-control m-1" style="width: 10%; " name="item"
                            autocomplete="off" required>
                    </div>

                    <hr class="divider">

                    <input type="hidden" name="sub" id="" class="form-control" value="<?php echo $sub; ?>">
                    <input type="hidden" name="tid" id="" class="form-control" value="<?php echo $id; ?>">
                    <input type="hidden" name="course" id="" class="form-control"
                        value="<?php echo $_GET['course']; ?>">


                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-primary text-light ">
                                <tr>
                                    <th class="">Student ID</th>
                                    <th class="">Name</th>
                                    <th class="">Score</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
            $sql = "SELECT * from studentsubs where subject = '$sub'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sid = $row['student_id'];
                    $sql2 = "SELECT * from studentrecords where student_id = '$sid' and course = '$_GET[course]'";
                    $result2 = $conn->query($sql2);

                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
                            
            ?>
                                <tr>
                                    <td><?php echo $row2['student_id']; ?></td>
                                    <td><?php echo $row2['name']; ?></td>
                                    <td><input type="number" name="score[]" id="" class="form-control" required></td>
                                    <input type="hidden" name="id[]" id="" class="form-control"
                                        value="<?php echo $row2['student_id']; ?>">

                                </tr>
                                <?php
                        }
                    }
                }
            } else {
                echo "<tr><td>No records</td></tr>";
            }

            ?>
                            </tbody>
                        </table>
                    </div> <!-- end of course selection -->

                    <!-- end of modal body -->

                    <!-- modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-outline-secondary" type="button"
                            data-dismiss="modal">Cancel</button>
                        <button class="btn btn-sm btn-outline-primary" type="submit" name="ok">Add</button>
                    </div>
                    <!-- end of modal footer -->
            </form>
        </div>
    </div>
</div>