</div>
<div class="w-blue">
    <img src="<?php echo base_url()?>assets/img/segitiga-putih-01.png" alt="">
</div><div class="desktop">
    <div class="container">
        <div class="garis-banner over-in profile-pemain">
		<?php 
        $res = json_decode($res);
        $r = $res->data; ?>


            <div class="left">
                
                <div class="box-img-radius">
                    <img src="<?php echo $r->url_logo; ?>" alt="">
                </div>
            </div>
            <div class="right">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>:  <?php echo (!empty($r->birth_place) ? $r->birth_place : '-');?></td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?php echo (!empty($r->birth_date) ? $r->birth_date : '-')?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?php echo (!empty($r->nationality) ? $r->nationality : '-') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>klub Sekarang </td>
                                <td>: <?php echo (!empty($r->club) ? $r->club : '-')?></td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?php echo(!empty($r->position) ? $r->position : '-')?></td>
                            </tr>
                            <tr>
                                <td> Kontrak</td>
                                <td>: <?php echo(!empty($r->contract) ? $r->contract : '-')?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Lisensi</td>
                                <td>: <?php echo (!empty($r->license) ? $r->license: '')?></td>
                            </tr>
                            <tr>
                                <td>Nomor Identitas</td>
                                <td>: <?php echo (!empty($r->no_identity) ? $r->no_identity : '') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <h3><?php echo $r->name;?></h3>

        </div>
    </div>
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
