
<?php
session_start();

if (isset($_SESSION['username'])) {

    include_once '../adminlayout/head.admin.php';
    
    $student = "SELECT * from sublists where subject_code = '$_GET[subcode]'";
    $r = $conn->query($student);
    if ($r->num_rows > 0) {
        while ($row = $r->fetch_assoc()) {
           $id = $row['subject_code']; 
           $name = $row['description']; 
           $units = $row['units']; 
          
        }
    }
    ?>
    <nav class="navbar navbar-expand navbar-light  topbar  static-top ">
        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800 mr-auto">Edit Subject</h1>
    </nav>
    <form class="needs-validation" action="../../database/editprofile/subject.db.php" method="post" novalidate>
                <div class="w-75 m-auto">
                    <!-- text box student id -->
                    <div class="form-group d-flex" >
                        <label for="studentid" style="width: 50%; padding:1px">Subject Code
                        <input type="text" class="form-control" name="code" autocomplete="off" value="<?php echo $id ?>">                
                        </label>
                        
                        <label for="studentid" style="width: 50%; padding:1px">Description
                        <input type="text" class="form-control" name="name" autocomplete="off"  value="<?php echo $name ?>">
                        </label>

                        <label for="studentid" style="width: 50%; padding:1px">Description
                        <input type="number" class="form-control" name="units" autocomplete="off"  value="<?php echo $units ?>">
                        </label>

                        <input type="text" class="form-control" name="id" autocomplete="off" value="<?php echo $_GET['subcode'] ?>" hidden>                
                        
                    </div>
                    
                </div>
                <!-- end of modal body -->
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong>Success!</strong> <?php echo $_GET['success'];?> 
                        </div> <?php } ?>
                <!-- modal footer -->
                <div class="modal-footer">
                    <a href="subjectlist.admin.php" class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Back</a>
                    <button class="btn btn-sm btn-outline-success" type="submit" name="ok">Save</button>
                </div>
                <!-- end of modal footer -->
            </form>

<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>