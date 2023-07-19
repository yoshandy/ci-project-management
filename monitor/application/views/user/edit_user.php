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
                                   <i class="material-icons">contacts</i>
                               </div>
                               <div class="card-content form-horizontal">
                                   <h4 class="card-title">Edit User</h4>
                                   <form action="<?php echo site_url('user/edit')?>" method="post" enctype="multipart/form-data">
                                   <input type="hidden" name="id_user"  value="<?php echo $dep->id_user?>">
                                       <div class="row">
                                           <label class="col-md-3 label-on-left">Role</label>
                                           <div class="col-md-9">
                                               <div class="form-group label-floating is-empty">
                                                   <label class="control-label"></label>
                                                   <select class="form-control" name="role_role"  required="true"   >
                                                        <option value="<?php echo $dep->role?>"><?php echo $dep->role?></option>
                                                      
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
                                                   <input type="text" class="form-control" name="username" id="username" value="<?php echo $dep->username?>">
                                                   <label id="msg"></label>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <label class="col-md-3 label-on-left">Password</label>
                                           <div class="col-md-9">
                                               <div class="form-group label-floating is-empty">
                                                   <label class="control-label"></label>
                                                   <input type="password" class="form-control" name="password" value="<?php echo $dep->password?>">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="row">
                                           <label class="col-md-3"></label>
                                           <div class="col-md-9">
                                               
                                              
                                               
                                           </div>
                                       </div>
                                       <div class="row">
                                           <label class="col-md-3"></label>
                                           <div class="col-md-9">
                                               <div class="form-group form-button">
                                                   
                                               </div>
                                           </div>
                                       </div>

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