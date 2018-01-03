
        <div class="center-desktop m-0">
            <div class="menu-3 w1020 m-0">
                <ul>
                    <li>
                        <a href="">EYESOCCER FACT</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER FLASH</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER PEDIA</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER PREVIEW</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER HITS</a>
                    </li>
                    <li class="m-0-0">
                        <a href="">EYESOCCER STAR</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x m-t-35"></div>
        </div>
        <div class="center-desktop m-0">
            <div class="container">
                <div class="w1020 m-0 m-t-14">
                    <div class="half">
						<?php
						foreach($video_eyetube as $videonya){
						?>					
                        <div class="gambar">
                            <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="width:554px;">
                            <div class="bottom-left">
                                <h4><?=$videonya['title']?></h4>
                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>"><button class="btn-biru" type="button">Lihat</a></button>
                            </div>
                        </div>
						<?php break; }?>
                    </div>
                    <div class="half p-d-l-20">
					<?php
								$i = 0;
								foreach ($video_eyetube as $videonya)
								{
									if ($i != 0)
									{
					?>					
                        <div class="gambar">
                            <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="margin-left:42px; width:554px;">
                            <div class="bottom-left">
                                <h4 style="margin-left:42px;"><?=$videonya['title']?></h4>
                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>"><button class="btn-biru" style="margin-left:42px;" type="button">Lihat</a></button>
                            </div>
                        </div>
					<?php
					}
					$i++;

					}
					?>						
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 m-t-100">
                <div class="subjudul">
                    <h4>VIDEO POPULAR</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 m-t-45">
				<?php
				$this->load->helper('my');			
				foreach ($eyetube_populer as $populer)
				{
				?>			
                <div class="w30">
                    <div>
                        <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $populer['thumb']; ?>" style="width:100%;margin-right:20px;">
                        <p class="sub-en">
						<a href="<?php echo base_url(); ?>eyetube/detail/<?= $populer['url']; ?>" style="text-decoration:none;">
						<?= $populer['title']; ?></a></p>
                        <span class="time-view">
							<?php
	    						$date 		=  new DateTime($populer['createon']);
	    						$tanggal 	= date_format($date,"Y-m-d H:i:s");

	    						echo relative_time($tanggal) . ' ago - '.$populer['tube_view'].' views';
	    					?>						
						</span>
                    </div>
                </div>
				<?php }?>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 tx-c">
                <button class="btn-white" type="button">Tampilkan Video Lainnya</button>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>

        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>REKOMENDASI</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#rekom" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#rekom" role="button">keyboard_arrow_right</i>

                <div id="rekom" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
							<?php 
							foreach($eyetube_rekomendasi as $rekomendasi){
							?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $rekomendasi['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi['url']; ?>" style="text-decoration:none;">
									<?=$rekomendasi['title']?></a></p>
                                    <span class="time-view">
									<?php
											$date 		=  new DateTime($rekomendasi['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$rekomendasi['tube_view'].' views';
										?>
									</span>
                                </div>
                            </div>  
							<?php
							}
							?>							
                        </div>
                        <div class="box item">
							<?php 
							foreach($eyetube_rekomendasi_2 as $rekomendasi_2){
							?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $rekomendasi_2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi_2['url']; ?>" style="text-decoration:none;">
									<?=$rekomendasi_2['title']?></a></p>
                                    <span class="time-view">
									<?php
											$date 		=  new DateTime($rekomendasi_2['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$rekomendasi_2['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div>
							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>

        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>SOCCER SAINS</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#soccersains" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#soccersains" role="button">keyboard_arrow_right</i>
                <div id="soccersains" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
							<?php
								foreach($eyetube_science as $science){
							?>
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $science['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $science['url']; ?>" style="text-decoration:none;">
									<?=$science['title']?></a></p>
                                    <span class="time-view">
										<?php
											$date 		=  new DateTime($science['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$science['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div> 
						<?php }?>							
                        </div>
                        <div class="box item">
							<?php
								foreach($eyetube_science_2 as $science2){
							?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $science2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $science2['url']; ?>" style="text-decoration:none;">
									<?=$science2['title']?></a></p>
                                    <span class="time-view">
										<?php
											$date 		=  new DateTime($science2['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$science2['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div>
								<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>VIDEO KAMU</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#videokamu" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#videokamu" role="button">keyboard_arrow_right</i>
                <div id="videokamu" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
						<?php
						foreach($eyetube_kamu as $kamu){
						?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $kamu['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $kamu['url']; ?>" style="text-decoration:none;">
									<?=$kamu['title']?></a></p>
                                    <span class="time-view">
										<?php
											$date 		=  new DateTime($kamu['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$kamu['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div>
						<?php } ?>				
                        </div>
                        <div class="box item">
                            <div class="w30">
                                <div>
                                    <img src="assets/img/a.jpg" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">Lorem ipsum dolor sit amet, consectur adipiscing elit.</p>
                                    <span class="time-view">
									
									</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>PROFIL SSB</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#profilssb" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#profilssb" role="button">keyboard_arrow_right</i>
                <div id="profilssb" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
						<?php
						foreach($eyetube_ssb as $ssb){
						?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $ssb['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb['url']; ?>" style="text-decoration:none;">
									<?=$ssb['title']?></a></p>
                                    <span class="time-view">
										<?php
											$date 		=  new DateTime($ssb['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$ssb['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div>
							<?php } ?>
                        </div>
                        <div class="box item">
						<?php
						foreach($eyetube_ssb_2 as $ssb_2){
						?>						
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $ssb_2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb_2['url']; ?>" style="text-decoration:none;">
									<?=$ssb_2['title']?></a></p>
                                    <span class="time-view">
										<?php
											$date 		=  new DateTime($ssb_2['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' ago - '.$ssb_2['tube_view'].' views';
										?>									
									</span>
                                </div>
                            </div>
						<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>