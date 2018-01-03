<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$pemain=$this->db->query("SELECT a.*,
										a.birth_date as tgl_lahir,
										SUBSTRING(a.birth_date,1,2) as tanggal,
										SUBSTRING(a.birth_date,4,2) as bulan,
										SUBSTRING(a.birth_date,7,4) as tahun,
										b.name as club_name,b.competition,b.logo FROM tbl_player a INNER JOIN tbl_club b ON b.club_id=a.club_id WHERE a.url='".$pid."' LIMIT 1")->row_array();
?>

<?php
if(isset($_SESSION["member_id"]))
{
	$_SESSION["player_id"] = $pemain["player_id"];
	$member_player = $this->db->query("SELECT * FROM tbl_member_player WHERE id_member='".$_SESSION["member_id"]."'")->row_array();
		if($member_player["id_player"] == $pemain["player_id"]){
		echo '<button style="float: right;margin-right: 5px;" onclick="update_pemain('.$pemain["player_id"].')" class="btn btn-success btn-sm">Update</button>';
	}
}
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
<br><br><br><br>
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
            <div class="left">
                <svg style="height: 189px;">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <polygon class="fill" points="132 0 22 190 0 190 110 0 132 0" />
                            <polygon class="fill" points="330 0 330 190 42 190 152 0 330 0" />
                        </g>
                    </g>
                </svg>
                <div class="box-img-radius">
                    <img src="<?=imgUrl()?>systems/player_storage/<?=$pemain["pic"]?>" alt="">                        
                </div>
            </div>
            <div class="right fill">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?= $pemain['tanggal']." ".$bulan[$pemain['bulan']]." ".$pemain['tahun']; ?></td>
                            </tr>
                            <tr>
                                <td>Tempat lahir</td>
                                <td>: <?=$pemain["birth_place"]?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?=$pemain["nationality"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Klub Sekarang</td>
                                <td>: <b><a href="<?=base_url()?>eyeprofile/klub_detail/<?=$pemain["club_id"]?>"><?=$pemain["club_name"]?></a></b></td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?=$pemain["position"]?></td>
                            </tr>
                            <tr>
                                <td>Masa Kontrak</td>
                                <td>: </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tinggi Badan</td>
                                <td>: <?=$pemain["height"]?></td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td>: <?=$pemain["weight"]?></td>
                            </tr>
                            <tr>
                                <td>Kemampuan Kaki</td>
                                <td>: <?=$pemain["foot"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h3><?=$pemain["name"]?></h3>
        </div>
    </div>

    <div class="dekstop pd-t-280">
    <div class="center-dekstop m-0">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <div class="container">
                <h3>Karir Klub</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">No</th>
                            <th class="t-b-b">Klub</th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">Gol</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 
					$no=1;
					foreach($karir_player as $row){
					?>					
                        <tr>
                            <td><?=$no++?></td>
                            <td>
							<?=$row["klub"]?>
                                <!--<img src="<?=base_url()?>systems/club_logo/<?=$pemain["logo"]?>" alt="" width="15px"> <?=$pemain["club_name"]?>-->
							</td>
                            <td><?=$row["tahun"]?></td>
                            <td><?=$row["jumlah_main"]?></td>
                            <td></td>
                            <td><?=$row["pelatih"]?></td>
                        </tr>
					<?php } ?>                        
                    </tbody>
                </table>
                <h3 class="pd-t-20">Karir Timnas</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">No</th>
                            <th class="t-b-b">Timnas</th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">Gol</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php 
					$no=1;
					?>					
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-40 pd-t-20">
        <h3 class="">Detail Posisi</h3>
        <div class="container box-pertandingan det-pos">
            <table>
                <tbody>
                    <tr>
                        <td class="t-b-b" colspan="2">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" style="width: 100% !important;" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            <h4>Posisi utama</h4>
                            <span><?=$pemain["position"]?></span>
                        </td>
                        <td width="50%">
                            <h4>posisi lainnya</h4>
                            <span></span>
                            <span></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container">
            <h3 class="pd-t-20">statistik</h3>
            <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th colspan="2" class="t-b-b">
                            <div class="fl-l pd-0-10">
                                <a href="">Kerja Sama</a>
                            </div>
                            <div class="fl-l pd-0-10">
                                <a href="">Serangan</a>
                            </div>
                            <div class="fl-l pd-0-10">
                                <a href="">Bertahan</a>
                            </div>
                            <div class="fl-l pd-0-10">
                                <a href="">Disiplin</a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="cap">
                    <tr>
                        <td>Assist</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Operan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>akurasi operan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>akurasi umpan silang</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Peluang</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="container pd-t-20">
            <h3 class="h3-oranye">Foto Galeri</h3>
            <div id="em2Slide" class="carousel slide pemain-foto">
                <div role="listbox" class="carousel-inner">
					<?php
					$res=$this->db->query("select * from tbl_gallery where player_id='".$pemain['player_id']."' limit 10");
					foreach($res->result_array() as $row){
						$explode = explode("-",$row['pic']);
						if($explode[1]==""){
							
						}else{
							echo '				
                    <div class="box item active">					
                        <div class="em-box">
                            <img src="'.imgUrl().'systems/player_storage/'.$row['pic'].'" alt="">
                        </div>
                    </div>';}
					}
					?>
                    <!--<div class="carousel-indicators bx-dot ep-dot pd-l-48">
                        <span data-target="#em2Slide" data-slide-to="0" class="dot active"></span>
                        <span data-target="#em2Slide" data-slide-to="1" class="dot"></span>
                        <span data-target="#em2Slide" data-slide-to="2" class="dot"></span>
                    </div>--><br>
                </div>
            </div>
        </div>
    </div>
    </div>