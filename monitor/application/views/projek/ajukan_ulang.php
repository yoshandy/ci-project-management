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
                                    <h4 class="card-title">Pengajuan Ulang Projek</h4>
                                    <form action="<?php echo site_url('projek/ajukan_ulang_')?>" method="post"  enctype="multipart/form-data">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nama Projek</label>
                                            <input type="text" name="judul_projek" class="form-control" value="<?php echo $projek->judul ?>">
                                        <span class="material-input"></span></div>
                                        
                                        <div class="form-group">
                                        <label class="label-control">Deadline</label>
                                        <input type="date" class="form-control" name="deadline_projek" value="<?php echo $projek->deadline_projek?>"/>
                                       
                                        </div>

                                        <div class="form-group">
                                            <legend>Bahasa Pemograman</legend>
                                            <input type="text" name="bhs_pemograman"  class="tagsinput" data-role="tagsinput" data-color="rose"  value="<?php echo $projek->bhs_pemograman ?>" />
                                            <!-- You can change data-color="rose" with one of our colors primary | warning | info | danger | success -->
                                        </div>

                                        <div class="form-group">
                                        <legend >PIC</legend>

                                        <div class="btn-group">
                                        <button type="button" class="btn btn-round btn-success btn-sm" id="add">
                                        <i class="material-icons">add</i>
                                        <div class="ripple-container"></div></button>
                                       
                                        <button type="button" class="btn btn-round btn-danger btn-sm btn_remove" id="'+i+'">
                                        <i class="material-icons">close</i>
                                        <div class="ripple-container"></div></button>
                                        </div>

                                        

                                        <table class="table table-bordered" id="dynamic_field">  
                                        <th>Nama</th>
                                        
                                        <?php
                                        $q_jml = sizeof($pic);
                                         $i = $q_jml; $x = $q_jml; ?>
                                        <?php foreach($pic as $key=>$value){?>
                                            <tr id="row<?php echo $key+1 ?>" class="dynamic-added">
                                                <td> <select name="nama<?php echo $key+1 ?>" class="form-control" required>
                                                <option value="<?php echo $value->id_user;?>"><?php echo $value->nama;?></option> 
                                                     <?php foreach($user as $key=>$value){?>
                                                        <option value="<?php echo $value->id_user;?>"><?php echo $value->complete_name;?></option> 
                                                        <?php } ?> 
                                                    </select>
                                            </td>
                                        </tr>
                                        <?php } ?>

                                        <input type="hidden" id="jml_pic" name="jml_pic" value="<?php echo  $i ?>">
                                    </table>

                                        </div>
                                        <div class="form-group">
                                        <legend>Dokumen</legend>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="dokumen" required >
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                        </div>

                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->complete_name ?>" name="input_by" required="true">
                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="input_by_id" required="true">
                                        <input type="hidden" value="<?php echo $this->session->userdata('user')->id_user ?>" name="id_owner" required="true">
                                        <input type="hidden" value="<?php echo $projek->id_projek ?>" name="id_projek" required="true">
                                        
                                        <button type="submit" class="btn btn-fill btn-rose">Submit<div class="ripple-container"></div></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>
<script type="text/javascript">
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
        $(document).ready(function(){      
            var i= <?php echo $i ?>;  
            $('#add').click(function(){  
                if(i != 5){
                    i++;
                    document.getElementById('jml_pic').value = i;
                $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td> <select name="nama'+i+'" class="form-control" required><option value="">Pilih PIC</option> <?php foreach($user as $key=>$value){?> <option value="<?php echo $value->id_user;?>"><?php echo $value->complete_name;?></option> <?php } ?> </select></td></tr>');
                }
            });


            $(document).on('click', '.btn_remove', function(){  
                if(i != 0){
                    document.getElementById('jml_pic').value = i;
                    $('#row'+i+'').remove();
                i--;
                
               
                }
            });  
        });  

    </script>
</html>
<?php }else{redirect("welcome/login");} ?>