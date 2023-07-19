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
                                <li><a href="index.html">Home</a></li>
                                <li><span>Bahan</span></li>
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
                                <h4 class="header-title">Bahan</h4>
                                <div class="ml-auto text-right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="">
                                            
                                            <a href="<?php echo site_url('bahan/tambah_bahan')?>">
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
                                                <th>Nama Bahan</th>
                                                <th>Jumlah</th>
                                                <th>Satuan</th>
                                                <th>Supplier</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($bahan as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_bahan;?></td>
                                                <td><?php echo $value->jumlah;?></td>
                                                <td><?php echo $value->satuan;?></td>
                                                <td><?php echo $value->nama_supplier;?></td>
                                                <td>
                                                    <a href="<?php echo site_url('bahan/edit_bahan/'.$value->id_bahan)?>">
                                                    <button type="button" class="btn btn-info btn-md" >Edit</button>
                                                    </a>
                                                    <a href="<?php echo site_url('bahan/Pesan_bahan/'.$value->id_bahan)?>">
                                                    <button type="button" class="btn btn-danger btn-md" >Pesan</button>
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