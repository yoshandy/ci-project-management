<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">integration_instructions</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $projek->judul ?></h4>
                                    <form action="<?php echo site_url('projek/setuju')?>" method="post"  enctype="multipart/form-data">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Input By</label>
                                            <input type="text" name="judul_projek" value="<?php echo $projek->input_by ?>" disabled class="form-control">
                                        <span class="material-input"></span></div>
                                        
                                        <div class="form-group">
                                        <label class="label-control">Deadline</label>
                                        <input type="text" class="form-control" name="deadline_projek" value="<?php echo date('d/m/Y',strtotime($projek->deadline_projek))?>" disabled/>
                                       
                                        </div>

                                        <div class="form-group">
                                            <legend>Bahasa Pemograman</legend>
                                            <input type="text" name="bhs_pemograman"  class="tagsinput" data-role="tagsinput" data-color="rose"  value="<?php echo $projek->bhs_pemograman ?>" disabled/>
                                            <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                        </div>

                                        <div class="form-group">
                                        <legend >PIC</legend>

                                        

                                        

                                        <table class="table table-bordered" id="dynamic_field">  
                                        <th>Nama</th>
                                        
                                        <?php foreach($pic as $key=>$value){?>
                                            <tr>
                                               
                                                <td><?php echo $value->nama;?></td>
                                            </tr>
                                        <?php } ?>

                                        
                                            
                                    </table>

                                        </div>
                                        <div class="form-group">
                                        <legend>Dokumen</legend>
                                        <div class="custom-file">
                                        <a href="<?php echo site_url('projek/baca/'.$projek->id_projek)?>"class="btn btn-tumblr btn-round btn-sm" target="_blank">
                                        <i class="material-icons">book</i> Baca Dokumen
                                        <div class="ripple-container"></div></a>
                                        </div>
                                        </div>

                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->complete_name ?>" name="input_by" required="true">
                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="id_owner" required="true">

                                        <input type="hidden" value="<?php echo $projek->id_projek ?>" name="id_projek" required="true">
                                        
                                        <button type="submit" class="btn btn-fill btn-success">Setuju<div class="ripple-container"></div></button>
                                        <a href="<?php echo site_url('projek/tolak/'.$projek->id_projek)?>" class="btn btn-fill btn-danger">Tolak</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>

</html>
<?php }else{redirect("welcome/login");} ?>