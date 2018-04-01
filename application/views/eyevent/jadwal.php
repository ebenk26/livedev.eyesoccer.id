<style>
.clubname {
    text-transform: uppercase;
}
.livechanel{
    border-radius: 15px;
    text-decoration: none;
    background-color: #f5f5f5;
    font-size: .9em;
    font-weight: 500;
    margin: 10px 5px;
    margin-top: 10px;
    margin-right: 5px;
    margin-bottom: 10px;
    margin-left: 5px;
}
.livechanel:hover{
    border-radius: 15px;
    text-decoration: none;
    background-color: #dddddd;
    font-weight: 500;
    margin: 10px 5px;
    margin-top: 10px;
    margin-right: 5px;
    margin-bottom: 10px;
    margin-left: 5px;
}
</style>
<div class="container eyv m-t-20">
    <ol class="breadcrumb" style="margin-top: unset;
                                    margin-bottom: unset;
                                    padding: unset;
                                    background-color: unset;
                                    font-size: 12px;">
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url(); ?>eyevent">Eyevent</a></li>
        <?php
            if (isset($model))
            {
        ?>
                <li class="active"><?= $model->title; ?></li>
        <?php        
            }
            else
            {
        ?>
                <li class="active">Semua Liga</li>
        <?php        
            }
        ?>
        
    </ol>
    <table class="tb-hasil" id="tbl-date-jadwal" style="display: none;">                    
        <thead>
            <tr>
                <th colspan="2">
                    <div id="ajax-tgl-jadwal"></div>                              
                </th>
                <th style="text-align: right;">
                    <button class="btn-merah" id="btn-tutup-jadwal" style="cursor: pointer;">Tutup</button>
                </th>
            </tr>
        </thead>
            <tbody id="body-ajax-jadwal">
                                            
            </tbody>
    </table>
    <table class="tb-hasil">
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $kemarin_lusa = new DateTime($kemarin_lusa["tanggalnya"]);
                        echo $kemarin_lusa->format('d F Y');
                    ?> (Dua Hari Lalu)
                </th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_next_yesterday))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_next_yesterday as $jdwl_nxt_ystd)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_nxt_ystd['url_a']; ?>">
                                <cn class="clubname"><?=$jdwl_nxt_ystd["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_ystd['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                            <span class="livechanel"><?php
                                if($jdwl_nxt_ystd['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_nxt_ystd['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>
                                <span><?= $jdwl_nxt_ystd["kompetisi"]; ?></span>
                                <?= $jdwl_nxt_ystd["score_a"]; ?> - <?= $jdwl_nxt_ystd["score_b"]; ?>
                                <span><?= $jdwl_nxt_ystd["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_nxt_ystd['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_ystd['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_nxt_ystd["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>
                    </tbody>
        <?php            
                }
            }
        ?>
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $kemarin = new DateTime($kemarin["tanggalnya"]);
                        echo $kemarin->format('d F Y');
                    ?> (Kemarin)
                </th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_yesterday))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_yesterday as $jdwl_ystd)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_ystd['url_a']; ?>">
                                <cn class="clubname"><?=$jdwl_ystd["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_ystd['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <span class="livechanel"><?php
                                if($jdwl_ystd['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_ystd['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>
                                <span><?= $jdwl_ystd["kompetisi"]; ?></span>
                                <?= $jdwl_ystd["score_a"]; ?> - <?= $jdwl_ystd["score_b"]; ?>
                                <span><?= $jdwl_ystd["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_ystd['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_ystd['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_ystd["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>                            
                    </tbody>
        <?php            
                }
            }
        ?>
        <thead>
            <tr>
                <th colspan="3"><?=date("d F Y")?> (Hari Ini)</th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_today))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_today as $jdwl_today)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_today['url_a']; ?>">
                                    <cn class="clubname"><?=$jdwl_today["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_today['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <span class="livechanel"><?php
                                if($jdwl_today['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_today['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="Live";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>
                                <span><?= $jdwl_today["kompetisi"]; ?></span>
                                <?=date("H:i",strtotime($jdwl_today["jadwal_pertandingan"]))?>
                                <span><?= $jdwl_today["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_today['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_today['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_today["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>                            
                    </tbody>
        <?php            
                }
            }
        ?>
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $tomorrow = new DateTime($besok["tanggalnya"]);
                        echo $tomorrow->format('d F Y');
                    ?>                              
                </th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_tomorrow))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_tomorrow as $jdwl_tmrw)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_tmrw['url_a']; ?>">
                                <cn class="clubname"><?=$jdwl_tmrw["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_tmrw['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <span class="livechanel"><?php
                                if($jdwl_tmrw['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_tmrw['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>

                                <span><?= $jdwl_tmrw["kompetisi"]; ?></span>
                                <?=date("H:i",strtotime($jdwl_tmrw["jadwal_pertandingan"]))?>
                                <span><?= $jdwl_tmrw["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_tmrw['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_tmrw['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_tmrw["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>                            
                    </tbody>
        <?php            
                }
            }
        ?>
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $yesterday = new DateTime($besok_lusa["tanggalnya"]);
                        echo $yesterday->format('d F Y');
                    ?>                              
                </th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_next_tomorrow))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_next_tomorrow as $jdwl_nxt_tmrw)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_nxt_tmrw['url_a']; ?>">
                                <cn class="clubname"><?=$jdwl_nxt_tmrw["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_tmrw['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td> 
                                <span class="livechanel"><?php
                                if($jdwl_nxt_tmrw['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_nxt_tmrw['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>
                                <span><?= $jdwl_nxt_tmrw["kompetisi"]; ?></span>
                                <?=date("H:i",strtotime($jdwl_nxt_tmrw["jadwal_pertandingan"]))?>
                                <span><?= $jdwl_nxt_tmrw["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_nxt_tmrw['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_tmrw['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_nxt_tmrw["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>                            
                    </tbody>  
        <?php            
                }
            }
        ?>
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $yesterday = new DateTime($tiga_hari_besok["tanggalnya"]);
                        echo $yesterday->format('d F Y');
                    ?>                              
                </th>
            </tr>
        </thead>
        <?php 
            if (empty($jadwal_three_after))
            {
        ?>
                <tbody>
                    <tr>
                        <td colspan="3" style="text-align: center;">
                            Tidak Ada Jadwal Pada Tanggal Ini
                        </td>
                    </tr>                            
                </tbody>  
        <?php        
            }
            else
            {
                foreach($jadwal_three_after as $jdwl_three)
                {
        ?>
                    <tbody>
                        <tr>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_three['url_a']; ?>">
                                <cn class="clubname"><?=$jdwl_three["club_a"]?></cn>
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_three['logo_a']; ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <span class="livechanel"><?php
                                if($jdwl_three['live_pertandingan']!==NULL)
                                {
                                    $Clive="";
                                    $live=$jdwl_three['live_pertandingan'];
                                }
                                else
                                {
                                    $Clive="";
                                    $live="";
                                }

                                echo $Clive." ".$live;
                                ?></span>
                                <span><?= $jdwl_three["kompetisi"]; ?></span>
                                <?=date("H:i",strtotime($jdwl_three["jadwal_pertandingan"]))?>
                                <span><?= $jdwl_three["lokasi_pertandingan"]; ?></span>
                            </td>
                            <td>
                                <a href="<?= base_url(); ?>eyeprofile/klub_detail/<?= $jdwl_three['url_b']; ?>">
                                    <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_three['logo_b']; ?>" alt="">
                                    <cn class="clubname"><?=$jdwl_three["club_b"]?></cn>
                                </a>
                            </td>
                        </tr>                            
                    </tbody>  
        <?php            
                }
            }
        ?>    
    </table>
</div>