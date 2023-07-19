<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BRK</title>
  <link href="<?php echo base_url()?>assets/css/Buat_chat.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        
        <a href="<?php echo site_url('projek/show_/'.$projek->id_projek) ?>" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="<?php echo base_url()?>assets/profil/default.jpg" alt=""/>
        <div class="details">
          <span><?php echo $projek->judul ?></span>
          <p>Group Chat</p>
        </div>
      </header>
      <div class="chat-box" id="letakpesan">
     
      </div>
      <form action="#" class="typing-area">
     
      
        <input type="text" name="pesan" class="input-field type_msg" placeholder="Type a message here..." autocomplete="off">
        <button class="send_btn"><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>

  <script>
	

		pesan()

		function pesan() {
			var id_projek = '<?php echo $projek->id_projek ?>'
			var id_lawan = '<?php echo $projek->id_projek ?>'
      var aku = '<?php echo $this->session->userdata('user')->id_user  ?>'
			$.ajax({
				
				url: "<?php echo base_url()?>index.php/chat/get_chat_group",
        method: 'post',
				data: {
					id_user: aku,
					id_lawan: id_lawan,
					id_projek: id_projek
				},
				dataType: "json",
				success: function(r) {
					var html = "";
					var d = r.data;
					id_user = aku;
					d.forEach(d => {
						
						
						// console.log(kapan)
						if (parseInt(d.out_msg) == id_user) {




							html += `<div class="chat outgoing">
                                <div class="details">
                                    <p>${d.isi_chat}</p>
                                </div>
                                </div>`;
            

						} else {
							html += `<div class="chat incoming">
							
                                <img src="<?php echo base_url()?>assets/profil/${d.img}" alt="">
								
                                <div class="details">
								&nbsp  &nbsp ${d.nama}
                                    <p>${d.isi_chat}</p>
                                </div>
                                </div>`;


						}

					});
					// console.log(html)
					$('#letakpesan').html(html);

				}
			});
		}
    setInterval(() => {
			pesan()
		}, 1000);



    $('.send_btn').click(function(e) {
			var pesan = $('.type_msg').val();
			var id_lawan = '<?php echo $this->session->userdata('user')->id_user  ?>'
      		var id_user = '<?php echo $this->session->userdata('user')->id_user  ?>'
			var id_projek = '<?php echo $projek->id_projek ?>'
			if (pesan != "") {
				$.ajax({
					type: "post",
					url: "<?php echo base_url()?>index.php/Chat/kirimPesanGroup",
					data: {
						id_user,
						id_lawan,
						pesan,
						id_projek
					},
					dataType: "json",
					success: function(r) {
						if (r.status) {
							$('.search_btn').trigger('click');
							$('.type_msg').val('');
							scrollToBottom()

						}

					}
				});
			}


		});
    
    scrollToBottom()

		function scrollToBottom() {
			$("#letakpesan").animate({
				scrollTop: 200000000000000000000000000000000
			}, "slow");
		}
</script>

</body>
</html>