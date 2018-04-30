<style>
	.t-20 td {
    top: 0px;
    position: relative;
	}
	.sjrh{
		font-size: 1.2em;
		font-weight: 500;
		text-transform: uppercase;
		color: #1d3d8e;
	}
	.m-l-158{
		font-size: .9em;
		text-align: left !important;
		padding-top: 40px;
	}

	.class-W{
		background-color:#1dd163;
		border-radius:15px;
		border: 5px solid white;
		font-weight:bold;
		max-width: 8px;
	}
	.class-L{
		background-color:#d81c1c;
		border-radius:15px;
		border: 5px solid white;
		font-weight:bold;
		max-width: 8px;
	}
	.class-D{
		background-color:#d5b41b;
		border-radius:15px;
		border: 5px solid white;
		font-weight:bold;
		max-width: 8px;
	}
	.class-W:hover{
		background-color:#00ab42;
	}
	.class-L:hover{
		background-color:#a00000;
	}
	.class-D:hover{
		background-color:#c7a400;
	}
</style>
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
</div>
<div class="w-blue">
    <img src="<?php echo base_url()?>assets/img/segitiga-putih-01.png" alt="">
</div><div class="desktop">
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
		<?php
			$r = $res->data;
			$players = $res->data->players;
			$official = $res->data->official;
			$cr = $res->data->careers;
			$gallery = $res->data->gallery;
		?>		
			<input type="hidden" class="hidden_title" value="<?php echo $r->id_club; ?>"/>
			<div class="left">
              
                <div class="box-img-radius">
                    <img src="<?php echo $r->url_logo ?>" alt="">                        
                </div>
            </div>
            <div class="right">
                <div class="t-30">
                    <h3>INFO</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama Klub</td>
                                <td>: <?=$r->name?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>: <?=$r->establish_date?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?=strip_tags($r->address)?></td>
                            </tr>
                            <tr>
                                <td>Situs</td>
                                <td>: <?=$r->website?></td>
                            </tr>
							
                        </tbody>
                    </table>
                </div>
                <div class="t-30">
                    <h3><?=$r->competition?></h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Level Liga</td>
                                <td>: <?=$r->competition?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td>: <?=$r->phone?></td>
                            </tr>
							<tr>
                                <td>Fax</td>
                                <td>: <?=$r->fax?></td>
                            </tr>
                            <tr>
                                <td>Manajer</td>
                                <td>: <?=$r->manager?></td>
                            </tr>
							<tr>
                                <td>Pelatih</td>
                                <td>: <?=$r->coach?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 120px;">Jumlah Pemain</td>
                                <td>: <?=$r->number_of_player?> Pemain</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>: <?=$r->email?></td>
                            </tr>
                            <tr>
                                <td>Stadium</td>
                                <td>: <?=$r->stadium?></td>
                            </tr>
                            <tr>
                                <td>Panggilan Klub</td>
                                <td>: <?=$r->nickname?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="menu-2">
            <ul>
                <li class="klubtab active" onclick="openTab(event,'tabs-pemain')">Pemain</li>
                <li class="klubtab" onclick="openTab(event,'tabs-ofisial')">Ofisial</li>
                <li class="klubtab" onclick="openTab(event,'tabs-supporter')">Supporter</li>
            </ul>
        </div>
    </div>
    <div class="desktop">	
		<div class="center-desktop m-l-158">
			<h3 class="sjrh">Sejarah</h3>
			<p>
				<?=$r->description?>
			</p>
		</div>

			<div class="center-desktop m-0 maintab" id="tabs-pemain">
			
			<?php
			$no = 1;
			foreach($players as $p){		
			?>
				<div class="box-pemain">
					<div class="bg-pemain">
						<span><?=$p->back_number?></span>
						<h1><?=$p->name?></h1>
						<span><?=$p->position_a?></span>
					</div>
					<div class="img-pemain">
						<img src="<?=$p->url_pic?>" alt="">                
					</div>
					<table>
						<tbody>
							<tr>
								<td>Kewarganegaraan</td>
								<td><?=$p->nationality?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td><?=$p->birth_date?></td>
							</tr>
							<tr>
								<td>Main</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
					<a target="_blank" href="<?=$p->share_url?>" ><button class="btn-orange-2" type="button">Lihat Detail Pemain</button></a>
				</div><?php }?>                                      
				<div class="container banner-150 img-banner">
					<img class="lazy" src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt="">
				</div>
		</div>
		
		<div class="center-desktop m-0 pd-t-100 maintab" style="display:none;" id="tabs-ofisial">
			<?php
			$no = 1;
			foreach($official as $o):?>
				<div class="box-pemain">
					<div class="bg-pemain">
						<span></span>
						<h1><?=$o->name?></h1>
						<span><?=$o->position?></span>
					</div>
					<div class="img-pemain">
						<img src="<?=$o->url_pic?>" alt="">                
					</div>
					<table>
						<tbody>
							<tr>
								<td>Kewarganegaraan</td>
								<td><?=$o->nationality?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td><?=$o->birth_date?></td>
							</tr>
							<tr>
								<td>Lisensi</td>
								<td><?=$o->license?></td>
							</tr>
						</tbody>
					</table>
					<a target="_blank" href="<?=$o->share_url?>" ><button class="btn-orange-2" type="button">Lihat Detail Ofisial</button></a>
				</div><?php endforeach;?> 
				<div class="container banner-150 img-banner">
					<img class="lazy" src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt="">
				</div>                                     
		</div>
		
		<div class="center-desktop m-0 pd-t-100 maintab" style="display:none;" id="tabs-supporter">
			<!-- <div style="color: grey;padding-top: 100px;padding-bottom: 100px;">Segera Hadir...</div> -->
			<div class="container comingsoon">
				<img src="<?=base_url()?>assets/img/ComingSoon.png" alt="">
			</div>
		</div>
	
		<div class="center-desktop m-0">
		<div class="et-content1">
					<h3 style="font-size: .8em;text-transform: uppercase;color: #ef9a00;font-weight: 600;margin-top: 36px;">Pertandingan Sebelumnya</h3>
                    <div class="border-box" style="margin-top: 22px;">
							<div id="result_club">
							<table class="table border-b" width="800px">
							<?php
								if(empty($get_result_klub)){
							?>
								<tbody>
									<tr>
										<td align="center"><span class="t-live"> Tidak Ada Pertandingan Sebelumnya</span></td>
									</tr>
								</tbody>
							<?php
								}
							else
								{
									foreach($get_result_klub as $row){
							?>
								<tbody>
									<tr class="listmatch">
										<td class="tx-r">
										<a href="<?php 
                                                if(($row["liga_a"]=='Liga Lainnya') OR ($row["liga_a"]=='Liga International'))
                                                    {
                                                        $href_a="#no_detail_club_".$row["club_a"];
                                                    }
                                                else
                                                    {
                                                        $href_a=base_url()."eyeprofile/klub_detail/".$row["url_a"];
                                                    }
                                
                                					echo $href_a ?>">
										<span class="clb"><?=$row["club_a"]?></span></a></td>
										<td style="width: 20px;"><span class="i-l"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt=""></span></td>
										<td align="center" style="font-weight:bold;"><?=$row["score_a"]?> - <?=$row["score_b"]?></td>
										<td style="width: 20px;"><span class="i-r"><img class="lazy" src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt=""></span></td>
										<td class="tx-l">
										<a href="<?php 
                                                if(($row["liga_b"]=='Liga Lainnya') OR ($row["liga_b"]=='Liga International'))
                                                    {
                                                        $href_b="#no_detail_club_".$row["club_b"];
                                                    }
                                                else
                                                    {
                                                        $href_b=base_url()."eyeprofile/klub_detail/".$row["url_b"];
                                                    }
                                
                                					echo $href_b ?>">
										<span class="clb"><?=$row["club_b"]?></a></span></td>
									</tr>
								</tbody>
							<?php
									} 
								}
							?>
							</table>
						</div>
                    </div>
                </div>
			<?php 
				if(count($get_hasil_klub) > 0){
			?>
			<div class="w-40 pd-t-20">
				<h3 class="">Pertandingan Selanjutnya</h3>
				<div class="container box-pertandingan" style="margin-left: 20px;margin-top: 24px;width:445px;">
					<table>
						<tbody>
							<tr>
								<td colspan="3">
									<?php foreach($get_klub_detail as $row){ ?>
									<h4 style="margin-top: 6px;"><?php echo strtoupper($row['competition'])?></h4>
									<?php } ?>
									<?php foreach($get_hasil_klub as $row){
										$datetime = new DateTime($row['jadwal_pertandingan']);
										if($datetime->format('l') == 'Monday'){
											$hari = 'Senin';
										}elseif($datetime->format('l') == 'Tuesday'){
											$hari = 'Selasa';
										}elseif($datetime->format('l') == 'Wednesday'){
											$hari = 'Rabu';
										}elseif($datetime->format('l') == 'Thursday'){
											$hari = 'Kamis';
										}elseif($datetime->format('l') == 'Friday'){
											$hari = 'Jumat';
										}elseif($datetime->format('l') == 'Saturday'){
											$hari = 'Sabtu';
										}elseif($datetime->format('l') == 'Sunday'){
											$hari = 'Minggu';
										}else{
											$hari = $datetime->format('l');
										}
									?>
									<span class="date-box-pertandingan" style="line-height: 1.5em;margin-top: 20px;display:  block;margin-bottom: 15px;"><?php echo $hari.", ".$datetime->format('d M Y')?>
										<br><?php echo $datetime->format('H:i')." WIB";?>
										<br><?php echo $row['lokasi_pertandingan']?>
									</span>
								</td>
							</tr>
							<tr class="t-20">
								<td width="40%">
									<!--<i class="material-icons i-l-pertandingan">keyboard_arrow_left</i>-->
									<img src="<?php echo imgUrl()?>systems/club_logo/<?php echo $row['logo_a']?>" alt=""> <?php echo $row['club_a'];?>
								</td>
								<td width="20%" style="font-weight: 600;font-size: 40px;">vs</td>
								<td width="40%">
									<img src="<?php echo imgUrl()?>systems/club_logo/<?php echo $row['logo_b']?>" alt=""> <?php echo $row['club_b'];?>
									<!--<i class="material-icons i-r-pertandingan">keyboard_arrow_right</i>-->
								</td>
							</tr>
							<tr>
								<td>
									<table>
										<tr>
										<?php foreach($get_list_mh as $mh){
												$mhform=0;
												if ($mh['tim_a']==$club_id_a){
													if($mh['score_a'] > $mh['score_b'] ){
														$mhform="W";
													}elseif($mh['score_a'] < $mh['score_b'] ){
														$mhform="L";
													}else{
														$mhform="D";
													}
												}
												elseif ($mh['tim_b']==$club_id_a){
													if($mh['score_a'] > $mh['score_b'] ){
														$mhform="L";
													}elseif($mh['score_a'] < $mh['score_b'] ){
														$mhform="W";
													}else{
														$mhform="D";
													}
												}
											?>
											<td title="<?=$mh['club_a']." ".$mh['score_a']."-".$mh['score_b']." ".$mh['club_b'];?>" align="center" class="class-<?=$mhform;?>">
												<?=$mhform;?>
											</td>
										<?php }
										?>
										</tr>
									</table>
								</td>
								<td>
								</td>
								<td style="padding: 12px 8px;">
									<table>
										<tr>
										<?php
										foreach($get_list_mv as $mv){
												$mvform="";
												if ($mv['tim_b']==$club_id_b){
													//echo $mv['score_a'].'/'.$mv['score_b'].'<br>';
													if($mv['score_a'] > $mv['score_b'] ){
														$mvform="L";
													}elseif($mv['score_a'] < $mv['score_b'] ){
														$mvform="W";
													}else{
														$mvform="D";
													}
												}
												elseif ($mv['tim_a']==$club_id_b){
													if($mv['score_a'] > $mv['score_b'] ){
														$mvform="W";
													}elseif($mv['score_a'] < $mv['score_b'] ){
														$mvform="L";
													}else{
														$mvform="D";
													}
												}
												?>
											<td title="<?php echo $mv['club_a']." ".$mv['score_a']."-".$mv['score_b']." ".$mv['club_b'];?>" align="center" class="class-<?=$mvform;?>">
												<?=$mvform;?>
											</td>
										<?php }
										?>
										</tr>
									</table>								
								</td>
							</tr>
							<!--<tr class="t-20">
								<td width="40%" style="font-size: 2em;font-weight: bold;color: orange;">
									<?php // echo $row['score_a'];?>
								</td>
								<td width="20%" style="font-weight: 600;"></td>
								<td width="40%" style="font-size: 2em;font-weight: bold;color: orange;">
									<?php // echo $row['score_b']?>
								</td>
							</tr>-->
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="container" style="display:none;">
					<h3 class="pd-t-20">Pencetak Gol Terbanyak</h3>
					<table id="liga_indonesia" class="pencetak-gol radius table table-striped" cellspacing="0" cellpadding="0">
						<thead>
							<tr>
								<th>Pemain</th>
								<th>Klub</th>
								<th>Gol</th>
								<th>Pinalti</th>
								<th>S</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$html = file_get_contents(LinkScrapingLigaIndonesia());
							$premiere_doc = new DOMDocument();
							libxml_use_internal_errors(TRUE); //disable libxml errors
							if(!empty($html)){ //if any html is actually returned
								$premiere_doc->loadHTML($html);
								libxml_clear_errors(); //remove errors for yucky html
								$pokemon_xpath = new DOMXPath($premiere_doc);
								//get all the h2's with an id
								$pokemon_row = $pokemon_xpath->query('//tr[@data-person_id]');
								$pokemon_list = array();
								$i = 0;
								if($pokemon_row->length > 0){
									foreach($pokemon_row as $row){
										echo "<tr>";
										if($i < 18){
											$types = $pokemon_xpath->query('td', $row);
											$n = 0;
											foreach($types as $type){
												if($type->nodeValue != ""){
													$nodeValue = "<td>".$type->nodeValue.'</td>';
													echo $nodeValue;
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
					<div class="nav-pencetak-gol">
						<ul>
							<li>
								<i class="material-icons left">keyboard_arrow_left</i>
							</li>
							<li>1</li>
							<li>2</li>
							<li>3</li>
							<li>4</li>
							<li>5</li>
							<li>
								<i class="material-icons right">keyboard_arrow_right</i>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php
				}
			?>
			<!-- <div class="container banner-eyeprofile5 img-banner fl-r mt-10" style="height: unset; background-color: unset;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
			<!-- EyesoccerDekstop 8#EyeprofileKlubSupporter336x280 -->
			<!-- <ins class="adsbygoogle"
				style="display:inline-block;width:336px;height:280px"
				data-ad-client="ca-pub-7635854626605122"
				data-ad-slot="7731736047"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script> -->
				<!-- <img src="../../assets/img/iklanbanner/banner 425x200 px-01.jpg" alt="Right ads"> -->
			<!-- </div> -->
			<div class="w-60 m-r-1 pd-t-20 formasi" style="width: 1062px;">
				<h3 class="">Prestasi Klub</h3>
				<table class="table table-stripped table-hover">
					
					<thead>
						<tr>
							<th>NO</th>
							<th>Bulan</th>
							<th>Tahun</th>
							<th>Turnamen</th>
							<th>peringkat</th>
							<th>pelatih</th>
						</tr>
					</thead>
					<tbody>
						
						<?php
							$no = 0 ;
							for($i= 0 ;$i <count($cr);$i++){
								$no++;
								echo '<tr>';
								echo '<td>'.$no.'</td>';
								echo '<td>'.$cr[$i]->month.'</td>';
								echo '<td>'.$cr[$i]->year.'</td>';
								echo '<td>'.$cr[$i]->tournament.'</td>';
								echo '<td>'.$cr[$i]->rank.'</td>';	
								echo '<td>'.$cr[$i]->coach.'</td>';
								echo '</tr>';

							}

						?>
						
					</tbody>
				</table>
				<!-- <div class="box-bg" style="height:200px">
				
				
				</div> -->
			</div>
			<div class="container pd-b-50" style="padding-bottom: 100px;display:none;">
				<div id="em2Slide" class="carousel slide">
					<div role="listbox" class="carousel-inner">
						<div class="box item active" style="height: 225px;">
							<?php
							foreach ($products as $produk):
							?>					
							<div class="em-box">
								<h4><?=$produk["nama"]?></h4>
								<div class="container">
									<div class="w-40 m-r-1">
										<img class="img-prod" src="<?= MEIMG; ?><?= $produk['image1'] ?>" alt="">
									</div>
									<div class="w-60">
										<span>Harga</span>
										<h5>Rp.<?= number_format($produk['harga'],0,',','.'); ?></h5>
										<a href="<?= base_url(); ?>eyemarket/detail/<?= $produk['toko']; ?>/<?= $produk['title_slug']; ?>" ><button type="submit" class="beli">Beli</a></button>
									</div>
								</div>
							</div>
							<?php endforeach; ?>						
						</div>
						<div class="carousel-indicators bx-dot ep-dot">
							<span data-target="#em2Slide" data-slide-to="0" class="dot active"></span>
							<span data-target="#em2Slide" data-slide-to="1" class="dot"></span>
							<span data-target="#em2Slide" data-slide-to="2" class="dot"></span>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="center-desktop m-0">
			<div class="w-60 m-r-1 pd-t-20 formasi" style="width: 100%;">
				<h3 class="">Galeri</h3>
				<div id="em2Slide" class="carousel slide pemain-foto">
					<div role="listbox" class="carousel-inner">
						<div class="box item active">
							<?php 
								foreach ($gallery as $gl):
									$exp = explode('/',$gl->url_pic);
									$exp_img = explode('-',$exp[6]);

									if(!empty($exp_img[1])):
							?>
										<div class="em-box">
											<img src="<?php echo $gl->url_pic;?>" alt="klub galeri" width="220">
										</div>
							<?php
									endif;
								endforeach;
							?>
						</div>
					</div>
                </div>
			</div>
		</div>
	</div>
<script>
		function openTab(evt,tabbing){
			// alert(tabbing);
			var i, maintab, klubtab;
			tabcontent = document.getElementsByClassName("maintab");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("klubtab");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(tabbing).style.display = "block";
			evt.currentTarget.className += " active";
		}
	var fn = $(".hidden_title").val();
	$('#tbl_karir_klub').DataTable( {
		"order":[[1,"asc"]],
		"processing": true,
		"serverSide": true,
		"ajax":{
			url :"<?php echo base_url()?>eyeprofile/get_list_karir_klub/"+fn, // json datasource
			type: "post",  // method  , by default get
		},
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian.json"
		}
	} );
</script>