<?php
    class bahan_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_bahan(){
            $post = $this->input->post();
           
           
            $nama = $post["nama"];
            $satuan = $post["satuan"];
            $id_supplier = $post["id_supplier"];
            
            $data= array("nama_bahan" => $nama,"satuan" => $satuan,"id_supplier" => $id_supplier);
		    return $this->db->insert('bahan',$data);
        }
        
        public function select_departement(){
            return $this->db->query("SELECT * from departement")->result();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT b.id_bahan as id_bahan, b.nama_bahan as nama_bahan, b.jumlah as jumlah, b.satuan as satuan, s.nama_supplier as nama_supplier, b.id_supplier as id_supplier  FROM `bahan` as b, supplier as s WHERE s.id_supplier = b.id_supplier and b.id_bahan = '".$id."'")->row();
        }
        public function update_bahan(){
            $post = $this->input->post();
            $id_bahan = $post["id"];
            $nama = $post["nama"];
            $satuan = $post["satuan"];
            $id_supplier = $post["id_supplier"];
            
            $data=  array("nama_bahan" => $nama,"satuan" => $satuan,"id_supplier" => $id_supplier);
		    return $this->db->update('bahan',$data, array("id_bahan" => $id_bahan));
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