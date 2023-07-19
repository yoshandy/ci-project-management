<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 * 
	 */

	 
	

	

	


	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('supplier_model');
		$this->load->model('pesan_model');
		$this->load->model('projek_model');
		
		
		
		
	}

	public function index()
	{
		
		$data["baru"] = $this->projek_model->jml_baru();
		$data["jalan"] = $this->projek_model->jml_jalan();
		$data["done"] = $this->projek_model->jml_done();
		$this->load->view('home',$data);
	}

	public function home2()
	{
		$id = $this->session->userdata('user')->id_supplier;
		$data["pesan"] = $this->pesan_model->select_pesan_supplier($id);
		$this->load->view('home2',$data);
	}
	public function cetak()
	{
		$tahun_min = $this->pad_model->getTahun_min()->tahun;
		$data["tahun"] = $this->pad_model->getTahun($tahun_min);
		$data["max"] =  date("Y")+1;
		$data["pad"] = $this->pad_model->getAll2();
		$data["penambahan"] = $this->pad_model->getAll_penambahan();
		$this->load->view('home_cetak', $data);
	}
	
	public function tes_event()
	{
		$this->User_model->tes_event();
		redirect('welcome/home');
	}

	public function cek_login(){
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		

		$cek_login=$this->User_model->login($username,$password);
		
		

		if(isset($cek_login)){
			$this->session->set_userdata('user',$cek_login);
			redirect('/');
		
		}else{
			redirect('welcome/login');
		}

	}
	function login(){
		$this->load->view('login');
	}
	function logout(){
		$this->session->unset_userdata('user');
		$this->load->view('login');
	}
	function regis(){
		$this->load->view('regis');
	}

	public function checkUser()
   {
      
		$username=$this->input->post('username');
		
		
		
		$result=$this->User_model->checkuser($username);
		if($result)
		{
		echo  1;	
		}
		else
		{
		echo  0;	
		}
    }
	public function checkPass()
   {
	
		$username=$this->input->post('old_pass');

		$result=$this->User_model->checkPass($username);
		if($result)
		{
		echo  1;	
		}
		else
		{
		echo  0;	
		}
    }	

	public function cetak1(){
		$this->load->view('/cetak1');
	}
}
