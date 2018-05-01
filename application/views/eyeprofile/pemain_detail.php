</div>
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
                    <img src="<?php echo $res->url_pic.'/medium' ?>" alt="">                        
                </div>
            </div>
            <div class="right">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>:  <?php echo (!empty($res->birth_place) ? $res->birth_place : '-');?></td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?php echo (!empty($res->birth_date) ? $res->birth_date: '-')?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?php echo (!empty($res->nationality) ? $res->nationality: '-') ?></td>
                            </tr>
							<?php 
								if($res->level != "Profesional" && $res->mother != ""){
							?>
							<tr>
                                <td>Nama Ayah</td>
                                <td>: <?php echo(!empty($res->father) ? $res->father : '-'); ?></td>
                            </tr>
							<tr>
                                <td>Nama Ibu</td>
                                <td>: <?php echo(!empty($res->mother) ? $res->mother : '-'); ?></td>
                            </tr>
							<?php
								}
							?>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>klub Sekarang </td>
                                <td>: <?php echo (!empty($res->club) ? $res->club : '-')?></td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?php echo(!empty($res->position) ? $res->position : '-')?></td>
                            </tr>
                            <tr>
                                <td> Kontrak</td>
                                <td>: <?php echo (empty($res->contract_range1) || empty($res->contract_range1) ? ' - ' : $res->contract_range1.'-'.$res->contract_range2)?></td>
                            </tr>
							<?php 
								if($res->level != "Profesional" && $res->mother != ""){
							?>
							<tr>
                                <td>Klub Favorit</td>
                                <td>: <?php echo(!empty($res->fav_club) ? $res->fav_club : '-')?></td>
                            </tr>
							<tr>
                                <td>Pemain Favorit</td>
                                <td>: <?php echo(!empty($res->fav_player) ? $res->fav_player : '-')?></td>
                            </tr>
							<tr>
                                <td>Pelatih Favorit</td>
                                <td>: <?php echo(!empty($res->fav_coach) ? $res->fav_coach : '-')?></td>
                            </tr>
							<?php
								}
							?>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tinggi badan</td>
                                <td>: <?php echo (!empty($res->height) ? $res->height : '')?> cm</td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td>: <?php echo (!empty($res->weight) ? $res->weight : '') ?> kg</td>
                            </tr>
                            <tr>
                                <td>Kemampuan Kaki</td>
                                <td>: <?php echo (!empty($res->foot) ? $res->foot : '')?></td>
                            </tr>
							<tr>
                                <td>Jenis Kelamin</td>
                                <td>: <?php echo (!empty($res->gender) ? $res->gender : '')?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <h3><?php echo $res->name.' ('.$res->back_number.')'?></h3>

        </div>
    </div>

    <div class="desktop pd-t-280">
    <div class="center-desktop m-0 pd-t-100">
        <div class="w-60 m-r-1 formasi">
            <div class="container">
                <h3>Karir Klub</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th class="t-b-b">Bulan </th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Klub</th>
                            <th class="t-b-b">Kompetisi</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">No Punggung</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         

                            if(count($res->career_club) > 0 ){

                                foreach($res->career_club as $k => $v){
                                    echo '<tr>';
                                        echo "<td>".($v->month == '' ? '-' : $v->month)."</td>";
                                        echo "<td>{$v->year}</td>";
                                        echo "<td>{$v->club}</td>";
                                        echo "<td>{$v->tournament}</td>";
                                        echo "<td>{$v->number_of_play}</td>";
                                        echo "<td>{$v->back_number}</td>";
                                        echo "<td>{$v->coach}</td>";
                                    echo '</tr>';
                                }

                            }
                            else{
                                echo '<tr><td colspan="5" style="text-align:center">Tidak Ditemukan </td></tr>';
                            }


                        ?>
                      
                    </tbody>
                </table>
                <h3 class="pd-t-20">Karir Timnas</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                    <thead>
                       <tr>
                            <th class="t-b-b">Bulan </th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Klub</th>
                            <th class="t-b-b">Kompetisi</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">No Punggung</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no =0;
                        if(count($res->career_national) > 0){

                            foreach($res->career_national as $k => $v){
                                $no++;

                                echo '<tr>';
                                    echo "<td>".($v->month == '' ? '-' : $v->month)."</td>";
                                    echo "<td>{$v->year}</td>";
                                    echo "<td>{$v->club}</td>";
                                    echo "<td>{$v->tournament}</td>";
                                    echo "<td>{$v->number_of_play}</td>";
                                    echo "<td>{$v->back_number}</td>";
                                    echo "<td>{$v->coach}</td>";
                                echo '</tr>';

                            }

                        }
                        else{

                            echo '<tr>';

                                echo '<td colspan="7" style="text-align:center"> Tidak ditemukan </td>';

                            echo '</tr>';


                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="w-40">
        <h3 class="">Detail Posisi</h3>
        <div class="container box-pertandingan det-pos">
            <table>
                <tbody>
                    <!--<tr>
                        <td class="t-b-b" colspan="2">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" style="width: 100% !important;" alt="">
                        </td>
                    </tr>-->
                    <tr>
                        <td width="50%">
                            <h4>Posisi utama</h4>
                            <span><?php echo $res->position_a?></span>
                        </td>
                        <?php

                        // if(!empty($res->position_b)){
                            echo ' <td width="50%">
                                        <h4>posisi lainnya</h4>
                                        <span>'.$res->position_b.'</span>
                                        
                                    </td>';
                        // } ?>
                       
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container banner-eyeprofile1 img-banner mt-10 m-b-10 tx-c" style="height: unset; background-color: unset;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- EyesoccerDekstop 6#EyeprofileKlubPemainDetail336x280 -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:336px;height:280px"
            data-ad-client="ca-pub-7635854626605122"
            data-ad-slot="7032897896"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
            <!-- <img src="../../assets/img/iklanbanner/banner 400x320 px-01.jpg" alt="Banner ads"> -->
        </div>
        <div class="container" style="overflow-x: auto">
            <h3 class="pd-t-20">Prestasi</h3>
            <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0"  ">
                    <thead >
                        <tr>
                            <th class="t-b-b">NO</th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Turnamen/Kompetisi</th>
                            <th class="t-b-b">Negara</th>
                            <th class="t-b-b">Peringkat</th>
                            <th class="t-b-b">Penghargaan</th>
                        </tr>
                    </thead>
                    <tbody ">
                        <?php
						$no_ach = 0;
                        if(count($res->achievement) > 0){

                            foreach($res->achievement as $k => $v){
								$no_ach++;
                                echo '<tr>';
                                    echo "<td>{$no}</td>";
                                    echo "<td>{$v->year}</td>";
                                    echo "<td>{$v->tournament}</td>";
                                    echo "<td>{$v->country}</td>";
                                    echo "<td>{$v->rank}</td>";
                                    echo "<td>{$v->appreciation}</td>";
                                echo '</tr>';

                            }

                        }
                        else{

                            echo '<tr>';

                                echo '<td colspan="7" style="text-align:center"> Tidak ditemukan </td>';

                            echo '</tr>';


                        }
                        ?>
                    </tbody>
                </table>
        </div>
        </div>
        <div class="container banner-150 img-banner mt-20">
            <img class="lazy" src="<?php echo base_url()?>assets/img/banner-home.jpeg" alt="">
        </div>
        <div class="container pd-t-20">
            <h3 class="h3-oranye">Foto Galeri</h3>
            <div id="em2Slide" class="carousel slide pemain-foto">
                <div role="listbox" class="carousel-inner">
                    <div class="box item active">
                       <?php foreach($res->gallery as $k => $v){

                            echo '<div class="em-box">';
                                echo '<img src="'.$v->url_pic.'/medium" onerror="this.style.display=\'none\'">';

                            echo '</div>';




                       }?>
                    </div>
                   
                   
                    <div class="carousel-indicators bx-dot ep-dot">
                        <span data-target="#em2Slide" data-slide-to="0" class="dot active"></span>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
