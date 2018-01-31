
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
                    <img src="<?php echo $res->url_pic?>/medium" alt="">                        
                </div>
            </div>
            <div class="right fill">
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tempat Lahir </td>
                                <td>:  <?php echo (isset($res->birth_place) ? $res->birth_place : '-');?></td>
                            </tr>
                            <tr>
                                <td>Tanggal lahir</td>
                                <td>: <?php echo (isset($res->birth_date) ? $res->birth_date: '-')?></td>
                            </tr>
                            <tr>
                                <td>Kewarganegaraan</td>
                                <td>: <?php echo (isset($res->nationality) ? $res->nationality: '-') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>klub Sekarang </td>
                                <td>: <?php echo (isset($res->club) ? $res->club : '-')?></td>
                            </tr>
                            <tr>
                                <td>Posisi</td>
                                <td>: <?php echo(isset($res->position) ? $res->position : '-')?></td>
                            </tr>
                            <tr>
                                <td> Kontrak</td>
                                <td>: <?php echo (empty($res->contract_range1) || empty($res->contract_range1) ? ' - ' : $res->contract_range1.'-'.$res->contract_range2)?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="t-30 mt-53">
                    <table>
                        <tbody>
                            <tr>
                                <td>Tinggi badan</td>
                                <td>: <?php echo $res->height?></td>
                            </tr>
                            <tr>
                                <td>Berat Badan</td>
                                <td>: <?php echo $res->weight?></td>
                            </tr>
                            <tr>
                                <td>Kemampuan Kaki</td>
                                <td>: <?php echo $res->foot?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
            <h3><?php echo $res->name.' ('.$res->number.')'?></h3>

        </div>
    </div>

    <div class="desktop pd-t-280">
    <div class="center-desktop m-0">
        <div class="w-60 m-r-1 formasi">
            <div class="container">
                <h3>Karir Klub</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">NO </th>
                            <th class="t-b-b">Klub</th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 0 ;

                            if(count($res->career_club) > 0 ){

                                foreach($res->career_club as $k => $v){
                                    $no++;
                                    echo '<tr>';
                                        echo "<td>{$no}</td>";
                                        echo "<td>{$v->club}</td>";
                                        echo "<td>{$v->year}</td>";
                                        echo "<td>{$v->number_of_play}</td>";
                                        echo "<td>{$v->coach}</td>";
                                    echo '</tr>';
                                }

                            }
                            else{
                                echo '<tr><td colspan="5" style="text-align:center">Data Tidak Ditemukan </td></tr>';
                            }


                        ?>
                      
                    </tbody>
                </table>
                <h3 class="pd-t-20">Karir Timnas</h3>
                <table class="radius table table-striped pd-18" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="t-b-b">NO</th>
                            <th class="t-b-b">Timnas</th>
                            <th class="t-b-b">Tahun</th>
                            <th class="t-b-b">Main</th>
                            <th class="t-b-b">Gol</th>
                            <th class="t-b-b">Pelatih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if(count($res->career_national) > 0){


                            echo '<tr>';
                            echo '</tr>';



                        }
                        else{

                            echo '<tr>';

                                echo '<td colspan="5" style="text-align:center"> Data belum ditemukan </td>';

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
                    <tr>
                        <td class="t-b-b" colspan="2">
                            <!--<img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" style="width: 100% !important;" alt="">-->
                        </td>
                    </tr>
                    <tr>
                        <td width="50%">
                            <h4>Posisi utama</h4>
                            <span>gelandang bertahan</span>
                        </td>
                        <td width="50%">
                            <h4>posisi lainnya</h4>
                            <span>gelandang tengah</span>
                            <span>bek tengah</span>
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
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>Operan</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>akurasi operan</td>
                        <td>10%</td>
                    </tr>
                    <tr>
                        <td>akurasi umpan silang</td>
                        <td>20%</td>
                    </tr>
                    <tr>
                        <td>Peluang</td>
                        <td>10</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <!--<div class="container pd-t-20">
            <h3 class="h3-oranye">Foto Galeri</h3>
            <div id="em2Slide" class="carousel slide pemain-foto">
                <div role="listbox" class="carousel-inner">
                    <div class="box item active">
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                    </div>
                    <div class="box item">
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                    </div>
                    <div class="box item">
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                        <div class="em-box">
                            <img src="file:///Users/payaldasani/Desktop/michael-essien.jpg" alt="">
                        </div>
                    </div>
                    <div class="carousel-indicators bx-dot ep-dot pd-l-48">
                        <span data-target="#em2Slide" data-slide-to="0" class="dot active"></span>
                        <span data-target="#em2Slide" data-slide-to="1" class="dot"></span>
                        <span data-target="#em2Slide" data-slide-to="2" class="dot"></span>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    </div>
