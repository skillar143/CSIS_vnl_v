<?php
$sb_ls = "SELECT * from sublists where description = '$sub'";
$sb_rs = $conn->query($sb_ls);

if ($sb_rs->num_rows > 0) {
    while ($sb_data = $sb_rs->fetch_assoc()) {
        $sb_st = $sb_data['status'];
    }
}
if($sb_st != "with lab")
{
    $display = "d-none";
}

if($current == "lec"){
    $lecture = "active";
}else{
    $laboratory = "active";

}
?>

<div class="<?php echo $display; ?>">
    <a class="btn btn-sm btn-outline-primary <?php echo $lecture; ?>" href="<?php echo $lec; ?>?sub=<?php echo $sub; ?>&course=<?php echo $course; ?>&year=<?php echo $year; ?>"><i class="fas fa-book"></i>
        Lecture</i></a>
        <a class="btn btn-sm btn-outline-primary <?php echo $laboratory; ?>" href="<?php echo $lab; ?>?sub=<?php echo $sub; ?>&course=<?php echo $course; ?>&year=<?php echo $year; ?>"><i class="fas fa-flask"></i>
        Laboratory</i></a>
</div>