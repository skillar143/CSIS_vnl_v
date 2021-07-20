<?php
session_start();

if (isset($_SESSION['username'])) {

    include "../adminlayout/head.admin.php"; ?>
    <!-- content here -->
    <!-- modal header -->
    <div class="bg-primary p-2">
        <h5 class="text-light text-uppercase"><?php echo $_GET['des']; ?></h5>
    </div>
    <!-- end of modal header -->

    <!-- modal body -->

    <!-- text box student id -->
    <form action="../database/addrecord/addprog.db.php" method="post">
    <?php 
        include "../program/first.program.php";
        include "../program/second.program.php";
        include "../program/third.program.php";
        include "../program/forth.program.php";
    ?>
    <input type="hidden" value="<?php echo $_GET['des']; ?>" name="course">
    </form>

    <!-- end of content here -->
<?php include "../adminlayout/footer.admin.php";
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
}
?>