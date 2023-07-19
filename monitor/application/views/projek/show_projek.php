<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">
                <div class="header text-center">
                        <h3 class="title"><?php echo $projek->judul ?></h3>
                        
                    </div>
                <div class="row">
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Info</h4>
                                    <form action="" method="post"  enctype="multipart/form-data">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Input By</label>
                                            <input type="text" name="judul_projek" value="<?php echo $projek->input_by ?>" disabled class="form-control">
                                        <span class="material-input"></span></div>
                                        <div class="form-group">
                                        <?php if($projek->status == 0){?>
                                                        
                                            <?php }elseif($projek->status == 3) {?> 
                                                <p class="btn btn-success">Done</p>           
                                            <?php }elseif($projek->status == 1) {?>
                                                           Not Started | 
                                                           <?php if($this->session->userdata('user')->role == 'admin' || $this->session->userdata('user')->role == 'Programmer'){ ?>
                                                           <a href="<?php echo site_url('projek/mulai/'.$projek->id_projek)?>"class="btn btn-success btn-round btn-sm">
                                            <i class="material-icons">start</i> Start
                                            <div class="ripple-container"></div></a>
                                                            <?php } ?>
                                                        <?php }else{?>
                                                            
                                                            <div class="progress progress-line-primary">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:  <?php echo $projek->progres_projek;?>%;">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                   <div class="text-right"><?php echo $projek->progres_projek;?>%</div>
                                                   <?php if(($this->session->userdata('user')->role != 'admin' || $this->session->userdata('user')->role == 'PinBag' || $this->session->userdata('user')->role == 'PinDiv') && $projek->progres_projek == 100){ ?>
                                                    <a href="<?php echo site_url('projek/done/'.$projek->id_projek)?>"class="btn btn-success btn-round btn-sm">
                                            <i class="material-icons">done</i> Done
                                            <div class="ripple-container"></div></a>
                                                        <?php }} ?>
                                            </div>
                                        <br>
                                        <div class="form-group">
                                        <label class="label-control">Deadline</label>
                                        <input type="text" class="form-control" name="deadline_projek" value="<?php echo date('d/m/Y',strtotime($projek->deadline_projek))?>" disabled/>
                                       
                                        </div>

                                        <div class="form-group">
                                            <legend>Bahasa Pemograman</legend>
                                            <input type="text" name="bhs_pemograman"  class="tagsinput" data-role="tagsinput" data-color="rose"  value="<?php echo $projek->bhs_pemograman ?>" disabled/>
                                            <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                        </div>

                                        
                                        <div class="form-group">
                                        <legend>Dokumen</legend>
                                        <div class="ml-auto text-right">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="">
                                                    <?php if(($this->session->userdata('user')->role == 'admin' || $this->session->userdata('user')->role == 'Operator' || $this->session->userdata('user')->role == 'Programmer') && $projek->status != 3){ ?>
                                                    <a href="<?php echo site_url('dokumen/tambah_/'.$projek->id_projek)?>"class="btn btn-success btn-round btn-sm">
                                                    <i class="material-icons">add</i> Tambah
                                                    <div class="ripple-container"></div></a>
                                                        <?php } ?>
                                                    </ol>
                                                </nav>
                                                </div>
                                        </div>
                                        <div class="card-content">
                                        <table id="datatables2" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                               
                                                                <th>Dokumen</th>
                                                                
                                                                <th class="disabled-sorting text-right">Actions</th>
                                                            
                                                                
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            
                                                        
                                                            <?php foreach($dokumen as $key=>$value){
                                                                if($value->status == 1){?>
                                                        <tr>
                                                            
                                                            <td><?php echo $value->dokumen;?></td>
                                                            
                                                            
                                                            <td class="text-right">
                                                                
                                                                <a href="<?php echo site_url('projek/unduh/'.$value->id_dokumen)?>" class="btn btn-simple btn-warning btn-icon" target="_blank"><i class="material-icons">download</i></a>
                                                                <?php if($projek->status != 3){ ?>
                                                                <a href="<?php echo site_url('dokumen/hapus/'.$value->id_dokumen)?>" class="btn btn-simple btn-danger btn-icon"><i class="material-icons">delete</i></a>
                                                               <?php } ?>
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <?php }} ?>
                                                        </tbody>
                                                    </table>
                                        </div>

                                        
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">sticky_note_2</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Note
                                    <?php if($this->session->userdata('user')->role == 'Programmer' || $this->session->userdata('user')->role == 'admin' ){?>
                                        <a class="btn btn-simple btn-info btn-icon"  data-toggle="modal" data-target="#myModal"><i class="material-icons">edit_note</i>edit</a>
                                    <?php } ?>
                                    </h4>
                                    

                                    <?php echo $projek->note ?>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">PIC</h4>
                                        <section class="users">
                                            <header>
                                                <div class="content">
                                                
                                                <img src="<?php echo base_url()?>assets/profil/<?php echo $this->session->userdata('user')->img ?>" alt=""/>
                                                <div class="details">
                                                    <span><?php echo $this->session->userdata('user')->complete_name ?></span>
                                                    <p><?php echo $this->session->userdata('user')->role ?></p>
                                                </div>

                                                <div class="ml-auto text-right">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="">
                                                <a href="<?php echo site_url('chat/chat_to_group/'.$projek->id_projek)?>"class="btn btn-success btn-round btn-sm ">
                                            <i class="material-icons">forum</i> Group Chat
                                            <div class="ripple-container"></div></a>
                                                                </ol>
                                                                </nav>
                                                </div>


                                                </div>
                                               
                                            </header>
                                            <div class="material-datatables">
                                                <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            
                                                            <th>Nama</th>
                                                            <th>Role</th>
                                                            <th class="text-right">Aksi</th>
                                                          
                                                        
                                                            
                                                        </tr>
                                                    </thead>
                                                    
                                                    <tbody>
                                                    <?php if($owner->id_user != $this->session->userdata('user')->id_user){ ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $owner->complete_name;?></td>
                                                        <td><?php echo $owner->role;?></td>
                                                        <td class="text-right">
                                                        <?php  if($owner->unread !=0){echo $owner->unread;} ?>
                                                            <a href="<?php echo site_url('chat/chat_to/'.$owner->id_user.'/'.$projek->id_projek)?>" class="btn btn-simple btn-info btn-icon">
                                                            <i class="material-icons">chat</i></a>
                                                        </td>
                                                        
                                                        
                                                        
                                                    </tr>
                                                    <?php }?>
                                                    <?php foreach($pin as $key=>$value){
                                                            if($value->id_user != $this->session->userdata('user')->id_user){ ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $value->complete_name;?></td>
                                                        <td><?php echo $value->role;?></td>
                                                        <td class="text-right">
                                                            <?php  if($value->unread !=0){echo $value->unread;} ?>
                                                            <a href="<?php echo site_url('chat/chat_to/'.$value->id_user.'/'.$projek->id_projek)?>" class="btn btn-simple btn-info btn-icon">
                                                            <i class="material-icons">chat</i></a>
                                                        </td>
                                                        
                                                        
                                                        
                                                    </tr>
                                                    <?php }} ?>
                                                        
                                                    
                                                        <?php foreach($pic as $key=>$value){
                                                            if($value->id_user != $this->session->userdata('user')->id_user){ ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $value->nama;?></td>
                                                        <td><?php echo $value->roles;?></td>
                                                        <td class="text-right">
                                                        <?php  if($value->unread !=0){echo $value->unread;} ?>
                                                            <a href="<?php echo site_url('chat/chat_to/'.$value->id_user.'/'.$projek->id_projek)?>" class="btn btn-simple btn-info btn-icon">
                                                            <i class="material-icons">chat</i></a>
                                                        </td>
                                                        
                                                        
                                                        
                                                    </tr>
                                                    <?php }} ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h3 class="title text-center">Tasks</h3>
                            <br>
                            <div class="nav-center">
                                
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="description-1">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">All Task</h4>
                                            <div class="ml-auto text-right">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="">
                                                    <?php if(($this->session->userdata('user')->role == 'admin' || $this->session->userdata('user')->role != 'Programmer') && $projek->status != 3){ ?>
                                                    <a href="<?php echo site_url('task/tambah_/'.$projek->id_projek)?>"class="btn btn-success btn-round btn-sm">
                                                    <i class="material-icons">add</i> Tambah
                                                    <div class="ripple-container"></div></a>
                                                        <?php } ?>
                                                    </ol>
                                                </nav>
                                                </div>
                                        </div>
                                        <div class="card-content">
                                        <table id="datatables3" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Judul</th>
                                                                <th>Status</th>
                                                                <th>Deadline</th>
                                                                <th class="disabled-sorting text-right">Actions</th>
                                                            
                                                                
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            
                                                        
                                                            <?php foreach($task as $key=>$value){?>
                                                        <tr>
                                                            <td><?php echo $key+1;?></td>
                                                            <td><?php echo $value->judul;?></td>
                                                            <td>
                                                                <?php if($value->status == 0){?>
                                                                    <p class="btn">Progres</p>
                                                                <?php }elseif($value->status == 1) {?>
                                                                    <p class="btn btn-info">Turn in</p>
                                                                <?php }elseif($value->status == 3) {?>
                                                                    <p class="btn btn-warning">Revisi</p>
                                                                <?php }else{?>
                                                                    <p class="btn btn-success">done</p>
                                                                
                                                                </div>
                                                                <?php } ?>
                                                            </td>
                                                            <td><?php echo $value->deadline ?></td>
                                                            <td class="text-right">
                                                                <?php if($projek->status != 3){
                                                                 if($value->status == 0 || $value->status == 3){ 
                                                                    if($this->session->userdata('user')->role == 'Programmer' || $this->session->userdata('user')->role == 'admin' ){?>
                                                            <a href="<?php echo site_url('task/turn_in/'.$value->id)?>" class="btn btn-simple btn-info btn-icon"><i class="material-icons">upload</i></a>
                                                            <?php   }
                                                                    }elseif($value->status == 1){
                                                                        if($this->session->userdata('user')->role != 'Programmer' ){ ?>
                                                                <a href="<?php echo site_url('task/periksa/'.$value->id)?>" class="btn btn-simple btn-warning btn-icon"><i class="material-icons">plagiarism</i></a>
                                                                <?php }}} ?> 
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                            </button>
                            <h4 class="modal-title">Edit Note</h4>
                        </div>
                        <div class="modal-body">
                        <form action="<?php echo site_url('projek/note')?>" method="post"  enctype="multipart/form-data">
                            <textarea class="form-control ckeditor" name="note" ><?php echo $projek->note ?></textarea>
                        </div>
                            <input type="hidden" name="id_projek" value="<?php echo $projek->id_projek ?>">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-simple btn-success">Submit</button>
                            </form>
                            <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



<?php $this->load->view('layout/footer');?>
<script src="<?php echo base_url('ckeditor/ckeditor.js') ?>">

</script>
</html>
<?php }else{redirect("welcome/login");} ?>