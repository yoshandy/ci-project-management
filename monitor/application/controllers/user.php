<?php

class user extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('departement_model');
        $this->load->model('employee_model');
    }

    public function index(){
       
        $data["user"] = $this->user_model->select_user();
        $this->load->view('user/user', $data);
    }

    public function tambah_(){
       
        $data["employee"] = $this->employee_model->select_();
        $this->load->view('user/tambah_user', $data);
    }

    public function tambah_user($id){
       
        $data["dep"] = $this->employee_model->select_by_id2($id);
        $this->load->view('user/tambah_user_',$data);
    }

    public function tambah(){
       
        $this->user_model->insert_user();
        redirect("user");
    }

    public function edit(){
       
        $this->user_model->update_user();
        redirect("user");
    }

    public function ganti_pass(){
       
        $this->user_model->ganti_pass();
        redirect("/");
    }
    public function ganti_img(){
       
        $id = $this->session->userdata('user')->id_user;
        $this->user_model->ganti_img();
        $cek_login = $this->user_model->select_by_id($id);
        $this->session->set_userdata('user',$cek_login);
        redirect("/");
    }

    public function ganti_info(){
       
        $id = $this->session->userdata('user')->id_user;
        $this->employee_model->update_();
        $cek_login = $this->user_model->select_by_id($id);
        $this->session->set_userdata('user',$cek_login);
        redirect("/");
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
        $data["dep"] = $this->user_model->select_by_id($id);
       
        $this->load->view('user/edit_user', $data);
    }
    public function show($id){
        $data["dep"] = $this->employee_model->select_by_id($id);
        
        $this->load->view('employee/show_employee', $data);
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
        $this->user_model->delete_user($id); 
        redirect("user");
    }

   

    
}

?>