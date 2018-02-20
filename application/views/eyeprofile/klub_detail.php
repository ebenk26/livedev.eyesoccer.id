<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$club=($this->db->query("SELECT * FROM tbl_club WHERE club_id='".$cid."' LIMIT 1")->row_array());
$official=$this->db->query("SELECT * FROM tbl_official_team WHERE club_now='".$cid."' ORDER BY official_id ASC");
$total_official=($official->num_rows());
?></div>
<div class="w-blue">
    <img src="<?php echo base_url()?>assets/img/segitiga-putih-01.png" alt="">
</div><div class="desktop">
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
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
                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $club['logo']; ?>" alt="">                        
                </div>
            </div>
            <div class="right">
                <div class="t-30 mt-53">
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
                <div class="t-30 mt-53">
                    <table>
                        <tr>
                            <td>Julukan</td>
                            <td>: <?=$club["nickname"]?></td>
                        </tr>
                        <tr>
                            <td>Berdiri Sejak</td>
                            <td>: <?=$club["establish_date"]?></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td>: <?=$club["phone"]?></td>
                        </tr>
						<tr>
                            <td>Pelatih</td>
                            <td>: <?=$club["manager"]?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop">
    <div class="center-desktop m-0">
        <div class="w-60 m-r-1 pd-t-100 formasi">
            <div class="container ofisial-detail">
                <h3>Latar Belakang</h3>
                <p>
				<?=$club["description"]?>
                </p>
            </div>
        </div>      
    </div>
    </div>