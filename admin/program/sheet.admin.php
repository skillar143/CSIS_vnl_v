<?php 
session_start();

if (isset($_SESSION['username'])) {              
    include "../adminlayout/head.admin.php"; ?>
       <!-- content here -->
      
      <center><div >
        <div class="modal-content w-50 ">
            <!-- modal header -->
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light">Grading Sheet</h5>
            </div>
            <!-- end of modal header -->
            <form action="../student/gradingst.admin.php" method="get">
                <!-- modal body -->
                <div class="modal-body">
                    <!-- text box student id -->
                    <div class="form-group">
                    <select name="course" id="c" class="form-control m-1" required>
                            <option value="">Program</option>
                            <?php
                             
                            include_once '../../database/dbconnection.db.php';

                            $sql = "SELECT * from course";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<option value='" . $row['description'] . "' class='text-uppercase'>" . $row['description'] . "</option>";
                                }
                            } else {
                                echo "<tr><td>No records</td></tr>";
                            }

                            ?>
                        </select>
                        <select name="sub" id="c" class="form-control m-1" required>
                            <option value="">Subject</option>
                            <?php
                             
                            include_once '../../database/dbconnection.db.php';

                            $sql = "SELECT * from subjects";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {

                                    echo "<option value='" . $row['description'] . "' class='text-uppercase'>".$row['subcode']."-(".$row['description']."</option>";
                                }
                            } else {
                                echo "<tr><td>No records</td></tr>";
                            }

                            ?>
                        </select>
                        <select name="year" id="d" class="form-control m-1" required>
                            <option value="">Year level</option>
                            <option value="first">first</option>
                            <option value="second">second</option>
                            <option value="third">third</option>
                            <option value="4th">fourth</option>
                        </select>
                        
                        
                    </div>
                    
                    <!-- end student id -->      
                    <!-- end of course selection -->
                </div>
                <!-- end of modal body -->

                <!-- modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit">Go</button>
                </div>
                </form> 
                    <!-- end of modal footer -->
        </div>
    </div>
      
      </center>
     
    

       <!-- end of content here -->
       <?php include "../adminlayout/footer.admin.php";
    }else{
        header("Location: ../../canossa/master.blade.php");
        exit();
   }
?>
