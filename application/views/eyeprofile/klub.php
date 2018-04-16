<style>
    .slc-musim{
        font-size: .95em !important;
        padding: 7px 20px !important;
    }
	.ep2 h3 {
		line-height: unset;
	}
	#shownav {
		float: right;
		margin-top: 20px;
		margin-right: 20px;
		margin-bottom: 20px;
	}

	.zona_acl{background-color:#00791b3b;}
	.zona_aclqf{background-color:#0700ff29;}
	.zona_afc{background-color:#0700ff29;}
	.zona_afc_wl{background-color:#0700ff17;}
	.zona_degradasi{background-color:#ff000012;}
	.zona_aman{background-color:#807e7e12;}
	.zona_acl:hover{background-color:#00791b82;}
	.zona_aclqf:hover{background-color:#0700ff82;}
	.zona_afc:hover{background-color:#0700ff57;}
	.zona_afc_wl:hover{background-color:#0700ff45;}
	.zona_degradasi:hover{background-color:#ff00007a;}
	.zona_aman:hover{background-color:#cdadad12;}
	.dt_zona_acl{
		font-size:10px;
		padding: 0px 15px 0px 15px;
		margin: 20px 20px 20px 20px;
		position:relative;
		top:-1px;
		left:-30px;
	}
	.dt_zona_afc{
		font-size:10px;
		padding: 0px 15px 0px 15px;
		margin: 20px 20px 20px 20px;
		position:relative;
		top:-35px;
		left:150px;
	}
	.dt_zona_afcwl{
		font-size:10px;
		padding: 0px 15px 0px 15px;
		margin: 20px 20px 20px 20px;
		position:relative;
		top:-68px;
		left:260px;
	}

	.dt_acl{
		background-color:#c4e0ca;
		width: 20px;
		height:10px;
		padding: 0px 15px 0px 15px;
		margin: 10px 10px 10px 10px;
		border-radius:8px;
	}
	.dt_afc{
		background-color:#d7d6ff;
		width: 20px;
		height:10px;
		padding: 0px 15px 0px 15px;
		margin: 10px 10px 10px 10px;
		border-radius:8px;
	}
	.dt_afcwl{
		background-color:#e9e8ff;
		width: 20px;
		height:10px;
		padding: 0px 15px 0px 15px;
		margin: 10px 10px 10px 10px;
		border-radius:8px;
	}

	.dt_acl:hover{background-color:#43de64;}
	.dt_afc:hover{background-color:#5f5dce;}
	.dt_afcwl:hover{background-color:#a39fff;}

</style>
        <div class="center-desktop m-0">
			<div class="crumb m-t-100">
				<ul>
				<li><a href='<?php echo base_url(); ?>' style='display: unset'>Home</a></li>
				<li><a href='<?php echo base_url().'eyeprofile/klub'; ?>' style='display: unset'>Eyeprofile</a></li>
				<li><a href='#' style='display: unset'>Klub</a></li>
				</ul>
			</div>
            <div class="menu-2 w-100 m-0-0 pd-t-20">
                <ul>
                    <li class="active"><a href="<?=base_url()?>eyeprofile/klub" >Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter">supporter</a></li>
				</ul>
                <select id="chained_kompetisi" name="" selected="true" class="slc-musim fl-r" onchange="if(this.options[this.selectedIndex].value != 'Liga Usia Muda'){window.location = this.options[this.selectedIndex].value};" style="margin: -12px 0 2px 0;">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($get_all_kompetisi as $row){
						if($row['competition']=='Liga Usia Muda'){
				?>
						<option value="Liga Usia Muda"><?php echo $row['competition'];?></option>';
				<?php
						}else{
				?>
						<option value="<?php echo base_url()."eyeprofile/klub/".$row['competition']?>"><?php echo $row['competition'];?></option>';  
				<?php
						}
					}
				?>
					<option value="<?php echo base_url()."eyeprofile/klub/non liga"?>">Non Liga</option>
                </select>
				
				<select id="chained_liga" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="margin: 0px 0px 2px;display:none;">
					<option value="">--Pilih Kategori Liga--</option>
				<?php
					foreach($get_all_liga as $row){
				?>
						<option value="<?php echo base_url()."eyeprofile/klub/".$row['nama_liga']?>"><?php echo $row['nama_liga'];?></option>';  
				<?php
					}
				?>
                </select>
            </div>
        </div>
        <div class="center-desktop m-0">		
            <div class="container box-border-radius fl-l mt-30">
				
                <div class="fl-l img-80" style="display:none;">				
                    <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
                </div>
                <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l" style="width:500px;">
                    <table>
                        <tr>
                            <td>Level Liga</td>
                            <td>: <?php echo $title_liga; ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Klub</td> 
                            <td>: <?php echo count($club_main)?> Klub</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pemain</td>
                            <td>:
							<?php echo count($get_player_liga);?> Pemain</td>
                        </tr>
                    </table>
                </div>
                <div class="tabel-liga-370 table-pd-3 fl-l">
                    <table>
                        <tr>
                            <td>Pemain Asing</td>
                            <td>:
							<?php echo count($get_player_liga_strange);?> Pemain</td>
                        </tr>
                        <tr>
                            <td>Rata - Rata Usia Pemain</td>
                            <td>: <?php if(!empty($avg_year)) echo $avg_year[0]['usia'].' Tahun'; else echo '-';?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="center-desktop m-0 orange-default">
			<div class='testlist'>
			<?php 
				if($page == 1)
				{
					?> <div class='pageon' value='true'></div> <?php
				}
			?>
			</div>
				<!--test-->
				<script>
					$(document).ready(function(){
						setTimeout(function(){
							<?php
								$showpage = ceil(getTotalClub($liga)/12);
								if($page > 1)
								{
									if($showpage == $page OR $page == $showpage - 1)
									{
										if($showpage == 2) //Showrun
										{
											?> nav_first(<?php echo $page; ?>); <?php 
										} else {
											?> nav_last(<?php echo $page; ?>); <?php 
										}
									} else {
										?> nav_page(<?php echo $page; ?>); <?php 
									}
								} else {
									if($page > 0)
									{
										?> nav_first(<?php echo $page; ?>); <?php 
									}
								}
							?>
						}, 500);
					});
				</script>
				<div id='showlist' value='.testlist'></div>
				<div id='showbaseurl' value='<?php echo base_url()?>'></div>
				<div id='shownewurl' value='<?php echo base_url()."eyeprofile/klub/$liga"; ?>'></div>
				<div id='showurl' value='<?php echo base_url()."eyeprofile/getClub/$liga"; ?>'></div>
				<div id='showpage' value='<?=$showpage;?>'></div>
				<div id='showoff' value='4'></div>
				<div id='showrun' value='2'></div>
				<div id='shownav'>
			 </div>
			<!--test-->
			<div class="container t-b-b pd-b-20 pd-t-20"></div>
            <div class="container">
                <h3 class="h3-oranye">Hasil pertandingan <?php echo $title_liga?></h3>
            <div id="jadwal" class="jadwal carousel slide m-0 p-d-l-0">
                <div class="left navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_left</i>
                </div>
                <div role="listbox" class="j-box carousel-inner">
				<?php if(count($get_jadwal_hasil)>0){?>
						<div class="over item">
							<?php
								foreach($get_jadwal_hasil2 as $club){
								?>			
									<div class="j-content">
										<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
										<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
										<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
									</div>		
								<?php
								}
								?>
						</div>
						<div class="over item">	
							<?php
							foreach($get_jadwal_hasil1 as $club){
							?>		
								<div class="j-content">
									<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
									<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
									<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
								</div>		
							<?php
							}
							?>							
						</div>	
						<div class="over item  active">	
							<?php
							foreach($get_jadwal_hasil as $club){
							?>		
								<div class="j-content">
									<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
									<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
									<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
								</div>	
							<?php
							}
							?>								
						</div>
					<?php
					}else{
						?>
						<div style="background-color: #F5F5F5;font-weight: 500;color: #616161;font-size: x-large;height: 60px;text-align: center;line-height: 55px;">
							<div>Belum ada hasil pertandingan.</div>
						</div>
						<?php
					}
					?>
                </div>
                <div class="right navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_right</i>
                </div>
            </div>
        </div>
		<div class="container banner-150 img-banner mt-20 tx-c" style="height:auto; background-color:unset;">
			<!-- <img src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt="banner ads full width"> -->
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- EyesoccerDekstop 15a#EyeprofileLigaBanner970x250 -->
			<ins class="adsbygoogle"
				style="display:inline-block;width:970px;height:250px"
				data-ad-client="ca-pub-7635854626605122"
				data-ad-slot="8424675076"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
        <div class="container t-b-b pd-t-20"></div>
        <div class="center-desktop m-0">
            <div class="w-60 m-r-1 pd-t-20 formasi">
            <div class="container">
                <h3>Klasemen <?php echo $title_liga?></h3>
                <!--<div class="box-slc-musim">
                    <span>Pilih Musim</span>
                    <select id="" name="" selected="true" class="slc-musim">
                        <option value="">2018</option>
                        <option value="">2017</option>
                    </select>                    
                </div>-->
				
				<table id="liga_indonesia" class="radius" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th title="Posisi">#</th>
							<th title="Nama Klub">Klub</th>
							<th title="Jumlah Main">B</th>
							<th title="Menang">M</th>
							<th title="Seri">S</th>
							<th title="Kalah">K</th>
							<th title="Memasukan">MG</th>
							<th title="Kemasukan">KG</th>
							<th title="Selisih Gol">SG</th>
							<th title="Point">Pts</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($title_liga == 'Liga Indonesia 1'){
						$html = file_get_contents(LinkScrapingLigaIndonesia());
						$premiere_doc = new DOMDocument();
						libxml_use_internal_errors(TRUE);
						if(!empty($html)){
							$premiere_doc->loadHTML($html);
							libxml_clear_errors();
							$pokemon_xpath = new DOMXPath($premiere_doc);

							//get all the tr's with an attribute
							$pokemon_row = $pokemon_xpath->query('//tr[@data-team_id]');
							$pokemon_list = array();
							$i = 1;
							if($pokemon_row->length > 0){
								foreach($pokemon_row as $row){
									if($i == 1){
										$trclass="<tr class='zona_acl'>";}
									elseif($i == 2){
										$trclass="<tr class='zona_afc'>";}
									elseif($i == 3){
										$trclass="<tr class='zona_afc_wl'>";}
									elseif($i == 16){
										$trclass="<tr class='zona_degradasi'>";}
									elseif($i == 17){
										$trclass="<tr class='zona_degradasi'>";}
									elseif($i == 18){
										$trclass="<tr class='zona_degradasi'>";}		
									else{
										$trclass="<tr class='zona_aman'>";}
									
									echo $trclass;
									if($i <= 18){
										$types = $pokemon_xpath->query('td', $row);
										$n = 0;
										foreach($types as $type){
											if($type->nodeValue != ""){
												if($n != 1){
													if($n != 11){
														if ($n != 12) {
															$nodeValue = "<td>".$type->nodeValue.'</td>';
															echo $nodeValue;
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
					<?php
					}else{
					?>
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>						
							</tbody>
						</table>
					<?php
					}
				?>
                <span class="next-right">Selengkapnya
                    <i class="material-icons t-8">keyboard_arrow_right</i>
                </span>
				<div class="detail_klasemen">
					<div class="dt_klasemen">
							<div class="dt_zona_acl"> <span class="dt_acl"></span>
							AFC Champions League
							</div>
							<div class="dt_zona_afc"> <span class="dt_afc"></span>
							AFC Cup
							</div>
							<div class="dt_zona_afcwl"> <span class="dt_afcwl"></span>
							AFC Cup Possible
							</div>
					</div>
          		</div>			
                </span>	
				<div class="container banner-eyeprofile4 img-banner mt-20 tx-c" style="width: 100%;position: relative;overflow: unset;height: 147px;">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- EyesoccerDekstop 11#EyeprofileLigaKlub336x280 -->
                            <ins class="adsbygoogle"
                                style="display:inline-block;width:336px;height:280px"
                                data-ad-client="ca-pub-7635854626605122"
                                data-ad-slot="9007490396"></ins>
                            <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
            
                <img src="<?php echo base_url()?>assets/img/iklanbanner/banner 425x100 px-01.jpg" alt="banner ads full width" style="height: unset;position: absolute;top: 0px;left: 0px;">
            </div>
			
            </div>
        </div>
        <div class="w-40 pd-t-20">
            <div class="container">
                <h3>Transfer Terbaru</h3>
				<table width="400" id="liga_indonesia" class="radius table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th width="30%">Pemain</th>
							<th width="10%">Usia</th>
							<th width="30%">Dari</th>
							<th width="30%">Ke</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($title_liga == 'Liga Indonesia 1'){
						$context = stream_context_create(array(
							'http' => array(
								'header' => array('User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; rv:2.2) Gecko/20110201'),
							),
						));
						
						$eyespot = file_get_contents('https://www.transfermarkt.com.mt/transfers/letztetransfers/statistik/plus/0?land_id=68', false, $context);
						$premiere_doc = new DOMDocument();
						libxml_use_internal_errors(TRUE);
						if(!empty($eyespot)){
							$premiere_doc->loadHTML($eyespot);
							libxml_clear_errors();
							$transfermarkt_xpath = new DOMXPath($premiere_doc);

							//get all the tr's with an attribute
							$transfermarkt_row = $transfermarkt_xpath->query('//tr[@class]');
							$transfermarkt_list = array();
							$i = 0;
							if($transfermarkt_row->length > 0){
								foreach($transfermarkt_row as $row){
									if($i < 5){
										$types = $transfermarkt_xpath->query('td', $row);
										$n = 0;
										foreach($types as $type){
											if($type->nodeValue != ""){
												if($n != 2){
													if($n != 5){
														if($n != 6){
															if($n != 7){
																if($n != 8){
																	if ($n != 9) {
																		$nodeValue = "<td>".$type->nodeValue.'</td>';
																		echo $nodeValue;
																	}
																}
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
					<?php
					}else{
					?>
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>						
							</tbody>
						</table>
					<?php
					}
				?>
                <div class="nav-pencetak-gol" style="display:none;">
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
			<!-- <div class="container banner-eyeprofile4 img-banner mt-20 tx-c" style="height: 110px;overflow: hidden;background-color: unset;z-index:  1;box-sizing:  border-box;margin: 15px auto;position: relative;">
				<div style="clip: rect(auto, auto, auto, auto);height: 100%;left: 0;position: absolute;width: 100%;">
					<div style="height: 100%;margin: 0 auto;position: fixed; top: 70px; transform: translateX(15%) translatey(0%); width: 400px;text-align: center; right: 150px; display: flex; justify-content: flex-start;">
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
							<!-- EyesoccerDekstop 11#EyeprofileLigaKlub336x280 -->
							<!-- <ins class="adsbygoogle"
								style="display:inline-block;width:336px;height:280px"
								data-ad-client="ca-pub-7635854626605122"
								data-ad-slot="9007490396"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
					</div>
				</div> -->
			
				<!-- <img src="<?php echo base_url()?>assets/img/iklanbanner/banner 425x100 px-01.jpg" alt="banner ads full width"> -->
			<!-- </div>	 -->
			 <div class="container" style="margin-top:7px;">
                <h3>Daftar Pencetak Gol</h3>	
				<table class="radius table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Pemain</th>
							<th>Tim</th>
							<th>Gol</th>
						</tr>
					</thead>
					<tbody>
					<?php
					if($title_liga == 'Liga Indonesia 1'){
						$html = file_get_contents(LinkScrapingLigaIndonesia());
						$premiere_doc = new DOMDocument();
						libxml_use_internal_errors(TRUE);
						if(!empty($html)){
							$premiere_doc->loadHTML($html);
							libxml_clear_errors();
							$pokemon_xpath = new DOMXPath($premiere_doc);

							//get all the tr's with an attribute
							$pokemon_row = $pokemon_xpath->query('//tr[@data-people_id]');
							$pokemon_list = array();
							$i = 0;
							if($pokemon_row->length > 0){
								foreach($pokemon_row as $row){
									if($i < 5){
										$types = $pokemon_xpath->query('td', $row);
										$n = 0;
										foreach($types as $type){
											if($type->nodeValue != ""){
												if($n != 3){
													if($n != 4){
															if($n != 5){
																$nodeValue = "<td>".$type->nodeValue.'</td>';
																echo $nodeValue;
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
					<?php
					}else{
					?>
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>						
							</tbody>
						</table>
					<?php
					}
				?>
            </div>
                <div class="nav-pencetak-gol" style="margin-bottom:50px;display:none;">
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
        </div>
        </div>
		<script>
			$('#chained_kompetisi').on('change', function()
			{
				var value    = $(this).val();
				if(value=='Liga Usia Muda'){
					$("#chained_liga").show();
				}
			})
		</script>