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
	body{
		margin-top: -10px;
	}
	.h-news-l {
    width: 600px;
    height: 340px;
    overflow: hidden;
	}
	.h-news-r {
    width: 450px;
    height: 340px;
}
</style>
<div class="crumb redhover">
    <ul>
	<li><a href='<?php echo base_url(); ?>' style='display: unset'>Home</a></li>
	<li><a href='<?php echo base_url().'eyenews'; ?>' style='display: unset'>EyeNews</a></li>
    </ul>
</div>
<div class="desktop redhover">
    <?php $this->load->view('eyenews/category_menu'); ?>
    
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
				<span><?= $headline->publish_on; ?></span>
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
				echo word_limiter($keterangan,20);
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
						<a style="text-align: left;" href="<?php echo base_url(); ?>eyenews/detail/<?= $row['url'];?>">
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
		    <h4><a href="<?php echo base_url();?>eyenews/terkini">BERITA TERKINI</a></h4>
		</div>
	    </div>
	    <div class="container mt-20">
		    <?php
			$i = 0;
			foreach ($pagging['row'] as $similar)
			{
				if($i == 6){
					// print_r($paggingads);
					foreach ($paggingads1 as $similar2){
					?>
						<div class="w4">
							<a href="<?php echo NEWSDETAIL.$similar2['url'];?>">

							<div style="width:100%; height:160px; overflow:hidden;">
								<img src="<?php echo MEVID.$similar2['thumb1']; ?>" style="min-width:100%; height:100%;" alt="<?= $similar2['title']; ?>" title="<?= $similar2['title']; ?>">
							</div>
							<p class="sub-en"><?= $similar2['title']; ?></p>
							<span class="time-view">Tulisan Kamu</span><br>
							<span class="time-view">
							<?php
								$date    = new DateTime($similar2['publish_on']);
								$tanggal = date_format($date,"Y-m-d H:i:s");
								
								echo relative_time($tanggal) . ' lalu - '.$similar2['news_view'].' views';
							?>								
							</span>
							</a>
						</div>
					<?php
					}
				}else if($i == 7){
					// print_r($paggingads);
					foreach ($paggingads2 as $similar2){
					?>
						<div class="w4">
							<a href="<?php echo NEWSDETAIL.$similar2['url'];?>">

							<div style="width:100%; height:160px; overflow:hidden;">
								<img src="<?php echo MEVID.$similar2['thumb1']; ?>" style="min-width:100%; height:100%;" alt="<?= $similar2['title']; ?>" title="<?= $similar2['title']; ?>">
							</div>
							<p class="sub-en"><?= $similar2['title']; ?></p>
							<span class="time-view">Tulisan Kamu</span><br>
							<span class="time-view">
							<?php
								$date    = new DateTime($similar2['publish_on']);
								$tanggal = date_format($date,"Y-m-d H:i:s");
								
								echo relative_time($tanggal) . ' lalu - '.$similar2['news_view'].' views';
							?>								
							</span>
							</a>
						</div>
					<?php
					}
				}else{
			    ?>
				<div class="w4">
				    <a href="<?php echo NEWSDETAIL.$similar->url;?>">

					<div style="width:100%; height:160px; overflow:hidden;">
					    <img src="<?php echo MEVID.$similar->thumb1; ?>" style="min-width:100%; height:100%;" alt="<?= $similar->title; ?>" title="<?= $similar->title; ?>">
					</div>
					<p class="sub-en"><?= $similar->title; ?></p>
					<span class="time-view">
					<?php
					    $date    = new DateTime($similar->publish_on);
					    $tanggal = date_format($date,"Y-m-d H:i:s");
					    
					    echo relative_time($tanggal) . ' lalu - '.$similar->news_view.' views';
					?>								
					</span>
				    </a>
				</div>
			    <?php
				}
				$i++;
			}
		    ?>
		    <div class="pagging-enews-home"><?php echo $pagging['pagging'];?></div>
	    </div>
	</div>
	<div class="container banner-150 EyenewsHomeBanner970x90 tx-c" style="background-color: unset;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- EyesoccerDekstop 18#EyenewsHomeBanner970x90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:90px"
     data-ad-client="ca-pub-7635854626605122"
     data-ad-slot="8746576453"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<!-- <img src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt="Banner Ads"> -->
	</div>
	
	<?php $this->load->view('eyenews/category_widget'); ?>
    </div>
</div>
