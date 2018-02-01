</div>
		<style>
			.pagination > .active > a {
				z-index:1;
			}
.time-view{
	top: -25px;
}
.news-rcm {
    width: 690px;
}
.n-rcm-up{
	border: none;
}
.news-rcm img {
    min-width: 100%;
    height: 100%;
}
.news-rcm-d {
    height: 100px;
    overflow: hidden;
}
.news-rcm-r2 td {
	padding: 4.5px 0px;
}
		</style>



		<div class="crumb">
			<ul>
				<li>Home</li>
				<li>EyeNews</li>
				<!-- <li>Pemain</li> -->
			</ul>
		</div>
		<div class="desktop">
        <div class="center-desktop m-0">
		<div class="menu-3 m-0">
        <div class="container over-x">
            <div class="w-max">
            <ul>
                <?php 
                    foreach ($tube_type as $value)
                    {
                        $url1   = str_replace(' ', '-', $value->category_name);
                ?>
                        <li>
                            <a href="<?= base_url(); ?>eyetube/kategori/<?= $url1; ?>"><?= $value->category_name; ?></a>
                        </li>
                <?php  
                    }
                ?>
            </ul>
            </div>
        </div>
		<div class="container p-r ar-menu-3">
			<i class="material-icons fl-l">keyboard_arrow_left</i>
			<i class="material-icons fl-r">keyboard_arrow_right</i>
		</div>

        </div>
        </div>
        <div class="center-desktop  m-0">
            <div class="m-0">
                <div class="container ">
				
					<?php
		
						foreach ($pagging['row'] as $similar)
						{
					?>
							<div class="w4">
								<a href="<?php echo base_url(); ?>eyetube/detail/<?= $similar->url;?>" class="container">
									<div class="w4-f">
										<img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $similar->thumb1; ?>" style="width:100%;margin-right:20px;" alt="<?= $similar->title; ?>" title="<?= $similar->title; ?>">
										<div class="container btn-play2"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
									</div>
										<p class="sub-en">									
										<?= $similar->title; ?></p>
										<span class="time-view">
										<?php
										$date 		=  new DateTime($similar->createon);
										$tanggal 	= date_format($date,"Y-m-d H:i:s");
										$real_time = relative_time($tanggal);

										echo relative_time($tanggal) . ' lalu - '.$similar->tube_view.' views';
										?>								
										</span>
									
								</a>
							</div>
					<?php
						}
					?>
					<div class="container"><?php echo $pagging['pagging'];?></div>
                </div>
            </div>
            
            <div class="m-0">
                <div class="container m-t-5">
                    <div class="m-0">
                        <div class="container news-rcm">
                            <div class="subjudul">
                                <h4>REKOMENDASI</h4>
                            </div>
							<?php
								foreach($eyetube_rekomendasi as $rekomendasi)
								{
							?>	
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi['url'];?>">
										<div class="container garis-x4">
											<div class="container" style="width:240px;height:145px;overflow:hidden;">
												<img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $rekomendasi['thumb1']; ?>" alt="<?=$rekomendasi['title'];?>" title="<?=$rekomendasi['title'];?>">
												<div class="container btn-play2" style="left: 100px;"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
											</div>
											<div class="container news-rcm-z">
												<div class="rr">
													<span><?=$rekomendasi['createon'];?></span>
												</div>
												<p>										
													<?=$rekomendasi['title'];?> 
												</p>
												<span>
													<?php
														$keterangan = strip_tags($rekomendasi['description']);
														echo word_limiter($keterangan,15);
													?>									
												</span>
											</div>
										</div>
									</a>
							<?php
								} 
							?>
							
                        </div>
                        <div class="container news-rcm-r">
                            <div class="subjudul">
                                <h4>TERPOPULER</h4>
                            </div>
                            <div class="n-rcm-up">
								<?php 
									foreach($eyetube_populer as $row)
									{
								?>
									<a href="<?php echo base_url(); ?>eyetube/detail/<?= $row['url'];?>">
										<div class="container" style="border:1px solid gainsboro;">
										<div style="width:100%; height:200px; overflow:hidden;">
											<img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $row['thumb1']; ?>" alt="" style="width:100%;">
											<div class="container btn-play2" style="width:60px; height:60px; top:-130px; left:150px;"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
										</div>
		                                <div class="n-rcm-up-teks">
		                                    <div class="rr">
		                                        <span><?=$row['createon'];?></span>
		                                    </div>
		                                    
		                                        <span>
													<?=$row['title'];?>									
												</span>
		                                    
										</div>
										</div>
									</a>
								<?php
									break;
									}
								?>
                            </div>
							<?php 
							foreach ($eyetube_sub_populer as $populer2)
							{
							?>							
							<a href="<?php echo base_url(); ?>eyetube/detail/<?= $populer2['url'];?>">
                            <div class="container news-rcm-d">							
                                    <div class="nn">
									<img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $populer2['thumb']; ?>" alt="">
									<div class="container btn-play2" style="left:30px; top:-75px;"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
									</div>
                                
                                <div class="container rm">
                                    
                                        <span>
										<?=$populer2['title'];?></span>
                                    
                                    <div class="rr">
                                        <span>
										<?php
											$date 		=  new DateTime($populer2['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' lalu - '.$populer2['tube_view'].' views';
										?>
										</span>
                                    </div>
								</div>
                            </div></a>
							<?php
							}
							?>							
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="m-0">
                    <div class="subjudul">
                        <h4>EyeNews</h4>
                    </div>
                </div>
                <div class="m-0">			
                    <div class="container m-t-5 bbg">
						<?php
							
							if(count($news) > 0 ){
								foreach($news as $k => $v){
								echo '<div class="4">';

									echo '<a href="'.$v->url.'">';
										echo '<div class="vid-box-vl">';

											echo '<div class="vid-box-vl-img">';
												echo "<img src=\"{$v->url_pic}/medium\" alt=\"{$v->title}\">";
											echo '</div>';

											echo '<p class="sub-en">';
												echo $v->title;
											echo '</p>';
											echo '<span class="time-view" style="top:-5px !important">';
												echo $v->publish_on;
											echo '</span>';
									
										echo '</div>';
									echo '</a>';

								echo '</div>';


								}

							}

						?>		
                    </div>
                </div>
            </div>
            <div class="container m-t-5">
                <div class="m-0 mt-10">
                    <div class="container news-rcm">
                        <div class="subjudul">
                            <h4>SOCCER SERI</h4>
                        </div>
						<?php
						// foreach($all_news as $row12){
						foreach($soccer_seri as $row12){
						?>
						<a href="<?php echo base_url(); ?>eyenews/detail/<?= $row12['url'];?>">
							<div class="container garis-x4">
								<div class="container" style="width:240px;height:150px;overflow:hidden;">
									<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row12['thumb1']; ?>" alt="<?=$row12['title']?>" title="<?=$row12['title']?>">
									<div class="container btn-play2" style="left: 100px;"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
								</div>
								<div class="container news-rcm-z">
									<div class="rr">
										<span>
											<?php
												$date 		=  new DateTime($row12['createon']);
												$tanggal 	= date_format($date,"Y-m-d H:i:s");

												echo relative_time($tanggal) . ' lalu - '.$row12['news_view'].' views';
											?>									
										</span>
									</div>
									<p>									
									<?=$row12['title']?></p>
									<span>
										<?php
										$keterangan = strip_tags($row12['description']);
										echo word_limiter($keterangan,15);
										?>								
									</span>
								</div>
							</div>
						</a>
					<?php } ?>
                    </div>
                    <div class="container news-rcm-r2">
                        <div class="subjudul">
                            <h4>JADWAL LIVE</h4>
                        </div>
                        <div>
                            <table>
							<?php
							foreach($jadwal_today as $row){
							?>							
                                <tr>
                                    <td colspan="5" style="color: gray;">
										<span><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><?=$row["club_a"]?></span>
                                    </td>
                                    <td>
                                        <img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt="">
                                    </td>
                                    <td>
                                        
                                        <p><?=$row['live_pertandingan']?></p>
                                    </td>
                                    <td>
                                        <img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt="">
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
                            <div class="fl-r mt-10">
                                <a href="">
                                    <p class="lp" style="margin:0px;">Lihat selengkapnya ></p>
                                </a>
                            </div><br><br><br><br><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
