<?php
    class order_model extends CI_Model{
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
        
        public function select_order(){
            return $this->db->query("SELECT p.id as id, p.nama as nama,p.email as email, p.alamat as alamat, p.telp as telp, o.tanggal as tanggal FROM `tbl_pelanggan` as p, tbl_order as o WHERE p.id = o.pelanggan")->result();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT p.id as id, p.nama as nama,p.email as email, p.alamat as alamat, p.telp as telp, o.tanggal as tanggal FROM `tbl_pelanggan` as p, tbl_order as o WHERE p.id = o.pelanggan and p.id = '".$id."'")->row();
        }
        public function select_detail_order($id){
            return $this->db->query("SELECT d.id as id, p.nama_produk as nama_produk, d.qty as qty, d.harga as harga  FROM `tbl_detail_order` as d, tbl_produk as p where d.order_id = '".$id."'")->result();
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