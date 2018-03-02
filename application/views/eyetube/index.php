</div>
<style>
    .w30 a {
    	color: darkslategray ;
    }
    .a{
        text-decoration:none;
    }
    .carousel-inner{
        overflow: hidden;
    }
    .half{
        width: 50%;
    }
    .gambar3{
        width: 98.2%;
        height: 300px;
        overflow: hidden;
    }
    .gambar3 img{
        width: 100%;
        min-height: 100%;
    }
    .btn-play{
        width: 65px;
    }
    .wkt{
        position: relative;
        bottom: 288px;
        right: 10px;
        color: white;
        font-size: .6em;
        font-weight: 500;
        background-color: #00000050;
        width: max-content;
        padding: 5px 10px;
        border-radius: 5px;
        float: right;
    }
    .wkt-small{
        position: relative;
        bottom: 155px;
        right: 5px;
        color: white;
        font-size: .5em;
        font-weight: 500;
        background-color: #00000050;
        width: max-content;
        padding: 5px 10px;
        border-radius: 5px;
        float: right;
    }
    .w4, .w-4 {
        width: 251.25px;
        float: left;
        margin-right: 20px;
    }
    .w4:nth-of-type(4n+4), .w-4:nth-of-type(4), .w-4:nth-of-type(9){
        margin-right: 0px;
    }
    i, button{
        cursor: pointer;
    }
</style>
    <div class="crumb bluehover">
            <ul>
                <li><a href="<?= base_url(); ?>" style="display: unset;">Home</a></li>
                <li>EyeTube</li>
                <!-- <li>Pemain</li> -->
            </ul>
        </div>
		<div class="desktop bluehover">
        <div class="center-desktop m-0">
            <div class="menu-3 m-0 tx-c bbg">
                <ul>
                    <?php 
                        foreach ($tube_type as $value)
                        {
                            $url1   = str_replace(' ', '-', $value->category_name);
                    ?>
                            <li>
                                <a href="<?= base_url(); ?>eyetube/kategori/<?= $url1; ?>"><?= $value->category_name; ?></a>
                            </li>
                    <?php  
                        }
                    ?>
                </ul>
            </div>
        </div>
        <div class="center-desktop m-0">
            <div class="container">
                <div class="m-0">
                    <div class="half">
                        <?php
                        foreach($video_eyetube as $videonya){
                        ?>                  
                        <div class="gambar3">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>">
                                <div style="width:100%; height:100%; overflow:hidden;">
                                    <img src="<?= MEVID.$videonya['thumb']; ?>/medium" >
                                    <div class="btn-play"> 
                                        <img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" kasperskylab_antibanner="on"> 
                                    </div>
                                </div>
                                
                            </a>
                        </div>
                        <?php break; }?>
                    </div>
                    <div class="half">
                    <?php
                                $i = 0;
                                foreach ($video_eyetube as $videonya)
                                {
                                    if ($i != 0)
                                    {
                    ?>                  
                        <div class="gambar3" style="padding-left:1.8%;">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url']; ?>">                     
                            <div style="width:100%; height:100%; overflow:hidden;">
                                <img src="<?= MEVID.$videonya['thumb']; ?>/medium" >
                                <div class="btn-play"> 
                                    <img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" kasperskylab_antibanner="on"> 
                                </div>
                            </div>
                            
                            </a>
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
            <div class="center-desktop m-0 m-t-100">
                <div class="subjudul">
                    <h4>VIDEO POPULAR</h4>
                </div>
            </div>
            <div class="container">
            <div class="center-desktop m-0 m-t-45">
                <?php
                    $this->load->helper('my');          
                    foreach ($eyetube_populer as $populer)
                    {
                ?>          
                        <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $populer['url']; ?>" >
                            <div style="width:100%; height:160px; overflow:hidden;">
                                <img src="<?= MEVID.$populer['thumb']; ?>/medium" style="min-width:100%; height:100%;">                                
                            </div>
                            
                                <p class="sub-en">
                                
                                <?= $populer['title']; ?></p>
                                <span class="time-view">
                                    <?php
                                        $date       =  new DateTime($populer['createon']);
                                        $tanggal    = date_format($date,"Y-m-d H:i:s");

                                        echo relative_time($tanggal) . ' lalu - '.$populer['tube_view'].' views';
                                    ?>                      
                                </span>
                            </a>
                        </div>
                <?php
                    }
                ?>
            </div>
            </div>

        </div>
        <div class="container" id="all-populer" style="display: none;">
            <div class="center-desktop m-0 m-t-45">
                <?php
                    $this->load->helper('my');          
                    foreach ($all_eyetube_populer as $all_populer)
                    {
                ?>          
                        <div class="w4">
                        <a href="<?php echo base_url(); ?>eyetube/detail/<?= $all_populer['url']; ?>" >    
                            <div style="width:100%; height:160px; overflow:hidden;">
                                <img src="<?= MEVID.$all_populer['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                            </div>
                        
                                <p class="sub-en"><?= $all_populer['title']; ?></p>
                                <span class="time-view">
                                    <?php
                                        $date       =  new DateTime($all_populer['createon']);
                                        $tanggal    = date_format($date,"Y-m-d H:i:s");

                                        echo relative_time($tanggal) . ' lalu - '.$all_populer['tube_view'].' views';
                                    ?>                      
                                </span>
                                </a>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="w1020 m-0 tx-c mt-20" id="btn-show">
                <button class="btn-white" type="button" style="margin-left: unset; margin-bottom: 20px; cursor: pointer;" onclick="ShowAllVideo()">Tampilkan Video Lainnya</button>
            </div>
            <div class="w1020 m-0 tx-c mt-20" id="btn-all-populer" style="display: none;">
                <button class="btn-white" type="button" style="margin-left: unset; margin-bottom: 20px; cursor: pointer;" onclick="ShowAllVideo()">Tutup Video Lainnya</button>
            </div>
        </div>

        <div class="center-desktop container banner-150">
			<img src="assets/img/banner-home.jpeg" alt="Banner Ads">
		</div>

        <div class="m-0 center-desktop">
            <div class="garis-x"></div>
        </div>

        <div class="container">
            <div class="center-desktop m-0">
                <div class="subjudul">
                    <h4>REKOMENDASI</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="center-desktop m-0 m-t-14 p-r">
                <i id="rekomleft" class="material-icons left1 panah panahkiri" href="#rekom" role="button">keyboard_arrow_left</i>
                <i id="rekomright" class="material-icons right1 panah panahkanan" href="#rekom" role="button">keyboard_arrow_right</i>

                <div id="rekom" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                            <?php 
                            foreach($eyetube_rekomendasi as $rekomendasi){
                            ?>                      
                            <div class="w4">
                                <a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi['url']; ?>" >
                                    <div style="width:100%; height:160px; overflow:hidden;">
                                        <img src="<?= MEVID.$rekomendasi['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                    </div>
                                    
                                    <p class="sub-en"><?=$rekomendasi['title']?></p>
                                    <span class="time-view">
                                    <?php
                                            $date       =  new DateTime($rekomendasi['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$rekomendasi['tube_view'].' views';
                                    ?>
                                    </span>
                                
                                </a>
                            </div>  
                            <?php
                            }
                            ?>                          
                        </div>
                        <div class="box item">
                            <?php 
                            foreach($eyetube_rekomendasi_2 as $rekomendasi_2){
                            ?>                      
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $rekomendasi_2['url']; ?>" >
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= MEVID.$rekomendasi_2['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                </div>
                                
                                    <p class="sub-en">
                                    
                                    <?=$rekomendasi_2['title']?></p>
                                    <span class="time-view">
                                    <?php
                                            $date       =  new DateTime($rekomendasi_2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$rekomendasi_2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 center-desktop">
            <div class="garis-x"></div>

        <div class="container">
            <div class="center-desktop m-0">
                <div class="subjudul">
                    <h4>SOCCER SAINS</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="center-desktop m-0 m-t-14 p-r">
                <i class="material-icons left2 panah panahkiri" href="#soccersains" role="button">keyboard_arrow_left</i>
                <i class="material-icons right2 panah panahkanan" href="#soccersains" role="button">keyboard_arrow_right</i>
                <div id="soccersains" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                            <?php
                                foreach($eyetube_science as $science){
                            ?>
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $science['url']; ?>" >
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= MEVID.$science['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                </div>
                                
                                    <p class="sub-en">
                                    
                                    <?=$science['title']?></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($science['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$science['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
                            </div> 
                        <?php }?>                           
                        </div>
                        <div class="box item">
                            <?php
                                foreach($eyetube_science_2 as $science2){
                            ?>                      
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $science2['url']; ?>" >
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= MEVID.$science2['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                </div>
                                
                                    <p class="sub-en">
                                    
                                    <?=$science2['title']?></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($science2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$science2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
                            </div>
                                <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-0 center-desktop">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="center-desktop m-0">
                <div class="subjudul">
                    <h4>VIDEO KAMU</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="center-desktop m-0 m-t-14 p-r">
                <i class="material-icons left3 panah panahkiri" href="#videokamu" role="button">keyboard_arrow_left</i>
                <i class="material-icons right3 panah panahkanan" href="#videokamu" role="button">keyboard_arrow_right</i>
                <div id="videokamu" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                        <?php
                        foreach($eyetube_kamu as $kamu){
                        ?>                      
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $kamu['url']; ?>" >
                            <div style="width:100%; height:160px; overflow:hidden;">
                                <img src="<?= MEVID.$kamu['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                            </div>    
                                    <p class="sub-en">
                                    
                                    <?=$kamu['title']?></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($kamu['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$kamu['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
                            </div>
                        <?php } ?>              
                        </div>
                        <div class="box item">
                            <div class="w4">
                            <a href="">
                            <div style="width:100%; height:160px; overflow:hidden;">
                                <img src="<?= MEVID.$kamu['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                            </div>
                                    <p class="sub-en"><?=$kamu['title']?></p>
                                    <span class="time-view">
                                    <?php
                                            $date       =  new DateTime($kamu['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$kamu['tube_view'].' views';
                                        ?>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="m-0 center-desktop">
            <div class="garis-x"></div>
        </div>
        <div class="container">
            <div class="center-desktop m-0">
                <div class="subjudul">
                    <h4>PROFIL SSB</h4>
                </div>
            </div>
        </div>
        <div class="container use-opacity">
            <div class="center-desktop m-0 m-t-14 p-r">
                <i class="material-icons left4 panah panahkiri" href="#profilssb" role="button">keyboard_arrow_left</i>
                <i class="material-icons right4 panah panahkanan" href="#profilssb" role="button">keyboard_arrow_right</i>
                <div id="profilssb" class="carousel slide">
                    <div role="listbox" class="carousel-inner">
                        <div class="box item active">
                        <?php
                        foreach($eyetube_ssb as $ssb){
                        ?>                      
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb['url']; ?>" >
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= MEVID.$ssb['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                </div>
                                    <p class="sub-en">
                                    
                                    <?=$ssb['title']?></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($ssb['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$ssb['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="box item">
                        <?php
                        foreach($eyetube_ssb_2 as $ssb_2){
                        ?>                      
                            <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $ssb_2['url']; ?>" >
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= MEVID.$ssb_2['thumb']; ?>/medium" style="min-width:100%;height:100%;">
                                </div>
                                    <p class="sub-en">
                                    
                                    <?=$ssb_2['title']?></p>
                                    <span class="time-view">
                                        <?php
                                            $date       =  new DateTime($ssb_2['createon']);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu - '.$ssb_2['tube_view'].' views';
                                        ?>                                  
                                    </span>
                                </a>
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