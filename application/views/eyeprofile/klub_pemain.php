<style>
	.sjrh{
		font-size: 1.2em;
		font-weight: 500;
		text-transform: uppercase;
		color: #1d3d8e;
	}
	.m-l-158{
		margin-left: 158px;
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
		foreach($get_klub_detail as $row){
		?>		
			<div class="left">
                <!-- <svg style="height: 189px;">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <polygon class="fill" points="132 0 22 190 0 190 110 0 132 0" />
                            <polygon class="fill" points="330 0 330 190 42 190 152 0 330 0" />
                        </g>
                    </g>
                </svg> -->
                <div class="box-img-radius">
                    <img src="<?php echo imgUrl()?>systems/club_logo/<?php echo $row['logo']; ?>" alt="">                        
                </div>
            </div>
            <div class="right">
                <div class="t-30">
                    <h3>INFO</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama Klub</td>
                                <td>: <?=$row["name"]?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>: <?=$row["establish_date"]?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <?=strip_tags($row["address"])?></td>
                            </tr>
                            <tr>
                                <td>Situs</td>
                                <td>: </td>
                            </tr>
							
                        </tbody>
                    </table>
                </div>
                <div class="t-30">
                    <h3><?=$row["competition"]?></h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Level Liga</td>
                                <td>: <?=$row["competition"]?></td>
                            </tr>
                            <tr>
                                <td>Klasemen</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Lama Di Liga Sejak</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Manajer</td>
                                <td>: <?=$get_manager?></td>
                            </tr>
							<tr>
                                <td>Pelatih</td>
                                <td>: <?=$get_pelatih?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width: 120px;">Jumlah Pemain</td>
                                <td>: <?=count($get_player_list)?> Pemain</td>
                            </tr>
                            <tr>
                                <td>Rata-rata Usia</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Pemain Asing</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Stadium</td>
                                <td>: <?=$row["stadium"]?></td>
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
			<div class="center-desktop m-0 maintab" id="tabs-pemain">
			<div class="container m-l-158">
            <h3 class="sjrh">Sejarah</h3>
                <p>
					<?=$row["description"]?>
                </p>
			</div>
		<?php
		}
		?>
			<?php
			$no = 1;
			foreach($get_player_list as $row){		
			?>
				<div class="box-pemain">
					<div class="bg-pemain">
						<span><?=$row['number']?></span>
						<h1><?=$row['name']?></h1>
						<span><?=$row['position']?></span>
					</div>
					<div class="img-pemain">
						<img src="<?=imgUrl()?>systems/player_storage/<?=$row["pic"]?>" alt="">                
					</div>
					<table>
						<tbody>
							<tr>
								<td>Kewarganegaraan</td>
								<td><?=$row['nationality']?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td><?=$row['birth_date']?></td>
							</tr>
							<tr>
								<td>Main</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
					<a target="_blank" href="<?=base_url()?>eyeprofile/pemain_detail/<?=$row["url"]?>" ><button class="btn-orange-2" type="button">Lihat Detail Pemain</button></a>
				</div><?php }?>                                      
		</div>
		
		<div class="center-desktop m-0 pd-t-100 maintab" style="display:none;" id="tabs-ofisial">
			<?php
			$no = 1;
			foreach($get_official_list as $row){		
			?>
				<div class="box-pemain">
					<div class="bg-pemain">
						<span></span>
						<h1><?=$row['name']?></h1>
						<span><?=$row['position']?></span>
					</div>
					<div class="img-pemain">
						<img src="<?=imgUrl()?>systems/player_storage/<?=$row["official_photo"]?>" alt="">                
					</div>
					<table>
						<tbody>
							<tr>
								<td>Kewarganegaraan</td>
								<td><?=$row['nationality']?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td><?=$row['birth_date']?></td>
							</tr>
							<tr>
								<td>Lisensi</td>
								<td><?=$row['license']?></td>
							</tr>
						</tbody>
					</table>
					<a href="#" ><button class="btn-orange-2" type="button">Lihat Detail Ofisial</button></a>
				</div><?php }?>                                      
		</div>
		
		<div class="center-desktop m-0 pd-t-100 maintab" style="display:none;" id="tabs-supporter">
			<!-- <div style="color: grey;padding-top: 100px;padding-bottom: 100px;">Segera Hadir...</div> -->
			<div class="container comingsoon">
				<img src="<?=base_url()?>assets/img/ComingSoon.png" alt="">
			</div>
		</div>
	
    <div class="center-desktop m-0">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <h3 class="">Formasi terakhir</h3>
            <table class="radius" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td class="gray t-b-b">Formasi
                            <span>-</span>
                        </td>
                        <td class="gray t-b-b t-b-r">Manager
                            <span><?php echo $get_manager; ?></span>
                        </td>
                        <td class="t-b-b">Bangku cadangan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="t-b-r tx-c" colspan="2">
                            -
                        </td>
                        <td>
                            <div class="bc">
                                <span class="round">22</span>
                                -
                            </div>
                            <div class="bc">
                                <span class="round">22</span>
                               -
                            </div>
                            <div class="bc">
                                <span class="round">22</span>
                                -
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <h3 class="pd-t-20">Klasemen Liga Indonesia 1</h3>
                <table id="liga_indonesia" class="radius table table-striped">
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
                <span class="next-right">Lihat Klasemen Lengkap
                    <i class="material-icons t-8">keyboard_arrow_right</i>
                </span>
            </div>
        </div>
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
            
            <div class="container">
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
        <div class="container pd-b-50" style="padding-bottom: 100px;display:none;">
            <div id="em2Slide" class="carousel slide">
                <div role="listbox" class="carousel-inner">
                    <div class="box item active" style="height: 225px;">
						<?php
						foreach ($products as $produk){
						?>					
                        <div class="em-box">
                            <h4><?=$produk["nama"]?></h4>
                            <div class="container">
                                <div class="w-40 m-r-1">
                                    <img class="img-prod" src="<?= base_url(); ?>img/eyemarket/produk/<?= $produk['image1'] ?>" alt="">
                                </div>
                                <div class="w-60">
                                    <span>Harga</span>
                                    <h5>Rp.<?= number_format($produk['harga'],0,',','.'); ?></h5>
                                    <a href="<?= base_url(); ?>eyemarket/detail/<?= $produk['toko']; ?>/<?= $produk['title_slug']; ?>" ><button type="submit" class="beli">Beli</a></button>
                                </div>
                            </div>
                        </div>
						<?php } ?>						
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
		</script>