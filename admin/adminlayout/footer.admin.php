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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

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
//opening edit modal
$(document).ready(function () {
  $('.editbtn').on('click' , function () {

    $('#editmodal').modal('show');

      $tr =$(this).closest('tr');

      var data = $tr.children("td").map(function (){
        return $(this).text();
      }).get();
      
      $('#userid').val(data[0]);
      $('#role').val(data[1]);
      $('#password').val(data[2]);

  });
  
});

//closing edit modal
$(document).ready(function () {
  $('.closemodal').on('click' , function () {

    $('#editmodal').modal('hide');
  });
  
});
  
</script>



<!-- end of content -->