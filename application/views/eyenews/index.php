
<body>
    <div class="crumb">
        <ul>
            <li>Home</li>
            <li>EyeProfile</li>
            <li>Klub</li>
            <!-- <li>Pemain</li> -->
        </ul>
    </div>
    <div class="desktop">
        <div class="center-desktop m-0">
            <div class="menu-4 w1020 m-0">
                <ul>
                    <li>
                        <a href="">LIGA</a>
                    </li>
                    <li>
                        <a href="">PEMBINAAN</a>
                    </li>
                    <li>
                        <a href="">UMPAN LAMBUNG</a>
                    </li>
                    <li>
                        <a href="">PREDIKSI</a>
                    </li>
                    <li>
                        <a href="">PERISTIWA</a>
                    </li>
                    <li>
                        <a href="">SOCCER SAINS</a>
                    </li>
                    <li>
                        <a href="">ULAS TUNTAS</a>
                    </li>
                    <li class="m-0-0">
                        <a href="">PINGGIR LAPANGAN</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x m-t-30"></div>
        </div>
        <div class="center-desktop m-0">
            <div class="w1020 m-0">
                <div class="container h-news-l">
                    <div>
                        <img src="<?=base_url()?>systems/eyenews_storage/<?php print $headline->thumb1; ?>" alt="">
                    </div>
                    <div class="container p-r panah-news">
                        <div class="fl-l">
                            <a href="<?=base_url()?>eyenews/detail/<?=$headline->eyenews_id; ?>">
                                <i class="material-icons">keyboard_arrow_left</i>
                            </a>
                        </div>
                        <div class="fl-r">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container h-news-r">
                    <table>
                        <tr>
                            <td>
                                <h4>HEADLINE</h4>
                            </td>
                            <td>
                                <div class="rr">
                                    <span><?= $headline->createon; ?></span>

                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="pd" style="height: 370px;overflow: hidden;">
                        <div>
                            <a href="<?=base_url()?>eyenews/detail/<?=$headline->eyenews_id; ?>">
                                <h1><?= $headline->title; ?></h1>
                            </a>
                            <span>
							<?php
								$keterangan = strip_tags($headline->description);
								echo word_limiter($keterangan,25);
							?>							
							</span>
                            <ul class="list-1 mt-10">
						<?php
						$i = 0;
						foreach ($eyenews_similar as $row)
						{
						if ($i != 0)
						{
						?>							
                                <li>
                                    <span>
									<a href="<?php echo base_url(); ?>eyenews/detail/<?= $row['eyenews_id'];?>">
									<?= $row['title']; ?></a>									
									</span>
                                </li>
						<?php			
						}
						$i++;
						}
						?>								
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container m-t-65">
                <div class="w1020 m-0">
                    <div class="subjudul2">
                        <h4>BERITA TERKAIT</h4>
                    </div>
                </div>
                <div class="container m-t-15">
                    <div class="w1020 m-0">
						<?php
						$this->load->helper('my');
						foreach ($eyenews_similar as $similar)
						{
						?>
                        <div class="w30">
                            <div>
                                <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $similar['thumb1']; ?>" style="width:100%;margin-right:20px;">
                                <a href="">
                                    <p class="sub-en"><?= $similar['title']; ?></p>
                                </a>
                                <span class="time-view">
								<?php
	    						$date 		=  new DateTime($similar['createon']);
	    						$tanggal 	= date_format($date,"Y-m-d H:i:s");

	    						echo relative_time($tanggal) . ' lalu - '.$similar['news_view'].' views';
								?>								
								</span>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
            <div class="w1020 m-0">
                <div class="container m-t-5">
                    <div class="w1020 m-0">
                        <div class="container news-rcm">
                            <div class="subjudul2">
                                <h4>REKOMENDASI</h4>
                            </div>
							<?php
							foreach($eyenews_rekomendasi as $rekomendasi){
							?>							
                            <div class="container garis-x4">
                                <div class="container" style="width:240px;">
                                    <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>" alt="">
                                </div>
                                <div class="container news-rcm-z">
                                    <div class="rr">
                                        <span><?=$rekomendasi['createon'];?></span>
                                    </div>
                                    <a href="">
                                        <p><?=$rekomendasi['title'];?></p>
                                    </a>
                                    <span>
									<?php
									$keterangan = strip_tags($rekomendasi['description']);
									echo word_limiter($keterangan,15);
									?>									
									</span>
                                </div>
                            </div>
							<?php } ?>
							
                        </div>
                        <div class="container news-rcm-r">
                            <div class="subjudul2">
                                <h4>TERPOPULER</h4>
                            </div>
                            <div class="n-rcm-up">
							<?php 
							foreach($eyenews_populer as $row){
							?>
                                <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                                <div class="n-rcm-up-teks">
                                    <div class="rr">
                                        <span><?=$row['createon'];?></span>
                                    </div>
                                    <a href="">
                                        <span>
											<?=$row['title'];?>										
										</span>
                                    </a>
                                </div>
							<?php break; } ?>
                            </div>
							<?php
							$i = 0;
							foreach ($eyenews_populer as $row)
							{
							if ($i != 0)
							{
							?>							
                            <div class="container news-rcm-d">							
                                <a href="" class="nn">
                                    <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                                </a>
                                <div class="container rm">
                                    <a href="">
                                        <span><?=$row['title'];?></span>
                                    </a>
                                    <div class="rr">
                                        <span>
										<?php
											$date 		=  new DateTime($row['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' lalu - '.$row['news_view'].' views';
										?>
										</span>
                                    </div>
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
                <div class="w1020 m-0">
                    <div class="subjudul2">
                        <h4>VIDEO</h4>
                    </div>
                </div>
                <div class="w1020 m-0">			
                    <div class="container m-t-5 bbg">
					<?php
					foreach ($video_eyetube as $videonya)
					{
					?>						
                        <div class="w30">
                            <div>
                                <img src="<?php echo base_url(); ?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="width:100%;margin-right:20px;">
                                <a href="">
                                    <p class="sub-en"><?= $videonya['title']; ?></p>
                                </a>
                                <span class="time-view">
								<?php
									$date 		=  new DateTime($videonya['createon']);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");
									echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
								?>								
								</span>
                            </div>
                        </div>
					<?php }?>						
                    </div>
                </div>
            </div>
            <div class="container m-t-5">
                <div class="w1020 m-0 mt-10">
                    <div class="container news-rcm">
                        <div class="subjudul2">
                            <h4>RAGAM</h4>
                        </div>
						<?php
						foreach($all_news as $row){
						?>
                        <div class="container garis-x4">
                            <div class="container" style="width:240px;">
                                <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                            </div>
                            <div class="container news-rcm-z">
                                <div class="rr">
                                    <span>
										<?php
											$date 		=  new DateTime($row['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' lalu - '.$row['news_view'].' views';
										?>									
									</span>
                                </div>
                                <a href="">
                                    <p><?=$row['title']?></p>
                                </a>
                                <span>
									<?php
									$keterangan = strip_tags($row['description']);
									echo word_limiter($keterangan,15);
									?>								
								</span>
                            </div>
                        </div>
					<?php } ?>
                    </div>
                    <div class="container news-rcm-r2">
                        <div class="subjudul2">
                            <h4>JADWAL LIVE</h4>
                        </div>
                        <div class="line-b"></div>
                        <div>
                            <table>
							<?php
							foreach($jadwal_today as $row){
							?>							
                                <tr>
                                    <td colspan="5">
                                        <p class="lp"><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><?=$row["club_a"]?></span>
                                    </td>
                                    <td>
                                        <img src="<?=base_url()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt="">
                                    </td>
                                    <td>
                                        <span><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></span>
                                        <p><?=$row['live_pertandingan']?></p>
                                    </td>
                                    <td>
                                        <img src="<?=base_url()?>systems/club_logo/<?php print $row['club_a']; ?>" alt="">
                                    </td>
                                    <td>
                                        <span><?=$row["club_b"]?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="garis-x4"></td>
                                </tr>
							<?php } ?>
                            </table>
                            <div class="line-b"></div>
                            <div class="fl-r">
                                <a href="">
                                    <p class="lp" style="margin:0px;">Lihat selengkapnya ></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>