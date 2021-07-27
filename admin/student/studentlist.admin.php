<?php
session_start();

if (isset($_SESSION['username'])) {

    include_once '../adminlayout/head.admin.php' ?>
<nav class="navbar navbar-expand navbar-light topbar static-top ">
<h1 class="h3 text-gray-800 ">Student List</h1>
<!-- Topbar Search -->
</nav>
<div class="float-right m-1">
<a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AddStudentModal"><i class="fas fa-plus mr-2"></i>Add Student</i></a>
<a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#print"><i class="fas fa-print"></i>Print Records</i></a>
</div>
<?php if (isset($_GET['error'])) { ?>
    <div class="alert alert-danger text-center">
      <strong>Error!</strong> <?php echo $_GET['error']; ?>
    </div><?php } ?>

  <div class="table-responsive">
    <table class="table table-striped table-hover table-borderless" id="datatableid">
        <thead class="bg-primary text-light ">
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Cell No.</th>
                <th>Birthday</th>
                <th>Birth place</th>
                <th>Address</th>
                <th>Course</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>  
            <?php
                    include_once '../../database/dbconnection.db.php';
                    $sql = "SELECT * from studentrecords";
                    $result = $conn-> query($sql);

                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $del = "<a class='btn btn-outline-danger m-1 btn-sm' href='../../database/deleterecord/student.db.php?stid=$row[student_id]'>
                            <i class='fas fa-user-minus'></i></a>";
                            $edit = "<a class='btn btn-outline-info m-1 btn-sm' href='editstudentrecord.admin.php?stid=$row[student_id]'>
                            <i class='fas fa-edit'></i></a>";
                            echo "<tr><td>".$row['student_id']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['cellphone']."</td>
                            <td>".$row['bday']."</td>
                            <td>".$row['bplace']."</td>
                            <td>".$row['address']."</td>
                            <td class='text-wrap'>".$row['course']."</td>
                            <td>".$row['status']."</td>
                            <td>".$del.$edit."</td></tr>";
                        }
                    }
                
                ?>  
        </tbody>
    </table>
  </div>
  <?php include "create.admin.php" ?>  
<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>



<div class="modal fade" id="print" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Activate Grading Period</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <!-- end of modal header -->
            <form action="../../print/student.print.php" method="post">
                <!-- modal body -->
                <div class="modal-body row">
                    <!-- text box student id -->
                <div class="mt-2 d-flex">
                <label >Select course</label>
            <select name="filter"  class="form-control">
            <option value="all">All Course</option>
            <?php
                                include_once '../database/dbconnection.db.php';

                                $sql = "SELECT * from course";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {

                                        echo "<option value='" . $row['description'] . "'>" . $row['description'] . "</option>";
                                    }
                                } else {
                                    echo "<tr><td>No records</td></tr>";
                                }
                                ?>

            </select>
            
                </div>
           
            
            
                    <!-- end student id -->      
                    <!-- end of course selection -->
                </div>
                <!-- end of modal body -->

                <!-- modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-outline-primary" type="submit" name="ok">Done</button>
                </div>
               
                    <!-- end of modal footer -->
            </form>
        </div>
    </div>
</div>