<?php



// GETTING THE TOTAL OF CLASSRECORD
$sql = "SELECT * from teacher_laboratory_cs where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result = $conn->query($sql);
$lab_tcs = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
         
       
       if( $row['item'] >= 1){
        $lab_tcs = $lab_tcs + $row['item']; 
       }else{
           $lab_tcs = 1;
       }

    }
}


// GETTING THE STUDENT CS RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $name =$row['name'];
                $sql2 = "SELECT * from student_laboratory_cs where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                $result2 = $conn->query($sql2);
                $scs = 0;

       
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {    
                        $score = $row2['score']; 
                        $scs = $scs + $score;
                    }
                    $lab_csarray[] = number_format(($scs / $lab_tcs * 50 + 50)* .25, 0); 

                }

            }
        }
        // GETTING THE TOTAL OF EXAM
$sql = "SELECT * from teacher_laboratory_exam where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result = $conn->query($sql);
 $tex = 0; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
        if($row['item'] > 0){
            $tex = $tex + $row['item']; 
           }else{
             $tex = 1;
           }               
    }
}


// GETTING THE STUDENT EXAM RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $name =$row['name'];
                $sql2 = "SELECT * from student_laboratory_exam where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                $result2 = $conn->query($sql2);
                $lab_scs = 0;

       
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {    
                        $score = $row2['score']; 
                        $lab_scs = $lab_scs + $score;
           
                    }
                    $lab_examarray[] = number_format(($lab_scs / $tex * 50 + 50)* .40, 0) ; 

                }

            } 
        }

// GETTING THE TOTAL OF reporting
$sql = "SELECT * from teacher_laboratory_reporting where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result = $conn->query($sql);
$lab_trp = 0; 
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {    
    if( $row['item'] >= 1){
        $lab_trp = $lab_trp + $row['item']; 
       }else{
           $lab_trp = 1;
       }                
}
}


// GETTING THE STUDENT reporting RECORD
$sql = "SELECT * from studentrecords where course = '$course' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sid = $row['student_id'];
        $name =$row['name'];
        $sql2 = "SELECT * from student_laboratory_reporting where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
        $result2 = $conn->query($sql2);
        $lab_srep = 0;


        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) { 
              
                $score = $row2['score']; 
                $lab_srep = $lab_srep + $score;
                $lab_reportarray[] = number_format(($lab_srep / $lab_trp * 50 + 50)* .25, 0); 

            }
        }

    } 
}

// GETTING THE STUDENT Attendance RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $satarray = [];
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $name =$row['name'];
                $sql2 = "SELECT * from student_laboratory_attendance where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                $result2 = $conn->query($sql2);
                $sat = 0;

                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {    
                        $score = $row2['score']; 
                        $sat = $sat + $score;
                        $lab_satarray[] = number_format($sat * .10, 0); 
                    }
                }

               
              

            } 
        }
