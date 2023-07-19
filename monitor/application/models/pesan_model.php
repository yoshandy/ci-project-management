<?php
    class pesan_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_user(){
            $post = $this->input->post();
            $id_bahan = $post["id"];
            $jumlah_pesan = $post["jumlah_pesan"];
            
            
            $data= array("id_bahan" => $id_bahan,"jumlah_pesan" => $jumlah_pesan);
		    return $this->db->insert('pesan',$data);
        }

        public function kirim_bahan(){
            $post = $this->input->post();
            $id_bahan = $post["id"];
            $jumlah_pesan = $post["jumlah_pesan"];
            
            
            $data= array("jumlah_kirim" => $jumlah_pesan);
		    return $this->db->update('pesan',$data,array("id_pesan" => $id_bahan));
        }
        
        public function select_pesan(){
            return $this->db->query("SELECT p.id_pesan as id_pesan, b.nama_bahan as nama_bahan, p.jumlah_pesan as jumlah_pesan, p.jumlah_kirim as jumlah_kirim FROM `pesan` as p, bahan as b WHERE b.id_bahan = p.id_bahan")->result();
        }

        public function select_pesan_supplier($id){
            return $this->db->query("SELECT p.id_pesan as id_pesan, b.nama_bahan as nama_bahan, p.jumlah_pesan as jumlah_pesan, p.jumlah_kirim as jumlah_kirim FROM `pesan` as p, bahan as b WHERE b.id_bahan = p.id_bahan and b.id_supplier = '".$id."'")->result();
        }

        public function select_pesan_one($id){
            return $this->db->query("SELECT b.id_bahan as id_bahan, p.id_pesan as id_pesan, b.nama_bahan as nama_bahan, p.jumlah_pesan as jumlah_pesan, p.jumlah_kirim as jumlah_kirim FROM `pesan` as p, bahan as b WHERE b.id_bahan = p.id_bahan and p.id_pesan = '".$id."'")->result();
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
            $this->db->where('id_pesan',$id);
            $this->db->delete('pesan');
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function terima_bahan($id){

            $qeury = $this->db->query("SELECT b.id_bahan as id_bahan, p.id_pesan as id_pesan, b.nama_bahan as nama_bahan, p.jumlah_pesan as jumlah_pesan, p.jumlah_kirim as jumlah_kirim FROM `pesan` as p, bahan as b WHERE b.id_bahan = p.id_bahan and p.id_pesan = '".$id."'")->row();
           
            $id_bahan = $qeury->id_bahan;
           
            $jumlah_terima = $qeury->jumlah_kirim;
            
            $data=  array("jumlah" => "jumlah +".$jumlah_terima);
            $this->db->query(" DELETE FROM `pesan` WHERE id_pesan = '".$id."'");
		    return $this->db->query("UPDATE `bahan` SET `jumlah`= jumlah + '".$jumlah_terima."' WHERE id_bahan = '".$id_bahan."'");
           
            
        }
        
        
        
        
    }
?>