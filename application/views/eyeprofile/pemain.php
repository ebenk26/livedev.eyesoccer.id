
    <div class="center-desktop m-0">
        <div class="menu-2 w-100 m-0-0 pd-t-20">
            <ul>
                    <li><a href="<?=base_url()?>" style="text-decoration:none; color:#3d3d3d;">Home</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub_pemain" style="text-decoration:none;color:#3d3d3d;">Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain" style="text-decoration:none;color:#3d3d3d;">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub_offisial" style="text-decoration:none;color:#3d3d3d;">Ofisial</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/referee" style="text-decoration:none;color:#3d3d3d;">Perangkat Pertandingan</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/supporter" style="text-decoration:none;color:#3d3d3d;">supporter</a></li>
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
                        </tr><tr>
                            <td>Pemain Bertahan</td>
                            <td>: -</td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
    <div class="center-desktop m-0">
    <input type="text" name="" id="" placeholder="Cari ..." class="src-200 mt-30">
    <img src="<?=base_url()?>newassets/img/ic_search.png" alt="" class="img-src-200">
    <table class="radius table table-striped pd-18 mt-10" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th class="t-b-b">No</th>
					<th class="t-b-b"></th>
                    <th class="t-b-b">Pemain</th>
                    <th class="t-b-b">Tgl Lahir</th>
                    <th class="t-b-b">Posisi</th>
                    <th class="t-b-b">Klub</th>
                    <th class="t-b-b">Kewarganegaraan</th>
                    <th class="t-b-b">Main</th>
                    <th class="t-b-b">Gol</th>
                    <th class="t-b-b">Assist</th>
                </tr>
            </thead>
            <tbody>
					<?php
					$no = 1;		
					foreach($pemain_klub as $row){
					$bulan 	= array(
			                '01' => 'Januari',
			                '02' => 'Februari',
			                '03' => 'Maret',
			                '04' => 'April',
			                '05' => 'Mei',
			                '06' => 'Juni',
			                '07' => 'Juli',
			                '08' => 'Agustus',
			                '09' => 'September',
			                '10' => 'Oktober',
			                '11' => 'November',
			                '12' => 'Desember',
						);
				?>						
                <tr>
                    <td><?=$no++?></td>
                    <td>
					<a href="<?=base_url()?>eyeprofile/pemain_detail/<?=$row["url"]?>">
					<div style="width: 40px;height:40px; overflow:hidden; border-radius:50%;">
						<img src="<?=imgUrl()?>systems/player_storage/<?=$row["foto"]?>" alt="">
					</div>
					</a>					
					</td>
                    <td>
						<!--<a href="<?=base_url()?>eyeprofile/pemain_detail/<?=$row["url"]?>"><div style="width: 40px;height:40px; overflow:hidden; border-radius:50%;"><img src="<?=base_url()?>systems/player_storage/<?=$row["foto"]?>"></div></a>-->
					<?=$row['nama']?>	
                    </td>
                    <td><?=$row['tanggal']?> <?=$bulan[$row['bulan']]?> <?=$row['tahun']?></td>
                    <td><?=$row['posisi']?></td>
                    <td><?=$row['klub']?></td>
                    <td><?=$row['timnas']?></td>
                    <td>-</td>
                </tr>
				<?php }?>
            </tbody>
        </table>
    </div>