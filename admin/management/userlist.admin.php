<?php
session_start();

if (isset($_SESSION['username'])) {
  
    include_once '../adminlayout/head.admin.php' ?>
    <!-- <form action="../../database/changepass/user.db.php" method="post"> -->



    



    <nav class="navbar navbar-expand navbar-light  topbar static-top ">
        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800 mr-auto">Users List</h1>
        <div class="float-right">
        <!-- <button class="btn btn-sm btn-outline-info" type="submit" >
                          <i class="fas fa-edit"></i>Save</button> -->
    </div>
    </nav>
    <?php if(isset($_GET['success'])){ ?> <div class="alert alert-success text-center alert-dismissible fade show" >
                        <strong>Success!</strong> <?php echo $_GET['success'];?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    </div> <?php } ?>
                    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Edit User Account</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <!-- end of modal header -->
            <form class="needs-validation" novalidate action="../../database/addrecord/registerteacher.db.php" method="post">
                <!-- modal body -->
                <div class="modal-body">
                <div class="form-group">
                        <input type="text" class="form-control" name="user_id" id="user_id" autocomplete="off"  required>
                    </div>
                    <!-- text box student id -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="role" id="role" autocomplete="off" required>
                    </div>
                    <!-- end student id -->

                    <!-- text box first name -->
                    <div class="form-group">
                        <input type="text" class="form-control" name="password" id="password" autocomplete="off"  required>
                    </div>
                    <!-- end first name -->

                    <!-- selection for gender -->
                </div>
                <!-- end of modal body -->

                <!-- modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-outline-primary" type="submit" name="ok">Add</button>
                </div>
                <!-- end of modal footer -->
            </form>
        </div>
    </div>
</div>

    <div class="table-responsive">
    <table class="table table-striped table-hover table-borderless" id="datatableid">
        <thead class="bg-primary text-light ">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Role</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
      
            <?php
            
            $sql = "SELECT * from users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
               
                ?>

                    <tr>
                            <td><?php echo $row['user_id']?></td>
                            <td><?php echo $row['role']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><a type="button" class="btn btn-outline-info m-1 btn-sm" id="editBtn">
                            <i class="fas fa-edit"></i></a></td>

                <?php
                }
            } else {
                echo "<tr><td>No records</td></tr>";
            }
            ?>
         
        </tbody>
    </table>
    <!-- </form> -->
    </div>
  


    








<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>




