<style>
<style>
.fixed-header {
    top: 0px;
}
</style>
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
<div class="author-style">
<h3 class="author-name"><?= $ad['fullname']; ?></h3>
<div class="author-pic">
				<img src="<?=base_url()?>assets/eyenews/img/EYEME/user-discover.png" alt="profil foto">                        
</div>          
            
			<?php
		    }
?>
        </div>

<div id="Statistik">
<h3 class="h3-author"> Statistik <?= $ad['fullname']; ?></h3>
	<div id="bodystat">
			<table >
				<tr class="L_author">
					<th widht="400px">
					Jumlah Postingan
					</th>
<?php 
foreach ($totalpost as $tp)
{
?>					<td align="right">
					<?=$tp['total'];?>
					</td>
<?php
}
?>
					<td width="75px" align="left">
						postingan
					</td>
				</tr>
				<tr class="L_author">
					<th widht="400px">
					Total Viewers
					</th>
<?php 
foreach ($totalpost as $tp)
{
?>					<td align="right">
					<?=$tp['totalviews'];?>
					</td>
<?php
}
?>
					<td width="75px" align="left">
						view post
					</td>
				</tr>
				<tr class="L_author">
					<th widht="400px">
					Rata-rata Viewers/posting
					</th>
<?php 
foreach ($totalpost as $tp)
{
	$tp['rateview']=(($tp['totalviews'])/$tp['total']);
?>					<td align="right">
					<?=ceil($tp['rateview']);?>
					</td>
<?php
}
?>
					<td width="75px" align="left">
						view post
					</td>
				</tr>
				<tr class="L_author">
					<th widht="400px">
					Viewers >+1000
					</th>
<?php 
foreach ($total1000 as $tp1000)
{
?>					<td align="right">
					<?=$tp1000['total'];?>
					</td>
<?php
}
?>
					<td width="75px" align="left">
						postingan
					</td>
				</tr>
				<tr class="L_author">
					<th widht="400px">
					Viewers 500-1000
					</th>
<?php 
foreach ($total500 as $tp500)
{
?>					<td align="right">
					<?=$tp500['total'];?>
					</td>
<?php
}
?>
					<td width="75px" align="left">
						postingan
					</td>
				</tr>
			</table>
	</div>
</div>
<div id="lastnews" class="desktop redhover">
<h3 class="h3-author">EyeNews Terbaru <?= $ad['fullname']; ?></h3>

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


<div id="populernews" class="desktop redhover">
<h3 class="h3-author">EyeNews Terpopuler <?= $ad['fullname']; ?></h3>
 
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
<script>
	$('.fixed-header').css('top','0px');
</script>