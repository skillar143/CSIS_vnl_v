</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Logout Modal-->
<?php include_once "_logoutmodal.blade.php" ?>

<!-- Bootstrap core JavaScript-->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>

<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../assets/js/sb-admin-2.min.js"></script>

<script src="../../assets/js/datatable/datatable-jquery.js"></script>

<script src="../../assets/js/datatable/datatable-bootstrap.js"></script>



<script>

/** datatable modification */
    $(document).ready(function() {
        $('#datatableid').DataTable( {
        "paging":   true,
        "ordering": false,
        "info":     true
    } );
    });


    (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  
</script>



<!-- end of content -->