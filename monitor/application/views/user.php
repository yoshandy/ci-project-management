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
<script src="assets/js/vendor.min.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

</body>
</html>