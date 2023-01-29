<style>
    input[type=file]::file-selector-button {
display: none;
}
.gen {
width: 345px;
}



</style>

<div class="modal fade" id="backup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- modal header -->
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light" id="exampleModalLabel">Generate Backup</h5>
                <button class="close text-light" type="button" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-window-close" aria-hidden="true"></i>
                </button>
            </div>
            <form method="post" action="../../database/genbackup.db.php" enctype="multipart/form-data" id="loginForm">
                <!-- modal body -->
                <div class="modal-body ">

                <div class="sidebar-heading">Export</div>
                    <div class="form-group d-flex">
                    <input class="form-control gen m-1" name="filename" placeholder="Input filename">
                        <button class="btn btn-sm btn-outline-primary m-1"  type="submit" name="backup">Export</button>
                    </div>

                    <hr class="bg-primary sidebar-divider my-0">
                    <br>
                    <div class="sidebar-heading">Import</div>
                    <div class="form-group d-flex">
                         <input class="form-control gen m-1" id="import" placeholder="No" type="file" name="sqlfile">
                        <button class="btn btn-sm btn-outline-primary m-1"  type="submit" name="import">Import</button>
                    </div>
                    
                

                    <!-- end student id -->
                    <!-- end of course selection -->
                </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-outline-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-sm btn-outline-primary" type="submit" name="ok">Done</button>
            </div>

                <!-- end of modal footer -->
            </form>
        </div>
    </div>
</div>






                
               
            
            
    



