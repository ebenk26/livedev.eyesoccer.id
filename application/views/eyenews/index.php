<style>
.pagging-enews-home .pagination > li > a, .pagination > li > span {
    color: rgb(200,0,0);
}
.pagging-enews-home .pagination > .active > a, .pagging-enews-home .pagination > .active > a:hover{
    background-color: rgb(200,0,0);
    border-color: rgb(200,0,0);
    color: white;
    z-index: 1;
}
            .menu-3 a:hover{
                border-bottom: 3px solid rgb(200, 0, 0);
                color: rgb(200, 0, 0);
            }

</style>
<div class="crumb">
        <ul>
            <li>Home</li>
            <li>EyeNews</li>
        </ul>
    </div>
    <div class="desktop">
        <div class="center-desktop m-0">
            <div class="menu-3 m-0">
                <div class="over-x m-0">
                    <div class="w-max">
                        <ul>
                            <?php
                                foreach ($news_type as $cat_name)
                                {
                            ?>
                                <li>
                                    <a href="<?php echo base_url()?>eyenews/kategori_page/<?php echo $cat_name->news_type?>"><?php echo $cat_name->news_type;?></a>
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
        <div class="center-desktop m-0 mt-20">
            <div class="m-0">
                <div class="container h-news-l">
                    <a href="<?=base_url();?>eyenews/detail/<?=$headline->url; ?>">
                        <div class="img-highlight-enews">
                            <img src="<?=imgUrl()?>systems/eyenews_storage/<?php print $headline->thumb1; ?>" alt="<?= $headline->title; ?>" title="<?= $headline->title; ?>">
                        </div>
                    </a>
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
                    <div class="pd o-h-3">
                        <div>
                            <a href="<?=base_url();?>eyenews/detail/<?=$headline->url; ?>">
                                <h1><?= $headline->title; ?></h1>
                            </a>
                            <span>
                                <?php
                                    $keterangan = strip_tags($headline->description);
                                    echo word_limiter($keterangan,27);
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
                                            <a href="<?php echo base_url(); ?>eyenews/detail/<?= $row['url'];?>">
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
            <div class="container">
                <div class="m-0">
                    <div class="subjudul2">
                        <h4>BERITA TERKAIT</h4>
                    </div>
                </div>
                <div class="container m-t-15">
                    <div class="w-max m-0">
                        <?php
						$this->load->helper('my');
						foreach ($pagging['row'] as $similar)
						{
						?>
                        <div class="w4">
							<a href="<?php echo base_url(); ?>eyenews/detail/<?= $similar->url;?>">
                                <div style="width:100%; height:160px; overflow:hidden;">
									<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $similar->thumb1; ?>" style="min-width:100%; height:100%;" alt="<?= $similar->title; ?>" title="<?= $similar->title; ?>">
                                </div>
                                    <p class="sub-en">									
									<?= $similar->title; ?></p>
									<span class="time-view">
									<?php
									$date 		=  new DateTime($similar->createon);
									$tanggal 	= date_format($date,"Y-m-d H:i:s");

									echo relative_time($tanggal) . ' lalu - '.$similar->news_view.' views';
									?>								
									</span>
							</a>
                        </div>
						<?php } ?>
						<div class="pagging-enews-home"><?php echo $pagging['pagging'];?></div>
                    </div>
                </div>
            </div>
            <div class="m-0">
                <div class="container m-t-5">
                    <div class="m-0">
                        <div class="container news-rcm">
                            <div class="subjudul2">
                                <h4>REKOMENDASI</h4>
                            </div>
                            <?php
							foreach($eyenews_rekomendasi as $rekomendasi){
							?>	
							<a href="<?php echo base_url(); ?>eyenews/detail/<?= $rekomendasi['url'];?>">
								<div class="container garis-x4">
									<div class="container" style="width:240px; height:145.5px; overflow:hidden;">
										<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>" alt="<?=$rekomendasi['title'];?>" title="<?=$rekomendasi['title'];?>" style="width:100%;min-height:100%;">
									</div>
									<div class="container news-rcm-z">
										<div class="rr">
											<span><?=$rekomendasi['createon'];?></span>
										</div>
										<p>										
										<?=$rekomendasi['title'];?></p>
										<span>
										<?php
										$keterangan = strip_tags($rekomendasi['description']);
										echo word_limiter($keterangan,15);
										?>									
										</span>
									</div>
								</div>
							</a>
							<?php } ?>
                        </div>
                        <div class="container news-rcm-r fl-r">
                            <div class="subjudul2">
                                <h4>TERPOPULER</h4>
                            </div>
                            <div class="n-rcm-up">
							<?php 
							foreach($eyenews_populer as $row){
							?>
                                <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                                <div class="n-rcm-up-teks">
                                    <div class="rr">
                                        <span><?=$row['createon'];?></span>
                                    </div>
                                    <a href="<?php echo base_url(); ?>eyenews/detail/<?= $row['url'];?>">
                                        <span>
											<?=$row['title'];?>									
										</span>
                                    </a>
                                </div>
							<?php break; } ?>
                            </div>
                            <?php
							foreach ($eyenews_populer2 as $populer2)
							{
							?>	
                            <div class="container news-rcm-d">
                                <a href="" class="nn">
                                    <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $populer2['thumb1']; ?>" alt="">
                                </a>
                                <div class="container rm">
                                    <a href="<?php echo base_url(); ?>eyenews/detail/<?= $populer2['url'];?>">
                                        <span><?=$populer2['title'];?></span>
                                    </a>
                                    <div class="rr">
                                        <span>
                                            <?php
											$date 		=  new DateTime($populer2['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");

											echo relative_time($tanggal) . ' lalu - '.$populer2['news_view'].' views';
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
							<?php
                            }
                            ?>	
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="m-0">
                    <div class="subjudul2">
                        <h4>EyeTube</h4>
                    </div>
                </div>
                <div class="m-0">
                    <div class="container m-t-5 bbg">
                        <?php
                        foreach ($video_eyetube as $videonya)
                        {
                        ?>						
                        <div class="w4">
							<a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url'];?>">
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="min-width:100%; height:100%;" alt="<?= $videonya['title']; ?>" title="<?= $videonya['title']; ?>">
                                    <div class="container btn-play2"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
                                </div>
                                    <p class="sub-en">
										<?= $videonya['title']; ?></p>
									<span class="time-view">
									<?php
										$date 		=  new DateTime($videonya['createon']);
										$tanggal 	= date_format($date,"Y-m-d H:i:s");
										echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
									?>								
									</span>
							</a>
                        </div>
					    <?php }?>
                    </div>
                </div>
            </div>
            <div class="container m-t-5">
                <div class="m-0 mt-10">
                    <div class="container news-rcm">
                        <div class="subjudul2">
                            <h4>SOCCER SERI</h4>
                        </div>
                        <?php
						// foreach($all_news as $row12){
						foreach($soccer_seri as $row12){
						?>
						<a href="<?php echo base_url(); ?>eyenews/detail/<?= $row12['url'];?>">
							<div class="container garis-x4">
								<div class="container" style="width:240px;">
									<img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row12['thumb1']; ?>" alt="<?=$row12['title']?>" title="<?=$row12['title']?>">
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
                    <div class="container news-rcm-r2 fl-r">
                        <div class="subjudul2">
                            <h4>JADWAL LIVE</h4>
                        </div>
                        <div class="line-b"></div>
                        <div>
                            <table>
							<?php
							foreach($jadwal_today as $row){
							?>	
								<!-- <tr>
									<td colspan="5"><p></p></td>
								</tr>						 -->
                                <tr>
                                    <td colspan="5" style="padding-top:5px; color:rgb(200,0,0);">
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
                                        <!-- <span><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></span> -->
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
                                    <td colspan="5" class="garis-x4" style="padding-top:5px;"></td>
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