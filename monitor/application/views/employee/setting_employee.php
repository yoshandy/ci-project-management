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
                                    <i class="material-icons">person</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Edit Data</h4>
                                    <form action="<?php echo site_url('user/ganti_info')?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $this->session->userdata('user')->id_employee ?>" name="id" required="true">
                                    <input type="hidden" value="<?php echo $this->session->userdata('user')->complete_name ?>" name="edit_by" required="true">
                                        <div class="form-group label-floating">
                                            
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $dep->nama_lengkap?>" required="true">
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" class="form-control"  value="<?php echo $dep->nama_panggilan?>" required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group">
                                        <label class="label-control">Tahun Masuk</label>
                                       
                                        <input type="number" min="1900" max="2099" step="1" class="form-control" name="tahun_masuk" value="<?php echo $dep->tahun_masuk?>" readonly required="true" />
                                        </div>

                                        <div class="form-group">
                                        <label class="label-control">Departement</label>
                                        <br>
                                        <select class="selectpicker col-lg-5 col-md-6 col-sm-3" required="true" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" name="id_departement">
                                        <option value="<?php echo $dep->id_departement;?>" selected><?php echo $dep->nama_departement;?></option>
                                                    </select>
                                        
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control"  value="<?php echo $dep->jabatan?>" readonly required="true" > 
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Grade</label>
                                            <input type="text" name="grade" class="form-control"  value="<?php echo $dep->grade?>" readonly required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group">
                                            <legend>Skill</legend>
                                            <input type="text" name="skill" value="<?php echo $dep->skill?>"  class="tagsinput" data-role="tagsinput" data-color="rose" Placeholder="Input & Enter" />
                                            <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email"  name="email" class="form-control" value="<?php echo $dep->email?>" required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Nomor Handphone</label>
                                            <input type="text" name="nomor_hp" class="form-control" value="<?php echo $dep->nomor_hp?>" required="true"> 
                                        <span class="material-input"></span></div>


                                   
                                        
                                        
                                        <button type="submit" class="btn btn-fill btn-rose" id="btn_s" >Submit<div class="ripple-container"></div></button>
                                        </form>
                                </div>
                            </div>
             </div>
             <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">contacts</i>
                                </div>
                                <div class="card-content form-horizontal">
                                    <h4 class="card-title">Profile Picture</h4>
                                   
                                    <form action="<?php echo site_url('user/ganti_img')?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="id_user" required="true">            
                                        
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                          
                                                
                                                    
                                                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail img-circle">
                                                        <img src="<?php echo base_url()?>assets/profil/<?php echo $this->session->userdata('user')->img ?>" alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                                        <div>
                                                        <span class="btn btn-round btn-info btn-file">
                                                            <span class="fileinput-new">Add Photo</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="foto"  accept="image/png, image/jpg, image/jpeg"/>
                                                        </span>
                                                        <br />
                                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                                        </div>
                                                    </div>
                                                    
                                            <br>
                                            <button type="submit" class="btn btn-round btn-rose"  >Submit<div class="ripple-container" ></div></button>
                                            </form> 
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">contacts</i>
                                </div>
                                <div class="card-content form-horizontal">
                                    <h4 class="card-title">Password</h4>
                                   
                                    <form action="<?php echo site_url('user/ganti_pass')?>" method="post" enctype="multipart/form-data">

                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="id_user" required="true">            
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Old Password</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="password" class="form-control" name="old_pass" id="old_pass">
                                                    <label id="msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">New Password</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="password" class="form-control" name="password1" id="pass">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Re-Type Password</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="password" class="form-control" name="re_pass" id="re_pass">
                                                    <label id="msg1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                
                                            <button type="submit" class="btn btn-fill btn-rose" id="btn_u" disabled>Submit<div class="ripple-container" ></div></button>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="form-group form-button">
                                                    
                                                </div>
                                            </div>
                                        </div>
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