 <?php 
	$club = json_decode($clubs);//decode json from api 
	$club = $club->data;
?>
<div id="epSlide" class="carousel slide" data-ride="carousel">
    <div role="listbox" class="carousel-inner" style="height: 165px;overflow:  hidden;">  
	<?php for($i= 0; $i < 12;$i+=4){ $k = 0 ;//looping with +4 ?>
		<div class="box item <?php echo ($i == 0 ? 'active' : '')?>" style="margin-top: 3px;margin-left: 3px;">
			<?php for($j=$i;$j < count($club);$j++){	
				$k++;//break looping if count of item is 4 
				if($k == 5){ break ;}
				?>
				<a href="<?=base_url().'eyeprofile/klub_detail/'.$club[$j]->slug; ?>">
				<div class="box-content">
					<img class="lazy" src="assets/img/ss-img.png" alt="">
					<img height="100px;" src="assets/img/ss-img.png">
					<img width="130" height="130" class="lazy" src="<?=$club[$j]->url_logo?>">
					<div class="detail">
						<h2><?= $club[$j]->name; ?></h2>
						<h3 style="line-height: 1.3em "><?= $club[$j]->nickname; ?></h3>
						<table>
							<tr>
								<td>Squad</td>
								<td><?= $club[$j]->number_of_player ?></td>
							</tr>
							<tr>
								
							</tr>
						</table>                        
					</div>
				</div>
				</a>
			<?php }?>
		</div>	
	<?php  }?>
	</div>
	<div class="carousel-indicators bx-dot ep-dot">
	    <span data-target="#epSlide" data-slide-to="0" class="dot active"></span>
	    <span data-target="#epSlide" data-slide-to="1" class="dot"></span>
	    <span data-target="#epSlide" data-slide-to="2" class="dot"></span> 
	</div> 
</div>
<script>
	$(document).ready(function(){
    $("#epSlide").carousel();
});
</script>

