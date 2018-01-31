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

	#nav_tab {
		background: #2f4050;
		padding: 8px 10px 8px 10px;
		margin-left: 2px;
		color: #fff;
		font-size: 12px;
		text-decoration: none;
		border: 1px solid #2f4050;
		cursor: pointer;
	}

	#nav_tab .actnet {
		background: #c09d3d;
	}
</style>
        <div class="center-desktop m-0">
            <div class="menu-2 w-100 m-0-0 pd-t-20">
                <ul>
                    <li class="active"><a href="<?=base_url()?>eyeprofile/klub" >Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter">supporter</a></li>
            </ul>
                <select id="" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($get_all_kompetisi as $row){
				?>
					<option value="<?php echo base_url()."eyeprofile/klub/".$row['competition']?>"><?php echo $row['competition'];?></option>';  
				<?php
					}
				?>
					<option value="<?php echo base_url()."eyeprofile/klub/non liga"?>">Non Liga</option>
                </select>
            </div>
        </div>
        <div class="center-desktop m-0">		
            <div class="container box-border-radius fl-l mt-30">
				
                <div class="fl-l img-80">				
                    <img src="<?=imgUrl()?>assets/img/content_11.jpg" alt="" height="100%">
                </div>
                <div class="tabel-liga-370 b-r-1 table-pd-3 fl-l">
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
                        <tr>
                            <td>Pemain Asing</td>
                            <td>:
							<?php echo count($get_player_liga_strange);?> Pemain</td>
                        </tr>
                    </table>
                </div>
                <div class="tabel-liga-370 table-pd-3 fl-l">
                    <table>
                        <tr>
                            <td>Rekor Juara</td>
                            <td>: -</td>
                        </tr>
                        <tr>
                            <td>Juara Bertahan</td>
                            <td>: -</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="center-desktop m-0">
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
								$showpage = round(getTotalClub($liga)/12, 0);
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
                <h3 class="h3-oranye">Hasil pertandingan liga 1 indonesia</h3>
            <div id="jadwal" class="jadwal carousel slide m-0 p-d-l-0">
                <div class="left navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_left</i>
                </div>
                <div role="listbox" class="j-box carousel-inner">
					<div class="over item active">
						<?php
						foreach($get_jadwal_tomorrow_1 as $club){
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
						foreach($get_jadwal_tomorrow_2 as $club){
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
						foreach($get_jadwal_tomorrow_3 as $club){
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
                </div>
                <div class="right navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_right</i>
                </div>
            </div>
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
				
				<table id="liga_indonesia" class="radius table table-striped" cellspacing="0" cellpadding="0">
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
							$i = 0;
							if($pokemon_row->length > 0){
								foreach($pokemon_row as $row){
									echo "<tr>";
									if($i < 18){
										$types = $pokemon_xpath->query('td', $row);
										$n = 0;
										foreach($types as $type){
											if(!empty($type->nodeValue)){
												if($n != 1){
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
                <span class="next-right">Lihat Klasemen Lengkap
                    <i class="material-icons t-8">keyboard_arrow_right</i>
                </span>				
            </div>
        </div>
        <div class="w-40 pd-t-20">
            <div class="container">
                <h3>Transfer Terbaru</h3>
                <table class="pencetak-gol radius table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">No</th>
                            <th class="t-b-b">Pemain</th>
                            <th class="t-b-b">Status</th>
                            <th class="t-b-b">Dari</th>
                            <th class="t-b-b">ke</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$no=1;
					foreach($transfer_pemain as $transfer){
					?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <?=$transfer['nama']?>
                                <span><?=$transfer['posisi']?></span>
                            </td>
                            <td>-</td>
                            <td>-<img src="" alt="" width="25px"></td>
                            <td>-<img src="" alt="" width="25px"></td>
                        </tr>
						<?php
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
            <div class="container">
                <h3>Pencetak Gol Terbanyak</h3>
                <table class="pencetak-gol radius table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">No</th>
                            <th class="t-b-b">Pemain</th>
                            <th class="t-b-b">Umur</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">goal</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 
					$no=1;
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
                <div class="nav-pencetak-gol" style="margin-bottom:50px;">
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
		