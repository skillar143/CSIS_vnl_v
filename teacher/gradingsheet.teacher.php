<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sub = $_GET['sub'];

    include "../teacherlayout/head.tlayout.php"; 
    $sql2 = "SELECT * from subjects where description = '$sub'";
    $result2 = $conn->query($sql2);

    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            $subcode = $row2['subcode'];
        }
    }?>
    <!-- content here -->
    <h5 class="title text-dark mb-3"> Grade summary for <?php echo "(".$subcode.")-".$sub?></h5>
    <?php echo "<form action='../database/grade/edit.db.php?' method='get'>"; ?>
    <table class="table" id="datatableid">
        <thead class="bg-primary text-light" >
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th >Prelims</th>
                <th >Midterms</th>
                <th >Finals</th>
                <th >Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../database/dbconnection.db.php';
            $sub = $_GET['sub'];
            $course = $_GET['course'];
            $sql = "SELECT * from studentrecords where course = '$course'";
            $result = $conn-> query($sql);
            if($result-> num_rows > 0 ){
                while($row = $result-> fetch_assoc()){
                    $id = $row['student_id'];
                    $name = $row['name'];
                    
                    echo "<tr><td>".$id."</td>
                            <td>".$row['name']."</td>";
                            $sql2 = "SELECT * from prelims where subject = '$sub' and student_id = '$id'";
                            $result2 = $conn-> query($sql2);
                            if($result2-> num_rows > 0 ){
                                while($row2 = $result2-> fetch_assoc()){
                                    echo "<td>".$row2['grade']."</td>";
                                           
                                }
                            }else{
                                echo "<td>No records</td>";
                            }
                            $sql2 = "SELECT * from midterms where subject = '$sub' and student_id = '$id'";
                            $result2 = $conn-> query($sql2);
                            if($result2-> num_rows > 0 ){
                                while($row2 = $result2-> fetch_assoc()){
                                    echo "<td>".$row2['grade']."</td>";
                                           
                                }
                            }else{
                                echo "<td>No records</td>";
                            }
                            $sql2 = "SELECT * from finals where subject = '$sub' and student_id = '$id'";
                            $result2 = $conn-> query($sql2);
                            if($result2-> num_rows > 0 ){
                                while($row2 = $result2-> fetch_assoc()){
                                    echo "<td>".$row2['grade']."</td>";
                                           
                                }
                            }else{
                                echo "<td>No records</td>";
                            }
                           echo "<td><a class='btn btn-outline-info btn-sm' href='update.teacher.php?id=$id&sub=$sub&course=$course&name=$name'>Edit</a></td></tr>";
                }
            }
            else{
                echo "<tr><td>No records</td></tr>";
            }
            ?>
        </tbody>
    </table>
    </form>
    
   
    <?php if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger text-center">
            <?php echo $_GET['error']; ?>
        </div>
    <?php } elseif (isset($_GET['success'])) { ?> <div class="alert alert-success text-center">
             <?php echo $_GET['success']; ?>
        </div> <?php } ?>

    </form>
    <!-- end of content here -->
<?php include "../teacherlayout/footer.tlayout.php";
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
}
?>