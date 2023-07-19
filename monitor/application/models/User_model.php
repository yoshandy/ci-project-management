<?php
    class User_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from user
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_user(){
            $post = $this->input->post();
           
            $username=  $post["username"] ;
            $password=  $post["password"] ;
            $role = $post["role_role"];

            $data = array(  
                
                "complete_name" => $post["nama_lengkap"],
                "id_employee" =>  $post["id_employee"],
                
                "role" => $role,
                "username" => $username,
                "password" => $password 
               );
          

               $this->db->update('employee', array("akun" => "1") , array("id" => $post["id_employee"]));
		    return $this->db->insert('user',$data);
        }
        
        public function select_user(){
            return $this->db->query("Select * from user
            Where role != 'admin' and delet != '1' ")->result();
        }

        public function select_user2(){
            return $this->db->query("Select * from user
            Where   role = 'programmer' ")->result();
        }

        public function select_by_id($id){
            $this->db->where('id_user',$id);
            return $this->db->get('user')->row();
        }
        public function update_user(){
            $post = $this->input->post();
            $username=  $post["username"] ;
            $password=  $post["password"] ;
            $role = $post["role_role"];
            $id_user = $post["id_user"];
            $data = array(  
                
                
                
                "role" => $role,
                "username" => $username,
                "password" => $password 
               );
            
           
		    return $this->db->update('user',$data, array("id_user" => $id_user));
        }

        public function ganti_pass(){
            $post = $this->input->post();
           
            $password=  $post["password1"] ;
            
            $id_user = $post["id_user"];
            $data = array(  
                
                
                
                
                "password" => $password 
               );
            
           
		    return $this->db->update('user',$data, array("id_user" => $id_user));
        }

        public function ganti_img(){
            $post = $this->input->post();
           
            
            $id_user = $post["id_user"];
            $image = $this->_uploadImage( $id_user);

            $data = array(   
                "img" => $image 
               );
            
           
		    return $this->db->update('user',$data, array("id_user" => $id_user));
        }

        public function delete_user($id){
            $q_id = $this->select_by_id($id);
            $id_employee = $q_id->id_employee;
            $this->db->update('employee', array("akun" => "0") , array("id" => $id_employee));
            $this->db->where('id_user',$id);
            $this->db->delete('user');
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }
        public function tes_event(){
            return $this->db->query("CREATE EVENT `lulus` ON SCHEDULE AT '2021-02-22 08:00:00.000000' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE `santri` SET `lulus`=1 WHERE id_santri = (SELECT id_santri from nilai ORDER by ((nilai_arab+nilai_Inggris+ngaji+sholat+imla)/5) desc LIMIT 1 )");
        }
        
        public function checkuser($username) 
	{
		$this->db->where('username',$username);
		$query=$this->db->get('user');
		if($query->num_rows()>0)
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }

    public function checkPass($username) 
	{
		$id = $this->session->userdata('user')->id_user;
		$query=$this->db->query("Select * from user where password = '".$username."' and id_user = '".$id."'");
		if($query->num_rows()>0)
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }

    private function _uploadImage($id)
	{
		$config['upload_path']          = './assets/profil/';
		$config['allowed_types']        = 'jpeg|jpg|png';
		$config['file_name']            = $id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}
        
    }
?>