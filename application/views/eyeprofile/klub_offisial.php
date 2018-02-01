<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<br><br>
</div>
<div class="w-blue">
    <img src="<?php echo base_url()?>assets/img/segitiga-putih-01.png" alt="">
</div><div class="desktop">
    <div class="container">
        <div class="garis-banner">
         	<?php
			foreach($klub_official as $data){
			?>			
            <div class="left">
                <!-- <svg style="height: 189px;">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <polygon class="fill" points="132 0 22 190 0 190 110 0 132 0" />
                            <polygon class="fill" points="330 0 330 190 42 190 152 0 330 0" />
                        </g>
                    </g>
                </svg>					 -->
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
                                <td>: <?=$data["nama_club"]?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Berdiri</td>
                                <td>: <?=$data["establish_date"]?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: </td>
                            </tr>
                            <tr>
                                <td>Situs</td>
                                <td>: <?=$data["website"]?></td>
                            </tr>
							
                        </tbody>
                    </table>
                </div>
                <div class="t-30">
                    <h3><?=$data["competition"]?></h3>
                    <table>
                        <tbody>
                            <tr>
                                <td>Level Liga</td>
                                <td>: <?=$data["competition"]?></td>
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
                                <td>: <?=$data["nama_manager"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Jumlah Pemain</td>
                                <td>: <?=$data["squad"]?> Pemain</td>
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
                                <td>: <?=$data["stadion"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
			<?php }?>
        </div>
        <!--<div class="menu-2">
            <ul>
                <li>Pemain</li>
                <li>Offisial</li>
                <li>Supporter</li>
            </ul>
        </div>-->
    </div>
    <div class="desktop">
    <div class="center-desktop m-0 option">
        <span>Pilih Musim</span>
        <select id="" name="" selected="true" class="slc-musim">
            <option value="">2017/18</option>
        </select>
        <button class="fl-r btn-orange" type="button"><img src="assets/img/" alt=""> Tambah Ofisial</button>
    </div>
    <div class="center-desktop m-0 pd-t-100">
			<?php
			$no = 1;
			foreach($official_klub as $data){
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
                <h1><?=$data['nama_manager']?></h1>
                <span><?=$data['position']?></span>
            </div>
            <div class="img-pemain">
                <img src="<?=imgUrl()?>systems/player_storage/<?=$data["official_photo"]?>" alt="" width="100%">                
            </div>
            <table>
                <tbody>
                    <tr>
                        <td>Kewarganegaraan</td>
                        <td><?=$data['nationality']?></td>
                    </tr>
                    <tr>
                        <td>Tgl Lahir/Umur</td>
                        <td><?=$data['tanggal']?> <?=$bulan[$data['bulan']]?> <?=$data['tahun']?></td>
                    </tr>
                    <tr>
                        <td>Masa Kontrak</td>
                        <td><?=$data['contract']?></td>
                    </tr>
                </tbody>
            </table>
            <button class="btn-orange-2" type=""><a href="<?=base_url()?>eyeprofile/official_detail/<?=$data["official_id"]?>" >Lihat Detail Offisial</a></button>
        </div> 
		<?php }?>
    </div>
	</div>