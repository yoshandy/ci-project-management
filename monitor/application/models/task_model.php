<?php
    class task_model extends CI_Model{
       
    
	   
        
        public function select_($id){
            return $this->db->query("SELECT * from task task where id_projek = '".$id."'")->result();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT * from task where id = '".$id."'")->row();
        }
        
        public function insert_(){
            $post = $this->input->post();
            $data = array(  
                
                "id_projek" => $post["id_projek"],
                "judul" =>  $post["judul"],
                
                "deskripsi" => $post["deskripsi"],
                "jenis" => $post["judul"],
                "status" => "0",
                "deadline" => $post["deadline"],
                "pic" => $post["pic"]
               );
          

               
		    return $this->db->insert('task',$data);
        }


        public function turn_in_(){
            $data= array();
            $post = $this->input->post();
            if(!is_null( $post["dokumen"]))
            {
            $data = array(   
                "dokumen" => $this->turn_in_file(),
                "status" => "1",
                "pic" => $post["pic"]
               );
            }else{
                $data = array(   
                    
                    "status" => "1",
                    "pic" => $post["pic"]
                   );
            }
          

              
		    return $this->db->update('task',$data, array("id" => $post["id"]));
        }

        



        
        
        public function turn_in_file(){
            $data= array();
            $post = $this->input->post();
            if(!is_null( $post["dokumen"]))
            {
                $data = array(  
                
                    "id_projek" => $post["id_projek"],
                    "dokumen" =>  $this->_uploadImage($post["id_projek"]),
                    "status" => "0"
                   );
            }else{

                $data = array(  
                
                    "id_projek" => $post["id_projek"],
                    
                    "status" => "0"
                   );
            }
           
    
		     $this->db->insert('dokumen',$data);
             $insert_id = $this->db->insert_id();

            return  $insert_id;
        }

        public function periksa_(){
            $post = $this->input->post();
            $data = array(  
                "status" => "2",
               );
              
              
		    return  $this->db->update('task',$data, array("id" => $post["id"]));
        }

        public function revisi_($id){
           
            $data = array(  
                "status" => "3",
               );
              

               $id_dokumen =  $this->select_by_id($id)->dokumen;
               $q = $this->db->query("SELECT * from dokumen WHERE id_dokumen = '".$id_dokumen."'")->row();
               if(!is_null( $q))
               {
                $id_projek =  $this->select_by_id($id)->id_projek;
                $dokumen =  $q->dokumen;
               $this->delete_($id_dokumen,$id_projek, $dokumen);
               }
              
              
		    return  $this->db->update('task',$data, array("id" => $id));
        }

        public function dokumen_stat(){
            $post = $this->input->post();
            $data = array(  
                "status" => "1",
               );
               $id_dokumen =  $this->select_by_id($post["id"])->dokumen;
    
		    return  $this->db->update('dokumen',$data,  array("id_dokumen" => $id_dokumen));
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