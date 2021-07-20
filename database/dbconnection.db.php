<?php

$dbserver= "localhost";
$dbname= "root";
$dbpwd = "";
$db_name = "studentsystem";

$conn = mysqli_connect($dbserver, $dbname, $dbpwd, $db_name);

if (!$conn) {
	echo "Connection failed!";
}