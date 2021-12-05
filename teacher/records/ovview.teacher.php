<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sub = $_GET['sub'];
    $course = $_GET['course'];
   

    include "../teacherlayout/head.tlayout.php"; 

    
    $sql2 = "SELECT * from subjects where description = '$sub'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $subcode = $row2['subcode'];
        }
    }


    $sql2 = "SELECT * from gradingstatus ";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) { 
          
      $term = $row2['term'];
    
        }}


    ?>
<!-- content here -->
<h5 class="title text-dark mb-3">Class Standing in <?php echo "(".$subcode.")-".$sub?></h5>
<div class="float-right m-1">
    <!-- <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AddCS"><i class="fas fa-plus"></i>Add
        Class Record</i></a> -->
        <a class="btn btn-sm btn-outline-primary" href="../print/ov.print.php?sub=<?php echo $sub;?>&course=<?php echo $course;?>"><i class="fas fa-print"></i>Print
        Records</a>
</div>
<div class="table-responsive">
<table class="table" id="studentlist">
    <thead class="bg-primary text-light ">
        <tr>
            <th class="">Student ID</th>
            <th class="">Name</th>
            <th class="">Class Standing</th>
            <th class="">Total(25%)</th>
            <th class="">Reporting</th>
            <th class="">Total(25%)</th>
            <th class="">Exam</th>
            <th class="">Total(40%)</th>
            <th class=""><?php echo $term; ?> Grade</th>
        </tr>
    </thead>

    <tbody>

        <?php
            $sql = "SELECT * from studentrecords where course = '$course'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sid = $row['student_id'];
                    $name =$row['name'];
                    $sql2 = "SELECT * from student_cs where student_id = '$sid' and term = '$term'";
                    $result2 = $conn->query($sql2);
                    $cs = 0;
?>
        <tr>
            <td><?php echo $sid; ?></td>
            <td><?php echo $name; ?></td>
            <td>
            <?php
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {    
                            $score = $row2['score']; 
                             
                            $cs = $score + $cs;

                    echo $score. " | "; 
                    
                        }
                       
                    }
               
            ?></td>
            <td> <?php  $cstotal = $cs*.25; 
                        echo number_format($cstotal, 0.0);
            ?> </td>
<!-- reporting -->


<?php $report = "SELECT * from student_reporting where student_id = '$sid' and term = '$term'";
                    $resulte = $conn->query($report);
                    $rep = 0;
                    ?> <td>
                    <?php
                    if ($resulte->num_rows > 0) {
                       
                        while ($rowe = $resulte->fetch_assoc()) { 
                            $scoree = $rowe['score']; 

                            $rep = $scoree + $rep;
                    echo $scoree. " | "; 
                         }}
                      
                ?></td>
                 <td> <?php  $reptotal = $rep*.25;
                 echo $reptotal; ?> </td>
<!-- exam -->


                <?php $exam = "SELECT * from student_exam where student_id = '$sid' and term = '$term'";
                    $resultr = $conn->query($exam);
                    $exam = 0;
                    ?> <td>
                    <?php
                    if ($resultr->num_rows > 0) {
                       
                        while ($rowt = $resultr->fetch_assoc()) { 
                            $scoree = $rowt['score']; 
                            $exam = $scoree + $exam;
                    echo $scoree. " | "; 
                         }}
                         ?></td>
            
                         <td> <?php  $examtotal = $exam*.40; 
                            echo $examtotal; ?> </td>  
                         <td> <?php  echo $cstotal+$reptotal+$examtotal+10; ?> </td>
                         <?php 
                        }
                        
                    }?>
                    
           </tr>
    </tbody>
</table>
</div>
<!-- end of content here -->
<?php include "../teacherlayout/footer.tlayout.php";
} else {
    header("Location: ../../canossa/master.blade.php");
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

