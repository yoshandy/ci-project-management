<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Tambah Dokumen</h4>
                                    <form action="<?php echo site_url('dokumen/tambah')?>" method="post"  enctype="multipart/form-data">
                                       
                                        <div class="form-group">
                                        <legend>Dokumen</legend>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="dokumen" required >
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        </div>

                                       
                                        <input type="hidden" value="<?php echo $dok ?>" name="id_projek" required="true">
                                        
                                        
                                        <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>
<script type="text/javascript">
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
          

    </script>
</html>
<?php }else{redirect("welcome/login");} ?>