<?php
    class dokumen_model extends CI_Model{
       
    
	   
        
        public function select_(){
            return $this->db->query("SELECT * from task")->result();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT b.id_bahan as id_bahan, b.nama_bahan as nama_bahan, b.jumlah as jumlah, b.satuan as satuan, s.nama_supplier as nama_supplier, b.id_supplier as id_supplier  FROM `bahan` as b, supplier as s WHERE s.id_supplier = b.id_supplier and b.id_bahan = '".$id."'")->row();
        }
        
        public function insert_($id){
            $post = $this->input->post();
           
            

            $data = array(  
                
                "id_projek" => $id,
                
                "dokumen" => $this->_uploadImage($id)
                
               );
          

               
		    return $this->db->insert('dokumen',$data);
        }
       

        public function delete_user($id){
           
            return $this->db->update('supplier',array("hapus" => "1"), array("id_supplier" => $id));
        }

        private function _uploadImage($id)
	{
		$config['upload_path']          =  './assets/dokumen/'.$id.'/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 150024;
		
		
		
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->upload->do_upload('dokumen');
			return $this->upload->data("file_name");
		
	}

    public function delete_($id, $id_p, $dokumen){
        unlink('./assets/dokumen/'.$id_p.'/'.$dokumen);
        $this->db->where('id_dokumen',$id);
        $this->db->delete('dokumen');
    }


        
        
        
        
        
    }
?>