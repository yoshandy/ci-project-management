<?php

class projek extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','download'));	
        $this->load->model('supplier_model');
        $this->load->model('projek_model');
        $this->load->model('pesan_model');
        $this->load->model('user_model');
        $this->load->model('task_model');
        
    }

    public function index(){
       
         if($this->session->userdata('user')->role == 'Programmer'){ 
            $data["projek"] = $this->projek_model->select_pro($this->session->userdata('user')->id_user);
        }elseif($this->session->userdata('user')->role == 'admin'){ 
            $data["projek"] = $this->projek_model->select_();
         }elseif($this->session->userdata('user')->role != 'Operator'){ 
                $data["projek"] = $this->projek_model->select_pin($this->session->userdata('user')->id_user);
       
        }else{
            $data["projek"] = $this->projek_model->select_();
         }
        
        
        $this->load->view('projek/projek', $data);
    }

    public function show_all($id){
       
        if($this->session->userdata('user')->role == 'Programmer'){ 
            $data["projek"] = $this->projek_model->select_pro($this->session->userdata('user')->id_user);
        }elseif($this->session->userdata('user')->role == 'admin'){ 
            $data["projek"] = $this->projek_model->select_();
         }elseif($this->session->userdata('user')->role != 'Operator'){ 
                $data["projek"] = $this->projek_model->select_pin($this->session->userdata('user')->id_user);
       
        }else{
            $data["projek"] = $this->projek_model->select_();
         }
      
       $data["tipe"] = $id;
       $this->load->view('projek/projek2', $data);
   }

   public function show_all_progres(){
       
    if($this->session->userdata('user')->role == 'Programmer'){ 
        $data["projek"] = $this->projek_model->select_pro($this->session->userdata('user')->id_user);
    }elseif($this->session->userdata('user')->role == 'admin'){ 
        $data["projek"] = $this->projek_model->select_();
     }elseif($this->session->userdata('user')->role != 'Operator'){ 
            $data["projek"] = $this->projek_model->select_pin($this->session->userdata('user')->id_user);
   
    }else{
        $data["projek"] = $this->projek_model->select_();
     }
        
    
        $this->load->view('projek/projek3', $data);
    }

    public function tambah_(){
       
        $data["user"] = $this->user_model->select_user2();
        $this->load->view('projek/tambah_projek',$data);
    }
    public function show_($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["dokumen"] = $this->projek_model->dokumen($id);
        $data["task"] = $this->task_model->select_($id);
        $data["projek"] = $this->projek_model->select_by_id($id);
        $data["pic"] = $this->projek_model->pic_projek($id, $id_user);
        $data["owner"] = $this->projek_model->owner($id, $id_user);
        $data["pin"] = $this->projek_model->pin_projek($id_user);
        $this->load->view('projek/show_projek', $data);
    }

    public function ajukan_($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["projek"] = $this->projek_model->select_by_id($id);
        $data["pic"] = $this->projek_model->pic_projek($id, $id_user);
        $this->load->view('projek/ajukan', $data);
    }

    public function ajukan_ulang($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["projek"] = $this->projek_model->select_by_id($id);
        $data["pic"] = $this->projek_model->pic_projek($id, $id_user);
        $data["user"] = $this->user_model->select_user2();
        $this->load->view('projek/ajukan_ulang', $data);
    }

    public function tambah(){
       
        $this->projek_model->insert_();
        redirect("projek");
    }

    public function ajukan_ulang_(){
        $id = $this->input->post('id_projek');
        $this->projek_model->delete_($id);
        $this->projek_model->insert_();
        redirect("projek");
    }

    public function setuju(){
       
        $this->projek_model->setuju();
        redirect("projek");
    }

    public function mulai($id){
       
        $this->projek_model->mulai($id);
        $this->show_($id);
    }

    public function note(){
        $id = $this->input->post('id_projek');
        $this->projek_model->note();
        $this->show_($id);
    }

    public function done($id){
       
        $this->projek_model->done($id);
        $this->show_($id);
    }

    public function tolak($id){
       
        $this->projek_model->tolak($id);
        redirect("projek");
    }

    public function edit(){
       
        $this->departement_model->update_();
        redirect("departement");
    }

    public function kirim(){
       
        $this->pesan_model->kirim_bahan();
        redirect("welcome/home2");
    }

    public function pesan(){
       
        $this->pesan_model->insert_user();
        redirect("pesan");
    }

    public function edit_($id){
        $data["dep"] = $this->departement_model->select_by_id($id);
        
        $this->load->view('departement/edit_departement', $data);
    }

    public function pesan_bahan($id){
        $data["bahan"] = $this->bahan_model->select_by_id($id);
        $data["supplier"] = $this->supplier_model->select_supplier();
        $this->load->view('bahan/pesan_bahan', $data);
    }

    public function kirim_bahan($id){
        $data["id"] = $id;
        $this->load->view('bahan/kirim_bahan', $data);
    }

    public function hapus($id){
        $this->projek_model->delete_($id); 
        redirect("projek");
    }
    
    public function baca($id){
        $dokumen = $this->projek_model->baca($id)->dokumen;
        if (!is_dir('./assets/dokumen/'.$id)) {
            force_download('./assets/dokumen/'.$dokumen, NULL);
        
        }else{
            force_download('./assets/dokumen/'.$id.'/'.$dokumen);
        }
        
        
    }

    public function unduh($id){
        $dokumen = $this->projek_model->unduh($id)->dokumen;
        $id_p = $this->projek_model->unduh($id)->id_projek;
        if (!is_dir('./assets/dokumen/'.$id_p)) {
            force_download('./assets/dokumen/'.$dokumen, NULL);
        
        }else{
            force_download('./assets/dokumen/'.$id_p.'/'.$dokumen, NULL);
        }
        
        
    }

   

    
}

?>