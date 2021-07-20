<?php
include_once '../dbconnection.db.php';
$td = $_GET['id'];
$sub = $_GET['sub'];
$term = $_POST['term'];
$course = $_POST['course'];

$count = 0;
$data = array(
    'grade' => $_POST['grade']
);
if (isset($_POST['submit'])) {

    if($term == 'prelims'){
        foreach ($data as $key => $value) {

            $tid = $data[$key];
            $sql = "SELECT * from studentsubs where subject = '$sub'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['student_id'];
                    $sql2 = "SELECT * from studentrecords where student_id = '$id' and course = '$course'";
                    $result2 = $conn->query($sql2);
    
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
    
                            $studentid = $row2['student_id'];
                            $grade = $tid[$count];
                            $count++;
                            
                            //comment
                            $sq = "SELECT * from prelims where subject = '$sub' and student_id = '$studentid'";
                            $resu = $conn->query($sq);
                            if ($resu->num_rows > 0) {
                                while ($row = $resu->fetch_assoc()) {
                                    header("Location: ../../teacher/inputgrade.teacher.php?error=The Grade is Submited already if there is needed to change just edit it on the list &sub=$sub &course=$course");
            echo $_GET['error'];
                                    
                                }
                            }else{
                                $insertsql = "INSERT INTO prelims (student_id, subject, grade) values ('$studentid', '$sub', '$grade')";
                                mysqli_query($conn, $insertsql);
                                header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            echo $_GET['succes'];
                            }
                            //comment
                            
                          
                        }
                    }
                }
            }
            //header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            //echo $_GET['succes'];
        }
    }elseif($term == 'midterms'){
        foreach ($data as $key => $value) {

            $tid = $data[$key];
            $sql = "SELECT * from studentsubs where subject = '$sub'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['student_id'];
                    $sql2 = "SELECT * from studentrecords where student_id = '$id' and course = '$course'";
                    $result2 = $conn->query($sql2);
    
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
    
                            $studentid = $row2['student_id'];
                            $grade = $tid[$count];
                            $count++;
                            
                            //comment
                            $sq = "SELECT * from midterms where subject = '$sub' and student_id = '$studentid'";
                            $resu = $conn->query($sq);
                            if ($resu->num_rows > 0) {
                                while ($row = $resu->fetch_assoc()) {
                                    header("Location: ../../teacher/inputgrade.teacher.php?error=The Grade is Submited already if there is needed to change just edit it on the list &sub=$sub &course=$course");
            echo $_GET['error'];
                                    
                                }
                            }else{
                                $insertsql = "INSERT INTO midterms (student_id, subject, grade) values ('$studentid', '$sub', '$grade')";
                                mysqli_query($conn, $insertsql);
                                header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            echo $_GET['succes'];
                            }
                            //comment
                            
                          
                        }
                    }
                }
            }
            //header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            //echo $_GET['succes'];
        }
    }elseif($term == 'finals'){
        foreach ($data as $key => $value) {

            $tid = $data[$key];
            $sql = "SELECT * from studentsubs where subject = '$sub'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['student_id'];
                    $sql2 = "SELECT * from studentrecords where student_id = '$id' and course = '$course'";
                    $result2 = $conn->query($sql2);
    
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc()) {
    
                            $studentid = $row2['student_id'];
                            $grade = $tid[$count];
                            $count++;
                            
                            //comment
                            $sq = "SELECT * from finals where subject = '$sub' and student_id = '$studentid'";
                            $resu = $conn->query($sq);
                            if ($resu->num_rows > 0) {
                                while ($row = $resu->fetch_assoc()) {
                                    header("Location: ../../teacher/inputgrade.teacher.php?error=The Grade is Submited already if there is needed to change just edit it on the list &sub=$sub &course=$course");
            echo $_GET['error'];
                                    
                                }
                            }else{
                                $insertsql = "INSERT INTO finals (student_id, subject, grade) values ('$studentid', '$sub', '$grade')";
                                mysqli_query($conn, $insertsql);
                                header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            echo $_GET['succes'];
                            }
                            //comment
                            
                          
                        }
                    }
                }
            }
            //header("Location: ../../teacher/inputgrade.teacher.php?success=The grades is submited successful &sub=$sub &course=$course");
            //echo $_GET['succes'];
        }
    }
} else {
    header("Location: ../../teacher/inputgrade.teacher.php?error=Pls Select Term &sub=$sub");
    echo $_GET['error'];
}
