<?php

include_once '../dbconnection.db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$units = $_POST['units'];
$code = $_POST['code'];

// GETTING THE OLD DATA OF THE FILE

$OLDSUB = "SELECT * FROM sublists WHERE id = '$id'";

$OLDREQ = mysqli_query($conn,$OLDSUB);

$OLD_D = mysqli_fetch_assoc($OLDREQ);

$OLDSUBCODE = $OLD_D['subject_code'];


$SECONDARY_SB = "SELECT * FROM subjects WHERE subcode = '$OLDSUBCODE'";

$SECONDARY_SB = mysqli_query($conn, $SECONDARY_SB);

$SECONDARY_SB = mysqli_fetch_assoc($SECONDARY_SB);

$SB_ID = $SECONDARY_SB["id"];

$SB_NAME = $SECONDARY_SB["description"];


$sql = "UPDATE sublists
SET description = '$name', units = '$units' 
WHERE id = '$id';";


$SUB = "UPDATE subjects SET description = '$name', units = '$units' 
WHERE id = '$SB_ID'";

$SUBQUERY = mysqli_query($conn, $SUB);

$SUBPROG = "UPDATE programs SET subject = '$name'
WHERE subject = '$SB_NAME'";

$SUBPROG = mysqli_query($conn, $SUBPROG);


$STUPDATE = "UPDATE studentsubs SET subject = '$name'
WHERE subject = '$SB_NAME'";

$STUPDATE = mysqli_query($conn, $STUPDATE);



$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



header("Location: ../../admin/program/subjectlist.admin.php?success=succesfull");