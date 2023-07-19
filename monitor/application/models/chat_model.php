<?php
    class chat_model extends CI_Model{
       
    
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
        

       

        public function delete_user($id){
           
            return $this->db->update('supplier',array("hapus" => "1"), array("id_supplier" => $id));
        }

        public function get_chat(  $id_user, $id_lawan, $id_projek){
          
            $outgoing_id = $id_user;
            $incoming_id =  $id_lawan;
            

            return $this->db->query("SELECT * FROM chat LEFT JOIN user ON user.id_user = chat.out_msg
                WHERE ((out_msg = ".$outgoing_id." AND in_msg = ".$incoming_id.")
                OR (out_msg = ".$incoming_id." AND in_msg = ".$outgoing_id."))
                AND id_projek =  ".$id_projek." ORDER BY id_chat")->result();
            
                
        }

        public function get_chat_group($id ){
          
          
            

            return $this->db->query("SELECT c.out_msg as out_msg, c.in_msg as in_msg, c.isi_chat as isi_chat, 
                                            u.complete_name as nama, u.img as img 
                                    FROM chat as c, user as u WHERE c.out_msg = u.id_user and c.id_grup = '".$id."';")->result();
            
                
        }

        public function getOne(){
            return $this->db->query("Select daftar, ujian, hasil, bayar, ma, mts, tahfidz  from batas")->row();
        }

        public function kirimPesan($in)
        {
            $this->db->insert('chat', $in);
                
            # code...
        }

        public function sudah($outgoing_id, $incoming_id, $id_projek){

          
            $data=  array("status" => "1"
                            );
            $this->db->where("out_msg = '".$outgoing_id."'");
            $this->db->where("in_msg = '".$incoming_id."'");
            $this->db->where("id_projek = '".$id_projek."'");
		    $this->db->update('chat',$data);
           
        }
        
        
        
        
    }
?>