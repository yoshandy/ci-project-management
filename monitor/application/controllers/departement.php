<?php

class departement extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->model('departement_model');
        $this->load->model('pesan_model');
    }

    public function index(){
       
        $data["departement"] = $this->departement_model->select_departement();
        $this->load->view('departement/departement', $data);
    }

    public function tambah_departement(){
       
       
        $this->load->view('departement/tambah_departement');
    }

    public function tambah(){
       
        $this->departement_model->insert_();
        redirect("departement");
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
        $this->departement_model->delete_($id); 
        redirect("departement");
    }

   

    
}

?>