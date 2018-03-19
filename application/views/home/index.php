		<!-- JADWAL -->
		<div id="jadwal" class="jadwal carousel slide" style="overflow:  hidden;">
            <div class="left navigate" href="#jadwal" role="button">
                <i class="material-icons">keyboard_arrow_left</i>
            </div>
            <div role="listbox" class="j-box carousel-inner">
                <div class="over item active">
				<?php foreach ($jadwal as $jadual){
					?>	
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($jadual["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$jadual["club_a"]?></span><span class="s"><?=$jadual["score_a"]?></span><br>
							<span class="r"><?=$jadual["club_b"]?></span><span class="s"><?=$jadual["score_b"]?></span><br>
						</div>			

					<?php
					}
					?>
                </div>
                <div class="over item">
                    <?php foreach ($jadwal_2 as $jadual_2){
					?>	
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($jadual_2["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$jadual_2["club_a"]?></span><span class="s"><?=$jadual_2["score_a"]?></span><br>
							<span class="r"><?=$jadual_2["club_b"]?></span><span class="s"><?=$jadual_2["score_b"]?></span><br>
						</div>			

					<?php
					}
					?>
                </div>
            </div>
             <div class="right navigate" href="#jadwal" role="button">
                <i class="material-icons">keyboard_arrow_right</i>
            </div>
        </div>
		<!-- TRENDING -->
		<div class="trending">
            <span class="x-c">
                <span>Trending</span>
					<?php 
					foreach ($trend_eyetube as $trendnya_tube)
					{
						$judul_trend 	= word_limiter($trendnya_tube['title'],3);
					?>
						<a href="<?php echo base_url(); ?>eyetube/detail/<?= $trendnya_tube['url']; ?>" title="<?php echo $trendnya_tube['title'] ?>">
							<?php echo $judul_trend; ?>
						</a>
					<?php
					}
					?>
					<?php
					foreach ($trend_eyenews as $trendnya_news)
					{
					?>
						<a href="<?php echo base_url(); ?>eyenews/detail/<?= $trendnya_news['url']; ?>" title="<?php echo $trendnya_news['title']; ?>">
							<?php echo word_limiter($trendnya_news['title'],3); ?>
						</a>
					<?php		
					}
					?>
            </span>
        </div>
		<!-- EYEPROFILE -->
		<div class="carous center-desktop" style="margin-top: -30px;">
            <img class="img-title lazy" src="<?php echo base_url()?>assets/home/img/ic_eyeprofile.png" alt="">
            <h2 class="title ep">EyeProfile</h2>
            <hr class="x-ep">
            <span>
                <a href="<?php echo base_url()?>eyeprofile/klub"><span class="kl">Klub Lainnya</span>
                <i class="material-icons r-kl">keyboard_arrow_right</i>                       </a>         
            </span>            
            <div id="epSlide" class="carousel slide">
                <div role="listbox" class="carousel-inner" style="height: 165px;overflow:  hidden;">                    
                    <div class="box item active" style="margin-top: 3px;margin-left: 3px;">
                        <?php 
							foreach ($profile_club as $club)
							{
						?>			
							
								<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
									<div class="box-content">
										<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
										<!--<img height="100px;" src="assets/img/ss-img.png">-->
										<img width="130" height="130" class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
										<div class="detail">
											<h2><?= $club['nama_club']; ?></h2>
											<h3><?= $club['competition']; ?></h3>
											<table>
												<tr>
													<td>Squad</td>
													<td><?= $club['squad']; ?></td>
												</tr>
												<tr>
													<td>Manager</td>
													<td><?= $club['nama_manager']; ?></td>
												</tr>
											</table>                        
										</div>
									</div>
								</a>
						<?php 
						}
						?>
                        </div>
                        <div class="box item" style="margin-top: 3px;margin-left: 3px;">
						<?php 
						foreach ($profile_club_2 as $club)
						{
					?>			
							<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
								<div class="box-content">
									<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
									<!--<img height="100px;" src="assets/img/ss-img.png">-->
									<img width="130" height="130" class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
									<div class="detail">
										<h2><?= $club['nama_club']; ?></h2>
										<h3><?= $club['competition']; ?></h3>
										<table>
											<tr>
												<td>Squad</td>
												<td><?= $club['squad']; ?></td>
											</tr>
											<tr>
												<td>Manager</td>
												<td><?= $club['nama_manager']; ?></td>
											</tr>
										</table>                        
									</div>
								</div>
							</a>
					<?php 
					}
					?>
                        </div>
                        <div class="box item" style="margin-top: 3px;margin-left: 3px;">
						<?php 
						foreach ($profile_club_3 as $club)
						{
					?>			
							<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
								<div class="box-content">
									<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
									<!--<img height="100px;" src="assets/img/ss-img.png">-->
									<img width="130" height="130" class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
									<div class="detail">
										<h2><?= $club['nama_club']; ?></h2>
										<h3><?= $club['competition']; ?></h3>
										<table>
											<tr>
												<td>Squad</td>
												<td><?= $club['squad']; ?></td>
											</tr>
											<tr>
												<td>Manager</td>
												<td><?= $club['nama_manager']; ?></td>
											</tr>
										</table>                        
									</div>
								</div>
							</a>
					<?php 
					}
					?>
                        </div>
                </div>  
    
                <div class="carousel-indicators bx-dot ep-dot">
                    <span data-target="#epSlide" data-slide-to="0" class="dot active"></span>
                    <span data-target="#epSlide" data-slide-to="1" class="dot"></span>
                    <span data-target="#epSlide" data-slide-to="2" class="dot"></span> 
                </div>  
            </div>
        <div class="pemain">
            <div class="bx-nav">
                <i class="material-icons leftp i-bx-nav" href="#topPemain" role="button">keyboard_arrow_left</i>
                <i class="material-icons rightp i-bx-nav" href="#topPemain" role="button">keyboard_arrow_right</i>
            </div>
            <h3 class="o">Pemain Paling Banyak Dilihat</h3>
            <div class="carousel slide" id="topPemain" >
                <div class="bx-pemain carousel-inner" role="listbox">
                    <div class="item active">
					<?php 
					$bulan 	= array(
									'01' => 'Jan',
									'02' => 'Feb',
									'03' => 'Mar',
									'04' => 'Apr',
									'05' => 'Mei',
									'06' => 'Juni',
									'07' => 'Juli',
									'08' => 'Agust',
									'09' => 'Sept',
									'10' => 'Okt',
									'11' => 'Nov',
									'12' => 'Des',
							);
					foreach ($profile_player as $player)
					{	
					?>		
						<a href="<?=base_url().'eyeprofile/pemain_detail/'.$player['link_player']; ?>">
							<div class="ctn-pemain">
								<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
							  <div class="des-img">
								<img class="lazy" src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
								<div class="container des">
									<?php
										$str_name = strlen($player['nama']);
										if($str_name > 20){
											$player['nama'] = substr($player['nama'],0,18);
											$player['nama'] = $player['nama'].'...';
										}else{
											$player['nama'] = $player['nama'];
										}
										
										$str_klub = strlen($player['klub']);
										if($str_klub > 20){
											$player['klub'] = substr($player['klub'],0,18);
											$player['klub'] = $player['klub'].'...';
										}else{
											$player['klub'] = $player['klub'];
										}
									?>
									<h3><?= $player['nama']; ?></h3>
									<p style="color: black;font-weight: 500;">
									<table class="des-p">
									<tr><td>Posisi</td><td>:</td><td><?= $player['posisi']; ?></td></tr>
									<tr><td>Klub</td><td>:</td><td><?= $player['klub']; ?></td></tr>
									<tr><td>Tanggal Lahir</td><td>:</td><td><?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></td></tr>
									</table>
									</p>                        
								</div>
							</div>
						</a>
					<?php
					}
					?>	
                    </div>
                    <div class="item">
					<?php
					foreach ($profile_player_2 as $player)
					{	
					?>		
						<a href="<?=base_url().'eyeprofile/pemain_detail/'.$player['link_player']; ?>">
							<div class="ctn-pemain">
								<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
								<div class="des-img"><img class="lazy" src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
								<div class="container des">
									<?php
										$str_name = strlen($player['nama']);
										if($str_name > 20){
											$player['nama'] = substr($player['nama'],0,18);
											$player['nama'] = $player['nama'].'...';
										}else{
											$player['nama'] = $player['nama'];
										}
										
										$str_klub = strlen($player['klub']);
										if($str_klub > 20){
											$player['klub'] = substr($player['klub'],0,18);
											$player['klub'] = $player['klub'].'...';
										}else{
											$player['klub'] = $player['klub'];
										}
									?>
									<h3><?= $player['nama']; ?></h3>
									<p style="color: black;font-weight: 500;">
									<table class="des-p">
									<tr><td>Posisi</td><td>:</td><td><?= $player['posisi']; ?></td></tr>
									<tr><td>Klub</td><td>:</td><td><?= $player['klub']; ?></td></tr>
									<tr><td>Tanggal Lahir</td><td>:</td><td><?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></td></tr>
									</table>
									</p>  
								</div>
							</div>
						</a>
					<?php
					}
					?>
                    </div>
                    <div class="item">
					<?php
					foreach ($profile_player_3 as $player)
					{	
					?>			
						<a href="<?=base_url().'eyeprofile/pemain_detail/'.$player['link_player']; ?>">
							<div class="ctn-pemain">
								<!--<img class="lazy" src="assets/img/ss-img.png" alt="">-->
								<div class="des-img"><img class="lazy" src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
								<div class="container des">
									<?php
										$str_name = strlen($player['nama']);
										if($str_name > 20){
											$player['nama'] = substr($player['nama'],0,18);
											$player['nama'] = $player['nama'].'...';
										}else{
											$player['nama'] = $player['nama'];
										}
										
										$str_klub = strlen($player['klub']);
										if($str_klub > 20){
											$player['klub'] = substr($player['klub'],0,18);
											$player['klub'] = $player['klub'].'...';
										}else{
											$player['klub'] = $player['klub'];
										}
									?>
									<h3><?= $player['nama']; ?></h3>
									<p style="color: black;font-weight: 500;">
									<table class="des-p">
									<tr><td>Posisi</td><td>:</td><td><?= $player['posisi']; ?></td></tr>
									<tr><td>Klub</td><td>:</td><td><?= $player['klub']; ?></td></tr>
									<tr><td>Tanggal Lahir</td><td>:</td><td><?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></td></tr>
									</table>
									</p>  
								</div>
							</div>
						</a>
					<?php
					}
					?>
                    </div>
                </div>
			</div>
			<div class="container mt-20 banner-home1 img-banner">
				<img src="<?php echo base_url()?>assets/img/iklanbanner/banner 1065x300 px-01.jpg" alt="Home Page Banner Ads">
			</div>
		</div>
		</div>
        <!-- EYETUBE -->
        <div class="center-desktop">        
            <img class="img-title lazy" src="<?php echo base_url()?>assets/home/img/ic_eyetube.png" alt="">
            <h2 class="title et">EyeTube</h2>
            <hr class="x-et">
            <div class="et-content m-b-100">
                <div class="et-content1 m-t-22">
				<?php
				foreach ($video_eyetube as $videonya)
				{
				?>
					<a href="<?=base_url().'eyetube/detail/'.$videonya['url']; ?>">
						<div class="et-v-content">
							<img class="lazy" src="<?= MEVID.$videonya['thumb']; ?>/medium" alt="">
							<!--<img class="lazy" src="<?=base_url()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">-->
							<div class="btn-play">
								<img class="lazy" src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="">
							</div>
						</div>
					</a>
                    <span class="et-st">
					<?php
						$date 		=  new DateTime($videonya['createon']);
						$tanggal 	= date_format($date,"Y-m-d H:i:s");
						echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
					?>					
					</span>
					<a href="<?=base_url().'eyetube/detail/'.$videonya['url']; ?>" style="text-decoration: unset;">
						<h1 class="et-title"><?= $videonya['title']; ?></h1>
					</a>
                    <p class="et-d" style="max-height:95px; overflow:hidden;">
					<?php
						$keterangan = strip_tags($videonya['description']);
						echo word_limiter($keterangan,25);
					?>					
					</p>
					<?php
					break;
					}
					?>
                </div>
                <div class="et-content2">				
                    <div class="v-et-content2" style="margin-top: 78px;">
					<?php
								$i = 0;
								foreach ($video_eyetube as $videonya)
								{
									if ($i != 0)
									{
					?>			
						<a href="<?=base_url().'eyetube/detail/'.$videonya['url']; ?>" style="text-decoration: unset;">
                        <!-- judul eyetube
						<div class="t-et-content2">
                            <span class="et-st"><?php
						$date 		=  new DateTime($videonya['createon']);
						$tanggal 	= date_format($date,"Y-m-d H:i:s");
						echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
					?></span>
                            <p class="et-st-det"><?= $videonya['title']; ?></p>
                        </div> -->
						<img class="v-et-2 v-et-100 lazy" width="100%" src="<?= MEVID.$videonya['thumb']; ?>/medium" alt="" style="margin-bottom: 10px;">
							<!-- <div class="container btn-play2"><img class="lazy" src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;"></div>	 -->
						</a>
					<?php
					}
					$i++;

					}
					?>						
                    </div>
				
                </div>					
            </div>

            <div class="container tab" style="padding-top: 30px;">
                <span href="" id="star" data-target="#esTab" data-slide-to="0" class="active nonactive" active="true">eyesoccer star</span>
                <span href="" id="vpopuler" data-target="#esTab" data-slide-to="1" class="nonactive">video popular</span>
                <span href="" id="vkamu" data-target="#esTab" data-slide-to="2" class="nonactive">video kamu</span>
                <hr>
                <div id="esTab" class="carousel slide">
					<div role="listbox" class="carousel-inner">                    
                        <div id="star" class="box item active">
                            <div class="box-vl pd-b-10">
                                <a href="<?=base_url()?>eyetube"><span class="vl">Video Lainnya</span>
								<i class="material-icons r-vl">keyboard_arrow_right</i>        
								</a>                        
                            </div>
							<?php
							foreach ($eyetube_stars as $stars)
							{
							?>
							<a href="<?=base_url().'eyetube/detail/'.$stars['url']; ?>" style="text-decoration: unset;">
								<div class="vid-box-vl">
									<div class="vid-box-vl-img">
										<img class="lazy" src="<?= MEVID.$stars['thumb'];?>/medium" alt="">										
									</div>
									<div class="container h41"><span class="vid-ttl"><?= $stars['title']; ?></span><br></div>
									<p class="vid-time"><?php
									$date 		=  new DateTime($stars['createon']);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");

									echo relative_time($tanggal) . ' ago - '.$stars['tube_view'].' views';
								?></p>                              
								</div>
							</a>
							<?php		
							}
							?>							
                        </div>
                        <div id="vpopuler" class="box item">
                            <div class="box-vl">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							foreach ($eyetube_populer as $populer)
							{
							?>			
							<a href="<?=base_url().'eyetube/detail/'.$populer['url']; ?>" style="text-decoration: unset;">
								<div class="vid-box-vl">
									<!--<img class="lazy" src="assets/img/video-small.png" alt="">-->
									<div class="vid-box-vl-img">
										<img class="lazy" src="<?= MEVID.$populer['thumb'];?>" alt="">										
									</div>
									<div class="container h41"><span class="vid-ttl"><?= $populer['title']; ?></span><br></div>
									<p class="vid-time"><?php
									$date 		=  new DateTime($populer['createon']);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");

									echo relative_time($tanggal) . ' ago - '.$populer['tube_view'].' views';
								?></p>                              
								</div>
							</a>
							<?php		
							}
							?>							
                        </div>
                        <div id="vkamu" class="box item">
                            <div class="box-vl">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							foreach ($eyetube_kamu as $kamu)
							{
							?>							
							<a href="<?=base_url().'eyetube/detail/'.$kamu['url']; ?>" style="text-decoration: unset;">
								<div class="vid-box-vl">
									<div class="vid-box-vl-img">
										<img class="lazy" src="<?= MEVID.$kamu['thumb'];?>" alt="">
									</div>
									<div class="container h41" ><span class="vid-ttl"><?= $kamu['title']; ?></span><br></div>
									<p class="vid-time"><?php
									$date 		=  new DateTime($kamu['createon']);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");

									echo relative_time($tanggal) . ' ago - '.$kamu['tube_view'].' views';
								?></p>                              
								</div>
							</a>
							<?php		
							}
							?>							
                        </div>
                    </div>					
                </div>
            </div>
        </div>
        <!-- EYENEWS -->
        <div class="center-desktop">
            <div class="et-content m-b-150">
                <div class="et-content1">
                    <img class="img-title lazy" src="<?php echo base_url(); ?>assets/img/ic_eyenews.png" alt="">
                    <h2 class="title en">EyeNews</h2>
                    <hr class="x-en">
					<a href="<?php echo base_url(); ?>eyenews/detail/<?php echo $eyenews_main->url?>">
						<div class="t-en-content2" style="margin-top:-20px; z-index:1; top:283px; padding:10px; width:580px; background-color:#00000050;"> 
							<span class="et-st">	  					<small>
								<?php
									$date 		=  new DateTime($eyenews_main->createon);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");

									echo relative_time($tanggal) . ' ago';
								?>
							</small></span>
							<p class="et-st-det"><?php echo $eyenews_main->title; ?></p>
						</div>					
                    <!--<img class="v-et-2 w-100" src="assets/img/video-small.png" alt="">-->
					<div class="container" style="width:100%;height:345px;"><img style="margin-bottom:-40px !important;" class="v-et-2 w-100 lazy" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $eyenews_main->thumb1; ?>" alt="<?php echo $eyenews_main->title; ?>" ></div>
					</a>
                    <div class="h-berita-terkait" style="margin:40px 0;height:135px;overflow:hidden;">
                        <h3 class="mb-10">Berita Terkait</h3>
						<?php
						$i = 0;
						foreach ($eyenews_similar as $similar)
						{
						if ($i != 0)
						{
						?>						
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar['url'];?>">
								<img class="lazy" src="<?php echo base_url(); ?>assets/img/chevron-right-red.png"> <?= $similar['title']; ?></a>
                            </li>
                        </ul>
						<?php			
						}
						$i++;
						}
						?>						
                    </div>
                </div>
                <div class="et-content2">
                    <img class="img-title lazy" src="<?php echo base_url()?>assets/home/img/ic-eyeme.png" alt="">
                    <h2 class="title em">EyeMe</h2>
                    <hr class="x-em">				
                    <div class="c-em-content2 container" style="top: -31px;">
                    	<?php 
                    		for($i=0;$i < 9 ; $i++){
                    			echo '<div class="eyeme-list">';
	                    			echo '<a href="'.(isset($imgEyeme[$i]) ? MEPROFILE.$imgEyeme[$i]->username : '#').'">';
	                    			echo '<img class="lazy" src="'.(isset($imgEyeme[$i]) ? MEIMG.$imgEyeme[$i]->img_name :  DEFAULTIMG ).'" class="c-em-content2-img">';
	                    			echo '</a>';
                    			echo '</div>';
                    		}
                    	?>
					</div>
					<div class="container tx-c m-t-20">
						<a href="<?php echo EYEEXPLORE ?>" class="em-btn">Lihat Foto Lainnya</a>
					</div>
                </div>
            </div>
        </div>
        <div class="center-desktop">
            <div class="et-content">
                <div class="et-content1">
                    <div class="container tab2">
                        <span href="" id="tab_rekom" class="active nonactive" active="true">rekomendasi</span>
                        <span href="" id="tab_usia" class="nonactive">usia muda</span>
                        <span href="" id="tab_populer" class="nonactive">terpopuler</span>
                        <hr>
                        <div id="tab2" class="carousel slide">
                            <div role="listbox" class="carousel-inner">                    
                                <div id="tab_populer" class="box item">
									<x>
									<a href="<?=base_url()?>eyenews">
                                        <span>Berita Lainnya</span>
										<i class="material-icons r-tab2">keyboard_arrow_right</i>
										</a>                                
									</x>
								<?php
								foreach($eyenews_populer as $populer){
								?>
                                    <div class="rek-ber">
										<a href="<?=base_url().'eyenews/detail/'.$populer['url']; ?>">
										<div class="rek-ber-c">
											<!--<img class="lazy" src="assets/img/video-small.png" style="width:150px" alt="">-->
											<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img class="lazy" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $populer['thumb1']; ?>" style="width:100%; min-height:100%;" alt=""></div>
											<div class="container" style="width: 70%;float:  right;"><a href="<?=base_url().'eyenews/detail/'.$populer['url']; ?>">
												<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$populer['createon'];?></span>
												<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
													<a href="<?=base_url().'eyenews/detail/'.$populer['url']; ?>" style="text-decoration: unset;color:black;"><?=$populer['title'];?>
													</a>
												</h1>
												<a href="<?=base_url().'eyenews/detail/'.$populer['url']; ?>">
												<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
													$keterangan = strip_tags($populer['description']);
													echo word_limiter($keterangan,25);
												?></p>
												</a></a>
											</div>
										</div>    
									</a>                                  
                                    </div>
								<?php
								}
								?>
                                </div>
                                <div id="tab_rekom" class="box item active">
									<x>
                                        <a href="<?=base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
								<?php
								foreach($eyenews_rekomendasi as $rekomendasi){
								?>
                                    <div class="rek-ber">
										<div class="rek-ber-c">
										<a href="<?=base_url().'eyenews/detail/'.$rekomendasi['url']; ?>">
										<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img class="lazy" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>"style="width:100%; min-height:100%;" alt=""></div>
										<div class="container" style="width: 70%;float:  right;">	
										<a href="<?=base_url().'eyenews/detail/'.$rekomendasi['url']; ?>">
											<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$rekomendasi['createon'];?></span>
											<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
												<a href="<?=base_url().'eyenews/detail/'.$rekomendasi['url']; ?>" style="text-decoration: unset;color:black;">
												<?=$rekomendasi['title'];?>
												</a>
											</h1>
											<a href="<?=base_url().'eyenews/detail/'.$rekomendasi['url']; ?>">
											<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
												$keterangan = strip_tags($rekomendasi['description']);
												echo word_limiter($keterangan,15);
											?></p></a>
										</a>
										</div>
										</a>
										</div>
                                    </div>
									<?php
									}
									?>
                                </div>
                                <div id="tab_usia" class="box item">
									<x>
                                        <a href="<?php echo base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
								<?php
								foreach($eyenews_muda as $muda){
								?>
                                    <div class="rek-ber">
										<div class="rek-ber-c">
										<a href="<?=base_url().'eyenews/detail/'.$muda['url']; ?>">
										<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img class="lazy" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $muda['thumb1']; ?>" style="width:100%; min-height:100%;" alt=""></div>
											<div class="container" style="width: 70%;float:  right;">	
												<a href="<?=base_url().'eyenews/detail/'.$muda['url']; ?>">
												<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$muda['createon'];?></span>
												<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
													<a href="<?=base_url().'eyenews/detail/'.$muda['url']; ?>" style="text-decoration: unset;color:black;">
													<?=$muda['title'];?>
													</a>
												</h1>
												<a href="<?=base_url().'eyenews/detail/'.$muda['url']; ?>">
												<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
													$keterangan = strip_tags($muda['description']);
													echo word_limiter($keterangan,15);
												?></p>
												</a>
												</a>
											</div>
										</a>
										</div>
                                    </div>
									<?php
									}
									?>									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="et-content2">
                    <img class="img-title lazy" src="<?php echo base_url()?>assets/home/img/ic_eyemarket.png" alt="">
                    <h2 class="title emar">EyeMarket</h2>
                    <hr class="x-emar">
                        <div class="rek-ber" style="margin-top: -14px;">			
							<?php foreach ($products as $produk)
							{
							?>
							<div class="rek-ber-c">
								<div style="width: 100px;height:  100px;overflow:  hidden;display:  inline-block;">
									<img class="lazy" src="<?= MEIMG; ?><?= $produk['image1'] ?>" alt="" style="width:100%; min-height:100%;">
								</div>
                                <div class="container" style="width: 75%;display:  inline-block;float:  right;">
									<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 34px;overflow: hidden;"><?= $produk['nama']; ?></h1>
									<span class="price" style="font-size: .7em;color: gray;font-weight: 400;text-transform: uppercase;top: 20px;">HARGA</span>
									<p class="prices" style="font-size: 1em;color: black;font-weight: 500;margin:  0;">Rp.<?= number_format($produk['harga'],0,',','.'); ?></p>
									<a href="<?= base_url(); ?>eyemarket/detail/<?= $produk['toko']; ?>/<?= $produk['title_slug']; ?>" style="text-decoration:  none;color: #ff9900;font-weight:  500;">
										<button type="text" class="beli" style="float:  right;position:  relative;top: -25px;">Beli</button>
									</a>
								</div>
								
							</div>
							<?php 
							}
							?>
                        </div>
                </div>
            </div>
        </div>
        <!-- BANNER -->
        <div class="center-desktop">
            <div class="banner-150" style="margin-top: 20px;background: unset;">
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Eyesoccer 24#dekstopHomeBannerBawah -->
					<ins class="adsbygoogle"
						 style="display:block"
						 data-ad-client="ca-pub-7635854626605122"
						 data-ad-slot="1567244418"
						 data-ad-format="auto"></ins>
					<script>
					(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
                <!-- <img class="lazy" src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt=""> -->
            </div>
        </div>
        <!-- EYEVENT -->
        <div class="center-desktop">
            <img class="img-title lazy" src="<?php echo base_url()?>assets/home/img/ic_eyevent.png" alt="">
            <h2 class="title ee">EyeVent</h2>
            <hr class="x-ee">
            <span>
				<a href="<?=base_url()?>eyevent">
				<span class="el">Event Lainnya</span>
				<i class="material-icons r-el">keyboard_arrow_right</i>                                
				</a>
            </span>
            <div class="container">
                <div id="evSlide" class="carousel slide t-30" style="width: 100% !important;overflow:hidden;height: 250px;">
                    <div role="listbox" class="carousel-inner" style="width: max-content;height: 225px;">  				
                        <div class="box item active">	
						<?php
						foreach($eyevent_main as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img class="lazy" src="assets/img/video-small.png" alt="">-->
								<img class="lazy" src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
                            </div>
						<?php }?>
                        </div>
                        <div class="box item">	
						<?php
						foreach($eyevent_main_2 as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img class="lazy" src="assets/img/video-small.png" alt="">-->
								<img class="lazy" src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
                            </div>
						<?php }?>
                        </div>
						<div class="box item">	
						<?php
						foreach($eyevent_main_3 as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img class="lazy" src="assets/img/video-small.png" alt="">-->
								<img class="lazy" src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
                            </div>
						<?php }?>
                        </div>
                    </div>  
        
                    <div class="carousel-indicators bx-dot ev-dot">
                        <span data-target="#evSlide" data-slide-to="0" class="dot active"></span>
                        <span data-target="#evSlide" data-slide-to="1" class="dot"></span>
                        <span data-target="#evSlide" data-slide-to="2" class="dot"></span> 
                    </div>  
                </div>
            </div>
        </div>
        <!-- JADWAL PERTANDINGAN & KLASEMEN -->
        <div class="center-desktop t-40">
            <div class="container">
                <div class="et-content1">
                    <span class="jp green">JADWAL PERTANDINGAN</span>
                    <div class="border-box" style="margin-top: 22px;">
                        <div class="container bg-g">						
                            <div class="t-tab">
								<div class="day-choose t-active" id="jadwal_today">
                                    <a href="#" onclick="return false;">Hari ini
                                        <span><?=date("d F")?></span>
                                    </a>
                                </div>
                                <div class="day-choose" id="jadwal_tomorrow">
                                    <a href="#" onclick="return false;">Besok
                                        <span>
											<?php
												$date = new DateTime(date("Y-m-d"));
												$date->modify('+1 day');
												echo $date->format('d F');
											?>
										</span>
                                    </a>
                                </div>
                                <div class="day-choose" id="jadwal_tomorrow2">
                                    <a href="#" onclick="return false;">Lusa
                                        <span>
											<?php
												$date = new DateTime(date("Y-m-d"));
												$date->modify('+2 day');
												echo $date->format('d F');
											?>
										</span>
                                    </a>
                                </div>
                            </div>
                        </div>
						<div id="tbl_jadwal_today">
							
							<table class="table border-b">
								<tbody>
								<?php
									foreach($jadwal_today as $row){
								?>
									<tr>
										<td class="tx-r"><?=$row["club_a"]?></td>
										<td><span class="i-l"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
										<td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
										<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
										</td>
										<td><span class="i-r"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span></td>
										<td class="tx-l"><?=$row["club_b"]?></td>
									</tr>
								<?php }?>
								</tbody>
							</table>
						</div>
						<div id="tbl_jadwal_tomorrow" style="display:none">
							
							<table class="table border-b">
							<?php
						foreach($jadwal_tomorrow1 as $row){
						?>
                            <tbody>
                                <tr>
									<td class="tx-r"><?=$row["club_a"]?></td>
									<td><span class="i-l"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
                                    <td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
									<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
									</td>
									<td><span class="i-r"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span></td>
                                    <td class="tx-l"><?=$row["club_b"]?></td>
                                </tr>
                            </tbody>
						<?php }?>
							</table>
						</div>
						<div id="tbl_jadwal_tomorrow2" style="display:none">
							
							<table class="table border-b">
							<?php
							foreach($jadwal_tomorrow2 as $row){
							?>
								<tbody>
									<tr>
										<td class="tx-r"><?=$row["club_a"]?></td>
										<td><span class="i-l"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
										<td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
										<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
										</td>
										<td><span class="i-r"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span></td>
										<td class="tx-l"><?=$row["club_b"]?></td>
									</tr>
								</tbody>
							<?php }?>
							</table>
						</div>
                        <div class="t-c-b">
                            <a href="<?=base_url()?>eyevent"><button type="" class="btn-green">Lihat Jadwal Lainnya</button></a>
                        </div>
                    </div>
                </div>
                <div class="et-content2">
                    <span class="jp">KLASEMEN</span>
                <select id="select_league" name="" selected="true" class="slc-musim fl-r">
				<?php
					foreach($kompetisi as $row){
				?>
					<option value="<?=$row['value']?>"><?=$row['competition']?></option>';  
				<?php
					}
				?>
                </select>
                    <div class="border-box" style="margin-top: 10px;">
                        <table id="liga_indonesia" class="table table-striped" style="display:none;">
							<thead>
								<tr>
									<th>#</th>
									<th>Klub</th>
									<th>MN</th>
									<th>M</th>
									<th>S</th>
									<th>K</th>
									<th>P</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$html = file_get_contents(LinkScrapingLigaIndonesia()); //get the html returned from the following url

								$premiere_doc = new DOMDocument();

								libxml_use_internal_errors(TRUE); //disable libxml errors

								if(!empty($html)){ //if any html is actually returned

									$premiere_doc->loadHTML($html);
									libxml_clear_errors(); //remove errors for yucky html
									
									$pokemon_xpath = new DOMXPath($premiere_doc);

									//get all the h2's with an id
									$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
									$pokemon_list = array();
									$i = 0;
									if($pokemon_row->length > 0){
										foreach($pokemon_row as $row){
											echo "<tr>";
											if($i < 18){
												$types = $pokemon_xpath->query('td', $row);
												$n = 0;
												foreach($types as $type){
													if(!empty($type->nodeValue)){
														if($n != 1){
															if($n != 7){
																if($n != 8){
																	if($n != 9){
																		if($n != 11){
																			$nodeValue = "<td>".$type->nodeValue.'</td>';
																			echo $nodeValue;
																		}
																	}
																}
															}
														}
													}
													$n++;
												}
												$i ++;
											}
											echo "</tr>";
										}
									}
								} 
							?>
							</tbody>
						</table>
						<table id="liga_inggris" class="table table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Klub</th>
									<th>MN</th>
									<th>M</th>
									<th>S</th>
									<th>K</th>
									<th>P</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$html = file_get_contents(LinkScrapingLigaInggris());
								$premiere_doc = new DOMDocument();
								libxml_use_internal_errors(TRUE); //disable libxml errors
								if(!empty($html)){ //if any html is actually returned
									$premiere_doc->loadHTML($html);
									libxml_clear_errors(); //remove errors for yucky html
									$pokemon_xpath = new DOMXPath($premiere_doc);
									//get all the h2's with an id
									$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
									$pokemon_list = array();
									$i = 0;
									if($pokemon_row->length > 0){
										foreach($pokemon_row as $row){
											echo "<tr>";
											if($i < 20){
												$types = $pokemon_xpath->query('td', $row);
												$n = 0;
												foreach($types as $type){
													if(!empty($type->nodeValue)){
														if($n != 1){
															if($n != 7){
																if($n != 8){
																	if($n != 9){
																		if($n != 11){
																			$nodeValue = "<td>".$type->nodeValue.'</td>';
																			echo $nodeValue;
																		}
																	}
																}
															}
														}
													}
													$n++;
												}
												$i ++;
											}
											echo "</tr>";
										}
									}
								} 
							?>
							</tbody>
						</table>
						<table id="liga_italia" class="table table-striped" style="display:none;">
							<thead>
								<tr>
									<th>#</th>
									<th>Klub</th>
									<th>MN</th>
									<th>M</th>
									<th>S</th>
									<th>K</th>
									<th>P</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$html = file_get_contents(LinkScrapingLigaItalia());
								$premiere_doc = new DOMDocument();
								libxml_use_internal_errors(TRUE); //disable libxml errors
								if(!empty($html)){ //if any html is actually returned
									$premiere_doc->loadHTML($html);
									libxml_clear_errors(); //remove errors for yucky html
									$pokemon_xpath = new DOMXPath($premiere_doc);
									//get all the h2's with an id
									$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
									$pokemon_list = array();
									$i = 0;
									if($pokemon_row->length > 0){
										foreach($pokemon_row as $row){
											echo "<tr>";
											if($i < 20){
												$types = $pokemon_xpath->query('td', $row);
												$n = 0;
												foreach($types as $type){
													if(!empty($type->nodeValue)){
														if($n != 1){
															if($n != 7){
																if($n != 8){
																	if($n != 9){
																		if($n != 11){
																			$nodeValue = "<td>".$type->nodeValue.'</td>';
																			echo $nodeValue;
																		}
																	}
																}
															}
														}
													}
													$n++;
												}
												$i ++;
											}
											echo "</tr>";
										}
									}
								} 
							?>
							</tbody>
						</table>
						<table id="liga_spanyol" class="table table-striped" style="display:none;">
							<thead>
								<tr>
									<th>#</th>
									<th>Klub</th>
									<th>MN</th>
									<th>M</th>
									<th>S</th>
									<th>K</th>
									<th>P</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$html = file_get_contents(LinkScrapingLigaSpanyol());
								$premiere_doc = new DOMDocument();
								libxml_use_internal_errors(TRUE); //disable libxml errors
								if(!empty($html)){ //if any html is actually returned
									$premiere_doc->loadHTML($html);
									libxml_clear_errors(); //remove errors for yucky html
									$pokemon_xpath = new DOMXPath($premiere_doc);
									//get all the h2's with an id
									$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
									$pokemon_list = array();
									$i = 0;
									if($pokemon_row->length > 0){
										foreach($pokemon_row as $row){
											echo "<tr>";
											if($i < 20){
												$types = $pokemon_xpath->query('td', $row);
												$n = 0;
												foreach($types as $type){
													if($type->nodeValue != ""){
														if($n != 1){
															if($n != 7){
																if($n != 8){
																	if($n != 9){
																		if($n != 11){
																			$nodeValue = "<td>".$type->nodeValue.'</td>';
																			echo $nodeValue;
																		}
																	}
																}
															}
														}
													}
													$n++;
												}
												$i ++;
											}
											echo "</tr>";
										}
									}
								} 
							?>
							</tbody>
						</table>
                        <span style="display: none;">
                            <a href="<?=base_url()?>eyenews" class="ttl">Lihat Selengkapnya</a>
                            <i class="material-icons r-ttl">keyboard_arrow_right</i>                                
                        </span>                      
                    </div>
                </div>
            </div>
        </div>
		<script>
			$(document).ready(function(){
				$(document).on('click', '.tab2 span', function() {
					var id = $(this).attr('id');
					$('.tab2 span').each(function(){
						var idx = $(this).attr('id');
						if($(this).attr('active') == 'true')
						{
							$(this).removeClass('active');
							$(this).addClass('nonactive');
							$(this).removeAttr('active');
							$('#tab2 div#'+idx).fadeOut('fast');
						}
						
					})
					$('.tab2 span#'+id).addClass('active');
					$('.tab2 span#'+id).removeClass('nonactive');
					$('.tab2 span#'+id).attr('active', 'true');
					$('#tab2 div#'+id).fadeIn('fast');
				});

				$(document).on('click', '.tab span', function() {
					var id = $(this).attr('id');

					$('.tab span').each(function(){
						var idx = $(this).attr('id');
						if($(this).attr('active') == 'true')
						{
							$(this).removeClass('active');
							$(this).addClass('nonactive');
							$(this).removeAttr('active');
							$('#tab div#'+idx).fadeOut('fast');
						}
						
					})

					$('.tab span#'+id).addClass('active');
					$('.tab span#'+id).removeClass('nonactive');
					$('.tab span#'+id).attr('active', 'true');
					$('#tab div#'+id).fadeIn('fast');
				})
				

				$('#tbl_jadwal_tomorrow,#tbl_jadwal_tomorrow2').hide();
					
				$('#jadwal_today').click(function(){
					$('#tbl_jadwal_tomorrow,#tbl_jadwal_tomorrow2').hide();
					$('.day-choose').removeClass('t-active');
					$('#jadwal_today').addClass('t-active');
					$('#tbl_jadwal_today').show();
				});
				$('#jadwal_tomorrow').click(function(){
					$('#tbl_jadwal_tomorrow2,#tbl_jadwal_today').hide();
					$('.day-choose').removeClass('t-active');
					$('#jadwal_tomorrow').addClass('t-active');
					$('#tbl_jadwal_tomorrow').show();
				});
				$('#jadwal_tomorrow2').click(function(){
					$('#tbl_jadwal_tomorrow,#tbl_jadwal_today').hide();
					$('.day-choose').removeClass('t-active');
					$('#jadwal_tomorrow2').addClass('t-active');
					$('#tbl_jadwal_tomorrow2').show();
				});
				$("#select_league").change(function(){
					if($("#select_league").val() == "liga_indonesia"){
						$("#liga_inggris,#liga_italia,#liga_spanyol").hide();
						$("#liga_indonesia").show();
					}else if($("#select_league").val() == "liga_inggris"){
						$("#liga_indonesia,#liga_italia,#liga_spanyol").hide();
						$("#liga_inggris").show();
					}else if($("#select_league").val() == "liga_italia"){
						$("#liga_indonesia,#liga_inggris,#liga_spanyol").hide();
						$("#liga_italia").show();
					}else if($("#select_league").val() == "liga_spanyol"){
						$("#liga_indonesia,#liga_inggris,#liga_italia").hide();
						$("#liga_spanyol").show();
					}
				});
			})
		</script>