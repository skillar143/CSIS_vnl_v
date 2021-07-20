<?php 
session_start();

if (isset($_SESSION['username'])) {

include_once '../adminlayout/head.admin.php' ?>
       


<nav class="navbar navbar-expand navbar-light topbar static-top ">
<!-- Topbar Search -->
<h1 class="h3 text-gray-800">Subject List</h1>
</nav>
<div class="float-right m-1">
<a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AddsubjectModal"><i class="fas fa-plus"></i>Add Subject</a>
</div>
<div class="table-responsive">
<table class="table table table-striped table-hover table-borderless" id="datatableid">
    <thead class="bg-primary text-light ">
        <tr>
            <th>Subject Code</th>
            <th>Description</th>
            <th>Units</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
               <?php
                    include_once '../database/dbconnection.db.php';

                    $sql = "SELECT * from sublists";
                    $result = $conn-> query($sql);
                   
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $del = "<a class='btn btn-outline-danger m-1 btn-sm' href='../database/deleterecord/subject.db.php?subcode=$row[subject_code]'>
                            <i class='fas fa-minus'></i></a>";
                            $edit = "<a class='btn btn-outline-info m-1 btn-sm' href='editsubject.admin.php?subcode=$row[subject_code]'>
                            <i class='fas fa-edit'></i></a>";
                            echo "<tr><td>".$row['subject_code']."</td>
                            <td>".$row['description']."</td>
                            <td>".$row['units']."</td>
                            <td>".$del.$edit."</td> </tr>";
                        }
                    }
                    else{
                        echo "<tr><td>No records</td></tr>";
                    }
                    
                ?>
              
        
    </tbody>
</table>
</div>

<?php include "createsubject.admin.php" ?> 


<?php include_once '../adminlayout/footer.admin.php';
 }else{
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>
                    
                    
                

