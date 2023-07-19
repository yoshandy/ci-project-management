<?php
    class projek_model extends CI_Model{
        public function login($username, $password){
            return $this->db->query("Select * from supplier
            Where username='".$username."' AND password='".$password."'")->row();
        }
    
	    public function insert_(){
            $post = $this->input->post();
            $data=  array("id_owner" => $post["id_owner"],
                            "judul" => $post["judul_projek"],
                            "deadline_projek" => $post["deadline_projek"],
                            "bhs_pemograman" => $post["bhs_pemograman"], 
                            "input_by" => $post["input_by"],
                            "input_by_id" => $post["input_by_id"]
                           );
		     $this->db->insert('master_projek',$data);
             $q_id = $this->db->query("select * from master_projek order by id_projek desc limit 1")->row();
             $id_projek = $q_id->id_projek;

             $jml_pic = $post["jml_pic"];
           
             for ($x = 1; $x <=  $jml_pic; $x++){
                if(!is_null( $post["nama".$x]))
               {
                    $this->db->insert('pic', array("id_projek" => $id_projek,"id_user" =>  $post["nama".$x]));
                }
           
           }

           $gambar = $this->_uploadImage();
           $this->db->insert('dokumen',array("id_projek" => $id_projek,"dokumen" =>  $gambar));

        }
        
        public function select_(){
            return $this->db->query("SELECT * from master_projek order by id_projek DESC")->result();
        }

        public function dokumen($id){
            return $this->db->query("SELECT * from dokumen where id_projek = '".$id."'")->result();
        }

        public function select_pin(){
            return $this->db->query("SELECT * from master_projek where status != 5  order by id_projek DESC")->result();
        }

        public function select_pro($id){
            return $this->db->query("SELECT m.id_projek as id_projek, m.judul as judul, m.status as status, 
                                            m.progres_projek as progres_projek, m.note as note 
                                            FROM master_projek as m, pic as p,user as u 
                                            WHERE p.id_user = u.id_user and p.id_projek = m.id_projek
                                            and (m.status = 1 or m.status = 2)
                                            and u.id_user ='".$id."' order by id_projek DESC")->result();
        }

        public function pic_projek($id, $id_user){
            return $this->db->query("SELECT (select count(*) from chat where status = 0 and in_msg = '".$id_user."' and out_msg = u.id_user) as unread, 
                                    u.complete_name as nama, u.role as roles, u.id_user as id_user FROM master_projek as m, pic as p, user as u 
                                    where u.id_user = p.id_user AND p.id_projek = '".$id."' and p.id_projek = m.id_projek 
                                    order by unread desc")->result();
        }

        public function pin_projek($id_user){
            return $this->db->query("SELECT distinct (select count(*) from chat where status = 0 and in_msg = '".$id_user."' and out_msg = u.id_user) as unread, u.complete_name as complete_name, u.role as role, u.id_user as id_user FROM master_projek as m, user as u where u.role = 'PinDiv' or u.role = 'PinBag' order by unread desc;")->result();
        }

        public function owner($id, $id_user){
            $q_id = $this->db->query("select * from master_projek where id_projek = '".$id."'")->row();
            $id_op = $q_id->input_by_id;
            return $this->db->query("SELECT distinct (select count(*) from chat where status = 0 and in_msg = '".$id_user."' and out_msg = u.id_user) as unread, u.complete_name as complete_name, u.role as role, u.id_user as id_user FROM master_projek as m, user as u where u.id_user= '".$id_op."' order by unread desc;")->row();
        }

        public function select_by_id($id){
            return $this->db->query("SELECT * from master_projek WHERE id_projek = '".$id."'")->row();
        }

        public function baca($id){
            return $this->db->query("SELECT * from dokumen WHERE id_projek = '".$id."'")->row();
        }
        public function unduh($id){
            return $this->db->query("SELECT * from dokumen WHERE id_dokumen = '".$id."'")->row();
        }
        public function update_(){
            $post = $this->input->post();
            $id_bahan = $post["id"];
            $nama = $post["nama"];
            
            
            
            $data=  array("id_owner" => $post["id_owner"],
                            "judul" => $post["judul_projek"],
                            "deadline_projek" => $post["deadline_projek"],
                            "bhs_pemograman" => $post["bhs_pemograman"], 
                            "input_by" => $post["input_by"],
                           );
		    return $this->db->update('departement',$data, array("id_departement" => $id_bahan));
        }

        public function setuju(){
            $post = $this->input->post();
            $id_projek = $post["id_projek"];
           
            
            
            $data=  array("status" => "1"
                            );
            if (!is_dir('./assets/dokumen/'.$id_projek)) {
                mkdir('./assets/dokumen/' . $id_projek, 0777, TRUE);
            
            }
		    return $this->db->update('master_projek',$data, array("id_projek" => $id_projek));
        }

        public function mulai($id){
            $post = $this->input->post();
            $id_projek = $id;
           
            
            
            $data=  array("status" => "2"
                            );
		    return $this->db->update('master_projek',$data, array("id_projek" => $id_projek));
        }

        public function done($id){
            $post = $this->input->post();
            $id_projek = $id;
           
            
            
            $data=  array("status" => "3"
                            );
		    return $this->db->update('master_projek',$data, array("id_projek" => $id_projek));
        }

        public function note(){
            $post = $this->input->post();
            $id_projek = $post["id_projek"];
           
            
            
            $data=  array("note" => $post["note"]
                            );
		    return $this->db->update('master_projek',$data, array("id_projek" => $id_projek));
        }

        public function tolak($id){
            $post = $this->input->post();
            $id_projek = $id;
           
            
            
            $data=  array("status" => "5"
                            );
		    return $this->db->update('master_projek',$data, array("id_projek" => $id_projek));
        }

       

        public function delete_($id){
            $this->db->where('id_projek',$id);
            $this->db->delete('master_projek');
        }

        public function getAll(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }
        
        private function _uploadImage()
	{
		$config['upload_path']          =  './assets/dokumen/';
		$config['allowed_types']        = '*';
		$config['max_size']             = 150024;
		
		
		
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		$this->upload->do_upload('dokumen');
			return $this->upload->data("file_name");
		
	}

    
        
    public function jml_baru(){
        return $this->db->query("SELECT count(*) as jml FROM `master_projek` WHERE status = 0;")->row();
    }
    public function jml_jalan(){
        return $this->db->query("SELECT count(*) as jml FROM `master_projek` WHERE status = 1 or status = 2;")->row();
    }
    public function jml_done(){
        return $this->db->query("SELECT count(*) as jml FROM `master_projek` WHERE status = 3;")->row();
    }
    public function cek_progres($id){
        $rata = $this->db->query("SELECT (SELECT count(*) from task where id_projek = '".$id."' and status = '2')/count(*)*100 as rata FROM `task` WHERE id_projek = '".$id."';")->row();
        
        $data=  array("progres_projek" => $rata->rata
        );
        return $this->db->update('master_projek',$data, array("id_projek" => $id));
    }
        
    }
?>