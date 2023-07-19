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
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Projek</h4>
                                    <div class="toolbar">
                                    <div class="ml-auto text-right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="">
                                        <?php if($this->session->userdata('user')->role == 'admin' || $this->session->userdata('user')->role == 'Operator'){ ?>
                                        <a href="<?php echo site_url('projek/tambah_')?>"class="btn btn-success btn-round btn-sm">
                                        <i class="material-icons">add</i> Tambah
                                        <div class="ripple-container"></div></a>
                                            <?php } ?>
                                        </ol>
                                    </nav>
                                    </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Projek</th>
                                                    <th>Status</th>
                                                    <th style="width:20%">Note</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                   
                                                    
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                
                                               
                                                <?php foreach($projek as $key=>$value){
                                                    if($value->status == 1 || $value->status == 2){?>

                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->judul;?></td>
                                                <td>
                                                    <?php if($value->status == 0){?>
                                                        <p class="btn">Di Ajukan</p>
                                                    <?php }elseif($value->status == 1) {?>
                                                        <p class="btn btn-info">Not Started</p>
                                                    <?php }elseif($value->status == 3) {?>
                                                        <p class="btn btn-success">Done</p>
                                                    <?php }elseif($value->status == 5) {?>
                                                        <p class="btn btn-danger">Tolak</p>
                                                    <?php }else{?>

                                                    <div class="progress progress-line-primary">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $value->progres_projek;?>%;">
                                                            <span class="sr-only"><?php echo $value->progres_projek;?>% Complete</span>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $value->note;?></td>
                                                <td class="text-right">
                                                    <?php if($value->status == 0){
                                                         if($this->session->userdata('user')->role == 'Operator' || $this->session->userdata('user')->role == 'admin'){ ?>
                                               
                                               <a href="<?php echo site_url('projek/hapus/'.$value->id_projek)?>" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">delete</i></a>
                                                    <?php }elseif($this->session->userdata('user')->role != 'Operator' )  {?>
                                                        <a href="<?php echo site_url('projek/ajukan_/'.$value->id_projek)?>" class="btn btn-simple btn-info btn-icon"><i class="material-icons">fact_check</i></a>
                                               
                                                <?php }
                                            }elseif($value->status == 5) {?>
                                                    <a href="<?php echo site_url('projek/ajukan_ulang/'.$value->id_projek)?>" class="btn btn-simple btn-info btn-icon"><i class="material-icons">restart_alt</i></a>
                                                <?php }else{ ?>
                                                       <a href="<?php echo site_url('projek/show_/'.$value->id_projek)?>" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">dvr</i></a>
                                                      <?php } ?> 
                                                   </td>
                                                
                                                
                                            </tr>
                                            <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>

                </div>
            </div>
        
           
<?php $this->load->view('layout/footer');?>
</html>
<?php }else{redirect("welcome/login");} ?>