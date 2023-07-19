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
                                   <i class="material-icons">person</i>
                               </div>
                               <div class="card-content">
                                   <h4 class="card-title">Edit Employee</h4>
                                   <form action="<?php echo site_url('employee/edit')?>" method="post" enctype="multipart/form-data">

                                   <input type="hidden" value="<?php echo $this->session->userdata('user')->complete_name ?>" name="input_by" required="true">
                                   <input type="hidden" value="<?php echo $dep->id?>" name="id" required="true">
                                   <div class="col-md-6">    
                                   <div class="form-group label-floating">
                                           
                                           <label class="control-label">Nama Lengkap</label>
                                           <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $dep->nama_lengkap?>"  required="true">
                                       <span class="material-input"></span></div>

                                       <div class="form-group label-floating">
                                           <label class="control-label">Nama Panggilan</label>
                                           <input type="text" name="nama_panggilan" class="form-control" value="<?php echo $dep->nama_panggilan?>"  required="true"> 
                                       <span class="material-input"></span></div>

                                       <div class="form-group">
                                       <label class="label-control">Tahun Masuk</label>
                                      
                                       <input type="number" min="1900" max="2099" step="1" class="form-control" name="tahun_masuk" value="<?php echo $dep->tahun_masuk?>"  required="true" />
                                       </div>

                                       <div class="form-group">
                                       <label class="label-control">Departement</label>
                                       <br>
                                       <select class="selectpicker col-lg-5 col-md-6 col-sm-3" required="true" data-style="btn btn-primary btn-round" title="Single Select" data-size="20" name="id_departement">
                                                      
                                                      
                                                       <option value="<?php echo $dep->id_departement;?>" selected><?php echo $dep->nama_departement;?></option>
                                                       <?php foreach($departement as $key=>$value){?>
                                                        <option value="<?php echo $value->id_departement;?>"><?php echo $value->nama_departement;?></option>
                                                        
                                                        <?php } ?>
                                                       
                                                   </select>
                                       
                                       </div>
                                       </div>
                                       <div class="col-md-6">
                                       <div class="form-group label-floating">
                                           <label class="control-label">Jabatan</label>
                                           <input type="text" name="jabatan" class="form-control" value="<?php echo $dep->jabatan?>"  required="true" > 
                                       <span class="material-input"></span></div>

                                       <div class="form-group label-floating">
                                           <label class="control-label">Grade</label>
                                           <input type="text" name="grade" class="form-control" value="<?php echo $dep->grade?>"  required="true"> 
                                       <span class="material-input"></span></div>

                                       <div class="form-group">
                                           <legend>Skill</legend>
                                           <input type="text" name="skill" value="<?php echo $dep->skill?>"  class="tagsinput" data-role="tagsinput" data-color="rose" placeholder="Input Skill" />
                                           <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                       </div>

                                       <div class="form-group label-floating">
                                           <label class="control-label">Email</label>
                                           <input type="email" name="email" class="form-control" value="<?php echo $dep->email?>"  required="true"> 
                                       <span class="material-input"></span></div>

                                       <div class="form-group label-floating">
                                           <label class="control-label">Nomor Handphone</label>
                                           <input type="text" name="nomor_hp" class="form-control" value="<?php echo $dep->nomor_hp?>"  required="true"> 
                                       <span class="material-input"></span></div>
                                       </div>
                                       <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                                  
                                       
                                       
                                      
                                   
                               </div>
                           </div>
            </div>

            
                       </div>
                       </div>

               </div>
           </div>
       



<?php $this->load->view('layout/footer');?>
</html>
<?php }else{redirect("welcome/login");} ?>