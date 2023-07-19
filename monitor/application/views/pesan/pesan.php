<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Pesan</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Pesan</span></li>
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
                                <h4 class="header-title">Pesan</h4>
                                <div class="ml-auto text-right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="">
                                            
                                            
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
                                                <th>Jumlah Pesan</th>
                                                <th>Jumlah Terima</th>
                                                
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($pesan as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_bahan;?></td>
                                                <td><?php echo $value->jumlah_pesan;?></td>
                                                <td><?php echo $value->jumlah_kirim;?></td>
                                                
                                                <td>
                                                    <?php if($value->jumlah_kirim == 0){ ?>
                                                    <a href="<?php echo site_url('pesan/hapus_pesan/'.$value->id_pesan)?>">
                                                    <button type="button" class="btn btn-danger btn-md" >Hapus</button>
                                                    </a>
                                                    <?php }else{ ?>
                                                        <a href="<?php echo site_url('pesan/terima/'.$value->id_pesan)?>">
                                                    <button type="button" class="btn btn-info btn-md" >Terima</button>
                                                    </a>
                                                        <?php } ?>
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