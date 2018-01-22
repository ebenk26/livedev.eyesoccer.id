
        <div class="center-desktop m-0">
            <div class="container">
				<div class="half2">
				<?php
				foreach($eyevent_main as $vent){
				?>				
                    <div class="gambar2">
						<a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent['id_event'];?>">					
							<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent['thumb1']; ?>">
						</a>
                        <div class="fl-l ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_left</i>
                            </a>
                        </div>
                    </div>
				<?php } ?>
                </div>
                <div class="half2 p-d-l-20">
				<?php
				foreach($eyevent_main_2 as $vent2){
				?>				
                    <div class="gambar2">
						<a href="<?php echo base_url(); ?>eyevent/detail/<?= $vent2['id_event'];?>">					
							<img src="<?=imgUrl()?>systems/eyevent_storage/<?php print $vent2['thumb1']; ?>">
						</a>
                        <div class="fl-r ae">
                            <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                    </div>
				<?php } ?>
                </div>
                <!-- </div> -->
            </div>
        </div>

        <div class="center-desktop m-0">
            <!-- <div class="w1020 m-0"> -->
            <div class="container menu-5 m-0 bbg" style="border-bottom: unset;">
                <div class="fl-l" style="width: max-content;">
                    <div class="tab">
                        <ul class="nav nav-tabs" id="tab-nav" style="width: 100%;">
                            <li>
                                <a href="#hasil-pertandingan" data-toggle="tab">HASIL PERTANDINGAN</a>
                            </li>
                            <li class="active">
                                <a href="#jadwal-pertandingan" data-toggle="tab">JADWAL PERTANDINGAN</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>eyevent/klasemen">KLASEMEN</a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>eyevent/nobar">NONTON BARENG</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <select id="ligachampion" class="lc fl-r" style="margin-top: -42px;">
                    <option value=>Liga Champion</option>
                    <option value=>Liga Champion 2</option>
                    <option value=>Liga Champion 3</option>
                    <option value=>Liga Champion 4</option>
                    <option value=>Liga Champion 5</option>
                </select>
            </div>
            <!-- </div> -->
        </div>

        <div class="tab-content" style="margin-top: 1em;">
            <!-- ===== Start Hasil Pertandingan ===== -->
            <div id="hasil-pertandingan" class="tab-pane fade">
                <div class="center-desktop m-0">
                    <!-- <div class="w1020 mt-30 m-0"> -->
                    <div class="container mt-20">
                        <div class="container eyv m-t-20">
                            <h1>slvokwgkewngfoew</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== End Hasil Pertandingan ===== -->
            <!-- ===== Start Jadwal Pertandingan ===== -->
            <div id="jadwal-pertandingan" class="tab-pane fade in active">
                <div class="center-desktop m-0">
                    <!-- <div class="w1020 mt-30 m-0"> -->
                    <div class="container mt-20">
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

                        <div class="container eyv-r mt-10">
                            <div class="down-r-vent">
                                <div class="kalender mt-20">
                                    <div id="z"></div>
                                    <!-- <input type="text" id="d" /> -->
                                    <button class="btn-white-g" type="button" id="btn-date">Lihat</button>
                                </div>
                            </div>
                            <div class="container down-r-vent mt-30">
                                <div class="fl-l">
                                    <h4>BERITA TERBARU</h4>
                                </div>
                                <div class="fl-r bcd">
                                    <a href="">
                                        <span>Berita Lainnya</span>
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                                <div class="pd">
                                    <?php 
                                    foreach($eyenews_main as $terbaru){
                                    ?>
                                    <div>
                                        <div class="container he">
                                            <a href="">
                                                <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $terbaru['thumb1']; ?>" alt="">
                                            </a>
                                            <div class="container rx">
                                                <a href="<?php echo base_url(); ?>eyenews/detail/<?= $terbaru['url'];?>">
                                                    <span><?=$terbaru['title'];?></span>
                                                </a>
                                                <div class="rr">
                                                    <span>
                                                        <?php
                                                        $date       =  new DateTime($terbaru['createon']);
                                                        $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                        echo relative_time($tanggal) . ' lalu - '.$terbaru['news_view'].' views';
                                                        ?>                                          
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="d-r-v">
                                <div class="fl-l">
                                    <h4>VIDEO</h4>
                                </div>
                                <div class="fl-r bcd">
                                    <a href="">
                                        <span>Berita Lainnya</span>
                                        <i class="material-icons">keyboard_arrow_right</i>
                                    </a>
                                </div>
                                <div class="pd">
                                    <?php 
                                    foreach($video_eyetube as $newtube){
                                    ?>
                                    <div>
                                        <div class="container h105">
                                            <a href="">
                                                <img src="<?php echo imgUrl(); ?>systems/eyetube_storage/<?= $newtube['thumb']; ?>" alt="">
                                            </a>
                                            <div class="drn">
                                                <span></span>
                                            </div>
                                            <div class="container rv">
                                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $newtube['url'];?>">
                                                    <span style="margin-top:7px;"><?= $newtube['title']; ?></span>
                                                </a>
                                                <div class="rr">
                                                    <span>
                                                        <?php
                                                            $date       =  new DateTime($newtube['createon']);
                                                            $tanggal    = date_format($date,"Y-m-d H:i:s");
                                                            echo relative_time($tanggal) . ' ago - '.$newtube['tube_view'].' views';                        
                                                        ?>                                          
                                                    </span>
                                                </div>
                                            </div>
                                        </div>                              
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <!-- ===== End Jadwal Pertandingan ===== -->
        </div>
        <input type="hidden" id="hdn-date" value="">
    <script>

        var tgl = "";

        $('#z').datepicker({
            inline: true,
            altField: '#d',
            onSelect: function() { 
                    tgl = $(this).datepicker('getDate');
                    
                    $('#hdn-date').val(tgl);
                    console.log(tgl);
                }
        });

        $('#btn-date').click(function(event) {

            var tanggal = tgl.getDate();

            var monthNames = ["January", "February", "March", "April", "May", "June",
              "July", "August", "September", "October", "November", "December"
            ];
            var bulan       = tgl.getMonth() + 1;
            var nm_bulan    = monthNames[tgl.getMonth()];

            var tahun = tgl.getFullYear();

            var txt_tanggal     = tahun+"-"+bulan+"-"+tanggal;

            $('#ajax-tgl').html(tanggal + " " + nm_bulan + " " + tahun);

            $('#btn-tutup').click(function(event) {
                $('#tbl-date').attr('style', 'display:none');
            });

            var urlnya          = "<?= base_url(); ?>Eyevent/get_jadwal/"+txt_tanggal;

            $.ajax({
                url: urlnya,
                type: 'POST',
                dataType: 'json',
                data: {txt_tanggal: txt_tanggal},
            })
            .done(function(result) {
                $('#tbl-date').attr('style', 'display:block').attr('style', 'background-color: #f2f2f2');


                $('#body-ajax').html(result.txt);
                
            });
            
        });

        $('#d').change(function () {
            $('#z').datepicker('setDate', $(this).val());
        });
    </script>
</body>

</html>