	<style>
	*{
        font-family: sans-serif;
    }
	body{
		overflow-y: hidden;
	}
    .head-content{
        text-align: center;
    }
    .full-width{
        width: 100%;
        text-align: center;
        margin-top: 30px;
    }
    .img-radius{
        border: none;
        border-radius: 50%;
        overflow: hidden;
        display: block;
        width: 150px;
        height: 150px;
        margin: 0 auto;
    }
    .img-radius img{
        height: 100%;
    }
    .informasi button, .btn-blue{
        background-color: #4FC3F7;
        color: white;
        padding: 8px 10px;
        border-radius: 5px;
        font-size: .9em;
        display: block;
        max-width: 110px;
        text-align: center;
        margin: 8px 8px 8px 0px;
        float: left;
    }
    .action-menu{
        width: 100%;
        max-width: 450px;
        float: left;
        text-align: left;
    }
    .action-menu .col-1{
        width: 23%;
        max-width: 100px;
        min-width: 50px;
        margin: 1% .1%;
        text-align: center;
        display: inline-block;
    }
    .action-menu img{
        width: 100%;
    }
    .action-menu a{
        text-decoration: none;
        color: #616161;
        font-weight: 100;
    }
    .container{
        width: 30%;
        min-width: 300px;
        padding: 10px;
        float: left;
    }
    .galeri{
        width: 100%;
        float: left;
        overflow-y: scroll;
        overflow-x: hidden;
        max-height: 376px;
    }
    .galeri img{
        width: 30%;
        margin-right: 1%;
        float: left;
        margin-bottom: 5px;
    }
    h2{
        font-size: 2em;
        font-weight: 100;
        text-transform: capitalize;
    }
    .bottom-content{
        display: block;
        float: left;
        width: 100%;
        text-align: center;
    }
    .bottom-content .btn-blue{
        display: inline-block;
        float: unset;
    }
    .informasi{
        width: 90%;
    }
    .informasi span{
        display: block;
        font-weight: 100;
    }
    .informasi input, .informasi textarea{
        display: block;
        min-width: 200px;
        width: 100%;
        /* max-width: 250px; */
        border: 1px solid gainsboro;
        padding: 8px;
        margin: 5px 0px;
        border-radius: 5px;
        background-color: #FAFAFA;
        color: #616161;
        outline: none;
    }
    .full-width .informasi button, .full-width .btn-blue{
        display: inline-block;
        float: unset;
        width: 110px;
        padding: 8px 0px;
    }
	
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 40%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
	.ui-autocomplete {
		 z-index: 9999 !important;
	}
    </style>
	<div class="head-content full-width">
		<form method="POST" action="profile_upload" enctype="multipart/form-data">
			<div class="img-radius">
				<img src="<?=base_url()?>assets/img_storage/<?=$pic?>" alt="" class="blah">
			</div>
			<div class="full-width">
				<label class="btn-blue" style="cursor: pointer;">
					Ganti Foto
					<input id="file_pic" name="pic" type="file" style="display: none;">
				</label>
				<button class="btn-blue" type="submit" class="btn-info btn" id="submit_pic" style="display:none;border: none;cursor: pointer;" >Simpan Foto</button>
				<a href="<?php echo base_url()?>home/logout" style="text-decoration: unset;color: white;">
					<button class="btn-blue" type="reset" style="background-color: #EC407A;border: none;cursor: pointer;">Logout</button>
				</a>
			</div>
			<input class="lat" name="lat" type="hidden"/>
			<input class="lon" name="lon" type="hidden"/>
		</form>
    </div>
    <div class="head-content container">
        <div class="action-menu">
            <h2>Menu</h2>
			<?php
				if($check->num_rows()>0 && $pm["active"]=="1"){
			?>
					<a class="myBtn" onclick="return false;">
						<div class="col-1">
							<img style="width:50px;" src="<?=imgUrl()?>systems/player_storage/<?=$get_player["pic"]?>" alt="" srcset="">
							<span style="color: darkgrey;"><?=$get_player["name"]?></span><br>
							Pemain
						</div>
					</a>
			<?php
				}else{
			?>
					<a onclick="return false;">
						<div class="col-1">
							<img style="width:50px;" src="<?=base_url()?>assets/img/ic_eyeprofile@2x.png" alt="" srcset="">
							Pemain
						</div>
					</a>
			<?php
				}
			?>
			
			<a target="_blank" href="<?php echo base_url()?>eyemarket/pesanan/<?php echo $_SESSION["id_member"]?>">
				<div class="col-1">
					<img style="width:50px;" src="<?=base_url()?>assets/img/ic_eyemarket@2x.png" alt="" srcset="">
					Eyemarket
				</div>
			</a>
			<a target="_blank" href="<?php echo base_url()?>eyeme">
				<div class="col-1">
					<img style="width:50px;" src="<?=base_url()?>assets/img/ic-eyeme@2x.png" alt="" srcset="">
					Eyeme
				</div>
			</a>
        </div>
    </div>
    <div class="container">
        <h2>informasi akun</h2>
        <div class="informasi">
            <form method="POST" action="profile_upload_data">
                <span>Nama Depan</span>
                <input type="text" name="name" id="" value="<?=$profile["name"]?>" required>
                <span>Nama Belakang</span>
                <input type="text" name="fullname" id="" value="<?=$profile["fullname"]?>" required>
                <span>Alamat</span>
                <textarea name="address" id="" cols="30" rows="5" required><?=$profile["address"]?></textarea>
                <span>Tentang Saya</span>
                <textarea name="about" id="" cols="30" rows="5"><?=$profile["about"]?></textarea>
				<button class="btn-blue" type="submit" style="border: none;cursor: pointer;">Ubah Profile</button>
            </form>
        </div>
    </div>
    <div class="container">
        <h2>Galeri</h2>
        <div class="galeri">
			<?php 
				foreach($gallery as $gr)
				{
					$expfoto = explode('-',$gr["thumb1"]);
					$expvideo = explode('-',$gr["video"]);
					if($expfoto[0] == 'foto' || $expfoto[0] == 'profile'){
			?>
						<img src="<?=base_url()?>assets/img_storage/<?=$gr["thumb1"]?>" alt="" srcset="">
			<?php	
					}else if($expvideo[0] == 'video'){
			?>
						<video width="300px" controls>
							<source src="<?=base_url()?>assets/video_storage/<?=$gr["video"]?>" type="video/mp4">
							Your browser does not support HTML5 video.
						</video>
			<?php
					}
			?>
					
			<?php
				}
			?>
        </div>
        <div class="bottom-content">
			<form method="POST" action="foto_upload" enctype="multipart/form-data" style="float: left;margin-left: 25px;">
				<input class="lat" name="lat" type="hidden"/>
				<input class="lon" name="lon" type="hidden"/>
				<label class="btn-blue" style="cursor: pointer;">
					Tambah Foto
					<input id="file_foto" name="add_foto" type="file" style="display: none;" accept="image/*">
				</label>
				<button class="btn-blue" id="add_foto" type="submit" style="display:none">Simpan</button>
			</form>
			<form method="POST" action="video_upload" enctype="multipart/form-data" style="float: right;margin-right: 25px;">
				<input class="lat" name="lat" type="hidden"/>
				<input class="lon" name="lon" type="hidden"/>
				<label class="btn-blue" style="cursor: pointer;">
					Tambah video
					<input id="file_video" name="add_video" type="file" style="display: none;" accept="video/mp4">
				</label>
				<button class="btn-blue" id="add_video" type="submit" style="display:none">Simpan</button>
			</form>
        </div>
    </div>
	<?php
		if($check->num_rows()>0 && $pm["active"]=="1"){
	?>
			<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<div style="height: 400px;overflow-y: scroll;">
						<h2>Informasi Pemain</h2>
						<div class="informasi">
							<span>Nama</span>
							<input type="text" name="name" id="" value="<?=$get_player["name"]?>" disabled>
							<span>Tanggal Daftar</span>
							<input type="text" name="fullname" id="" value="<?=$pm["add_date"]?>" disabled>
							<a target="_blank"href="<?=base_url("eyeprofile/pemain_detail/".$get_player["url"])?>" style="text-decoration: unset;color: white;">
								<button class="btn-blue" style="background-color: #EC407A;border: none;cursor: pointer;">Update</button>
							</a>
							
							<!--<a class="btn-blue" style="float:right;background-color: darkcyan;border: none;cursor: pointer;" onclick="if(confirm(&quot;Apa anda yakin untuk menghapus ?&quot;)) window.location = &quot;<?=base_url("home/batal_daftar_player")?>&quot;"><i class="fa fa-trash-o" aria-hidden="true"></i> Batal Daftar
							</a>-->
						</div>
					</div>
				</div>
			</div>
	<?php
		}else{
	?>
			<div id="myModal" class="modal">
				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>
					<div style="height: 400px;overflow-y: scroll;">
						<h2>Pilih Pemain</h2>
						<div class="informasi">
							<form method="post" action="<?=base_url("home/request_player")?>" id="reg_form_player" enctype="multipart/form-data">
								<input style="width: 98%;" type='text' placeholder="Masukkan nama pemain yang telah terdaftar" name='player_id' value='' class='auto ui-autocomplete-input' autocomplete='off' required style="width:500px;">
								<div id="menu-container" style="position:absolute; width: 500px;"></div>
								<span>KTP/Kartu Pelajar/Kartu Mahasiswa/SIM:</span>
								<input type="file" name="file_ktp" id="file_ktp" accept="image/*" required>
								<span>Akte Lahir:</span>
								<input type="file" name="file_akte" id="file_akte" accept="image/*" required>
								<span>Kartu Keluarga:</span>
								<input type="file" name="file_kk" id="file_kk" accept="image/*" required>
								<span>Passport:</span>
								<input type="file" name="file_passport" id="file_passport" accept="image/*">
								<span>Ijazah:</span>
								<input type="file" class="form-control" name="file_ijazah" id="file_ijazah" accept="image/*" required>
								<span>Buku Rekening:</span>
								<input type="file" class="form-control" name="file_bukurek" id="file_bukurek" accept="image/*">
								<span>Surat Rekomendasi SSB:</span>
								<input type="file" class="form-control" name="file_srtrekssb" id="file_srtrekssb" accept="image/*">
								<span>Nama Ibu Kandung:</span>
								<input type="text" name="file_ibukandung" id="file_ibukandung" required>
								<button class="btn-blue" type="submit" style="border: none;cursor: pointer;">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
	<?php
		}
	?>
	
	<script>
		$(document).ready(function(){
			$(".auto").autocomplete({
				source: "search_player",
				minLength: 3,
				appendTo: '#menu-container'
			});
			var modal = document.getElementById('myModal');
			
			$(".myBtn").click(function(){
				$("#myModal").css('display','block');
			});
			
			$(".close").click(function(){
				$("#myModal").css('display','none');
			});

			// When the user clicks anywhere outside of the modal, close it
			window.onclick = function(event) {
				if (event.target == modal) {
					// modal.style.display = "none";
					$("#myModal").css('display','none');
				}
			}
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						$('.blah').attr('src', e.target.result);
						$("#submit_pic").show();
					}

					reader.readAsDataURL(input.files[0]);
				}
			}
			
			$("#file_pic").change(function(){
				readURL(this);
			});
			
			$("#file_foto").change(function(){
				$("#add_foto").click();
			});
			
			$("#file_video").change(function(){
				$("#add_video").click();
			});
			
			jQuery.get("https://ipinfo.io", function (response)
			{
			   lats = response.loc.split(',')[0]; 
			   lngs = response.loc.split(',')[1];
			   $(".lat").val(lats);
			   $(".lon").val(lngs);

			}, "jsonp");

		})
	</script>