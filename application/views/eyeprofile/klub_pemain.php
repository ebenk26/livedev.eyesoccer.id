<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=1000">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="crumb">
        <ul>
            <li>Home</li>
            <li>EyeProfile</li>
            <li>Klub</li>
            <!-- <li>Pemain</li> -->
        </ul>
    </div>
    <div class="container">
        <div class="garis-banner">
		<?php
		foreach($klub_pemain as $row){
		?>		
            <div class="left">		
                <img src="<?=base_url()?>assets/img/garis.svg" alt="">
                <img class="epro-logo" src="" alt="">
            </div>
            <div class="right">
                <div class="t-30">
                    <h3>INFO</h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Nama Klub</td>
                                <td>: <?=$row["nama_club"]?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>: <?=$row["establish_date"]?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: </td>
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
                                <td>: <?=$row["nama_manager"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td style="width:100px; ! important; display:block;">Jumlah Pemain</td>
                                <td>: <?=$row["squad"]?> Pemain</td>
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
                                <td>: <?=$row["stadion"]?></td>
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
    <div class="dekstop pd-t-280">
    <div class="center-dekstop m-0 option">
        <span>Pilih Musim</span>
        <select id="" name="" selected="true" class="slc-musim">
            <option value="">2017/18</option>
        </select>
        <button class="fl-r btn-orange" type="button"><img src="<?=base_url()?>assets/img/" alt=""> Tambah Pemain</button>
    </div>	
			<div class="center-dekstop m-0 pd-t-20">
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
				<div class="box-pemain">
					<div class="bg-pemain">
						<span><?=$no++?></span>
						<h1><?=$row['nama']?></h1>
						<span><?=$row['posisi']?></span>
					</div>
					<div class="img-pemain">
						<img src="<?=base_url()?>systems/player_storage/<?=$row["foto"]?>" alt="">                
					</div>
					<table>
						<tbody>
							<tr>
								<td>Kewarganegaraan</td>
								<td><?=$row['timnas']?></td>
							</tr>
							<tr>
								<td>Tgl Lahir</td>
								<td><?=$row['tanggal']?> <?=$bulan[$row['bulan']]?> <?=$row['tahun']?></td>
							</tr>
							<tr>
								<td>Main</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
					<button class="btn-orange-2" type=""><a href="<?=base_url()?>eyeprofile/pemain_detail/<?=$row["url"]?>" style="text-decoration:none;">Lihat Detail Pemain</a></button>
				</div><?php }?>                                      
    </div>
	
    <div class="center-dekstop m-0">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <h3 class="">Formasi terakhir</h3>
            <table class="radius" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td class="gray t-b-b">Formasi
                            <span>4-2-3-1</span>
                        </td>
                        <td class="gray t-b-b t-b-r">Manager
                            <span>Emral Abus</span>
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
                                <img src="<?=base_url()?>systems/club_logo/<?php print $classe['logo']; ?>" alt="" width="15px"> <?=$classe['name']?></td>
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
            <h3 class="">Pertandingan</h3>
            <div class="container box-pertandingan">
                <table>
                    <tbody>
					<?php								
					foreach($jadwal_pertandingan as $data){
					?>
                        <tr>
                            <td colspan="3">
                                <h4>LIGA 1 INDONESIA</h4>
                                <span class="date-box-pertandingan"><?=date("d M Y",strtotime($data["jadwal_pertandingan"]))?>
                                    <br><?=date("H:i",strtotime($data["jadwal_pertandingan"]))?> WIB
                                </span>
                            </td>
                        </tr>
                        <tr class="t-20">
                            <td width="40%">
                                <i class="material-icons i-l-pertandingan"></i>
                                <img src="<?=base_url()?>systems/club_logo/<?=$data["logo_a"]?>" alt=""> <?=$data["club_a"]?>
                            </td>
                            <td width="20%" style="font-weight: 600;">vs</td>
                            <td width="40%">
                                <img src="<?=base_url()?>systems/club_logo/<?=$data["logo_a"]?>" alt=""> <?=$data["club_b"]?>
                                <i class="material-icons i-r-pertandingan"></i>
                            </td>
                        </tr><?php } ?>
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
        <div class="container pd-b-50">
            <div id="em2Slide" class="carousel slide">
                <div role="listbox" class="carousel-inner">
                    <div class="box item active">
						<?php
						foreach ($eyemarket_main as $data){
						?>					
                        <div class="em-box">
                            <h4><?=$data["product_name"]?></h4>
                            <div class="container">
                                <div class="w-40 m-r-1">
                                    <img class="img-prod" src="<?=base_url()?>systems/eyemarket_storage/<?php print $data['pic']; ?>" alt="">
                                </div>
                                <div class="w-60">
                                    <span>Harga</span>
                                    <h5>Rp. <?=number_format($data['price'],2,",",".")?></h5>
                                    <button type="submit" class="beli">Beli</button>
                                </div>
                            </div>
                        </div>
						<?php } ?>						
                    </div>
                    <div class="carousel-indicators bx-dot ep-dot pd-l-48">
                        <span data-target="#em2Slide" data-slide-to="0" class="dot active"></span>
                        <span data-target="#em2Slide" data-slide-to="1" class="dot"></span>
                        <span data-target="#em2Slide" data-slide-to="2" class="dot"></span>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>		
    </body>
</html>