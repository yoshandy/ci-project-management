<?php

class dokumen extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('projek_model');
        $this->load->model('employee_model');
        $this->load->model('dokumen_model');
    }
    

    public function index(){
       
      
        $this->load->view('chatAPP/chat');
    }

    public function tambah_($id){
        $data["dok"]=$id;
        $this->load->view('projek/tambah_dokumen',$data);
    }

    

    public function tambah(){
        $id = $this->input->post('id_projek');
        $this->dokumen_model->insert_($id);
        redirect("projek/show_/".$id);
    }

    public function hapus($id){
        $tmp_q = $this->projek_model->unduh($id);
        $id_p = $tmp_q->id_projek;
        $dokumen = $tmp_q->dokumen;
        $this->dokumen_model->delete_($id, $id_p, $dokumen);
        redirect("projek/show_/".$id_p);
    }
    
    

    

   

    
}

?>