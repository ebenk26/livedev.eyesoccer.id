<style>
	.des-p{
		color: #2b2b2b;
		font-size: .7em;
		font-weight: 600;
		margin-top: 2px;
		width: 95%;
	}
	.des-p td{
		width: max-content;
		padding: 0 2px 0 0;
	}
	.des-p td:nth-of-type(1){
		width: 92px !important;
	}
	.vid-box-vl-img{
		width: 100%;
    	height: 145px;
    	overflow: hidden;
	}
	.vid-box-vl-img img{
		width: 100%;
    	min-height: 100%;
	}
	.h-berita-terkait>ul>li>a {
    	font-size: .85em;
    	color: darkslategray;
    	font-weight: 500;
	}
	.h-berita-terkait>ul>li>a>img {
    	padding-right: 5px
	}
	.em-btn:hover{
		background-color: #66b7f3;
    	color: white;
	}
	.rek-ber-c>p {
    	font-size: .7em;
    	color: #aba6a6;
    	width: 430px;
    	float: right;
    	margin: 0px;
    	max-height: 46px;
    	overflow: hidden;
	}
	.m-b-35{
		margin-bottom: -35px
	}
	.beli{
		border: 1px solid #FFB300;
	}
	.beli:hover, .beli a:hover{
		background-color: #ffd400;
    	border-color: #ffd400;
    	color: white !important;
	}
	.ev-box-content {
    	width: 340px;
    	height: 210px;
		overflow: hidden;
		margin: 0 20px 0 0 !important;
	}
	.el{
		font-weight: 500;
	}
	.jp{
		color: #25ab2a;
	}
	.ctn-pemain, .ctn-pemain img{
		border-radius: 5px;
	}
	.ctn-pemain img {
		width: 100%;
		height: auto;
	}
	.des {
		top: 5px;
	}
	.des h3 {
		margin: 10px 0;
	}
	.des p {
    	font-size: .8em;
    	margin: 0;
    	max-height: 56px;
    	overflow: hidden;
	}
	.btn-green:hover{
		background-color: #8BC34A;
		border-color: #8BC34A;
		color: white;
	}
	.btn-play2{
		position: relative;
    	width: 50px;
    	height: 50px;
    	left: 190px;
    	top: -210px;
	}
</style>
		<!-- JADWAL -->
        <div id="jadwal" class="jadwal carousel slide">
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
					 $this->load->helper('my');
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
        <div class="carous center-dekstop m-t-35" style="margin-top: -20px;">
            <img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyeprofile.png" alt="">
            <h2 class="title ep">EyeProfile</h2>
            <hr class="x-ep">
            <span>
                <a href="<?php echo base_url()?>eyeprofile/klub" class="kl">Klub Lainnya</a>
                <i class="material-icons r-kl">keyboard_arrow_right</i>                                
            </span>            
            <div id="epSlide" class="carousel slide" style="overflow:hidden;">			  
				<div role="listbox" class="carousel-inner"> 
					<div class="box item active">
						<?php 
							foreach ($profile_club as $club)
							{
						?>			
							
								<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
									<div class="box-content">
										<!--<img src="assets/img/ss-img.png" alt="">-->
										<!--<img height="100px;" src="assets/img/ss-img.png">-->
										<img height="100px;" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
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
					<div class="box item">
						<?php 
							foreach ($profile_club_2 as $club)
							{
						?>			
								<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
									<div class="box-content">
										<!--<img src="assets/img/ss-img.png" alt="">-->
										<!--<img height="100px;" src="assets/img/ss-img.png">-->
										<img height="100px;" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
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
					<div class="box item">
						<?php 
							foreach ($profile_club_3 as $club)
							{
						?>			
								<a href="<?=base_url().'eyeprofile/klub_detail/'.$club['link_klub']; ?>">
									<div class="box-content">
										<!--<img src="assets/img/ss-img.png" alt="">-->
										<!--<img height="100px;" src="assets/img/ss-img.png">-->
										<img height="100px;" src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>">
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
                <i class="material-icons left i-bx-nav" href="#topPemain" role="button">keyboard_arrow_left</i>
                <i class="material-icons right i-bx-nav" href="#topPemain" role="button">keyboard_arrow_right</i>
            </div>
			<h3 class="o">Pemain Profesional</h3>
			<div class="carousel slide" id="topPemain" style="overflow:hidden;">			
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
									<!--<img src="assets/img/ss-img.png" alt="">-->
								  <div style="width: 100px;height:  100px;overflow:  hidden;display:  inline-block;">
									<img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
									<div class="container des" style="width: 70%;display:  inline-block;float:  right;padding:  0px;color: orange;font-weight: 600;">
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
									<!--<img src="assets/img/ss-img.png" alt="">-->
									<div style="width: 100px;height:  100px;overflow:  hidden;display:  inline-block;"><img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
									<div class="container des" style="width: 70%;display:  inline-block;float:  right;padding:  0px;color: orange;font-weight: 600;"
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
									<!--<img src="assets/img/ss-img.png" alt="">-->
									<div style="width: 100px;height:  100px;overflow:  hidden;display:  inline-block;"><img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt=""></div>
									<div class="container des" style="width: 70%;display:  inline-block;float:  right;padding:  0px;color: orange;font-weight: 600;"
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
        </div>
        </div>
        <!-- EYETUBE -->
        <div class="center-dekstop pd-l-100">        
            <img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyetube.png" alt="">
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
							<img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">
							<!--<img src="<?=base_url()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">-->
							<div class="btn-play">
								<img src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="">
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
						<img class="v-et-2 v-et-100 m-b-35" width="100%" src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">
							<div class="container btn-play2"><img src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;"></div>	
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
                <span href="" data-target="#esTab" data-slide-to="0" class="">eyesoccer star</span>
                <span href="" data-target="#esTab" data-slide-to="1" class="">video popular</span>
                <span href="" data-target="#esTab" data-slide-to="2" class="">video kamu</span>
                <hr>
                <div id="esTab" class="carousel slide">
					<div role="listbox" class="carousel-inner">                    
                        <div class="box item active">
                            <div class="box-vl pd-b-10">
                                <a href="" class="vl">Video Lainnya</a>
                                <i class="material-icons r-vl">keyboard_arrow_right</i>                                
                            </div>
							<?php
							foreach ($eyetube_stars as $stars)
							{
							?>
							<a href="<?=base_url().'eyetube/detail/'.$stars['url']; ?>" style="text-decoration: unset;">
								<div class="vid-box-vl">
									<div class="vid-box-vl-img">
										<img src="<?=imgUrl()?>systems/eyetube_storage/<?= $stars['thumb'];?>" alt="">
										<div class="container btn-play2" style="top:-90px; left:110px; width:40px; height:40px;"><img src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;"></div>
									</div>
									<div class="container" style="height:45px; overflow:hidden; margin-bottom:5px;"><span class="vid-ttl"><?= $stars['title']; ?></span><br></div>
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
                        <div class="box item">
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
									<!--<img src="assets/img/video-small.png" alt="">-->
									<div class="vid-box-vl-img">
										<img src="<?=imgUrl()?>systems/eyetube_storage/<?= $populer['thumb'];?>" alt="">
										<div class="container btn-play2" style="top:-90px; left:110px; width:40px; height:40px;"><img src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;"></div>
									</div>
									<div class="container" style="height:67px; overflow:hidden; margin-bottom:5px;"><span class="vid-ttl"><?= $populer['title']; ?></span><br></div>
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
                        <div class="box item">
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
										<img src="<?=imgUrl()?>systems/eyetube_storage/<?= $kamu['thumb'];?>" alt="">
										<div class="container btn-play2" style="top:-90px; left:110px; width:40px; height:40px;"><img src="<?php echo base_url()?>assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;"></div>
									</div>
									<div class="container" style="height:67px; overflow:hidden; margin-bottom:5px;"><span class="vid-ttl"><?= $kamu['title']; ?></span><br></div>
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
        <div class="center-dekstop pd-l-100">
            <div class="et-content m-b-150">
                <div class="et-content1">
                    <img class="img-title" src="<?php echo base_url(); ?>assets/img/ic_eyenews.png" alt="">
                    <h2 class="title en">EyeNews</h2>
                    <hr class="x-en">
					<a href="<?php echo base_url(); ?>eyenews/detail/<?php echo $eyenews_main->url?>">
						<div class="t-en-content2" style="margin-top:1px; z-index:1; top:283px; padding:10px; width:580px; background-color:#00000050;"> 
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
					<div style="width:100%;height:374px;"><img style="margin-bottom:-40px !important;" class="v-et-2 w-100" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $eyenews_main->thumb1; ?>" alt="<?php echo $eyenews_main->title; ?>" ></div>
					</a>
                    <div class="h-berita-terkait" style="margin:40px 0;height:125px;overflow:hidden;">
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
								<img src="<?php echo base_url(); ?>assets/img/chevron-right-red.png"> <?= $similar['title']; ?></a>
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
                    <img class="img-title" src="<?php echo base_url()?>assets/home/img/ic-eyeme.png" alt="">
                    <h2 class="title em">EyeMe</h2>
                    <hr class="x-em">				
                    <div class="c-em-content2" style="top: -20px;">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">	
                        <img src="<?php echo base_url()?>assets/home/img/eyeme-photo thumbnail.png" alt="">					
                        <div style="padding:8px; text-align:center">
							<button type="text" class="em-btn">Lihat Foto Lainnya</button>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="center-dekstop pd-l-100">
            <div class="et-content">
                <div class="et-content1">
                    <div class="container tab2">
                        <span href="" data-target="#tab2" data-slide-to="0" class="">terpopuler</span>
                        <span href="" data-target="#tab2" data-slide-to="1" class="">rekomendasi</span>
                        <span href="" data-target="#tab2" data-slide-to="2" class="">usia muda</span>
                        <hr>
                        <div id="tab2" class="carousel slide">
                            <div role="listbox" class="carousel-inner">                    
                                <div class="box item active">
									<x>
                                        <a href="">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
								<?php
								foreach($eyenews_populer as $populer){
								?>
                                    <div class="rek-ber">
										<div class="rek-ber-c">
											<!--<img src="assets/img/video-small.png" style="width:150px" alt="">-->
											<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $populer['thumb1']; ?>" style="width:100%; min-height:100%;" alt=""></div>
											<div class="container" style="width: 70%;float:  right;">
												<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$populer['createon'];?></span>
											<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
												<a href="<?=base_url().'eyenews/detail/'.$populer['url']; ?>" style="text-decoration: unset;color:black;"><?=$populer['title'];?>
												</a>
											</h1>
											<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
												$keterangan = strip_tags($populer['description']);
												echo word_limiter($keterangan,25);
											?></p></div>
										</div>
                                        <hr>                                        
                                    </div>
								<?php
								}
								?>
                                </div>
                                <div class="box item">
									<x>
                                        <a href="">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
								<?php
								foreach($eyenews_rekomendasi as $rekomendasi){
								?>
                                    <div class="rek-ber">
										<div class="rek-ber-c">
										<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>"style="width:100%; min-height:100%;" alt=""></div>
										<div class="container" style="width: 70%;float:  right;">	
										<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$rekomendasi['createon'];?></span>
										<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
												<a href="<?=base_url().'eyenews/detail/'.$rekomendasi['url']; ?>" style="text-decoration: unset;color:black;">
												<?=$rekomendasi['title'];?>
												</a>
											</h1>
											<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
												$keterangan = strip_tags($rekomendasi['description']);
												echo word_limiter($keterangan,15);
											?></p></div>
										</div>
                                        <hr>
                                    </div>
									<?php
									}
									?>
                                </div>
                                <div class="box item">
									<x>
                                        <a href="<?php echo base_url()?>eyenews">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
								<?php
								foreach($eyenews_muda as $muda){
								?>
                                    <div class="rek-ber">
										<div class="rek-ber-c">
										<div style="width: 160px;height: 100px;overflow:  hidden;display:  inline-block;"><img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $muda['thumb1']; ?>" style="width:100%; min-height:100%;" alt=""></div>
											<div class="container" style="width: 70%;float:  right;">	
										<span style="font-size: .65em;color: gray;font-weight: 500;"><?=$muda['createon'];?></span>
											<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 40px;overflow: hidden;">
												<a href="<?=base_url().'eyenews/detail/'.$muda['url']; ?>" style="text-decoration: unset;color:black;">
												<?=$muda['title'];?>
												</a>
											</h1>
											<p style="font-size: .7em;color: #aba6a6;height: 32px;overflow: hidden;"><?php
												$keterangan = strip_tags($muda['description']);
												echo word_limiter($keterangan,15);
											?></p></div>
										</div>
                                        <hr>
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
                    <img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyemarket.png" alt="">
                    <h2 class="title emar">EyeMarket</h2>
                    <hr class="x-emar">
                        <div class="rek-ber" style="margin-top: -8px;">			
							<?php foreach ($products as $produk)
							{
							?>
							<div class="rek-ber-c" style="border-bottom: 1px solid slategray;padding: 10px 0 15px 0; margin-top: 0;">
								<div style="width: 100px;height:  100px;overflow:  hidden;display:  inline-block;">
									<img src="<?= base_url(); ?>img/eyemarket/produk/<?= $produk['image1'] ?>" alt="" style="width:100%; min-height:100%;">
								</div>
                                <div class="container" style="width: 75%;display:  inline-block;float:  right;">
									<h1 style="line-height: 1em;font-size: 1em;font-weight: 500;margin-top: 1px;height: 34px;overflow: hidden;"><?= $produk['nama']; ?></h1>
									<span class="price" style="font-size: .7em;color: gray;font-weight: 400;text-transform: uppercase;top: 20px;">HARGA</span>
									<p class="prices" style="font-size: 1em;color: black;font-weight: 500;margin:  0;">Rp.<?= number_format($produk['harga'],0,',','.'); ?></p>
									<a href="<?= base_url(); ?>eyemarket/detail/<?= $produk['toko']; ?>/<?= $produk['title_slug']; ?>" style="text-decoration:  none;color: #ff9900;font-weight:  500;"><button type="text" class="beli" style="float:  right;position:  relative;top: -25px;">Beli</a></button>
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
        <div class="center-dekstop pd-l-100">
            <div class="banner-150">
                <img src="" alt="">
            </div>
        </div>
        <!-- EYEVENT -->
        <div class="center-dekstop pd-l-100">
            <img class="img-title" src="<?php echo base_url()?>assets/home/img/ic_eyevent.png" alt="">
            <h2 class="title ee">EyeVent</h2>
            <hr class="x-ee">
            <span>
                <a href="<?=base_url()?>eventlainnya" class="el">Event Lainnya</a>
                <i class="material-icons r-el">keyboard_arrow_right</i>                                
            </span>
            <div class="container">
                <div id="evSlide" class="carousel slide t-30" style="width: 100% !important;overflow:hidden;">
                    <div role="listbox" class="carousel-inner" style="width: max-content;">  				
                        <div class="box item active">	
						<?php
						foreach($eyevent_main as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
                            </div>
						<?php }?>
                        </div>
                        <div class="box item">	
						<?php
						foreach($eyevent_main_2 as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
                            </div>
						<?php }?>
                        </div>
						<div class="box item">	
						<?php
						foreach($eyevent_main_3 as $row){
						?>
                            <div class="ev-box-content">
                                <!--<img src="assets/img/video-small.png" alt="">-->
								<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $row['thumb1']; ?>">								
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
        <div class="center-dekstop pd-l-100 pd-b-100">
            <div class="container t-40">
                <div class="et-content1">
                    <span class="jp green">JADWAL PERTANDINGAN</span>
                    <div class="border-box" style="margin-top: 23px;">
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
							<?php
							foreach($jadwal_today as $row){
							?>
								<tbody>
									<tr>
										<td class="tx-r"><?=$row["club_a"]?><span class="i-l"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
										<td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
										<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
										</td>
										<td class="tx-l"><span class="i-r"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span><?=$row["club_b"]?></td>
									</tr>
								</tbody>
							<?php }?>
							</table>
						</div>
						<div id="tbl_jadwal_tomorrow" style="display:none">
							
							<table class="table border-b">
							<?php
						foreach($jadwal_tomorrow1 as $row){
						?>
                            <tbody>
                                <tr>
                                    <td class="tx-r"><?=$row["club_a"]?><span class="i-l"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
                                    <td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
									<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
									</td>
                                    <td class="tx-l"><span class="i-r"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span><?=$row["club_b"]?></td>
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
										<td class="tx-r"><?=$row["club_a"]?><span class="i-l"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
										<td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"><?=$row["live_pertandingan"]?></span>
										<span class="t-live"><?=$row["lokasi_pertandingan"]?></span>
										</td>
										<td class="tx-l"><span class="i-r"><img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span><?=$row["club_b"]?></td>
									</tr>
								</tbody>
							<?php }?>
							</table>
						</div>
                        <div class="t-c-b">
                            <button type="" class="btn-green">Lihat Jadwal Lainnya</button>
                        </div>
                    </div>
                </div>
                <div class="et-content2">
                    <span class="jp">KLASEMEN</span>
                <select id="" name="" selected="true" class="slc-musim fl-r">
				<?php
					foreach($kompetisi as $row){
				?>
					<option><?=$row['competition']?></option>';  
				<?php
					}
				?>
                </select>
                    <div class="border-box">
                        <table class="table table-striped">
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
					$html = file_get_contents('http://www.klasemenliga.com/?page=competition&id=629'); //get the html returned from the following url

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
                        <span>
                            <a href="" class="ttl">Lihat Selengkapnya</a>
                            <i class="material-icons r-ttl">keyboard_arrow_right</i>                                
                        </span>                      
                    </div>
                </div>
            </div>
        </div>
		<script>
			$(document).ready(function(){
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
			})
		</script>