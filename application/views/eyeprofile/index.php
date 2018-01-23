
        <div class="center-desktop m-0">
            <div class="menu-2 w-100 m-0-0 pd-t-20">
                <ul>
                    <li class="active"><a href="<?=base_url()?>">Home</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub_pemain" >Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain" >Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official" >Offisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee" >Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter" >supporter</a></li>
                </ul>
                <select id="" name="" selected="true" class="slc-musim fl-r">
				<?php
					foreach($kompetisi as $row){
				?>
					<option><?=$row['competition']?></option>';  
				<?php
					}
				?>
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
                            <td>: <?php echo $club_header->competition; ?></td>
                        </tr>
                        <tr>
							<?php 							
								$jml=$this->db->query("select name from tbl_club where competition='liga indonesia 1'");
								$total=$jml->result_array();?>
                            <td>Jumlah Klub</td>
                            <td>: <?php $count = $jml->num_rows($jml);?> <?php echo "$count";?> Klub</td>
                        </tr>
                        <tr>
                            <td>Jumlah Pemain</td>
                            <td>:
							<?php 							
							$jmlp=$this->db->query("select name from tbl_player where status!='amatir' AND status!=''");
							$total=$jmlp->result_array();							
							$count = $jmlp->num_rows($jmlp);?> <?php echo "$count";?> Pemain</td>
                        </tr>
                        <tr>
                            <td>Pemain Asing</td>
                            <td>:
							<?php 							
							$jmln=$this->db->query("select nationality from tbl_player where nationality !='indonesia' AND nationality !=''");
							$total=$jmln->result_array();							
							$count = $jmln->num_rows($jmln);?> <?php echo "$count";?> Pemain</td>
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
                            <td>Usia Rata-rata</td>
                            <td>: -
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
            <div class="ep3box fl-l pd-t-20">
				<?php 				
				foreach($club_main as $main){
				?>
                <div class="box-content ep2 fl-l">
                    <a href="<?php echo base_url(); ?>eyeprofile/klub_detail/<?= $main['club_id']; ?>">
					<img src="<?=imgUrl()?>systems/club_logo/<?php print $main['logo_club']; ?>" alt=""></a>
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
					foreach($profile_club as $club){
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
                </div>
                <div class="right navigate" href="#jadwal" role="button">
                    <i class="material-icons">keyboard_arrow_right</i>
                </div>
            </div>
        </div>
        <div class="container t-b-b pd-t-20"></div>
        <div class="center-desktop m-0 pd-b-100">
            <div class="w-60 m-r-1 pd-t-20 formasi">
            <div class="container">
                <h3>Klasemen Liga 1 Indonesia</h3>
                <div class="box-slc-musim">
                    <span>Pilih Musim</span>
                    <select id="" name="" selected="true" class="slc-musim">
                        <option value="">2017/18</option>
                        <option value="">2017/18</option>
                        <option value="">2017/18</option>
                        <option value="">2017/18</option>
                    </select>                    
                </div>
                <table class="radius table table-striped" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">No</th>
                            <th class="t-b-b">Klub</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">M</th>
                            <th class="t-b-b">S</th>
                            <th class="t-b-b">K</th>
                            <th class="t-b-b">SG</th>
                            <th class="t-b-b">Poin</th>
                        </tr>
                    </thead>
                    <tbody>
						<?php
						$no=1;
						foreach($klasemen as $classe){
						?>
                        <tr>
                            <td><?=$no++?></td>
                            <td>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $classe['logo']; ?>" alt="" width="15px"> <?=$classe['name']?></td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
						<?php
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
        </div>
        </div>