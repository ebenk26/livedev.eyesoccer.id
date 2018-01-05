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
				<a href="<?php echo base_url()?>">
					<img src="<?php echo base_url()?>assets/registration/img/logo_eyscr.png" alt="">
				</a>
            </div>
            <div class="mb-30">
                <b>Ubah Password</b>
                <span>Silahkan ubah password anda.</span>
            </div>

            <div class="frm-login-data m-0">
                <span>Password</span>
                <input name="password" type="password" id="password" required>
				<span>Konfirm Password</span>
                <input name="conf_password" type="password" id="conf_password" required>
                <input name="unique_code" type="hidden" id="unique_code">

                <div class="container mb-20">
                    <button class="btn-orange-3" style="width:190px; margin:20px 0;">Kirim</button>
                </div>

            </div>

        </form>
    </div>
    <script>
		$(document).ready(function(){
			var getUrlParameter = function getUrlParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					sURLVariables = sPageURL.split('&'),
					sParameterName,
					i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
			};
			var tech = getUrlParameter('ver');
			$("#unique_code").val(tech);
			console.log(tech);
		
			$(".form-forgot").submit(function(e) {
				e.preventDefault();
				var formData = $( this ).serialize();
				// console.log(formData);				
				$.ajax({  
					 type: "POST",  
					 url: "<?php base_url()?>forgot_ver/change_password",  
					 data: formData,
					 processData: true,
					 beforeSend: function() {
						 console.log('before');
						 if($('#password').val() != $('#conf_password').val()){
							alert('Konfirmasi password tidak sama.');
							return false;
						}
					 }, 
					 complete: function() {
						 console.log('complete');
					 },
					 success: function(data) {
						if(data == 'false'){
							alert('Error. Url tidak valid');
						}else{
							// alert(data);
							alert('Password telah berhasil dirubah, silahkan login.');
							window.location.href = "/home/index";
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