<?php
session_start();

if (isset($_SESSION['username'])) {

    include_once '../adminlayout/head.admin.php' ?>

            <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger text-center ">
                            <strong>Error!</strong> <?php echo $_GET['error']; ?>
                        </div>
                <?php }elseif(isset($_GET['success'])){ ?> <div class="alert alert-success text-center">
                        <strong>Success!</strong> <?php echo $_GET['success'];?> 
                        </div> <?php } ?>
<?php include_once '../adminlayout/footer.admin.php';
} else {
    header("Location: ../canossa/master.blade.php");
    exit();
} ?>