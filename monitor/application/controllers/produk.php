<?php

class produk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('bahan_model');
    }

    public function index(){
       
        $data["produk"] = $this->produk_model->select_supplier();
        $this->load->view('produk/produk', $data);
    }

    public function tambah_produk(){
        $data["bahan"] = $this->bahan_model->select_bahan();
       $jumlah_jenis = $this->input->post("jumlah");
       $data["jumlah_bahan"] =  $jumlah_jenis;
        $data["kategori"] = $this->kategori_model->select_kategori();
        $this->load->view('produk/tambah_produk',$data);
    }

    public function tambah(){
       
        $this->produk_model->insert_user();
        redirect("produk");
    }

    public function edit(){
       
        $this->supplier_model->update_user();
        redirect("supplier");
    }

    public function edit_supplier($id){
       
        $data["supplier"] = $this->supplier_model->select_by_id($id);
        $this->load->view('supplier/edit_supplier', $data);
    }

    public function hapus_supplier($id){
        $this->supplier_model->delete_user($id); 
        redirect("supplier");
    }

    
}

?>