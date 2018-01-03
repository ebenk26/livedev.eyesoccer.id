
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
            <img class="img-title" src="assets/img/ic_eyeprofile.png" alt="">
            <h2 class="title ep">EyeProfile</h2>
            <hr class="x-ep">
            <span>
                <a href="" class="kl">Klub Lainnya</a>
                <i class="material-icons r-kl">keyboard_arrow_right</i>                                
            </span>            
            <div id="epSlide" class="carousel slide">			  
				<div role="listbox" class="carousel-inner"> 
					<div class="box item active">
						<?php 
							foreach ($profile_club as $club)
							{
						?>			
							
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
							
						<?php 
						}
						?>
					</div>
					<div class="box item">
						<?php 
							foreach ($profile_club_2 as $club)
							{
						?>			
							
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
							
						<?php 
						}
						?>
					</div>
					<div class="box item">
						<?php 
							foreach ($profile_club_3 as $club)
							{
						?>			
							
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
							<div class="ctn-pemain">
								<!--<img src="assets/img/ss-img.png" alt="">-->
								<img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt="">
								<div class="des">
									<h3><?= $player['nama']; ?></h3>
									<p>Posisi: <?= $player['posisi']; ?><br>
									Klub: <?= $player['klub']; ?><br>
									Tanggal Lahir: <?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></p>                        
								</div>
							</div>
						<?php
						}
						?>	
					</div>
						
					<div class="item">
						<?php
						foreach ($profile_player_2 as $player)
						{	
						?>				
							<div class="ctn-pemain">
								<!--<img src="assets/img/ss-img.png" alt="">-->
								<img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt="">
								<div class="des">
									<h3><?= $player['nama']; ?></h3>
									<p>Posisi: <?= $player['posisi']; ?><br>
									Klub: <?= $player['klub']; ?><br>
									Tanggal Lahir: <?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></p>                        
								</div>
							</div>
						<?php
						}
						?>
					</div>
					
					<div class="item">
						<?php
						foreach ($profile_player_3 as $player)
						{	
						?>				
							<div class="ctn-pemain">
								<!--<img src="assets/img/ss-img.png" alt="">-->
								<img src="<?php echo imgUrl();?>systems/player_storage/<?= $player['foto']; ?>" alt="">
								<div class="des">
									<h3><?= $player['nama']; ?></h3>
									<p>Posisi: <?= $player['posisi']; ?><br>
									Klub: <?= $player['klub']; ?><br>
									Tanggal Lahir: <?= $player['tanggal']." ".$bulan[$player['bulan']]." ".$player['tahun']; ?></p>                        
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
        <!-- EYETUBE -->
        <div class="center-dekstop pd-l-100">        
            <img class="img-title" src="assets/img/ic_eyetube.png" alt="">
            <h2 class="title et">EyeTube</h2>
            <hr class="x-et">
            <div class="et-content m-b-100">
                <div class="et-content1 m-t-22">
				<?php
				foreach ($video_eyetube as $videonya)
				{
				?>
                    <div class="et-v-content">
                        <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">
                        <!--<img src="<?=base_url()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">-->
                        <div class="btn-play">
                            <img src="assets/img/btn-play.png" alt="">
                        </div>
                    </div>
                    <span class="et-st">
					<?php
						$date 		=  new DateTime($videonya['createon']);
						$tanggal 	= date_format($date,"Y-m-d H:i:s");
						echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
					?>					
					</span>
                    <h1 class="et-title"><?= $videonya['title']; ?></h1>
                    <p class="et-d">
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
                    <div class="v-et-content2">
					<?php
								$i = 0;
								foreach ($video_eyetube as $videonya)
								{
									if ($i != 0)
									{
					?>					
                        <div class="t-et-content2">
                            <span class="et-st"><?php
						$date 		=  new DateTime($videonya['createon']);
						$tanggal 	= date_format($date,"Y-m-d H:i:s");
						echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
					?></span>
                            <p class="et-st-det"><?= $videonya['title']; ?></p>
                        </div>
                        <img class="v-et-2 v-et-100" width="100%" src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" alt="">
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
                            <div class="vid-box-vl">
                                <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $stars['thumb'];?>" alt="">
                                <a href="" class="vid-ttl"><?= $stars['title']; ?></a><br>
                                <p class="vid-time"><?php
	    						$date 		=  new DateTime($stars['createon']);
	    						$tanggal 	= date_format($date,"Y-m-d H:i:s");

	    						echo relative_time($tanggal) . ' ago - '.$stars['tube_view'].' views';
	    					?></p>                              
                            </div>
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
                            <div class="vid-box-vl">
                                <!--<img src="assets/img/video-small.png" alt="">-->
                                <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $populer['thumb'];?>" alt="">
                                <a href="" class="vid-ttl"><?= $populer['title']; ?></a><br>
                                <p class="vid-time"><?php
	    						$date 		=  new DateTime($populer['createon']);
	    						$tanggal 	= date_format($date,"Y-m-d H:i:s");

	    						echo relative_time($tanggal) . ' ago - '.$populer['tube_view'].' views';
	    					?></p>                              
                            </div>
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
                            <div class="vid-box-vl">
                                <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $kamu['thumb'];?>" alt="">
                                <a href="" class="vid-ttl"><?= $kamu['title']; ?></a><br>
                                <p class="vid-time"><?php
	    						$date 		=  new DateTime($kamu['createon']);
	    						$tanggal 	= date_format($date,"Y-m-d H:i:s");

	    						echo relative_time($tanggal) . ' ago - '.$kamu['tube_view'].' views';
	    					?></p>                              
                            </div>
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
                    <div class="t-en-content2">
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
                    <img class="v-et-2 w-100" src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $eyenews_main->thumb1; ?>" alt="">
                    <div class="h-berita-terkait" style="margin-bottom:26px;">
                        <h3>Berita Terkait</h3>
						<?php
						$i = 0;
						foreach ($eyenews_similar as $similar)
						{
						if ($i != 0)
						{
						?>						
                        <ul>
                            <li>
                                <a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar['eyenews_id'];?>">
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
                    <img class="img-title" src="assets/img/ic-eyeme.png" alt="">
                    <h2 class="title em">EyeMe</h2>
                    <hr class="x-em">				
                    <div class="c-em-content2">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">					
                        <img src="assets/img/eyeme-photo thumbnail.png" alt="">					
                        <button type="text" class="em-btn">Lihat Foto Lainnya</button>
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
								<?php
								foreach($eyenews_populer as $populer){
								?>
                                    <x>
                                        <a href="">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">
                                            <!--<img src="assets/img/video-small.png" style="width:150px" alt="">-->
                                            <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $populer['thumb1']; ?>" style="width:150px" alt="">
                                            <span><?=$populer['createon'];?></span>
                                            <h1><?=$populer['title'];?></h1>
                                            <p><?php
												$keterangan = strip_tags($populer['description']);
												echo word_limiter($keterangan,25);
											?></p>
                                        </div>
                                        <hr>                                        
                                    </div>
								<?php
								}
								?>
                                </div>
                                <div class="box item">
								<?php
								foreach($eyenews_rekomendasi as $rekomendasi){
								?>
                                    <x>
                                        <a href="">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">
                                            <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>" style="width:150px" alt="">
                                            <span><?=$rekomendasi['createon'];?></span>
                                            <h1><?=$rekomendasi['title'];?></h1>
                                            <p><?php
												$keterangan = strip_tags($rekomendasi['description']);
												echo word_limiter($keterangan,15);
											?></p>
                                        </div>
                                        <hr>
                                    </div>
									<?php
									}
									?>
                                </div>
                                <div class="box item">
																	<?php
								foreach($eyenews_muda as $muda){
								?>
                                    <x>
                                        <a href="">Berita Lainnya</a>
                                        <i class="material-icons r-tab2">keyboard_arrow_right</i>                                
                                    </x>
                                    <div class="rek-ber">
                                        <div class="rek-ber-c">
                                            <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $muda['thumb1']; ?>" style="width:150px" alt="">
                                            <span><?=$muda['createon'];?></span>
                                            <h1><?=$muda['title'];?></h1>
                                            <p><?php
												$keterangan = strip_tags($muda['description']);
												echo word_limiter($keterangan,15);
											?></p>
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
                    <img class="img-title" src="assets/img/ic_eyemarket.png" alt="">
                    <h2 class="title emar">EyeMarket</h2>
                    <hr class="x-emar">
                        <div class="rek-ber m-t-14">
						<?php
							foreach ($eyemarket_main as $row1){
						?>						
                            <div class="rek-ber-c">
								<img src="assets/img/video-small.png" alt="" style="width:110px; height:90px;">
								<!--<img src="systems/eyemarket_storage/<?=$row1["pic"]?>" alt="" style="width:110px; height:90px;">-->
                                <h1><?php echo $row1['product_name'];  ?> </h1>
                                <span class="price">HARGA</span>
                                <p class="prices">Rp.<?php echo number_format($row1['price'],2,",","."); ?></p>
                                <a href="<?=base_url()?>eyemarket/detail/<?php print $row1['id_product']; ?>"><button type="text" class="beli">Beli</a></button>
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
            <img class="img-title" src="assets/img/ic_eyevent.png" alt="">
            <h2 class="title ee">EyeVent</h2>
            <hr class="x-ee">
            <span>
                <a href="<?=base_url()?>eventlainnya" class="el">Event Lainnya</a>
                <i class="material-icons r-el">keyboard_arrow_right</i>                                
            </span>
            <div class="container">
                <div id="evSlide" class="carousel slide t-30" style="width: 100% !important;">
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
                    <div class="border-box">
                        <div class="container bg-g">						
                            <div class="t-tab">
                                <div class="day-choose">
                                    <a href="">Kemarin
                                        <span>
											<?php
												$date = new DateTime(date("Y-m-d"));
												$date->modify('-1 day');
												echo $date->format('Y-m-d');
											?>
										</span>
                                    </a>
                                </div>
                                <div class="day-choose t-active">
                                    <a href="">Hari ini
                                        <span><?=date("d F")?></span>
                                    </a>
                                </div>
                                <div class="day-choose">
                                    <a href="">Besok
                                        <span>
											<?php
												$date = new DateTime(date("Y-m-d"));
												$date->modify('+1 day');
												echo $date->format('Y-m-d');
											?>
										</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="table border-b">
						<?php
						foreach($jadwal_today as $row){
						?>
                            <tbody>
                                <tr>
                                    <td class="tx-r"><?=$row["club_a"]?><span class="i-l"><img src="<?=base_url()?>systems/club_logo/<?php print $row['club_a']; ?>" alt=""></span></td>
                                    <td class="tx-c"><?=date("H:i",strtotime($row["jadwal_pertandingan"]))?><span class="t-live"></span></td>
                                    <td class="tx-l"><span class="i-r"><img src="<?=base_url()?>systems/club_logo/<?php print $row['club_b']; ?>" alt=""></span><?=$row["club_b"]?></td>
                                </tr>
                            </tbody>
						<?php }?>
                        </table>
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
                                    <th>Main</th>
                                    <th>M</th>
                                    <th>S</th>
                                    <th>K</th>
                                    <th>Poin</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
							$no=1;
							foreach($klasemen as $classe){
								?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <img src="<?=base_url()?>systems/club_logo/<?php print $classe['logo']; ?>" alt="" width="15px"> <?=$classe['name']?></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
							<?php }?>
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