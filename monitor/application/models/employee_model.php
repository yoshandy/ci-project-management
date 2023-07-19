<?php
    class employee_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_(){
            $post = $this->input->post();
           
            $username=  $post["username"] ;
            $password=  $post["password"] ;
            $role = $post["role_role"];
           

            $data = array(  
                            "id_departement" => $post["id_departement"],
                            "nama_lengkap" => $post["nama_lengkap"],
                            "nama_panggilan" => $post["nama_panggilan"],
                            "tahun_masuk" => $post["tahun_masuk"],
                            "jabatan" => $post["jabatan"], 
                            "grade" => $post["grade"], 
                            "skill" => $post["skill"], 
                            "email" => $post["email"], 
                            "nomor_hp" => $post["nomor_hp"],
                            "input_by" => $post["input_by"] 
                           );
 
		 $this->db->insert('employee',$data);
        $id_employee = $this->db->query("SELECT * FROM `employee` ORDER BY id desc LIMIT 1")->row()->id;

         if(($username != "") && $password != "" && $id_employee != "" && $role != ""){
           

            $data = array(  
                
                "complete_name" => $post["nama_lengkap"],
                "id_employee" => $id_employee,
                
                "role" => $role,
                "username" => $username,
                "password" => $password 
               );
            $this->db->insert('user',$data);
            $this->db->update('employee', array("akun" => "1") , array("id" => $post["id_employee"]));
           }
        }
        
        public function select_(){
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('akun', '0');
            $this->db->where('delet != ', '1');
           
      $query = $this->db->get()->result();
      return $query;
          
        }

        public function select_by_id($id){
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->join('departement','employee.id_departement  = departement.id_departement ','LEFT');      
            $this->db->where('id', $id);
      $query = $this->db->get()->row();
      return $query;
          
        }

        public function select_by_id2($id){
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->where('id', $id);
           
      $query = $this->db->get()->row();
      return $query;
          
        }

        public function select_tambah($id){
            $this->db->select('*');
            $this->db->from('employee');
            $this->db->join('user','employee.id  != user.id_employee ','LEFT');      
           
      $query = $this->db->get()->row();
      return $query;
          
        }

        
        public function update_(){
            $post = $this->input->post();
            $data = array(  
                            "id_departement" => $post["id_departement"],
                            "nama_lengkap" => $post["nama_lengkap"],
                            "nama_panggilan" => $post["nama_panggilan"],
                            "tahun_masuk" => $post["tahun_masuk"],
                            "jabatan" => $post["jabatan"], 
                            "grade" => $post["grade"], 
                            "skill" => $post["skill"], 
                            "email" => $post["email"], 
                            "nomor_hp" => $post["nomor_hp"],
                            "edit_by" => $post["input_by"], 
                            "date_edit "  => date("Y-m-d")
                           
                        );

                    $this->db->update('user', array("complete_name" => $post["nama_lengkap"]) , array("id_employee" => $post["id"]));
		    return $this->db->update('employee',$data, array("id" => $post["id"]));
        }

       

        public function delete_($id){
          
            $this->delete_user($id);
            return $this->db->update('employee', array("delet" => "1") , array("id" => $id));
        }

        public function delete_user($id){
            $this->db->where('id_employee',$id);
            $this->db->delete('user');
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }
        
        
        
        
    }
?>