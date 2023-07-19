<?php 
        $outgoing_id = $this->session->userdata('user')->id_user;
        if(mysqli_num_rows($query) > 0){

            foreach($chat as $key=>$value){

                if($value->out_msg === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $value->isi_chat .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="'.echo base_url().'/assets/profil/'.$value->img.'" alt="">
                                <div class="details">
                                    <p>'.$value->isi_chat .'</p>
                                </div>
                                </div>';
                }
            }
           
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    

?>