<?php if($this->session->userdata('user')->nama_user != null){ ?>
<?php $this->load->view('layout/head');?>
<?php $this->load->view('layout/sidebar');?>
        


       
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Order</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Order</a></li>
                                <li><span>Detail Order</span></li>
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
                                        <h4 class="header-title">Detail Order</h4>
                                        
                                        <form action="<?php echo site_url('produk/tambah')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Pelanggan</label>
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $order->nama ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $order->nama ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email</label>
                                                <input type="text" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $order->telp ?>">
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Alamat</label>
                                                    <textarea  class="form-control"  name="deskripsi" rows="4" cols="50">
                                                    <?php echo $order->alamat ?>
                                                    </textarea>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Produk</label>
                                                 <table class="table table-bordered" >  
                                                     <tr>
                                                     <th>No</th>
                                                <th>Produk</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                     </tr>
                                                 <?php foreach($detail as $key=>$value){?>
                                                    <tr>  

                                                        
                                                    <td><?php echo $key+1;?></td>
                                                <td><?php echo $value->nama_produk;?></td>
                                                <td><?php echo $value->qty;?></td>
                                                <td><?php echo $value->harga;?></td>
                                                       

                                                    </tr>
                                                <?php }?>
                                                 </table>
                                                        </div>
                                                        <input type="hidden" name="jumlah_jenis" value="<?php $jumlah_bahan ?>">
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