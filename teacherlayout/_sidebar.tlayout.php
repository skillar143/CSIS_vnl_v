<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle" src="../assets/img/logo.png" width="90%">
        </div>
        <div class="sidebar-brand-text mx-5">CSIS</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <!-- Nav Item - Schedule Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="../teacher/request.teacher.php">
        <i class="fas fa-comment"></i>
            <span>Make Request</span></a>
    </li> -->
    <!-- Nav Item - Grade Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed active" href="#" data-toggle="collapse" data-target="#collapsestudentlist"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Student List</span>
        </a>
        <div id="collapsestudentlist" class="collapse" aria-labelledby="headingstudentlist"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/studentlist.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    }
                ?>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <button class="nav-link collapsed btn btn" disabled="disabled" id="gradingBtn" href="#" data-toggle="collapse"
            data-target="#collapseinputgrade" aria-expanded="true" aria-controls="collapseTwo">
            <i class="far fa-address-card"></i>
            <span>Students Grade</span>
        </button>
        <div id="collapseinputgrade" class="collapse" aria-labelledby="headinginputgrade"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/course.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <button class="nav-link collapsed btn btn" disabled="disabled" id="summaryBtn" href="#" data-toggle="collapse"
            data-target="#collapsegradesummary" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-address-card"></i>
            <span>Grade Summary</span>
        </button>
        <div id="collapsegradesummary" class="collapse" aria-labelledby="headinggradesummary"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/gradesummary.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>

    <div class="sidebar-heading">
        Class Records
    </div>
<!-- attendance -->
    <li class="nav-item">
        <button class="nav-link collapsed btn btn"  href="#" data-toggle="collapse"
            data-target="#collapseattendance" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-calendar-alt"></i>
            <span>Attendance</span>
        </button>
        <div id="collapseattendance" class="collapse" aria-labelledby="headinginputgrade"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/attendance.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>

<!-- class standing -->

<li class="nav-item">
        <button class="nav-link collapsed btn btn"  href="#" data-toggle="collapse"
            data-target="#collapseclassstanding" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-chalkboard"></i>
            <span>Class Standing</span>
        </button>
        <div id="collapseclassstanding" class="collapse" aria-labelledby="headinginputgrade"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/CS.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>

<!-- reporting -->


    <li class="nav-item">
        <button class="nav-link collapsed btn btn"  href="#" data-toggle="collapse"
            data-target="#collapseactivity" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-tasks"></i>
            <span>Reporting</span>
        </button>
        <div id="collapseactivity" class="collapse" aria-labelledby="headinginputgrade"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/reporting.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>
<!-- exam -->
    <li class="nav-item">
        <button class="nav-link collapsed btn btn" href="#" data-toggle="collapse"
            data-target="#collapseexam" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-edit"></i>
            <span>Exam</span>
        </button>
        <div id="collapseexam" class="collapse" aria-labelledby="headinggradesummary"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Subjects:</h6>
                <?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from subjects where teacher_id = '$tid'";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            echo "<a class='collapse-item' href='../teacher/exam.teacher.php?sub=$row[description]'>".$row['subcode']."-(".$row['description'].")</a>";
                        }
                    } 
                ?>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Account Settings
    </div>

    <li class="nav-item">
        <a class="nav-link" href="../teacher/changepass.teacher.php" ">
        <i class=" fas fa-key"></i>
            <span>Change Password</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="#">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>