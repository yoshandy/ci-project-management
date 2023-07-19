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
                                    <i class="material-icons">diversity_3</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Departement</h4>
                                    <form action="<?php echo site_url('departement/edit')?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Departement</label>
                                            <input type="text" name="nama" value="<?php echo $dep->nama_departement?>" class="form-control">
                                        <span class="material-input"></span></div>
                                        
                                        <input type="hidden" name="id" value="<?php echo $dep->id_departement?>" class="form-control">
                                        <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>
</html>
<?php }else{redirect("welcome/login");} ?>