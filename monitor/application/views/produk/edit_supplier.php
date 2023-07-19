<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Supplier</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Supplier</a></li>
                                <li><span>Tambah Supplier</span></li>
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
                                        <h4 class="header-title">Edit Supplier</h4>
                                        <form action="<?php echo site_url('supplier/edit')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $supplier->id_supplier ?>">
                                                <label for="exampleInputEmail1">Nama Supplier</label>
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $supplier->nama_supplier ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No Telepon</label>
                                                <input type="text" class="form-control" name="no_hp" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $supplier->no_hp ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea  class="form-control"  name="alamat" rows="4" cols="50">
                                                    <?php echo $supplier->alamat ?>
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