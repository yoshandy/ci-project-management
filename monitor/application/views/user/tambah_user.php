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
                                   <i class="material-icons">contacts</i>
                               </div>
                               <div class="card-content">
                                   <h4 class="card-title">Tambah User</h4>
                                   <div class="toolbar">
                                   <div class="ml-auto text-right">
                                   
                               </div>
                                   </div>
                                   <div class="material-datatables">
                                       <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                           <thead>
                                               <tr>
                                                   <th>No</th>
                                                   <th>Nama</th>
                                                   <th>Jabatan</th>
                                                   <th>Tahun Masuk</th>
                                                   <th>email</th>
                                                  
                                                   <th class="disabled-sorting text-right">Actions</th>
                                               </tr>
                                           </thead>
                                           
                                           <tbody>
                                               
                                               <?php foreach($employee as $key=>$value){?>
                                           <tr>
                                               <td><?php echo $key+1;?></td>
                                               <td><?php echo $value->nama_lengkap;?></td>
                                               <td><?php echo $value->jabatan;?></td>
                                               <td><?php echo $value->tahun_masuk;?></td>
                                               <td><?php echo $value->email;?></td>
                                               <td class="text-right">
                                                       <a href="<?php echo site_url('user/tambah_user/'.$value->id)?>" class="btn btn-simple btn-info btn-icon"><i class="material-icons">person_add</i></a>
                                                      
                                                  </td>
                                               
                                               
                                           </tr>
                                           <?php } ?>
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