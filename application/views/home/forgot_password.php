<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta name="viewport" content="width=1000">
    <link href="<?php echo base_url()?>assets/registration/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/registration/css/bs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.min.css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url();?>bs/jquery/jquery-ui.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="detail-post-box">
        <form class="container frm-login form-forgot">
            <div class="logo-ey m-0">
                <img src="<?php echo base_url()?>assets/registration/img/logo_eyscr.png" alt="">
            </div>
            <div class="mb-30">
                <b>Lupa Password</b>
                <span>Kami akan mengirimkan link untuk membuat password baru.</span>
            </div>

            <div class="frm-login-data m-0">
                <span>Email</span>
                <input name="email" type="email" placeholder="Ketik alamat email" required>

                <div class="container mb-20">
                    <button type="button" class="btn-abu-2" style="width:190px; margin:20px 0; float:left;" onclick="window.location.href = '../home/login';">Cancel</button>
                    <button class="btn-orange-3" style="width:190px; margin:20px 0; float:right;">Kirim</button>
                </div>

            </div>

        </form>
    </div>
    <script>
		$(document).ready(function(){
			$(".form-forgot").submit(function(e) {
				e.preventDefault();
				var formData = $( this ).serialize();
				// console.log(formData);				
				$.ajax({  
					 type: "POST",  
					 url: "<?php base_url()?>../home/forgot_pwd_session",  
					 data: formData,
					 processData: true,
					 beforeSend: function() {
						 console.log('before');
					 }, 
					 complete: function() {
						 console.log('complete');
					 },
					 success: function(data) {
						if(data == 'false'){
							alert('Error. Silahkan coba lagi.');
						}else{
							alert('Email terkirim. Silahkan cek inbox atau spam pada email anda.');
							window.location.href = "../home/index";
						}
					 },
					 error: function(err){
						console.log(err);
						alert(err);
					 }
				}); 
				return false;
			})
			
			$('#username_regis').keypress(function (e) {
				var regex = new RegExp("^[a-zA-Z0-9]+$");
				var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
				if (regex.test(str)) {
					return true;
				}

				e.preventDefault();
				return false;
			});
		});
    </script>
</body>

</html>