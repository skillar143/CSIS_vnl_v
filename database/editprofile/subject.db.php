<?php

include_once '../dbconnection.db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$units = $_POST['units'];
$code = $_POST['code'];

$sql = "UPDATE sublists
SET subject_code = '$code', description = '$name', units = '$units' 
WHERE subject_code = '$id';";

$result = mysqli_query($conn, $sql);


header("Location: ../../admin/editsubject.admin.php?success=succesfull&subcode=$code");;