<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/left-sidebar');?>
<?php $this->load->view('layout/topbar');?>


<div class="container-fluid py-4">
<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">DataTables.net</h4>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                  </div>
                  <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                      <tr>
                                                <th>No</th>
                                                <th>Nama User</th>
                                                <th>Role</th>
                                                <th>Handphone</th>
                                                <th>Alamat</th>
                                                <th>Username</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($supplier as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_user;?></td>
                                                <td><?php echo $value->role;?></td>
                                                <td><?php echo $value->no_telp;?></td>
                                                <td><?php echo $value->alamat;?></td>
                                                <td><?php echo $value->username;?></td>
                                                <td class="text-right">
                                                  <a href="#" class="btn btn-link btn-info btn-just-icon like"><i class="material-icons">favorite</i></a>
                                                  <a href="#" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                  <a href="#" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
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
          <!-- end row -->      
</div>

                         
   
<?php $this->load->view('layout/footer');?>
<?php }else{redirect("welcome/login");} ?>