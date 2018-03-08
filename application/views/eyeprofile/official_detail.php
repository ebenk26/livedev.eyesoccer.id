</div>
<div class="w-blue">
    <img src="<?php echo base_url()?>assets/img/segitiga-putih-01.png" alt="">
</div><div class="desktop">
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
		<?php
		foreach($get_official_detail as $row){
		?>
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
                    <img src="<?php echo imgUrl()?>systems/player_storage/<?php echo $row['official_photo']; ?>" alt="">
                </div>
            </div>
            <div class="right">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>:  <?php echo (!empty($row['birth_place']) ? $row['birth_place'] : '-');?></td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?php echo (!empty($row['birth_date']) ? $row['birth_date'] : '-')?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?php echo (!empty($row['nationality']) ? $row['nationality'] : '-') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>klub Sekarang </td>
                                <td>: <a href="<?php echo base_url()."eyeprofile/klub_detail/".$row['club_url']?>"><?php echo (!empty($row['club_name']) ? $row['club_name'] : '-')?></a></td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?php echo(!empty($row['position']) ? $row['position'] : '-')?></td>
                            </tr>
                            <tr>
                                <td> Kontrak</td>
                                <td>: <?php echo(!empty($row['contract']) ? $row['contract'] : '-')?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Lisensi</td>
                                <td>: <?php echo (!empty($row['license']) ? $row['license'] : '')?></td>
                            </tr>
                            <tr>
                                <td>Nomor Identitas</td>
                                <td>: <?php echo (!empty($row['no_identity']) ? $row['no_identity'] : '') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <h3><?php echo $row['name'];?></h3>

        </div>
    </div>
	<?php
		}
		?>
    <div class="desktop pd-t-280">
    <div class="center-desktop m-0" style="padding-top: 30px;">
        <div class="w-60 m-r-1 pd-t-20 formasi">
            <div class="container ofisial-detail">
                <h3>Latar Belakang</h3>
                <p>
                    -
                </p>
            </div>
        </div>
        <div class="w-40 pd-t-20">
            <h3 class="">Formasi (4-4-2)</h3>
            <div class="container box-formasi det-pos">
                <img src="http://3.bp.blogspot.com/-ibBCQCt1CL0/VHMXdT8LhhI/AAAAAAAAA68/6pLm6hX64yM/s1600/Formasi%2Bsepak%2BBola.png" alt="">
            </div>
        </div>
        <div class="container">

        </div>
        <div class="container pd-t-20 pd-b-100">
            <h3 class="h3-oranye">Karir Klub</h3>
            <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="t-b-b">#</th>
                        <th class="t-b-b">Tahun</th>
                        <th class="t-b-b">Klub</th>
                        <th class="t-b-b">Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
            <h3 class="h3-oranye pd-t-20">Karir Klub</h3>
            <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="t-b-b">#</th>
                        <th class="t-b-b">Tahun</th>
                        <th class="t-b-b">Negara</th>
                        <th class="t-b-b">Prestasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
