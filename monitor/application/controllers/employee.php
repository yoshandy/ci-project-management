<?php

class employee extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('supplier_model');
        $this->load->model('departement_model');
        $this->load->model('employee_model');
    }

    public function index(){
       
        $data["employee"] = $this->employee_model->select_();
        $this->load->view('employee/employee', $data);
    }

    public function tambah_(){
       
        $data["departement"] = $this->departement_model->select_departement();
        $this->load->view('employee/tambah_employee', $data);
    }

    public function tambah(){
       
        $this->employee_model->insert_();
        redirect("employee");
    }

    public function edit(){
       
        $this->employee_model->update_();
        redirect("employee");
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
        $data["dep"] = $this->employee_model->select_by_id($id);
        $data["departement"] = $this->departement_model->select_departement();
        $this->load->view('employee/edit_employee', $data);
    }

    public function setting_(){
        if($this->session->userdata('user')->role == 'admin' ){
            redirect("employee/setting_admin");
        }else{
            $id = $this->session->userdata('user')->id_employee;
            $data["dep"] = $this->employee_model->select_by_id($id);
           
            $this->load->view('employee/setting_employee', $data);
        }
       

    }

    public function setting_admin(){
     
        if($this->session->userdata('user')->role != 'admin' ){
            redirect("welcome/logout");
        }
        $this->load->view('employee/setting_admin');
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
        $this->employee_model->delete_($id); 
        redirect("employee");
    }

   

    
}

?>