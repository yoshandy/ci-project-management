<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Check Turn in</h4>
                                    <form action="<?php echo site_url('task/periksa_')?>" method="post"  enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label">Judul</label>
                                            <h5><?php echo $task->judul ?></h5>
                                           
                                        </div>
                                        
                                        <div class="form-group">
                                        <label class="label-control">Deadline</label>
                                        <input type="date" class="form-control" name="deadline" value="<?php echo $task->deadline ?>" readonly/>
                                       
                                        </div>
                                        <div class="form-group">
                                        <label class="label-control">PIC</label>
                                        <input type="text" class="form-control" name="deadline" value="<?php echo $task->pic ?>" readonly/>
                                       
                                        </div>

                                        <div class="form-group">
                                        <label class="label-control">Deskripsi</label>
                                        <br>
                                        <p>
                                        <?php echo $task->deskripsi ?>
                                        </p>
                                       
                                        </div>

                                        <div class="form-group">
                                        <legend>Turn In</legend>
                                        <?php  if(!is_null( $task->dokumen))
                                            { ?>
                                        <a href="<?php echo site_url('projek/unduh/'.$task->dokumen)?>"class="btn btn-tumblr btn-round btn-sm" target="_blank">
                                        <i class="material-icons">book</i> Lihat File
                                        <div class="ripple-container"></div></a>
                                        <?php }else{ ?>
                                            No File
                                            <?php } ?>
                                        </div>
                                        

                                       
                                        <input type="hidden" value="<?php echo $task->id_projek ?>" name="id_projek" required="true">
                                        <input type="hidden" value="<?php echo $task->dokumen ?>" name="id_d" required="true">
                                        <input type="hidden" value="<?php echo $task->id ?>" name="id" required="true">
                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="pic" required="true">
                                        
                                        
                                        <button type="submit" class="btn btn-fill btn-success">OK<div class="ripple-container"></div></button>
                                        <a href="<?php echo site_url('task/revisi_/'.$task->id)?>" class="btn btn-fill btn-danger">Revisi</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>

                </div>
            </div>
        



           
<?php $this->load->view('layout/footer');?>
<script src="<?php echo base_url('ckeditor/ckeditor.js') ?>">

</script>
<script type="text/javascript">
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
          

    </script>
</html>
<?php }else{redirect("welcome/login");} ?>