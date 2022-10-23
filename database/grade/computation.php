<?php
 $csarray = array();
 $reportarray = array();
 $attendancearray = array();
 $exam = array();

// getting the term
$gs = "SELECT * from gradingstatus ";
$gs_r = $conn->query($gs);
if ($gs_r->num_rows > 0) {
    while ($gs_d = $gs_r->fetch_assoc()) { 
      
  $term = $gs_d['term'];

    }
}


// GETTING THE TOTAL OF LECTURE CLASSRECORD
$lec_cs = "SELECT * from teacher_cs where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$r_lec_cs = $conn->query($lec_cs);
$lec_t_cs = 0;
if ($r_lec_cs->num_rows > 0) {
    while ($d_lec_cs = $r_lec_cs->fetch_assoc()) {    
         
       
       if( $d_lec_cs['item'] >= 1){
        $lec_t_cs = $lec_t_cs + $d_lec_cs['item']; 
       }else{
           $lec_t_cs = 1;
       }

    }
}

// GETTING THE TOTAL OF LABORATORY CLASSRECORD
$lab_cs = "SELECT * from teacher_laboratory_cs where teacher_id = '$id' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$r_lab_cs = $conn->query($lab_cs);
$lab_t_cs = 0;
if ($r_lab_cs->num_rows > 0) {
    while ($d_lab_cs = $r_lab_cs->fetch_assoc()) {    
         
       
       if( $d_lab_cs['item'] >= 1){
        $lab_t_cs = $lab_t_cs + $d_lab_cs['item']; 
       }else{
           $lab_t_cs = 1;
       }

    }
}


// GETTING THE STUDENT CS RECORD
$cs_sr = "SELECT * from studentrecords where course = '$course'";
        $r_cs_sr = $conn->query($cs_sr);
        if ($r_cs_sr->num_rows > 0) {
            while ($d_cs_sr = $r_cs_sr->fetch_assoc()) {
                $sid = $d_cs_sr['student_id'];
                $name =$d_cs_sr['name'];
                
                //lecture
                $lec_s_cs = "SELECT * from student_cs where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                $r_lec_s_cs = $conn->query($lec_s_cs);
                $lec_scs = 0;
                if ($r_lec_s_cs->num_rows > 0) {
                    while ($d_lec_cs = $r_lec_s_cs->fetch_assoc()) {    
                        $lec_score = $d_lec_cs['score']; 
                        $lec_scs = $lec_scs + $lec_score;
                    }


                }
                
                //laboratory

                $lab_s_cs = "SELECT * from student_laboratory_cs where student_id = '$sid' and term = '$term' and subject_code = '$subcode'";
                $r_lec_s_cs = $conn->query($lab_s_cs);
                $lab_scs = 0;
                if ($r_lec_s_cs->num_rows > 0) {
                    while ($d_lab_cs = $r_lec_s_cs->fetch_assoc()) {    
                        $lab_score = $d_lab_cs['score']; 
                        $lab_scs = $lab_scs + $lab_score;
                    }


                }

        
                if (mysqli_num_rows($r_lab_cs) === 1) {
                   
                else{
                    exit();
                }

                $csarray[] = ($scs / $lec_t_cs * 50 + 50)* .25 ; 

            }
        }
       

print_r($csarray);