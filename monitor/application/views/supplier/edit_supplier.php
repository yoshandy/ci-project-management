
<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>


<body>

<!-- Begin page -->
<div id="wrapper">

<?php $this->load->view('layout/topbar');?>
<?php $this->load->view('layout/left-sidebar');?>

  

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            
            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Adminox</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Starter</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Starter page</h4>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                                <div class="col-6">
                                    <div class="card-box table-responsive">
                                        <h4 class="header-title">Kelola User</h4>
                                        <p class="sub-header">
                                        
                                        </p>

                                        <form action="<?php echo site_url('supplier/edit')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $supplier->id_user ?>">
                                                <label for="exampleInputEmail1">Nama </label>
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $supplier->nama_user ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No Telepon</label>
                                                <input type="text" class="form-control" name="no_hp" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $supplier->no_telp ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Role</label>
                                                <select id="inputState" class="form-control" name="role">
                                                                <option value="Programmer">Programmer</option>
                                                                <option value="Supervisor">Supervisor</option>
                                                                
                                                            </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea  class="form-control"  name="alamat" rows="4" cols="50"><?php echo $supplier->alamat ?>
                                                    </textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Username</label>
                                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $supplier->username ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" value="<?php echo $supplier->password ?>">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                
                                    </div>
                                </div>
                            </div>
                <!-- end page title --> 
                
            </div> <!-- end container-fluid -->

        </div> <!-- end content -->

        <?php $this->load->view('layout/footer');?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->
<?php $this->load->view('layout/right-sidebar');?>


<!-- Vendor js -->
<script src="<?php echo base_url()?>assets/js/vendor.min.js"></script>

<!-- App js --> <!-- Required datatable js -->
        <script src="<?php echo base_url()?>assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url()?>assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/jszip/jszip.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/pdfmake/vfs_fonts.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/buttons.print.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/buttons.colVis.js"></script>

        <!-- Responsive examples -->
        <script src="<?php echo base_url()?>assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url()?>assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatables init -->
        <script src="<?php echo base_url()?>assets/js/pages/datatables.init.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url()?>assets/js/app.min.js"></script>

</body>
</html>
<?php }else{redirect("welcome/login");} ?>