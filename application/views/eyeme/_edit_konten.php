<?php
	// var_dump($value['gambar']);exit();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Edit Konten</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>bs/css/bootstrap4.min.css">

	<style>
	  .cropit-preview {
	    background-color: #f8f8f8;
	    background-size: cover;
	    border: 1px solid #ccc;
	    border-radius: 3px;
	    margin-top: 7px;
	    width: 448px;
	    height: 448px;
	  }

	  .cropit-preview-image-container {
	    cursor: move;
	  }

	  .image-size-label {
	    margin-top: 10px;
	  }

	  input, .export {
	    display: block;
	  }

	  button {
	    margin-top: 10px;
	  }

	  .cropit-preview-background {
	    opacity: .2;
	  }

	  /*
	   * If the slider or anything else is covered by the background image,
	   * use relative or absolute position on it
	   */
	  input.cropit-image-zoom-input {
	    position: relative;
	  }

	  /* Limit the background image by adding overflow: hidden */
	  #image-cropper {
	    overflow: hidden;
	  }
	</style>

	<script src="<?=base_url()?>bs/jquery/jquery-2.0.0.min.js"></script>
	<script src="<?=base_url()?>node_modules/cropit/dist/jquery.cropit.js"></script>
	<script src="<?=base_url()?>node_modules/cropit/dist/pica.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12" style="margin-top: 5%;">
				<div>
			<?php
				foreach ($konten as $value)
				{ 
			?>
					<div class="image-editor">
						<div class="row">
							<div class="col-lg-8 col-md-8">
								<div class="cropit-preview"></div>
							</div>
							<div class="col-lg-4 col-md-4">
								<!-- <input type="file" class="cropit-image-input" name="" value="" placeholder=""> -->
								<span class="image-size-label">
								  	Resize image
								</span>
								<input type="range" class="cropit-image-zoom-input form-control">
								<button class="rotate-ccw btn btn-info">
									Rotate counterclockwise
								</button>
								<br />
								<button class="rotate-cw btn btn-info">
									Rotate clockwise
								</button>
								<button class="export btn btn-info">
									Export
								</button>
								<form action="<?= base_url();?>eyeme/action_post/<?php echo $value['id']; ?>" method="post">
									<div class="form-group">
										<label for="keterangan">Tambahkan Caption</label>
										<textarea name="keterangan" class="form-control" rows="5"></textarea>
									</div>
										<input type="text" name="base" id="base">
									<div class="form-group">
										<input type="submit" name="simpan" class="btn btn-success btn-block">
									</div>
								</form>
								<a href="<?= base_url();?>eyeme/discard_post/<?php echo $value['id']; ?>" class="btn btn-warning btn-block">Batal</a>
							</div>
						</div>
					</div>
					<div class="nih"></div>

					<script type="text/javascript">
						
					  	$(function()
					  	{
					    	$('.image-editor').cropit({
					      		imageState: {
					        		src: "<?php echo base_url(); ?>gambar/<?php echo $value['gambar']; ?>",
					      		},
					      		imageBackground: true,
					      		minZoom: 'fit',
					      		initialZoom: 'image',
					      		smallImage: 'stretch',
					      		maxZoom: 2.5,
					      		imageBackgroundBorderWidth: 80
					    	});

					    	$('.rotate-cw').click(function()
					    	{
					      		$('.image-editor').cropit('rotateCW');
					    	});

					  	 	$('.rotate-ccw').click(function()
					  	 	{
					      		$('.image-editor').cropit('rotateCCW');
					    	});

						    // $('.export').click(function() {
						    //   var imageData = $('.image-editor').cropit('export');
						    //   $('.nih').html(imageData);
						    // });

						    $('.export').click(function()
						    {
						    	var imageData = $('.image-editor').cropit('export', {
						      	type: 'image/jpeg',
						      	quality: .50,
						      	originalSize: true
						    });
						    //console.log(imageData);
						    //$('.nih').html("<img src='"+imageData+"' />");
						    $('#base').val(imageData);
						});
					  });
					</script>
			<?php		
				}
			?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>