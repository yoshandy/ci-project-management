<?php

class pesan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('pesan_model');
    }

    public function index(){
       
        $data["pesan"] = $this->pesan_model->select_pesan();
        $this->load->view('pesan/pesan', $data);
    }

    public function tambah_supplier(){
       
      
        $this->load->view('supplier/tambah_supplier');
    }

    public function tambah(){
       
        $this->supplier_model->insert_user();
        redirect("supplier");
    }

    public function edit(){
       
        $this->supplier_model->update_user();
        redirect("supplier");
    }

    public function edit_supplier($id){
       
        $data["supplier"] = $this->supplier_model->select_by_id($id);
        $this->load->view('supplier/edit_supplier', $data);
    }

    public function edit_setting($id){
       
        $data["supplier"] = $this->supplier_model->select_by_id($id);
        $this->load->view('supplier/edit_supplier', $data);
    }

    public function hapus_pesan($id){
        $this->pesan_model->delete_user($id); 
        redirect("pesan");
    }

    public function terima($id){
        $this->pesan_model->terima_bahan($id); 
        redirect("bahan");
    }

    
}

?>