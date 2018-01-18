<style>
    .w30 a {
    	color: darkslategray ;
	}

</style>
    <div class="crumb">
            <ul>
                <li><a href="<?= base_url(); ?>" style="display: unset;">Home</a></li>
                <li>EyeTube</li>
                <!-- <li>Pemain</li> -->
            </ul>
        </div>
        <div class="center-desktop m-0">
            <div class="menu-3 w1020 m-0">
                <ul>
                    <?php 
                        foreach ($tube_type as $value)
                        {
                    ?>
                            <li>
                                <a href="<?= base_url(); ?>eyetube/kategori/<?= $value->category_name; ?>"><?= $value->category_name; ?></a>
                            </li>
                    <?php  
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x m-t-35"></div>
        </div>
        <div class="center-desktop m-0">
            <div class="container">
                <div class="w1020 m-0 m-t-14">
                    <div class="half">
                        <?php
                        foreach($video_eyetube as $videonya){
                        ?>                  
                        <div class="gambar">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>">
                            <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="width:554px;"></a>
                        </div>
                        <?php break; }?>
                    </div>
                    <div class="half p-d-l-20">
                    <?php
                                $i = 0;
                                foreach ($video_eyetube as $videonya)
                                {
                                    if ($i != 0)
                                    {
                    ?>                  
                        <div class="gambar">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>">                     
                            <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $videonya['thumb']; ?>" style="margin-left:42px; width:554px;"></a>
                        </div>
                    <?php
                    }
                    $i++;

                    }
                    ?>                      
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 m-t-100">
                <div class="subjudul">
                    <h4>VIDEO POPULAR</h4>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 m-t-45">
                <?php
                    $this->load->helper('my');          
                    foreach ($eyetube_populer as $populer)
                    {
                ?>          
                        <div class="w30">
                            <div>
                                <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $populer['thumb']; ?>" style="width:100%;margin-right:20px;">
                                <p class="sub-en">
                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $populer['url']; ?>" style="text-decoration:none;">
                                <?= $populer['title']; ?></a></p>
                                <span class="time-view">
                                    <?php
                                        $date       =  new DateTime($populer['createon']);
                                        $tanggal    = date_format($date,"Y-m-d H:i:s");

                                        echo relative_time($tanggal) . ' lalu - '.$populer['tube_view'].' views';
                                    ?>                      
                                </span>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 tx-c" id="btn-show">
                <button class="btn-white" type="button" style="margin-left: unset; cursor: pointer;" onclick="ShowAllVideo()">Tampilkan Video Lainnya</button>
            </div>
            <div class="w1020 m-0 tx-c" id="btn-all-populer" style="display: none;">
                <button class="btn-white" type="button" style="margin-left: unset; cursor: pointer;" onclick="ShowAllVideo()">Tutup Video Lainnya</button>
            </div>
        </div>
        <div class="container" id="all-populer" style="display: none;">
            <div class="w1020 m-0 m-t-45">
                <?php
                    $this->load->helper('my');          
                    foreach ($all_eyetube_populer as $all_populer)
                    {
                ?>          
                        <div class="w30">
                            <div>
                                <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $all_populer['thumb']; ?>" style="width:100%;margin-right:20px;">
                                <p class="sub-en">
                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $all_populer['url']; ?>" style="text-decoration:none;">
                                <?= $all_populer['title']; ?></a></p>
                                <span class="time-view">
                                    <?php
                                        $date       =  new DateTime($all_populer['createon']);
                                        $tanggal    = date_format($date,"Y-m-d H:i:s");

                                        echo relative_time($tanggal) . ' lalu - '.$all_populer['tube_view'].' views';
                                    ?>                      
                                </span>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>

        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>REKOMENDASI</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#rekom" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#rekom" role="button">keyboard_arrow_right</i>

                <div id="rekom" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                            <?php 
                            foreach($eyetube_rekomendasi as $rekomendasi){
                            ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $rekomendasi['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi['url']; ?>" style="text-decoration:none;">
                                    <?=$rekomendasi['title']?></a></p>
                                    <span class="time-view">
                                    <?php
                                            $date       =  new DateTime($rekomendasi['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$rekomendasi['tube_view'].' views';
                                    ?>
                                    </span>
                                </div>
                            </div>  
                            <?php
                            }
                            ?>                          
                        </div>
                        <div class="box item">
                            <?php 
                            foreach($eyetube_rekomendasi_2 as $rekomendasi_2){
                            ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $rekomendasi_2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi_2['url']; ?>" style="text-decoration:none;">
                                    <?=$rekomendasi_2['title']?></a></p>
                                    <span class="time-view">
                                    <?php
                                            $date       =  new DateTime($rekomendasi_2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$rekomendasi_2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 w1020">
            <div class="garis-x"></div>

        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>SOCCER SAINS</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#soccersains" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#soccersains" role="button">keyboard_arrow_right</i>
                <div id="soccersains" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                            <?php
                                foreach($eyetube_science as $science){
                            ?>
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $science['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $science['url']; ?>" style="text-decoration:none;">
                                    <?=$science['title']?></a></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($science['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$science['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div> 
                        <?php }?>                           
                        </div>
                        <div class="box item">
                            <?php
                                foreach($eyetube_science_2 as $science2){
                            ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $science2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $science2['url']; ?>" style="text-decoration:none;">
                                    <?=$science2['title']?></a></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($science2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$science2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>VIDEO KAMU</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#videokamu" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#videokamu" role="button">keyboard_arrow_right</i>
                <div id="videokamu" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                        <?php
                        foreach($eyetube_kamu as $kamu){
                        ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $kamu['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $kamu['url']; ?>" style="text-decoration:none;">
                                    <?=$kamu['title']?></a></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($kamu['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$kamu['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div>
                        <?php } ?>              
                        </div>
                        <div class="box item">
                            <div class="w30">
                                <div>
                                    <img src="assets/img/a.jpg" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">Lorem ipsum dolor sit amet, consectur adipiscing elit.</p>
                                    <span class="time-view">
                                    
                                    </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-0 w1020">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="w1020 m-0">
                <div class="subjudul">
                    <h4>PROFIL SSB</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="w1020 m-0 m-t-14 p-r">
                <i class="material-icons left panah panahkiri" href="#profilssb" role="button">keyboard_arrow_left</i>
                <i class="material-icons right panah panahkanan" href="#profilssb" role="button">keyboard_arrow_right</i>
                <div id="profilssb" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                        <?php
                        foreach($eyetube_ssb as $ssb){
                        ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $ssb['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb['url']; ?>" style="text-decoration:none;">
                                    <?=$ssb['title']?></a></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($ssb['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$ssb['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="box item">
                        <?php
                        foreach($eyetube_ssb_2 as $ssb_2){
                        ?>                      
                            <div class="w30">
                                <div>
                                    <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $ssb_2['thumb']; ?>" style="width:100%;margin-right:20px;">
                                    <p class="sub-en">
                                    <a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb_2['url']; ?>" style="text-decoration:none;">
                                    <?=$ssb_2['title']?></a></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($ssb_2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$ssb_2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function ShowAllVideo()
        {
            $('#all-populer').attr('style', 'display:block');
            $('#btn-show').attr('style', 'display:none');

            $('#btn-all-populer').attr('style', 'display:block').click(function(event) {
                $('#all-populer').attr('style', 'display:none');
                $(this).attr('style', 'display:none');
                $('#btn-show').attr('style', 'display:block');
            });;
        }
    </script>