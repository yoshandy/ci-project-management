<?php

class task extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper(array('url','download'));
        $this->load->model('user_model');
        $this->load->model('projek_model');
        $this->load->model('employee_model');
        $this->load->model('task_model');
    }
    

    public function index(){
       
      
        $this->load->view('chatAPP/chat');
    }

    public function tambah_($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["projek"] = $this->projek_model->select_by_id($id);
        $data["pic"] = $this->projek_model->pic_projek($id, $id_user);
       
        $this->load->view('task/tambah_task', $data);
    }

    public function chat_to($id){

        $id_projek =  $this->uri->segment(4);
        $data["id_p"] = $id_projek;
        $data["user"] = $this->user_model->select_by_id($id);
        $this->load->view('chatAPP/chat', $data);
    }

    public function tambah(){
        $id = $this->input->post('id_projek');
        $this->task_model->insert_();
        $this->projek_model->cek_progres($id);
        redirect("projek/show_/".$id);
    }

    public function turn_in($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["task"] = $this->task_model->select_by_id($id);
       
        $this->load->view('task/turn_task', $data);
    }
    

    public function turn(){
        $id = $this->input->post('id_projek');
        $this->task_model->turn_in_();
        $this->projek_model->cek_progres($id);
        redirect("projek/show_/".$id);
    }

    public function periksa($id){
        $id_user = $this->session->userdata('user')->id_user;
        $data["task"] = $this->task_model->select_by_id($id);
       
        $this->load->view('task/periksa', $data);
    }

    public function unduh($id){
        $dokumen = $this->projek_model->unduh($id)->dokumen;
        $id_p = $this->projek_model->unduh($id)->id_projek;
        if (!is_dir('./assets/dokumen/'.$id_p)) {
            force_download('./assets/dokumen/'.$dokumen, NULL);
        
        }else{
            force_download('./assets/dokumen/'.$id_p.'/'.$dokumen);
        }
        
        
    }

    public function periksa_(){
        $id = $this->input->post('id_projek');
        $this->task_model->periksa_();
        $this->task_model->dokumen_stat();
        $this->projek_model->cek_progres($id);
        redirect("projek/show_/".$id);
    }

    public function revisi_($id){
        $id_p = $this->task_model->select_by_id($id)->id_projek;
        $this->task_model->revisi_($id);
        $this->projek_model->cek_progres($id_p);
        redirect("projek/show_/".$id_p);
    }

    
    
    

    

   

    
}

?>