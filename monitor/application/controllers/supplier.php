<?php

class supplier extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->model('user_model');
    }

    public function index(){
       
        $data["supplier"] = $this->user_model->select_user();
        $this->load->view('supplier/supplier', $data);
    }

    public function tambah_supplier(){
       
      
        $this->load->view('supplier/tambah_supplier');
    }

    public function tambah(){
       
        $this->user_model->insert_user();
        redirect("supplier");
    }

    public function edit(){
       
        $this->user_model->update_user();
        redirect("supplier");
    }

    public function edit_supplier($id){
       
        $data["supplier"] = $this->user_model->select_by_id($id);
        $this->load->view('supplier/edit_supplier', $data);
    }

    public function edit_setting($id){
       
        $data["supplier"] = $this->supplier_model->select_by_id($id);
        $this->load->view('supplier/edit_supplier', $data);
    }

    public function hapus_supplier($id){
        $this->user_model->delete_user($id); 
        redirect("supplier");
    }

    
}

?>