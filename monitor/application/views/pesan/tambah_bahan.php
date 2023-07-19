<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Bahan</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Bahan</a></li>
                                <li><span>Tambah Bahan</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php $this->load->view('layout/user');?>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    
                    <div class="col-lg-6 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Tambah Bahan</h4>
                                        <form action="<?php echo site_url('bahan/tambah')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Bahan</label>
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Satuan</label>
                                                <input type="text" class="form-control" name="satuan" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier</label>
                                                 <select class="custom-select" name="id_supplier" >
                                                 <?php foreach($supplier as $key=>$value){?>
                                                <option value="<?php echo $value->id_supplier ?>"><?php echo $value->nama_supplier ?></option>
                                               
                                                <?php } ?>
                                                </select>
                                                
                                            </div>
                                           
                                            
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    

<?php $this->load->view('layout/footer');?>
<?php }else{redirect("welcome/login");} ?>