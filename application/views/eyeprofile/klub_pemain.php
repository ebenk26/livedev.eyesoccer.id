<style>
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
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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
			<input type="hidden" class="hidden_title" value="<?php echo $r->club_id; ?>"/>
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
						<span><?=$p->number?></span>
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
			<div class="w-60 m-r-1 pd-t-20 formasi">
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
			<?php 
				if(count($get_hasil_klub) > 0){
			?>
			<div class="w-40 pd-t-20">
				<h3 class="">Pertandingan Selanjutnya</h3>
				<div class="container box-pertandingan">
					<table>
						<tbody>
							<tr>
								<td colspan="3">
									<?php foreach($get_klub_detail as $row){ ?>
									<h4><?php echo strtoupper($row['competition'])?></h4>
									<?php } ?>
									<?php foreach($get_hasil_klub as $row){
										$datetime = new DateTime($row['jadwal_pertandingan']);
										if($datetime->format('l') == 'Monday'){
											$hari = 'Senin';
										}else if($datetime->format('l') == 'Tuesday'){
											$hari = 'Selasa';
										}else if($datetime->format('l') == 'Wednesday'){
											$hari = 'Rabu';
										}else if($datetime->format('l') == 'Thursday'){
											$hari = 'Kamis';
										}else if($datetime->format('l') == 'Friday'){
											$hari = 'Jumat';
										}else if($datetime->format('l') == 'Saturday'){
											$hari = 'Sabtu';
										}else if($datetime->format('l') == 'Sunday'){
											$hari = 'Minggu';
										}else{
											$hari = $datetime->format('l');
										}
									?>
									<span class="date-box-pertandingan"><?php echo $hari.", ".$datetime->format('d M Y')?>
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
								<td width="20%" style="font-weight: 600;">vs</td>
								<td width="40%">
									<img src="<?php echo imgUrl()?>systems/club_logo/<?php echo $row['logo_b']?>" alt=""> <?php echo $row['club_b'];?>
									<!--<i class="material-icons i-r-pertandingan">keyboard_arrow_right</i>-->
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
			<div class="container banner-eyeprofile5 img-banner fl-r mt-10" style="height: unset; background-color: unset;">
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- EyesoccerDekstop 8#EyeprofileKlubSupporter336x280 -->
			<ins class="adsbygoogle"
				style="display:inline-block;width:336px;height:280px"
				data-ad-client="ca-pub-7635854626605122"
				data-ad-slot="7731736047"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
				<!-- <img src="../../assets/img/iklanbanner/banner 425x200 px-01.jpg" alt="Right ads"> -->
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