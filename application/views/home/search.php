<div style="width: 1065px;margin: auto;text-align: center;margin-top: 150px;">Search Query : <?php echo $_GET['q']?></div>
<div class="center-desktop m-t-35" style="margin: auto;">
	<img class="img-title" src="<?php echo base_url(); ?>assets/img/ic_eyenews.png" alt="">
	<h2 class="title en">EyeNews</h2>
	result : <?php echo count($eyenews)?>
	<hr class="x-en" style="width: 890px;top: -41px;left: 173px;">
	<?php
		foreach ($eyenews as $value)
		{
	?>
		<div>
			<a href="<?php echo base_url()?>eyenews/detail/<?php echo $value->url?>"><?php echo str_replace(array($_GET["q"],ucwords($_GET["q"]),strtoupper($_GET["q"]),strtolower($_GET["q"])),'<span style="background-color:yellow;">'.$_GET["q"].'</span>',$value->title)?></a><br>
			<?php echo strip_tags(word_limiter($value->description,25));?>
		</div>
		<hr>
	<?php
		}
	?>
</div>
<div class="center-desktop m-t-35" style="margin: auto;">
	<img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyetube.png" alt="">
	<h2 class="title et">EyeTube</h2>
	result : <?php echo count($eyetube)?>
	<hr class="x-et">
	<?php
		foreach ($eyetube as $value)
		{
	?>
		<div>
			<a href="<?php echo base_url()?>eyetube/detail/<?php echo $value->url?>"><?php echo str_replace(array($_GET["q"],ucwords($_GET["q"]),strtoupper($_GET["q"]),strtolower($_GET["q"])),'<span style="background-color:yellow;">'.$_GET["q"].'</span>',$value->title)?></a><br>
			<?php echo strip_tags(word_limiter($value->description,25));?>
		</div>
		<hr>
	<?php
		}
	?>
</div>
<div class="carous center-desktop m-t-35" style="margin: auto;margin-left: 8px;">
	<img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyeprofile.png" alt="">
	<h2 class="title ep">EyeProfile</h2>
	Result : <?php echo count($player)+count($club)?>
	<hr class="x-ep">
	<?php
		foreach ($player as $value)
		{
	?>
		<div>
			<div class="box-img-radius" style="float: left;width: 50px;top: -8px;height: 55px;left: 0;padding: 10px;box-shadow: 3px 4px 5px #888888;margin-right: 20px;">
				<img src="<?php echo imgUrl()?>systems/player_storage/<?php echo $value->pic?>">                
			</div>
			<a href="<?php echo base_url()?>eyeprofile/pemain_detail/<?php echo $value->url?>"><?php echo str_replace(array($_GET["q"],ucwords($_GET["q"]),strtoupper($_GET["q"]),strtolower($_GET["q"])),'<span style="background-color:yellow;">'.$_GET["q"].'</span>',$value->name)?></a>
			<br>
			Posisi : <?php echo $value->position;?>
			<br>
			No. Punggung: <?php echo $value->number;?>
			<br>
			Klub : <?php echo $value->club;?>
		</div>
		<hr>
	<?php
		}
	?>
	
	<?php
		foreach ($club as $value)
		{
	?>
		<div>
			<div class="box-img-radius" style="float: left;width: 50px;top: -8px;height: 55px;left: 0;padding: 10px;box-shadow: 3px 4px 5px #888888;margin-right: 20px;">
				<img src="<?php echo imgUrl()?>systems/club_logo/<?php if(!empty($value->logo)){echo $value->logo;}else{echo 'LOGO UNTUK APLIKASI.jpg';}?>">                
			</div>
			<a href="<?php echo base_url()?>eyeprofile/klub_detail/<?php echo $value->url?>"><?php echo str_replace(array($_GET["q"],ucwords($_GET["q"]),strtoupper($_GET["q"]),strtolower($_GET["q"])),'<span style="background-color:yellow;">'.$_GET["q"].'</span>',$value->name)?></a>
			<br>
			Alamat : <?php echo strip_tags($value->address);?>
			<br>
			Stadion : <?php echo strip_tags($value->stadium);?>
		</div>
		<hr>
	<?php
		}
	?>
</div>