<?php
    class departement_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_(){
            $post = $this->input->post();
           
           
            $nama = $post["nama"];
           
            
            $data= array("nama_departement" => $nama);
		    return $this->db->insert('departement',$data);
        }
        
        public function select_departement(){
            return $this->db->query("SELECT * from departement")->result();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT * from departement WHERE id_departement = '".$id."'")->row();
        }
        public function update_(){
            $post = $this->input->post();
            $id_bahan = $post["id"];
            $nama = $post["nama"];
            
            
            $data=  array("nama_departement" => $nama);
		    return $this->db->update('departement',$data, array("id_departement" => $id_bahan));
        }

       

        public function delete_($id){
            $this->db->where('id_departement',$id);
            $this->db->delete('departement');
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }
        
        
        
        
    }
?>