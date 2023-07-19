<?php
    class produk_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_user(){
            $post = $this->input->post();
           
            $harga = $post["harga"];
            $deskripsi = $post["deskripsi"];
            $nama = $post["nama"];
            $id_kategori = $post["id_kategori"];
            $jumlah_jenis = $post["jumlah_jenis"];
            $gambar = $this->_uploadImage();
            
            $data= array("nama_produk" => $nama,"deskripsi" => $deskripsi,"harga" => $harga,"kategori" => $id_kategori,"gambar" => $gambar);
		    return $this->db->insert('tbl_produk',$data);
        }
        
        public function select_supplier(){
            return $this->db->query("SELECT p.id_produk as id_produk, p.nama_produk as nama_produk, p.deskripsi as deskripsi, p.harga as harga, p.gambar as gambar, k.nama_kategori as kategori FROM `tbl_produk` as p, tbl_kategori as k WHERE p.kategori = k.id")->result();
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

        private function _uploadImage()
	{
		$config['upload_path']          = './assets/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		
		$config['max_size']             = 15024; // 1MB
		
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}
    public function aksi_upload(){
		$config['upload_path']          = 'http://localhost/toko/assets/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 15024;
		
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('image')){
			$error = array('error' => $this->upload->display_errors());
            return $this->upload->data("file_name");
		}else{
			$data = array('upload_data' => $this->upload->data());
			return $this->upload->data("file_name");
		}
	}
        
        
        
        
    }
?>