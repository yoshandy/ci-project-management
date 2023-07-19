<?php if($this->session->userdata('user')->complete_name != null){ ?>
 
  <?php $this->load->view('layout/head');?>
  <?php $this->load->view('layout/left-sidebar');?>

        <div class="main-panel">
          <?php $this->load->view('layout/topbar');?>

        
            <div class="content">
                <div class="container-fluid">

                <!-- Isi content disini coeg -->

                </div>
            </div>
        




<?php $this->load->view('layout/footer');?>
</html>
<?php }else{redirect("welcome/login");} ?>