<?php
    class supplier_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_user(){
            $post = $this->input->post();
           
            $no_hp = $post["no_hp"];
            $alamat = $post["alamat"];
            $nama = $post["nama"];
            $username = $post["username"];
            $password = $post["password"];
            
            $data= array("nama_supplier" => $nama,"no_hp" => $no_hp,"alamat" => $alamat,"username" => $username,"password" => $password);
		    return $this->db->insert('supplier',$data);
        }
        
        public function select_supplier(){
            return $this->db->query("Select * from supplier where hapus != 1")->result();
        }

        public function select_by_id($id){
            $this->db->where('id_supplier',$id);
            return $this->db->get('supplier')->row();
        }
        public function update_user(){
            $post = $this->input->post();
            $id_supplier = $post["id"];
            $no_hp = $post["no_hp"];
            $alamat = $post["alamat"];
            $nama = $post["nama"];
            $username = $post["username"];
            $password = $post["password"];
            
            $data= array("nama_supplier" => $nama,"no_hp" => $no_hp,"alamat" => $alamat,"username" => $username,"password" => $password);
		    return $this->db->update('supplier',$data, array("id_supplier" => $id_supplier));
        }

        public function delete_user($id){
           
            return $this->db->update('supplier',array("hapus" => "1"), array("id_supplier" => $id));
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }
        
        
        
        
    }
?>