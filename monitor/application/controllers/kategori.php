<?php

class kategori extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('kategori_model');
    }

    public function index(){
       
        $data["kategori"] = $this->kategori_model->select_kategori();
        $this->load->view('kategori/kategori', $data);
    }

    public function tambah_kategori(){
       
      
        $this->load->view('kategori/tambah_kategori');
    }

    public function tambah(){
       
        $this->kategori_model->insert_user();
        redirect("kategori");
    }

    public function edit(){
       
        $this->kategori_model->update_user();
        redirect("kategori");
    }

    public function edit_kategori($id){
       
        $data["kategori"] = $this->kategori_model->select_by_id($id);
        $this->load->view('kategori/edit_kategori', $data);
    }

    public function hapus_supplier($id){
        $this->supplier_model->delete_user($id); 
        redirect("kategori");
    }

    
}

?>