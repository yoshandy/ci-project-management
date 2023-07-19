<?php $this->load->view('layout/head');?>
<link href="<?php echo base_url()?><?php echo base_url()?>assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?><?php echo base_url()?>assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?><?php echo base_url()?>assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />

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
                                <div class="col-12">
                                    <div class="card-box table-responsive">
                                        <h4 class="header-title">Default Example</h4>
                                        <p class="sub-header">
                                            DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>.
                                        </p>

                                        <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Supplier</th>
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
                                                <td><?php echo $value->nama_supplier;?></td>
                                                <td><?php echo $value->no_hp;?></td>
                                                <td><?php echo $value->alamat;?></td>
                                                <td><?php echo $value->username;?></td>
                                                <td>
                                                    <a href="<?php echo site_url('supplier/edit_supplier/'.$value->id_supplier)?>">
                                                    <button type="button" class="btn btn-info btn-md" >Edit</button>
                                                    </a>
                                                    <a href="<?php echo site_url('supplier/hapus_supplier/'.$value->id_supplier)?>">
                                                    <button type="button" class="btn btn-danger btn-md" >Hapus</button>
                                                    </a>
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
<script src="<?php echo base_url()?><?php echo base_url()?>assets/js/vendor.min.js"></script>

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