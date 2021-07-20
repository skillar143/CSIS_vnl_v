<?php
include_once '../dbconnection.db.php';

$id = $_GET['id'];
if(isset($_POST['submit'])){
  
     if(!isset($_POST['subject'])){
      header("Location: ../../student/enroll.student.php?error=Pls choose subject\s");
          echo $error;
     }
      else{
        $sub_array = $_POST['subject'];
foreach($_POST['subject'] as $key => $value){
     $tid = $_POST['subject'][$key];
     
    
    $sql = "SELECT * from subjects where teacher_id = '$tid'";
    $result = $conn-> query($sql);
if($result-> num_rows > 0 ){
    while($row = $result-> fetch_assoc()){
       $des = $row['description'];
    }
}


$sq = "SELECT * from studentsubs where subject = '$des' and student_id = '$id'";
            $resul = $conn-> query($sq);
        if($resul-> num_rows > 0 ){
            while($row = $resul-> fetch_assoc()){
            $des1 = $row['subject'];
            }
        }
        if($des == $des1){
          header("Location: ../../student/enroll.student.php?error=You are already inrolled in this subject");
          echo $error;
      }
      else{
          $insertsql="INSERT INTO studentsubs (student_id, subject, instructor) values ('$id','$des', '$tid')";
  mysqli_query($conn,$insertsql);

  header("Location: ../../student/enroll.student.php?success=Successfully enroll");
  echo $success;
      }

}
      }
    
    }