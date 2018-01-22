<style>
    .slc-musim{
        font-size: .95em !important;
        padding: 7px 20px !important;
    }
</style>
        <div class="center-dekstop m-0">
            <div class="menu-2 w-100 m-0-0 pd-t-20">
                <ul>
                    <li><a href="<?=base_url()?>" style="text-decoration:none;">Home</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub_pemain" style="text-decoration:none;">Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain" style="text-decoration:none;">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official" style="text-decoration:none;">Offisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee" style="text-decoration:none;">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter" style="text-decoration:none;">supporter</a></li>
                </ul>
                <select id="" name="" selected="true" class="slc-musim fl-r" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option value="">--Pilih Liga--</option>
				<?php
					foreach($kompetisi_pro as $row){
				?>
					<option value="<?php echo base_url()."eyeprofile/liga/".$row['competition']?>"><?php echo $row['competition'];?></option>';  
				<?php
					}
				?>
                </select>
            </div>
        </div>
        <div class="center-dekstop m-0">		
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
        <div class="center-dekstop m-0">
            <div class="ep2box fl-l pd-t-20">
				<?php 				
				foreach($club_main as $main){
				?>
				<a href="<?php echo base_url(); ?>eyeprofile/klub_detail/<?= $main['club_id']; ?>" style="text-decoration:unset;color:#424242;">
					<div class="box-content ep2 fl-l">
						<img src="<?=imgUrl()?>systems/club_logo/<?php print $main['logo_club']; ?>" alt="">
						<div class="detail">
							<h2><?=$main['nama_club'];?></h2>
							<h3><?=$main['competition'];?></h3>
							<table>
								<tr>
									<td>Squad</td>
									<td>: <?=$main['squad'];?></td>
								</tr>
								<tr>
									<td>Manager</td>
									<td>: <?=$main['nama_manager'];?></td>
								</tr>
							</table>
						</div>
					</div>
				</a>
				<?php
				}
				?>
            </div>
            <div class="container t-b-b pd-b-20 pd-t-20"></div>
            <div class="container">
                <h3 class="h3-oranye">Jadwal pertandingan liga 1 indonesia</h3>
            <div id="jadwal" class="jadwal carousel slide m-0 p-d-l-0">
                <div class="left navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_left</i>
                </div>
                <div role="listbox" class="j-box carousel-inner">
                    <?php
					foreach($get_jadwal_tomorrow_1 as $club){
					?>
					<div class="over item active">			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
							<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
						</div>								
					</div>		
					<?php
					}
					?>
					<?php
					foreach($get_jadwal_tomorrow_2 as $club){
					?>
					<div class="over item">			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
							<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
						</div>								
					</div>		
					<?php
					}
					?>
					<?php
					foreach($get_jadwal_tomorrow_3 as $club){
					?>
					<div class="over item">			
						<div class="j-content">
							<span class="t"><?=date("d M Y",strtotime($club["jadwal_pertandingan"]))?></span><br>
							<span class="r"><?=$club["club_a"]?></span><span class="s"><?=$club["score_a"]?></span><br>
							<span class="r"><?=$club["club_b"]?></span><span class="s"><?=$club["score_b"]?></span><br>
						</div>								
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
        <div class="container t-b-b pd-t-20"></div>
        <div class="center-dekstop m-0">
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