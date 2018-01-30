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
    <div class="detail-post-box" style="overflow:auto;">
        <div class="container frm-login">
            <div class="logo-ey m-0">
                <img src="<?php echo base_url()?>assets/registration/img/logo_eyscr.png" alt="">
            </div>
            <div class="mb-30">
                <b>Selamat datang di EyeSoccer.id</b>
                <span>Semua berita terlengkap tentang tim favoritmu ada disini</span>
            </div>

            <div class="log-reg m-0" style="margin-bottom:20px !important;">
                <span class="active" style="cursor:pointer;">Masuk</span>
                <span class="deactive" style="cursor:pointer;">Daftar</span>
            </div>

            <div class="container">
				<!--<form class="form-login" action="<?// = base_url(); ?>home/login_session" method="post">-->
				<form class="form-login">
                    <div class="frm-login-data m-0">
                        <span>Email</span>
                        <input name="username" type="text" placeholder="Ketik alamat email" required>
                        <span>Password</span>
                        <input name="password" type="password" placeholder="Ketik password" required>
						<input type="hidden" name="page" class="form-login-redirect"/>
                        <div class="container">
                            <a href="<?php echo base_url()?>home/forgot_password">Lupa password?</a>
                        </div>
                        <button class="btn-orange-3" style="width:100%; margin:20px 0;">MASUK</button>
                        <div class="container tx-c">
                            <table>
                                <tr>
                                    <td>
                                        <div class="bbg"></div>
                                    </td>
                                    <td>
                                        <span class="a-">Atau menggunakan</span>
                                    </td>
                                    <td>
                                        <div class="bbg"></div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="container mb-10">
                            <div class="fl-l">
                                <a href="">
                                    <div class="log-fb">
                                        <img src="<?php echo base_url()?>assets/registration/img/fb_logo.png" alt="">
                                        <span>Facebook</span>
                                    </div>
                                </a>
                            </div>
                            <div class="fl-r">
                                <a href="">
                                    <div class="log-g">
                                        <img src="<?php echo base_url()?>assets/registration/img/google_g_logo.svg" alt="">
                                        <span>Google</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="form-signup">
                    <div class="frm-login-data m-0">
						<span>Username</span>
                        <input name="username" id="username_regis" type="text" placeholder="Username (text and number, ex: Eyesoccer26)" required>
                        <span>Nama</span>
                        <input name="name" id="name_regis" type="text" placeholder="Ketik nama lengkap" required>
                        <span>Email</span>
                        <input name="email" id="email_regis" type="email" placeholder="Ketik alamat email" required>
                        <span>Password</span>
                        <div>
                            <input name="password" id="password_regis" type="password" placeholder="Ketik password" value="" required>
                            <!-- <i class="show-pass fa fa-eye sh" id="pass_user" aria-hidden="true" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></i> -->
                            <!-- <i class="fa fa-eye-slash sh2" aria-hidden="true"></i> -->
                        </div>
						<span>Konfirmasi Password</span>
                        <div>
                            <input name="conf_password" id="conf_password_regis" type="password" placeholder="Ketik password" value="" required>
                        </div>
                        <div class="container fl-l">
                            <input name="term" id="term_regis" type="checkbox" class="icb" required>
                            <div class="container icb2 mb-10">
                                <ul>
                                    <li><span>Saya telah membaca dan menyetujui</span></li>
                                    <li><a href="">Ketentuan dan Kebijakan Privasi</a></li>
                                    <li><span>EyeSoccer.id</span></li>
                                </ul>
                                <!-- Saya telah membaca dan menyetujui <a href="">Ketentuan dan Kebijakan Privasi</a> EyeSoccer.id -->
                            </div>
                        </div>
                        <button class="btn-orange-3" style="width:100%; margin:20px 0 30px;">DAFTAR</button>

                    </div>
                </form>
            </div>

        </div>
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
			var tech = getUrlParameter('page');
			$(".form-login-redirect").val(tech);
			console.log(tech);
			
			$(".form-login").submit(function(e) {
				e.preventDefault();
				var formData = $( this ).serialize();
				$.ajax({  
					 type: "POST",  
					 url: "<?php base_url()?>../home/login_session",  
					 data: formData,
					 async: false,
					 cache: false,
					 processData: true,
					 beforeSend: function() {
						 console.log('before');
					 }, 
					 complete: function() {
						 console.log('complete');
					 },
					 success: function(data) {
						// alert(data);
						console.log(data);
						if(data==''){
							window.location.href = "../home/index";
						}else if(data=='false'){
							alert('Email atau Password salah');
						}else{
							window.location.href = "../"+data;
						}
					 },
					 error: function(err){
						console.log(err);
						alert(err);
					 }
				}); 
				return false;
			})
			
			$(".form-signup").submit(function(e) {
				e.preventDefault();
				var formData = $( this ).serialize();
				// console.log(formData);				
				$.ajax({  
					 type: "POST",  
					 url: "<?php base_url()?>../home/regis_session",  
					 data: formData,
					 processData: true,
					 beforeSend: function() {
						 console.log('before');
						 if ($('#term_regis').is(':checked')) {
							// alert('checked');
						}else{
							alert('Silahkan centang menyetujui Ketentuan dan Kebijakan Privasi EyeSoccer.id');
							return false;
						}
						
						if($('#password_regis').val() != $('#conf_password_regis').val()){
							alert('Konfirmasi password tidak sama.');
							return false;
						}
					 }, 
					 complete: function() {
						 console.log('complete');
					 },
					 success: function(data) {
						// alert(data);
						// console.log(data);
						if(data=='true'){
							alert('Registrasi berhasil, silahkan cek inbox atau spam pada email anda.');
							window.location.href = "../home/index";
						}else if(data=='false'){
							alert('Registrasi gagal, email tidak valid.');
						}else if(data=='exist username'){
							alert('Username sudah terpakai');
						}else if(data=='exist'){
							alert('Email sudah terpakai');
						}else{
							// alert(data);
							alert(data);
							// window.location.href = "../home/index";
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
        var active = document.getElementsByClassName("active")[0];
        var deactive = document.getElementsByClassName("deactive")[0];
        var f_login = document.getElementsByClassName("form-login")[0];
        var f_signup = document.getElementsByClassName("form-signup")[0];
        deactive.onclick = function () {
            active.style.backgroundColor = "unset";
            active.style.color = "black";
            deactive.style.backgroundColor = "orange";
            deactive.style.color = "white";
            f_login.style.display = "none";
            f_signup.style.display = "block";
        }
        active.onclick = function () {
            active.style.backgroundColor = "orange";
            active.style.color = "white";
            deactive.style.backgroundColor = "unset";
            deactive.style.color = "black";
            f_login.style.display = "block";
            f_signup.style.display = "none";

        }
    </script>
</body>

</html>