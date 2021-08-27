<?php
 $csarray = array();
 $reportarray = array();
 $attendancearray = array();
 $exam = array();

// GETTING THE TOTAL OF CLASSRECORD
$sql = "SELECT * from teacher_cs where teacher_id = '$id' and course = '$course'";
$result = $conn->query($sql);
$tcs = 0; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
       $tcs = $tcs + $row['item'];                
    }
}
$tcs;

// GETTING THE STUDENT CS RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $name =$row['name'];
                $sql2 = "SELECT * from student_cs where student_id = '$sid' and course = '$course'";
                $result2 = $conn->query($sql2);
                $scs = 0;

       
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {    
                        $score = $row2['score']; 
                        $scs = $scs + $score;
           
                    }
                }

                $csarray[] = ($scs / $tcs * 50 + 50)* .25 ; 
            }
        }
        // GETTING THE TOTAL OF EXAM
$sql = "SELECT * from teacher_exam where teacher_id = '$id' and course = '$course'";
$result = $conn->query($sql);
$tex = 0; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {    
       $tex = $tex + $row['item'];                
    }
}
$tex;

// GETTING THE STUDENT EXAM RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $name =$row['name'];
                $sql2 = "SELECT * from student_exam where student_id = '$sid' and course = '$course'";
                $result2 = $conn->query($sql2);
                $scs = 0;

       
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {    
                        $score = $row2['score']; 
                        $scs = $scs + $score;
           
                    }
                }

                $examarray[] = ($scs / $tex * 50 + 50)* .40 ; 
            } 
        }


        // GETTING THE STUDENT CS RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sid = $row['student_id'];
        $name =$row['name'];
        $sql2 = "SELECT * from student_cs where student_id = '$sid' and course = '$course'";
        $result2 = $conn->query($sql2);
        $scs = 0;


        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {    
                $score = $row2['score']; 
                $scs = $scs + $score;
   
            }
        }

        $csarray[] = ($scs / $tcs * 50 + 50)* .25 ; 
    }
}
// GETTING THE TOTAL OF reporting
$sql = "SELECT * from teacher_reporting where teacher_id = '$id' and course = '$course'";
$result = $conn->query($sql);
$trep = 0; 
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {    
$trep = $trep + $row['item'];                
}
}
$trep;

// GETTING THE STUDENT reporting RECORD
$sql = "SELECT * from studentrecords where course = '$course'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sid = $row['student_id'];
        $name =$row['name'];
        $sql2 = "SELECT * from student_reporting where student_id = '$sid' and course = '$course'";
        $result2 = $conn->query($sql2);
        $srep = 0;


        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) { 
              
                $score = $row2['score']; 
                $srep = $srep + $score;
   
            }
        }

        $reportarray[] = ($srep / $trep * 50 + 50)* .25; 
    } 
}

//print_r($reportarray);