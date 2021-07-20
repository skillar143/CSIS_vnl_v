
<?php
session_start();

if (isset($_SESSION['username'])) {

    include_once '../adminlayout/head.admin.php';
    include_once '../database/dbconnection.db.php';
    $student = "SELECT * from studentrecords where student_id = '$_GET[stid]'";
    $r = $conn->query($student);
    if ($r->num_rows > 0) {
        while ($row = $r->fetch_assoc()) {
           $id = $row['student_id']; 
           $name = $row['name']; 
           $gender = $row['gender']; 
           $cp = $row['cellphone']; 
           $bday = $row['bday']; 
           $bplace = $row['bplace']; 
           $address = $row['address']; 
           $course = $row['course']; 
           $status = $row['status']; 
        }
    }
    ?>
    <nav class="navbar navbar-expand navbar-light  topbar  static-top ">
        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800 mr-auto">Edit Student Record</h1>
    </nav>
    <form class="needs-validation" action="../database/editprofile/student.db.php" method="post" novalidate>
                <div class="w-75 m-auto">
                    <!-- text box student id -->
                    <div class="form-group d-flex" >
                        <label for="studentid" style="width: 50%; padding:1px">Student ID
                        <input type="text" class="form-control" name="studentid" autocomplete="off" value="<?php echo $id ?>">                
                        </label>
                        
                        <label for="studentid" style="width: 50%; padding:1px">Name
                        <input type="text" class="form-control" name="name" autocomplete="off"  value="<?php echo $name ?>">
                        </label>
                        <input type="text" class="form-control" name="id" autocomplete="off" value="<?php echo $_GET['stid'] ?>" hidden>                
                        
                    </div>
                    <!-- end student id -->

                    <!-- selection for gender -->
                    <div class="form-group d-flex">
                        <label for="contact" style="width: 40%; padding:1px">Contact
                            <input type="tel" class="form-control" name="contact" autocomplete="off" pattern="[0-9]{11}"  value="<?php echo $cp ?>">
                        </label>

                        <label for="gender" style="width: 20%; padding:1px">Gender
                            <select name="gender" id="gender" class="form-control "  value="<?php echo $gender ?>">
                                <option value="male">M</option>
                                <option value="female">F</option>
                            </select>
                        </label>

                        <label for="bday" style="width: 40%; padding:1px">Birthdate
                            <input type="date" class="form-control" name="bday" autocomplete="off"  value="<?php echo $bday ?>">
                        </label>
                    </div>
                    <!-- end of selection gender -->

                    <!-- text box contact-->
                    <div class="form-group d-flex">
                        <label for="address" style="width: 100%; padding:1px">Address
                            <textarea type="text" class="form-control" name="address" autocomplete="off"><?php echo $address ?></textarea>
                        </label>
                        <label for="bplace" style="width: 100%; padding:1px">Birthplace
                            <textarea type="text" class="form-control w-100" name="bplace" autocomplete="off" ><?php echo $bplace ?></textarea>
                        </label> 
                    </div>
                    <!-- end address -->
                    <!-- selection of course -->
                    
                    <!-- end of course selection -->
                </div>
                <!-- end of modal body -->
                <?php if (isset($_GET['success'])) { ?>
                    <div class="alert alert-success text-center">
                        <strong>Success!</strong> <?php echo $_GET['success'];?> 
                        </div> <?php } ?>
                <!-- modal footer -->
                <div class="modal-footer">
                    <a href="studentlist.admin.php" class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Back</a>
                    <button class="btn btn-sm btn-outline-success" type="submit" name="ok">Save</button>
                </div>
                <!-- end of modal footer -->
            </form>

<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>