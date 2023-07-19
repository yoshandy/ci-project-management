<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Produk</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Produk</span></li>
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
                                <h4 class="header-title">Produk</h4>
                                <div class="ml-auto text-right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="">
                                            
                                            
                                            <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#exampleModalLong">Tambah</button>
                                            
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
                                                <th>Nama Produk</th>
                                                <th>Deskripsi</th>
                                                
                                                <th>Harga</th>
                                                <th>Gambar</th>
                                                <th>Kategori</th>
                                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($produk as $key=>$value){?>
                                            <tr>
                                                <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_produk;?></td>
                                                <td><?php echo $value->deskripsi;?></td>
                                                <td><?php echo $value->harga;?></td>
                                                <td><img width="100px" class="img-responsive" src="<?php echo base_url()?>/assets/images/<?php echo $value->gambar;?>"/></td>
                                                <td><?php echo $value->kategori;?></td>
                                                <td>
                                                    <a href="<?php echo site_url('supplier/edit_supplier/'.$value->id_produk)?>">
                                                    <button type="button" class="btn btn-info btn-md" >Edit</button>
                                                    </a>
                                                    <a href="<?php echo site_url('supplier/hapus_supplier/'.$value->id_produk)?>">
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
    
    <div class="modal fade" id="exampleModalLong">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Produk</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                            <form action="<?php echo site_url('produk/tambah_produk')?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Masukkan Jumlah Jenis Bahan max 10</label>
                                                <input type="number" class="form-control" min="0" max="10" name="jumlah" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Next</button>
                                        </fom>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php $this->load->view('layout/footer');?>
<?php }else{redirect("welcome/login");} ?>