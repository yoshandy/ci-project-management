<?php

class bahan extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->model('bahan_model');
        $this->load->model('pesan_model');
    }

    public function index(){
       
        $data["bahan"] = $this->bahan_model->select_bahan();
        $this->load->view('bahan/bahan', $data);
    }

    public function tambah_bahan(){
       
        $data["supplier"] = $this->supplier_model->select_supplier();
        $this->load->view('bahan/tambah_bahan',$data);
    }

    public function tambah(){
       
        $this->bahan_model->insert_bahan();
        redirect("bahan");
    }

    public function edit(){
       
        $this->bahan_model->update_bahan();
        redirect("bahan");
    }

    public function kirim(){
       
        $this->pesan_model->kirim_bahan();
        redirect("welcome/home2");
    }

    public function pesan(){
       
        $this->pesan_model->insert_user();
        redirect("pesan");
    }

    public function edit_bahan($id){
        $data["bahan"] = $this->bahan_model->select_by_id($id);
        $data["supplier"] = $this->supplier_model->select_supplier();
        $this->load->view('bahan/edit_bahan', $data);
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

    public function hapus_supplier($id){
        $this->supplier_model->delete_user($id); 
        redirect("supplier");
    }

   

    
}

?>