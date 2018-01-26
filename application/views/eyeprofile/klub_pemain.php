<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
</div>
<div class="w-blue">
    <img src="http://localhost/beta.eyesoccer.id/assets/img/segitiga-putih-01.png" alt="">
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
                    <img src="<?=imgUrl()?>systems/club_logo/<?php echo $row['logo']; ?>" alt="">                        
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
                                <td>: <?=$row["manager"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:100px; ! important; display:block;">Jumlah Pemain</td>
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
		<?php
		}
		?>
        </div>
        <div class="menu-2">
            <ul>
                <li>Pemain</li>
                <li>Ofisial</li>
                <li>Supporter</li>
            </ul>
        </div>
    </div>
    <div class="desktop">	
			<div class="center-desktop m-0 pd-t-100">
			<?php
			$no = 1;
			foreach($get_player_list as $row){		
			?>
				<div class="box-pemain">
					<div class="bg-pemain">
						<span><?=$no++?></span>
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
	
    <div class="center-desktop m-0">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <h3 class="">Formasi terakhir</h3>
            <table class="radius" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td class="gray t-b-b">Formasi
                            <span>4-2-3-1</span>
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
                            1
                        </td>
                        <td>
                            <div class="bc">
                                <span class="round">22</span>
                                ini title
                            </div>
                            <div class="bc">
                                <span class="round">22</span>
                                ini title
                            </div>
                            <div class="bc">
                                <span class="round">22</span>
                                ini title
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
                <table class="pencetak-gol radius table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">#</th>
                            <th class="t-b-b">Pemain</th>
                            <th class="t-b-b">Umur</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">goal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$no =1;
					foreach($pencetak_gol as $cetak){
					?>
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$cetak['name']?>
                            <span><?=$cetak['position']?></span></td>
                            </td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr><?php
					}?>                        
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
        <div class="container pd-b-50" style="padding-bottom: 100px;">
            <div id="em2Slide" class="carousel slide">
                <div role="listbox" class="carousel-inner">
                    <div class="box item active" style="height: 225px;">
						<?php
						foreach ($eyemarket_main as $data){
						?>					
                        <div class="em-box">
                            <h4><?=$data["product_name"]?></h4>
                            <div class="container">
                                <div class="w-40 m-r-1">
                                    <img class="img-prod" src="<?=imgUrl()?>systems/eyemarket_storage/<?php print $data['pic']; ?>" alt="">
                                </div>
                                <div class="w-60">
                                    <span>Harga</span>
                                    <h5>Rp. <?=number_format($data['price'],2,",",".")?></h5>
                                    <a href="<?=base_url()?>eyemarket/detail/<?php print $data['id_product']; ?>" ><button type="submit" class="beli">Beli</a></button>
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
