</div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include "_footer.tlayout.php" ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <?php include "_logoutmodal.tlayout.php" ?>
      <!-- Bootstrap core JavaScript-->
      <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<?php
                    include_once '../database/dbconnection.db.php';
                    $tid = $_SESSION['user_id'];
                    $sql = "SELECT * from gradingstatus";
                    $result = $conn-> query($sql);
                    if($result-> num_rows > 0 ){
                        while($row = $result-> fetch_assoc()){
                            $status = $row['status'];
                        }
                    } 
                ?> 



<script>
var stat = "<?php echo $status; ?>";

if (stat == "open"){ 
        gradingBtn.removeAttribute('disabled');
    }else{
        gradingBtn.setAttribute('disabled', 'disabled');
    }




    $(document).ready(function() {
        $('#datatableid').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     true,
    } 
    );
    });

</script>
<!-- end of content -->

