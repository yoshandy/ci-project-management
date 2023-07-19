<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">

                <div class="row">
                    <a href="<?php echo site_url('projek/show_all/0')?>">
                        <div class="col-md-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="rose">
                                    <i class="material-icons">post_add</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Peojek Baru</p>
                                    <h3 class="card-title"><?php echo $baru->jml?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('projek/show_all_progres')?>">
                        <div class="col-md-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">pending_actions</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Projek On Going</p>
                                    <h3 class="card-title"><?php echo $jalan->jml?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo site_url('projek/show_all/3')?>">
                        <div class="col-md-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                <i class="material-icons">task</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Projek Done</p>
                                    <h3 class="card-title"><?php echo $done->jml?></h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>
</html>
<?php }else{redirect("welcome/login");} ?>