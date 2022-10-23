<?php
$lab_s_cs = "SELECT * from student_laboratory_cs where student_id = '$sid' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$r_lec_s_cs = $conn->query($lab_s_cs);
$lab_scs = 0;
if ($r_lec_s_cs->num_rows > 0) {
    while ($d_lab_cs = $r_lec_s_cs->fetch_assoc()) {    
        $lab_score = $d_lab_cs['score']; 
        $lab_scs = $lab_scs + $lab_score;
    }


}

$ex_lab_sql = "SELECT * from student_laboratory_exam where student_id = '$sid' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$r_lab_ex = $conn->query($ex_lab_sql);
$lab_ex = 0;
if ($r_lab_ex->num_rows > 0) {
    while ($row2 = $r_lab_ex->fetch_assoc()) {    
        $score = $row2['score']; 
        $lab_ex = $lab_ex + $score;

    }

}

$lab_rep_sql = "SELECT * from student_laboratory_reporting where student_id = '$sid' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$r_lab_rep = $conn->query($lab_rep_sql);
$lab_srep = 0;
if ($r_lab_rep->num_rows > 0) {
while ($d_lab_rep = $r_lab_rep->fetch_assoc()) { 

$score = $d_lab_rep['score']; 
$lab_srep = $lab_srep + $score;

}
}

$sql2 = "SELECT * from student_laboratory_attendance where student_id = '$sid' and course = '$course' and term = '$term' and subject_code = '$subcode'";
$result2 = $conn->query($sql2);
$sat = 0;

if ($result2->num_rows > 0) {
while ($row2 = $result2->fetch_assoc()) {    
$score = $row2['score']; 
$sat = $sat + $score;
}
}

$att = number_format($sat*.10, 0);
$ex = number_format(($lab_ex/$lab_tex*50+50)*.40, 0);
$cs = number_format(($lab_scs/$lab_tcs*50+50)*.25, 0);
$rep =number_format(($lab_srep/$lab_trep*50+50)*.25, 0);

$lab_g = $att + $ex + $rep + $cs;

echo $lab_g;