<?php

class chat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('departement_model');
        $this->load->model('employee_model');
        $this->load->model('chat_model');
        $this->load->model('projek_model');
    }

    public function index(){
       
      
        $this->load->view('chatAPP/chat');
    }

    public function sudah(){
       
      
        $this->chat_model->sudah();
    }

    public function tambah_(){
       
        $data["employee"] = $this->employee_model->select_();
        $this->load->view('user/tambah_user', $data);
    }

    public function chat_to($id){

        $id_projek =  $this->uri->segment(4);
        $data["id_p"] = $id_projek;
        $data["user"] = $this->user_model->select_by_id($id);
        $this->load->view('chatAPP/chat', $data);
    }

    public function chat_to_group($id){

      
        $data["projek"] = $this->projek_model->select_by_id($id);
       
        $this->load->view('chatAPP/grup_chat', $data);
    }

    public function get_chat(){
        $id_projek = 	$this->input->post('id_projek');
        $id_user = 	$this->input->post('id_user');
		$id_lawan = 	$this->input->post('id_lawan');
        $this->chat_model->sudah($id_lawan, $id_user, $id_projek);
		$data = $this->chat_model->get_chat($id_user, $id_lawan, $id_projek);
        

		echo json_encode(array(
			'data' => $data
		));
    }

    public function get_chat_group(){
        $id_projek = 	$this->input->post('id_projek');
        $id_user = 	$this->input->post('id_user');
		$id_lawan = 	$this->input->post('id_lawan');
        
		$data = $this->chat_model->get_chat_group($id_projek);
        

		echo json_encode(array(
			'data' => $data
		));
    }
    
    public function kirimPesan(){
        $pesan = $this->input->post('pesan');
		$id_user = $this->input->post('id_user');
		$id_lawan = $this->input->post('id_lawan');
        $id_projek = $this->input->post('id_projek');

		// $id_user =2;
		// $id_lawan =1;
		$in = array(
			'in_msg' => $id_user,
			'out_msg' => $id_lawan,
            'id_projek' => $id_projek,
			'isi_chat' => $pesan,
            
			
		);

		$this->chat_model->kirimPesan($in);
		$log = array('status' => true);
		echo json_encode($log);
		return true;
    }

    public function kirimPesanGroup(){
        $pesan = $this->input->post('pesan');
		$id_user = $this->input->post('id_user');
		$id_lawan = $this->input->post('id_lawan');
        $id_projek = $this->input->post('id_projek');

		// $id_user =2;
		// $id_lawan =1;
		$in = array(
			'in_msg' => $id_user,
			'out_msg' => $id_user,
            'id_projek' => $id_projek,
			'isi_chat' => $pesan,
            'id_grup' => $id_projek,
            
			
		);

		$this->chat_model->kirimPesan($in);
		$log = array('status' => true);
		echo json_encode($log);
		return true;
    }

    

   

    
}

?>