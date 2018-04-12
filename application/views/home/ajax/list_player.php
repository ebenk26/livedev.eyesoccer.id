<?php 
$player = json_decode($player)->data;

?>
<div class="carousel slide" id="topPemain" >
    <div class="bx-pemain carousel-inner" role="listbox">
    	<?php

    		for($i = 0 ; $i < 9; $i+=3){ $k= 0;
    			echo '<div class="item '.($i == 0 ? 'active' :'').'">';

    				for($j=$i;$j < count($player);$j++){
    					$p = $player; $k++;
    					if($k == 4){break;}?>

    				<a href="<?php echo PLAYERDETAIL.$p[$j]->slug?>'">
						<div class="ctn-pemain">
						  <div class="des-img">
							<img class="lazy" src="<?php echo $p[$j]->url_pic?>" alt="<?php echo $p[$j]->name?>"></div>
							<div class="container des">
								<?php

									$str_name = strlen($p[$j]->name);
									if($str_name > 20){
										$p[$j]->name = substr($p[$j]->name,0,18);
										$p[$j]->name = $p[$j]->name.'...';
									}
									
									$str_club = strlen($p[$j]->club);
									if($str_club > 20){
										$p[$j]->club = substr($p[$j]->club,0,18);
										$p[$j]->club = $p[$j]->club.'...';
									}
								?>
								<h3><?= $p[$j]->name ?></h3>
								<p style="color: black;font-weight: 500;">
								<table class="des-p">
								<tr><td>Posisi</td><td>:</td><td><?= $p[$j]->position_a; ?></td></tr>
								<tr><td>Klub</td><td>:</td><td><?= $p[$j]->club; ?></td></tr>
								<tr><td>Tanggal Lahir</td><td>:</td><td><?php echo formatDate($p[$j]->birth_date)?></td></tr>
								</table>
								</p>                        
							</div>
						</div>
					</a>



    				<?php }

    			echo '</div>';


    		}

    	?>
        
       
    </div>
</div>