<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <div class="center-dekstop m-0">
            <div class="menu-2 w-100 m-0-0 pd-t-20">
                <ul>
                    <li><a href="<?=base_url()?>" style="text-decoration:none; color:#3d3d3d;">Home</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/klub" style="text-decoration:none;color:#3d3d3d;">Klub</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/pemain" style="text-decoration:none;color:#3d3d3d;">Pemain</a></li>
                    <li><a href="<?=base_url()?>eyeprofile/official" style="text-decoration:none;color:#3d3d3d;">Ofisial</a></li>
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
        <div class="center-dekstop m-0">
            <div class="container box-border-radius fl-l mt-30">					
                <div class="fl-l img-80">				
                    <img src="<?=base_url()?>assets/img/content_11.jpg" alt="" height="100%">
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
        <div class="center-dekstop m-0">
            <select id="" name="" selected="true" class="slc-musim mt-20">
				<?php
					foreach($provinsi as $row){
				?>
					<option><?=$row['Nama']?></option>';  
				<?php
					}
				?>				
            </select>
            <input type="text" name="" id="" placeholder="Cari ..." class="src-200 mt-30">
            <img src="assets/img/ic_search.png" alt="" class="img-src-200">
            <div class="ep2box fl-l pd-t-20">
				<?php 				
				foreach($supporter as $row){			
				?>
                <div class="box-content ep3 fl-l">
                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_club']; ?>" alt="">
                    <div class="detail">
                        <h2><?=$row["nama_club"]?></h2>
                        <table>
                            <tr>
                                <td>Squad</td>
                                <td>: <?=$row["squad"]?></td>
                            </tr>
                            <tr>
                                <td>Manager</td>
                                <td>: <?=$row["nama_manager"]?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="center-dekstop m-0 mt-20 pd-b-100">
                <button class="btn-white btn-white-orange" type="button">Lihat lainnya</button>
        </div>
