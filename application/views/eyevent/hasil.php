<div class="container eyv m-t-20">
    <table class="tb-hasil" id="tbl-date" style="display: none;">                    
        <thead>
            <tr>
                <th colspan="2">
                    <div id="ajax-tgl"></div>                              
                </th>
                <th style="text-align: right;">
                    <button class="btn-merah" id="btn-tutup" style="cursor: pointer;">Tutup</button>
                </th>
            </tr>
        </thead>
            <tbody id="body-ajax">
                                            
            </tbody>
    </table>
    <table class="tb-hasil">                    
        <thead>
            <tr>
                <th colspan="3">
                    <?php
                        $yesterday = new DateTime($kemarin["tanggalnya"]);
                        echo $yesterday->format('d F Y');
                    ?>                              
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
                foreach($jadwal_yesterday as $jdwl_yest)
                {
        ?>
                    <tbody>
                        <tr>
                            <td><?=$jdwl_yest["club_a"]?>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_yest['logo_a']; ?>" alt="">
                            </td>
                            <td><?=date("H:i",strtotime($jdwl_yest["jadwal_pertandingan"]))?>
                                <span></span>
                            </td>
                            <td>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_yest['logo_b']; ?>" alt="">
                                <?=$jdwl_yest["club_b"]?>
                            </td>
                        </tr>                            
                    </tbody>
        <?php            
                }
            }
        ?> 
        <thead>
            <tr>
                <th colspan="3"><?=date("d F Y")?></th>
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
                            <td><?=$jdwl_today["club_a"]?>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_today['logo_a']; ?>" alt="">
                            </td>
                            <td><?=date("H:i",strtotime($jdwl_today["jadwal_pertandingan"]))?>
                                <span></span>
                            </td>
                            <td>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_today['logo_b']; ?>" alt="">
                                <?=$jdwl_today["club_b"]?>
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
                            <td><?=$jdwl_tmrw["club_a"]?>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_tmrw['logo_a']; ?>" alt="">
                            </td>
                            <td><?=date("H:i",strtotime($jdwl_tmrw["jadwal_pertandingan"]))?>
                                <span></span>
                            </td>
                            <td>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_tmrw['logo_b']; ?>" alt="">
                                <?=$jdwl_tmrw["club_b"]?>
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
                            <td><?=$jdwl_nxt_tmrw["club_a"]?>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_tmrw['logo_a']; ?>" alt="">
                            </td>
                            <td><?=date("H:i",strtotime($jdwl_nxt_tmrw["jadwal_pertandingan"]))?>
                                <span></span>
                            </td>
                            <td>
                                <img src="<?=imgUrl()?>systems/club_logo/<?php print $jdwl_nxt_tmrw['logo_b']; ?>" alt="">
                                <?=$jdwl_nxt_tmrw["club_b"]?>
                            </td>
                        </tr>                            
                    </tbody>  
        <?php            
                }
            }
        ?>    
    </table>
</div>