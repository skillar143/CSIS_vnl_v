<?php
session_start();

if (isset($_SESSION['username'])) {

    include_once '../adminlayout/head.admin.php' ?>
    <nav class="navbar navbar-expand navbar-light  topbar static-top ">
        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800 mr-auto">Course List</h1>
        <div class="float-right">
        <a class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#AddcourseModal"><i class="fas fa-plus"></i>Add Course</a>
    </div>
    </nav>
    
    <div class="table-responsive">
    <table class="table table-striped table-hover table-borderless" id="datatableid">
        <thead class="bg-primary text-light ">
            <tr>
                <th class="">ID</th>
                <th class="">Name</th>
                <th class="">Role</th>
                <th class="">Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../database/dbconnection.db.php';

            $sql = "SELECT * from users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                   
                    $edit = "<a class='btn btn-sm btn-outline-info' href=''>
                            <i class='fas fa-edit'></i></a>";

                    echo "<tr>
                            <td class=''>" . $row['user_id'] . "</td>
                            <td class=''>users</td>
                            <td class=''>" . $row['role'] . "</td>
                            <td class=''>" . $row['password'] . "</td>
                            <td class=''>" . $edit . "</td>";
                }
            } else {
                echo "<tr><td>No records</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    
    <?php include "creatcourse.admin.php"; ?>

<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>