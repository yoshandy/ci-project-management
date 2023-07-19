<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Kategori</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Kategori</span></li>
                            </ul>
                        </div>
                    </div>
                    <?php $this->load->view('layout/user');?>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <div class="col-12 d-flex no-block align-items-center">
                                <h4 class="header-title">Kategori</h4>
                                <div class="ml-auto text-right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="">
                                            
                                            <a href="<?php echo site_url('Kategori/tambah_Kategori')?>">
                                            <button type="button" class="btn btn-info btn-md" >Tambah</button>
                                            </a>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                            <br>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($kategori as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_kategori;?></td>
                                                
                                                <td>
                                                    <a href="<?php echo site_url('kategori/edit_kategori/'.$value->id)?>">
                                                    <button type="button" class="btn btn-info btn-md" >Edit</button>
                                                    </a>
                                                    <a href="<?php echo site_url('bahan/hapus_bahan/'.$value->id)?>">
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
                    <!-- Dark table end -->
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