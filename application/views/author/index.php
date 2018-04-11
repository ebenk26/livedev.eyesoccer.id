<style>
<style>
.fixed-header {
    top: 0px;
}
body{
	margin-top: -10px;
}
</style>

<div class="center-desktop">


<div id="Autthopage";>
	<?php 
	foreach ($admin as $ad)
	{
	?>
	<?php 
		$kanal  = "author";
		$page =$ad['fullname'];
		echo set_breadcrumb($kanal,$page);
	?>
	<div class="container author-style">
		<div class="container author-pic">
				<img src="<?=base_url()?>assets/img/eyesoccer logo_001.png" alt="profil foto">                        
		</div>
		<h1 class="container author-name"><?= $ad['fullname']; ?></h1>
		<div class="auth-line"></div>
		<?php
			}
		?>
	</div>

	<div id="Statistik" class="container">
	<span class="auth-details"> Statistik <?= $ad['fullname']; ?></span>
	
		<div id="bodystat">
				<table class="tbl-author">
					<tr>
						<td>
						Jumlah Post
						</td>
	<?php 
		foreach ($totalpost as $tp)
		{
	?>					<td>
							<?=$tp['total'];?>
						</td>
	<?php
	}
	?>
						<!-- <td>
							post
						</td> -->
					</tr>

					<tr>
						<td>
						Total Viewers
						</td>
	<?php 
	foreach ($totalpost as $tp)
	{
	?>					<td>
						<?=$tp['totalviews'];?>
						</td>
	<?php
	}
	?>
						<!-- <td>
							viewers
						</td> -->
					</tr>
					<tr>
						<td>
						Rata-rata Viewers / Post
						</td>
	<?php 
	foreach ($totalpost as $tp)
	{
		$tp['rateview']=(($tp['totalviews'])/$tp['total']);
	?>					<td>
						<?=ceil($tp['rateview']);?>
						</td>
	<?php
	}
	?>
						<!-- <td>
							viewers
						</td> -->
					</tr>
					<tr>
						<td>
						Viewers 500 - 1000
						</td>
	<?php 
	foreach ($total500 as $tp500)
	{
	?>					<td>
						<?=$tp500['total'];?>
						</td>
	<?php
	}
	?>
						<!-- <td>
							post
						</td> -->
					</tr>
					<tr>
						<td>
						Viewers > 1000
						</td>
	<?php 
	foreach ($total1000 as $tp1000)
	{
	?>					<td>
						<?=$tp1000['total'];?>
						</td>
	<?php
	}
	?>
						<!-- <td>
							post
						</td> -->
					</tr>
					
				</table>
		</div>
	</div>
	<div id="lastnews" class="container redhover mt-53">
	<span class="auth-details">EyeNews Terbaru oleh <?= $ad['fullname']; ?></span>
	<div class="bb1g"></div>
		<div class="center-desktop m-0">
		<div class="m-0">
			<div class="container mt-20">
			<?php
				$this->load->helper('my');
				foreach ($lastnews as $lastnews)
				{
				?>
					<div class="w4">
					<a href="<?php echo base_url(); ?>eyenews/detail/<?= $lastnews['url'];?>">
						<div class="w4-f">
						<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $lastnews['thumb1']; ?>" style="width:100%;margin-right:20px;" alt="<?= $lastnews['title']; ?>" title="<?= $lastnews['title']; ?>">
						</div>
						<p class="sub-en"><?= $lastnews['title']; ?> </p>
						<span class="time-view">
						<?php
							$date 		=  new DateTime($lastnews['publish_on']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							$real_time = relative_time($tanggal);
							
							echo relative_time($tanggal) . ' lalu - '.$lastnews['news_view'].' views';
						?>								
						</span>
					</a>
					</div>
				<?php
				}
			?>
			<!--<div class="pagging-enews-home"><?php // echo $pagging['pagging'];?></div>-->
			</div>
		</div>
		
		</div>
	</div>


	<div id="populernews" class="container redhover mt-53">
	<span class="auth-details">EyeNews Terpopuler oleh <?= $ad['fullname']; ?></span>
	<div class="bb1g"></div>
		<div class="center-desktop m-0">
		<div class="m-0">
			<div class="container mt-20">
			<?php
				$this->load->helper('my');
				foreach ($popnews as $pop)
				{
				?>
					<div class="w4">
					<a href="<?php echo base_url(); ?>eyenews/detail/<?= $pop['url'];?>">
						<div class="w4-f">
						<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $pop['thumb1']; ?>" style="width:100%;margin-right:20px;" alt="<?= $pop['title']; ?>" title="<?= $pop['title']; ?>">
						</div>
						<p class="sub-en"><?= $pop['title']; ?> </p>
						<span class="time-view">
						<?php
							$date 		=  new DateTime($pop['publish_on']);
							$tanggal 	= date_format($date,"Y-m-d H:i:s");
							$real_time = relative_time($tanggal);
							
							echo relative_time($tanggal) . ' lalu - '.$pop['news_view'].' views';
						?>								
						</span>
					</a>
					</div>
				<?php
				}
			?>
			</div>
		</div>
		
		</div>
	</div>
</div>
</div>
<script>
	$('.fixed-header').css('top','0px');
</script>