<?php
session_start();

if (isset($_SESSION['username'])) {
  
    include_once '../adminlayout/head.admin.php' ?>
    <form action="../../database/changepass/user.db.php" method="post">
    <nav class="navbar navbar-expand navbar-light  topbar static-top ">
        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800 mr-auto">Users List</h1>
        <div class="float-right">
        <button class="btn btn-sm btn-outline-info" type="submit" >
                          <i class="fas fa-edit"></i>Save</button>
    </div>
    </nav>
    
    <?php if(isset($_GET['success'])){ ?> <div class="alert alert-success text-center alert-dismissible fade show" >
                        <strong>Success!</strong> <?php echo $_GET['success'];?> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
                    </div> <?php } ?>
    <div class="table-responsive">
    <table class="table table-striped table-hover table-borderless" id="datatableid">
        <thead class="bg-primary text-light ">
            <tr>
                <th class="">ID</th>
                <th class="">Role</th>
                <th class="">Password</th>
            </tr>
        </thead>
        <tbody>
      
            <?php
            
            $sql = "SELECT * from users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
               
                
                   // $edit = "<a class='btn btn-sm btn-outline-info' href='user.admin.php?id=$row[user_id]'>
                    //        <i class='fas fa-edit'></i></a>";

                    $edit =  "<button class='btn btn-sm btn-outline-info' type='submit'>
                          <i class='fas fa-edit'></i></button>";

                    echo "<tr>
                            <td class=''>" . $row['user_id'] . "</td>
                            <td class=''>" . $row['role'] . "</td>
                            <td class=''><input type='text' class='border-0 bg-transparent' name='password[]' value='$row[password]' ></td>
                            <input type='text' class='border-0 bg-transparent' name='id[]' value='$row[user_id]' hidden>";
                }
            } else {
                echo "<tr><td>No records</td></tr>";
            }
            ?>
         
        </tbody>
    </table>
    </form>
    </div>

<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>

