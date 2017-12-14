<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>EyeMe</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/fa/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/responsive.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/bootstrap4.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/croppic.css"> -->

	<style type="text/css">
		.fade.in {
		  opacity: 1;
		}
		.modal.in .modal-dialog {
		  -webkit-transform: translate(0, 0);
		  -o-transform: translate(0, 0);
		  transform: translate(0, 0);
		}

		.modal-backdrop .fade .in {
		  opacity: 0.5 !important;
		}


		.modal-backdrop.fade {
		    opacity: 0.5 !important;
		}

		.content-addFriend
		{
			margin-top: 15%;
			/*margin-left: 120%;*/
		}

		.bottom-sticky-shopping
		{
			text-align: center;
		    background-color: rgba(0,0,0,.3);
		    position: fixed;
		    right: 0;
		    left: 0;
		    z-index: 1030;
		}

		.navbar-fixed-bottom
		{
		    bottom: 0;
		    margin-bottom: 0;
		    border-width: 1px 0 0;
		}

		.loading-eyeme{display:none;position: fixed;top: 0;left: 0;height: 100%;width: 100%;background: url('/assets/img/ajax-loader.gif') 50% 50% no-repeat;
	</style>

</head>
<body style="background-color: #fbf9f9;">
	
	<div class="logo">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
				<h1 class="text-center" style="padding-bottom: 14px;">EyeMe</h1>
			</div>
		</div>
	</div>

	<!-- <div class="alert alert-success">
		<?php /* echo $this->session->flashdata('message'); */?>
	</div> --> 

	<!-- <a href="/eyeme/tesEmail" class="btn btn-info">Coba kirim email</a> -->

	<?php 
		$user_login = $this->session->userdata('member_id'); 
		if ($user_login != NULL)
		{ 
			echo 'id anda : '.$user_login;
	?>
			<a href="logout">
				Logout
			</a>
	<?php
		}
		else
		{
	?>
			<a class="btn btn-info" aria-hidden="true" data-toggle="modal" data-target="#modalLogin" style="cursor: pointer;">
				<span style="font-size: 32px;">Login</span> <?php
				//var_dump($this->session->userdata('member_id'));
				echo $user_login;
			?>
			</a>
	<?php		
		}
	?>
	
	<br>

	<!-- Modal Login -->
	<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content">
	    		<div class="modal-header">
	    		    <h5 class="modal-title">Login</h5>
    		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    		        	<span aria-hidden="true">&times;</span>
	    		    </button>
    			</div>
	        	<form action="login" method="post" accept-charset="utf-8">
			      	<div class="modal-body">
			        		<div class="form-group">
			        			<label for="">Username</label>
			        			<input type="text" name="username" class="form-control">
			        			<label for="">Password</label>
			        			<input type="password" name="password" class="form-control">
			        		</div>
			        	
			      	</div>
			      	<div class="modal-footer">
			      		<input type="submit" class="btn btn-info" value="Login">
			      	</div>
		      	</form>
	    	</div>
	  	</div>
	</div>
	<!-- end Modal Login -->

<?php 
	if ($user_login != NULL)
	{
		foreach ($konten as $value)
		{ 
?>
			<!-- satu konten -->
			<div class="tepi">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
						<img data-original="<?= base_url();?>/systems/gambar/<?php echo $value['foto']; ?>" id="lazy" class="rounded-circle foto-profile lazy">
						<span class="user-name">
							<strong><?php echo $value['name']; ?></strong>
						</span>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 col-lg-6">
						<div class="row">		
<?php 
						if ($value['id_member'] != $user_login)
						{ 
							$teman = $this->Eyeme_model->friends($user_login);
							// var_dump($teman);exit();
?>
							<div class="col-lg-5 col-md-5"></div>
<?php
							if (!empty($teman))
							{
								foreach ($teman as $berteman) 
								{
									if ($value['id_member'] == $berteman['id_diajak'])
									{
?>
										<a aria-hidden="true" data-toggle="modal" data-target="#modalUnFriend" style="cursor: pointer;">
											<div class="col-lg-1 col-md-1">
												<div class="content-addFriend">
													<i class="fa fa-users fa-3x"></i>
												</div>
											</div>
										</a>
<?php
									}
									else
									{
?>
										<a aria-hidden="true" data-toggle="modal" data-target="#modalAddFriend" style="cursor: pointer;">
											<div class="col-lg-1 col-md-1">
												<div class="content-addFriend">
													<i class="fa fa-user-plus fa-3x"></i>
												</div>
											</div>
										</a>

										<!-- Modal Add Friend -->
										<div class="modal fade" id="modalAddFriend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										  	<div class="modal-dialog" role="document">
										    	<div class="modal-content">
											      	<div class="modal-body">
											        	<ul class="list-group">
											        	  	<li class="list-group-item">Tambahkan sebagai teman?</li>
											        	</ul>
											      	</div>
											      	<div class="modal-footer">
											      		<a class="btn btn-info" href="/eyeme/add_friend/<?= $value['id_member']; ?>" >Ya!</a>
											      	</div>
										    	</div>
										  	</div>
										</div>
										<!-- end Modal Add Friend -->
<?php			
									}	
								}
							}
							else
							{
?>
								<a aria-hidden="true" data-toggle="modal" data-target="#modalAddFriend" style="cursor: pointer;">
									<div class="col-lg-1 col-md-1">
										<div class="content-addFriend">
											<i class="fa fa-user-plus fa-3x"></i>
										</div>
									</div>
								</a>
								<!-- Modal Add Friend -->
								<div class="modal fade" id="modalAddFriend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  	<div class="modal-dialog" role="document">
								    	<div class="modal-content">
									      	<div class="modal-body">
									        	<ul class="list-group">
									        	  	<li class="list-group-item">Tambahkan sebagai teman?</li>
									        	</ul>
									      	</div>
									      	<div class="modal-footer">
									      		<a class="btn btn-info" href="/eyeme/add_friend/<?= $value['id_member']; ?>" >Ya!</a>
									      	</div>
								    	</div>
								  	</div>
								</div>
								<!-- end Modal Add Friend -->
<?php		
							}
?>		
							<a aria-hidden="true" data-toggle="modal" data-target="#modalReport" style="cursor: pointer;">
								<div class="col-lg-1 col-md-1">
									<div class="content-bars">
										<i class="fa fa-angle-down fa-3x"></i>
									</div>
								</div>
							</a>
<?php		
						} 
?>
						</div>

						<!-- Modal UnFriend -->
						<div class="modal fade" id="modalUnFriend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog" role="document">
						    	<div class="modal-content">
							      	<div class="modal-body">
							        	<ul class="list-group">
							        	  	<li class="list-group-item">Anda sudah berteman sejak <?= $value['created_date']; ?></li>
							        	</ul>
							      	</div>
							      	<div class="modal-footer">
							      		<a class="btn btn-warning" href="/eyeme/unfriend/<?= $value['id_member']; ?>" >Berhenti Berteman?</a>
							      	</div>
						    	</div>
						  	</div>
						</div>
						<!-- end Modal UnFriend -->

						<!-- Modal Lapor -->
						<div class="modal fade bd-example-modal-lg" id="modalReport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog modal-lg" role="document">
						    	<div class="modal-content">
							      	<div class="modal-body">
							        	<ul class="list-group">
							        	  	<li class="list-group-item">Laporkan Postingan Ini</li>
							        	</ul>
							      	</div>
							      	<div class="modal-footer">
							      		<button type="button" class="btn btn-info">Ya!</button>
							      	</div>
						    	</div>
						  	</div>
						</div>
						<!-- end Modal Lapor -->

					</div>
				</div>
<?php
			if (isset($value['base']))
			{
?>
				<img data-original="<?= base_url();?>/gambar/<?php echo $value['base']; ?>" alt="" id="lazy" class="conten-image lazy">
<?php		
			}
			else
			{
?>
				<img data-original="<?= base_url();?>/gambar/<?php echo $value['gambar']; ?>" alt="" id="lazy" class="conten-image lazy">
<?php		
			}
?>		
				<div class="content-like-com">
					<span class="content-count-like" id="content-like-<?php echo $value['id']; ?>"><?php echo $value['suka']; ?> suka</span>
					<i class="icon-heart content-like" id="btn-like-<?php echo $value['id']; ?>" onclick="addLike('<?php echo $value['id']; ?>')" style="cursor: pointer;"></i>
					<i class="icon-bubble conten-comment" aria-hidden="true"></i>
				</div>
				<div class="content-description">
					<div class="content-desc-username">
						<strong><?php echo $value['name']; ?></strong>
					</div>
					<div class="content-desc-text">
						<?php
							$this->load->helper('my');
							echo word_limiter($value['keterangan'],4,'...');
						?>
					</div>
					<br>
<?php
			$komentar = $this->Eyeme_model->get_komentar($value['id']);
		
			if (isset($komentar))
			{
				if (count($komentar) > 1)
				{
?>
					<span class="content-another-comment">lihat semua komentar</span>
<?php				
				}

				foreach ($komentar as $komentarnya)
				{
?>
					<br />
					<div class="content-desc-username">
						<strong>
						<?php
							$this->load->model('Eyeme_model');
							$nama_komentar = $this->Eyeme_model->get_member($komentarnya['id_member']);
							echo $nama_komentar[0]->name;
						?>
						</strong>
						<?php
								// $this->load->helper('my');
								// echo word_limiter($komentarnya->isi);
							// echo $komentarnya['isi'];
						?>
						<span><?= $komentarnya['isi'];?></span>
					</div>
	<?php			
				}	
			}
	?>	
				<br>
				<div class="loading-eyeme"></div>
				<div id="new-komen-<?php echo $value['id']; ?>"></div>
				</div>
				<br>
				<div class="field-comment" id="text-komen-<?php echo $value['id']; ?>">
					<input type="text" name="isi" placeholder="Tambahkan komentar" onkeypress="addKomen(event,'text-komen-<?php echo $value['id']; ?>')" class="form-control" id="add-komen<?php echo $value['id']; ?>">
					<input type="hidden" id="hidden-id-eyeme" value="<?php echo $value['id']; ?>">
				</div>
			</div>
			<!-- end satu konten -->
	<?php		
		}
	}
	?>

	<footer>
		<div class="row">
			<div class="navbar navbar-fixed-bottom bottom-sticky-shopping">
				<div class="col-lg-3 col-md-3"></div>
				<div class="col-lg-6 col-md-6">
					<a id="btn-start-shopping" class="btn btn-warning" href="#">
						<i class="fa fa-users"></i>
					</a>
					<a id="btn-start-shopping" class="btn btn-warning" href="/<?php echo $this->uri->uri_string(); ?>">
						<i class="fa fa-globe"></i>
					</a>
					<!-- <a id="btn-start-shopping" class="btn btn-warning" data-toggle="modal" data-target="#modalCropit"> -->
				
				<?php 
					if ($user_login != NULL)
					{
				?>
						<form action="<?php echo base_url();?>eyeme/upload_foto" method="post" enctype="multipart/form-data" style="display: inline;">
							<div class="fileUpload btn btn-warning">
								<span><i class="fa fa-camera"></i></span>
								<input class="upload" type="file" name="berkas" id="imgInp" onchange="this.form.submit()"/>
							</div>
						</form>
				<?php		
					} 
					else
					{
				?>
						<div class="fileUpload btn btn-warning" data-toggle="modal" data-target="#modalLogin">
							<span><i class="fa fa-camera"></i></span>
						</div>
				<?php		
					}
				?>
					
					<a id="btn-start-shopping" class="btn btn-warning" href="#">
						<i class="fa fa-info-circle"></i>
					</a>
					<a id="btn-start-shopping" class="btn btn-warning" href="#">
						<i class="fa fa-user"></i>
					</a>
				</div>
				<div class="col-lg-3 col-md-3"></div>
			</div>
		</div>
	</footer>

	<script src="<?=base_url()?>bs/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>bs/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>node_modules/jquery-lazyload/jquery.lazyload.js"></script>

	<script type="text/javascript">
		$(document).ready(function()
		{
			$('img').lazyload({
				threshold : 200,
				effect: 'fadeIn'
			});
		});

	    function addKomen(e,id)
	    {
	        if(e.which === 13)
	        {
	     		var id_user 	= <?php echo $user_login; ?>;
	     		var id_eyeme	= $('#'+id+' > #hidden-id-eyeme').val();
	     		var isi 		= $('#'+id+' > input[name=isi]').val();

	     		$.ajax({
	     			url: '/Eyeme/addKomentar',
	     			type: 'POST',
	     			data: {id_user:id_user,id_eyeme:id_eyeme,isi:isi},
	     			dataType:"json",
	     			beforeSend:function(){
	     				$('.loading-eyeme').show();
	     			}
	     		})
	     		.done(function(result) {
	     			setTimeout(function(){
	     				$('.loading-eyeme').hide();
	     				$('#new-komen-'+id_eyeme).append('<div><strong>'+result.name+'</strong> '+result.isi+'</div>');
	     				$('#'+id+' > input[name=isi]').val('');
	     			},1000);
	     		})
	     		.fail(function() {
	     			console.log("error");
	     		})
	     		.always(function() {
	     			console.log("complete");
	     		});
	        }
	    }

	    function addLike(id)
	    {
	    	var id_user 	= <?php echo $user_login; ?>;
	    	var id_eyeme 	= id;
	    	
	    	$.ajax({
	    		url: '/Eyeme/addLike',
	    		type: 'POST',
	    		data: {id_user:id_user,id_eyeme:id_eyeme},
	    		dataType: 'json',
	    	})
	    	.done(function(result) {
	    		$('#btn-like-'+id).attr('style', 'color:red');
	    		$('#content-like-'+id).html(result.banyak_suka+' suka');
	    	})
	    	.fail(function() {
	    		console.log("error");
	    	})
	    	.always(function() {
	    		console.log("complete");
	    	});
	    	
	    }

	    function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#blah').attr('src', e.target.result);
	            }

	            reader.readAsDataURL(input.files[0]);
	        }
	    }

	    // $("#imgInp").change(function(){
	    //     readURL(this);
	    // });
	</script>
</body>
</html>
