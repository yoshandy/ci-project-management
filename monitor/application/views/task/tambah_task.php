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
                                    <h4 class="card-title">Tambah Task</h4>
                                    <form action="<?php echo site_url('task/tambah')?>" method="post"  enctype="multipart/form-data">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label">Judul</label>
                                            <input type="text" name="judul" class="form-control">
                                        <span class="material-input"></span></div>
                                        
                                        <div class="form-group">
                                        <label class="label-control">Deadline</label>
                                        <input type="date" class="form-control" name="deadline" min="<?php echo  date("Y-m-d") ?>" max="<?php echo $projek->deadline_projek ?>"/>
                                       
                                        </div>
                                        <div class="form-group">
                                        
                                      

                                        <div class="form-group">
                                        <label class="label-control">Deskripsi</label>
                                        <textarea class="form-control ckeditor" name="deskripsi"  ></textarea>
                                       
                                        </div>
                                        

                                       
                                        <input type="hidden" value="<?php echo $projek->id_projek ?>" name="id_projek" required="true">
                                        
                                        
                                        <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
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
</html>
<?php }else{redirect("welcome/login");} ?>