<?php

$sql2 = "SELECT * from subjects where description = '$sub'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    while ($row2 = $result2->fetch_assoc()) {
        $subcode = $row2['subcode'];
    }
}

$sub_sql = "SELECT * from sublists where description = '$sub'";
$sub_result = $conn->query($sub_sql);

if ($sub_result->num_rows > 0) {
    while ($sub_data = $sub_result->fetch_assoc()) {
        $sub_status = $sub_data['status'];
    }
}

$sq = "SELECT * from teacherrecords where teacher_id = '$id'";
$resul = $conn->query($sq);

if ($resul->num_rows > 0) {
    while ($row = $resul->fetch_assoc()) {
        $name = $row['name'];
    }
}

    // Class Standing
$sql = "SELECT * from teacher_cs where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result = $conn->query($sql);
$tcs = 0; 
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {    

    $tcs = $tcs + $row['item'];              
}
}

    // Reporting
    $sql = "SELECT * from teacher_reporting where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
    $result = $conn->query($sql);
    $trep = 0; 
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
            $trep = $trep + $row['item'];            
    }
    }

            // Exam
$sql = "SELECT * from teacher_exam where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result = $conn->query($sql);
$tex = 0; 
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {    

    $tex = $tex + $row['item']; 
              
}
}

 // Laboratory Class Standing
 $lab_cs_sql = "SELECT * from teacher_laboratory_cs where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
 $r_lab_cs = $conn->query($lab_cs_sql);
 $lab_tcs = 0; 
 if ($r_lab_cs->num_rows > 0) {
 while ($d_lab_cs = $r_lab_cs->fetch_assoc()) {    
 
     $lab_tcs = $lab_tcs + $d_lab_cs['item'];              
 }
 }
 
     // Laboratory Reporting
     $lab_rep_sql = "SELECT * from teacher_laboratory_reporting where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
     $r_lab_rep = $conn->query($lab_rep_sql);
     $lab_trep = 0; 
     if ($r_lab_rep->num_rows > 0) {
     while ($d_lab_rep = $r_lab_rep->fetch_assoc()) {    
             $lab_trep = $lab_trep + $d_lab_rep['item'];            
     }
     }
 
             // Laboratory Exam
 $lab_ex_sql = "SELECT * from teacher_laboratory_exam where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
 $r_lab_ex = $conn->query($lab_ex_sql);
 $lab_tex = 0; 
 if ($r_lab_ex->num_rows > 0) {
 while ($d_lab_tex = $r_lab_ex->fetch_assoc()) {    
 
     $lab_tex = $lab_tex + $d_lab_tex['item']; 
               
 }
 }

 





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



if($term === "prelim"){
$dis = "d-none";
}else{
$dis = "d";
}