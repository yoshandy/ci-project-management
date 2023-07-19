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
                                <li><a href="index.html">Produk</a></li>
                                <li><span>Tambah Produk</span></li>
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
                                        <h4 class="header-title">Tambah Produk</h4>
                                        
                                        <form action="<?php echo site_url('produk/tambah')?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Produk</label>
                                                <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Harga</label>
                                                <input type="number" class="form-control" name="harga" id="exampleInputEmail1" aria-describedby="emailHelp" >
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Deskripsi</label>
                                                    <textarea  class="form-control"  name="deskripsi" rows="4" cols="50">
                                                    
                                                    </textarea>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kategori</label>
                                                <select class="custom-select" name="id_kategori" >
                                                 <?php foreach($kategori as $key=>$value){?>
                                                <option value="<?php echo $value->id ?>"><?php echo $value->nama_kategori ?></option>
                                               
                                                <?php } ?>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Gambar</label>
                                                <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Password" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bahan</label>
                                                 <table class="table table-bordered" >  
                                                    <?php for($i = 0 ; $i<$jumlah_bahan;$i++){ ?>
                                                    <tr>  

                                                        <td> <select class="custom-select" name="id_bahan<?php echo $i ?>" >
                                                        <?php foreach($bahan as $key=>$value2){?>
                                                        <option value="<?php echo $value2->id_bahan ?>"><?php echo $value2->nama_bahan ?>-<?php echo $value2->satuan ?> </option>
                                                    
                                                        <?php } ?>
                                                        </select>
                                                        </td>  
                                                        <td> <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="jumlah_bahan<?php echo $i ?>" placeholder="Jumlah" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                
                                            </div></td>
                                                       

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