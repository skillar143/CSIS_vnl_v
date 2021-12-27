<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img class="img-profile rounded-circle w-50" src="../../assets/img/logo.PNG">
        </div>
        <div class="sidebar-brand-text mx-3">CSIS</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Menu
    </div> -->
    <!-- Nav Item - Schedule Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="../admin/requestlist.admin.php">
            <i class="fas fa-bell fa-fw"></i>
             Counter - Alerts

             <?php
            include_once '../../database/dbconnection.db.php';

            foreach ($conn->query('SELECT COUNT(*) FROM requests') as $row) {

                if ($row['COUNT(*)'] >= '1') {
                    echo " <span class='badge badge-danger badge-counter'>" . $row['COUNT(*)'] . "</span>";
                }
            }
            ?> 

            <span>Notification</span></a>
    </li> -->
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Heading -->
    <div class="sidebar-heading">
        registration
    </div>
    <!-- Nav Item - admit Student Menu -->
    <li class="nav-item">
        <a class="nav-link" href="../student/studentlist.admin.php">
            <i class="fas fa-users"></i>
            <span>Students</span></a>
    </li>
    <!-- Nav Item - admit Teachers Menu -->
    <li class="nav-item">
        <a class="nav-link" href="../teacher/teacherlist.admin.php">
            <i class="fas fa-users"></i>
            <span>Teachers</span></a>
    </li>
    <!-- Nav Item -reg subject Menu -->
    <li class="nav-item">
        <a class="nav-link" href="../program/subjectlist.admin.php">
            <i class="fas fa-book"></i>
            <span>Subjects</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="../program/courselist.admin.php">
            <i class="fas fa-book"></i>
            <span>Courses</span></a>
    </li>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

<div class="sidebar-heading">
    Manage Grading System
</div>

<li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#grading">
    <i class="fas fa-toggle-on"></i>
        <span>Grading</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#StudentGrade">
    <i class="fas fa-award"></i>
        <span>Student Grade</span></a>
</li>


    <li class="nav-item">
        <a class="nav-link" href="../student/irregularlist.admin.php">
            <i class="fas fa-users"></i>
            <span>Irregular Students</span></a>
    </li>

    <!-- <li class="nav-item"> -->
        <!-- <a class="nav-link" href="../student/irregularlist.admin.php"> -->
            <!-- <i class="fas fa-users"></i> -->
            <!-- <span>Regular Students</span></a> -->
    <!-- </li> -->
    
    

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="sidebar-heading">
        Accounts Setting
    </div>

    <li class="nav-item">
        <a class="nav-link" href="../management/userlist.admin.php">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
    <div class="sidebar-heading">admin account</div>
    <li class="nav-item">
        <a class="nav-link" href="../management/changepass.admin.php">
            <i class="fas fa-key"></i>
            <span>Change Password</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="">
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


<!-- MODAL -->
<?php include "../management/gradingtoggle.admin.php"; 
 include "../management/studentgrade.admin.php"; ?>