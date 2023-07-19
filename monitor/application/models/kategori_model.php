<?php
    class kategori_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_user(){
            $post = $this->input->post();
           
           
            $nama = $post["nama"];
           
            
            $data= array("nama_kategori" => $nama);
		    return $this->db->insert('tbl_kategori',$data);
        }
        
        public function select_kategori(){
            return $this->db->query("SELECT * FROM `tbl_kategori`")->result();
        }

        public function select_by_id($id){
            $this->db->where('id',$id);
            return $this->db->get('tbl_kategori')->row();
        }
        public function update_user(){
            $post = $this->input->post();
            $id = $post["id"];
            $nama = $post["nama"];
            
            $data= array("nama_kategori" => $nama);
		    return $this->db->update('tbl_kategori',$data, array("id" => $id));
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