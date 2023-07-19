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
                                    <h4 class="card-title">Tambah Employee</h4>
                                    <form action="<?php echo site_url('employee/tambah')?>" method="post" enctype="multipart/form-data">

                                    <input type="hidden" value="<?php echo $this->session->userdata('user')->complete_name ?>" name="input_by" required="true">
                                        <div class="form-group label-floating is-empty">
                                            
                                            <label class="control-label">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required="true">
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Panggilan</label>
                                            <input type="text" name="nama_panggilan" class="form-control" required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group">
                                        <label class="label-control">Tahun Masuk</label>
                                       
                                        <input type="number" min="1900" max="2099" step="1" class="form-control" name="tahun_masuk" required="true" />
                                        </div>

                                        <div class="form-group">
                                        <label class="label-control">Departement</label>
                                        <br>
                                        <select class="selectpicker col-lg-5 col-md-6 col-sm-3" required="true" data-style="btn btn-primary btn-round" title="Single Select" data-size="7" name="id_departement">
                                                        <option disabled selected>Pilih Departement</option>
                                                        <?php foreach($departement as $key=>$value){?>
                                                        <option value="<?php echo $value->id_departement;?>"><?php echo $value->nama_departement;?></option>
                                                        
                                                        <?php } ?>
                                                    </select>
                                        
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Jabatan</label>
                                            <input type="text" name="jabatan" class="form-control" required="true" > 
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Grade</label>
                                            <input type="text" name="grade" class="form-control" required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group">
                                            <legend>Skill</legend>
                                            <input type="text" name="skill"  class="tagsinput" data-role="tagsinput" data-color="rose" Placeholder="Input & Enter" />
                                            <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                        </div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" class="form-control" required="true"> 
                                        <span class="material-input"></span></div>

                                        <div class="form-group label-floating">
                                            <label class="control-label">Nomor Handphone</label>
                                            <input type="text" name="nomor_hp" class="form-control" required="true"> 
                                        <span class="material-input"></span></div>


                                   
                                        
                                        
                                        <button type="submit" class="btn btn-fill btn-rose" id="btn_s" >Submit<div class="ripple-container"></div></button>
                                    
                                </div>
                            </div>
             </div>

             <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">contacts</i>
                                </div>
                                <div class="card-content form-horizontal">
                                    <h4 class="card-title">Tambah User</h4>
                                   
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Role</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <select class="form-control" name="role_role"  required="true"   >
                                                        <option disabled selected>Pilih Role</option>
                                                       
                                                        <option value="Programmer">Programmer</option>
                                                       <option value="PinBag">PinBag</option>
                                                       <option value="PinDiv">PinDiv</option>
                                                       <option value="Operator">Operator</option>
                                                        
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                        </div>                   
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Username</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="text" class="form-control" name="username" id="username">
                                                    <label id="msg"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Password</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3"></label>
                                            <div class="col-md-9">
                                                
                                                <p>Anda bisa kosongkan jika belum ingin membuat user login</p>
                                                
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