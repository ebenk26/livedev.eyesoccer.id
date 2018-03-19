<style>
.nn img{
        height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
}
.rm span{
    font-weight: 600;
}
.n-rcm-up img {
    height: 100%;
    position: absolute;
    top: 50%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%);
}
</style>
<div class="m-0">
    <div class="container m-t-5">
        <div class="m-0">
            <div class="container news-rcm">
                <div class="subjudul2">
                    <h4><a href="<?php echo base_url();?>eyenews/rekomendasi">REKOMENDASI</a></h4>
                </div>
                <?php
                    foreach($eyenews_rekomendasi as $rekomendasi)
                    {
                        ?>	
                            <a href="<?php echo base_url(); ?>eyenews/detail/<?= $rekomendasi['url'];?>" class="container">
                                <div class="container garis-x4">
                                    <div class="container" style="width:240px; height:145.5px; overflow:hidden;">
                                        <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $rekomendasi['thumb1']; ?>" alt="<?=$rekomendasi['title'];?>" title="<?=$rekomendasi['title'];?>" style="width:100%;min-height:100%;">
                                    </div>
                                    <div class="container news-rcm-z">
                                        <div class="rr">
                                            <span><?=$rekomendasi['publish_on'];?></span>
                                        </div>
                                        <p>										
                                        <?=$rekomendasi['title'];?></p>
                                        <span>
                                            <?php
                                                $keterangan = strip_tags($rekomendasi['description']);
                                                echo word_limiter($keterangan,15);
                                            ?>									
                                        </span>
                                    </div>
                                </div>
                            </a>
                        <?php
                    }
                ?>
            </div>
            <div class="container news-rcm-r fl-r">
                <div class="subjudul2">
                    <h4><a href="<?php echo base_url();?>eyenews/populer">TERPOPULER</a></h4>
                </div>
                <?php
                    $ep = 0;
                    foreach ($eyenews_populer as $row)
                    {
                        if($ep > 0)
                        {
                            ?>	
                            <a href="<?php echo base_url(); ?>eyenews/detail/<?= $row['url'];?>" class="container">
                                <div class="container news-rcm-d">
                                        <div class="nn p-r">
                                            <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                                        </div>
                                    <div class="container rm">
                                        <span><?=$row['title'];?></span>
                                    <div class="rr">
                                            <span>
                                                <?php
                                                    $date =  new DateTime($row['publish_on']);
                                                    $tanggal = date_format($date,"Y-m-d H:i:s");
                                                    
                                                    echo relative_time($tanggal) . ' lalu - '.$row['news_view'].' views';
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                    </a>
                                
                            <?php
                        } else {
                            ?>
                                <div class="n-rcm-up">
                                <a href="<?php echo base_url(); ?>eyenews/detail/<?= $row['url'];?>" class="container" style="border: 1px solid gainsboro;">
                                <div style="width: 100%; height: 224.5px; position:  relative; overflow:  hidden;">
                                <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row['thumb1']; ?>" alt="">
                                </div>
                                <div class="n-rcm-up-teks">
                                        <div class="rr">
                                            <span><?=$row['publish_on'];?></span>
                                        </div>
                                            <span>
                                                <?=$row['title'];?>									
                                            </span>
                                    </div>
                                    </a>
                                </div>
                            <?php
                        }
                        
                        $ep++;
                    }
                ?>	
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="m-0">
        <div class="subjudul2">
            <h4><a href="<?php echo base_url();?>eyetube">EyeTube</a></h4>
        </div>
    </div>
    <div class="m-0">
        <div class="container m-t-5 bbg">
            <?php
                foreach ($video_eyetube as $videonya)
                {
                    ?>						
                        <div class="w4">
                            <a href="<?php echo base_url(); ?>eyetube/detail/<?= $videonya['url'];?>">
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?php echo MEVID.$videonya['thumb']; ?>/small" style="min-width:100%; height:100%;" alt="<?= $videonya['title']; ?>" title="<?= $videonya['title']; ?>">
                                    <div class="container btn-play2"><img src="http://beta.eyesoccer.id/assets/home/img/btn-play.png" alt="" style="z-index:1;width:100%;height:100%;" kasperskylab_antibanner="on"></div>
                                </div>
                                <p class="sub-en"><?= $videonya['title']; ?></p>
                                <span class="time-view">
                                    <?php
                                        $date = new DateTime($videonya['createon']);
                                        $tanggal = date_format($date,"Y-m-d H:i:s");
                                        echo relative_time($tanggal) . ' ago - '.$videonya['tube_view'].' views';						
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
<div class="container m-t-5">
    <div class="m-0 mt-10">
        <div class="container news-rcm">
            <div class="subjudul2">
                <h4><a href="<?php echo base_url();?>eyenews/kategori/Soccer Seri">SOCCER SERI</a></h4>
            </div>
            <?php
                // foreach($all_news as $row12){
                foreach($soccer_seri as $row12)
                {
                    ?>
                        <a href="<?php echo base_url(); ?>eyenews/detail/<?= $row12['url'];?>">
                            <div class="container garis-x4">
                                <div class="container" style="width:240px;">
                                    <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $row12['thumb1']; ?>" alt="<?=$row12['title']?>" title="<?=$row12['title']?>">
                                </div>
                                <div class="container news-rcm-z">
                                    <div class="rr">
                                        <span>
                                            <?php
                                                $date 		=  new DateTime($row12['publish_on']);
                                                $tanggal 	= date_format($date,"Y-m-d H:i:s");
    
                                                echo relative_time($tanggal) . ' lalu - '.$row12['news_view'].' views';
                                            ?>									
                                        </span>
                                    </div>
                                    <p><?=$row12['title']?></p>
                                    <span>
                                        <?php
                                        $keterangan = strip_tags($row12['description']);
                                        echo word_limiter($keterangan,15);
                                        ?>								
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php
                }
            ?>
        </div>
        <div class="container news-rcm-r2 fl-r">
            <div class="container banner-eyenews4 img-banner mt-30">
                <img class="lazy" src="<?php echo base_url(); ?>assets/img/iklanbanner/banner 360x320px-01.jpg" alt="">
            </div>
            <div class="container subjudul2">
                <h4>JADWAL LIVE</h4>
            </div>
            <div class="line-b"></div>
            <div>
                <table>
                    <?php
                        foreach($jadwal_today as $row)
                        {
                            ?>	
                                <!-- <tr>
                                        <td colspan="5"><p></p></td>
                                </tr>						 -->
                                <tr>
                                    <td colspan="5" style="padding-top:5px; color:rgb(200,0,0);">
                                        <span><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span><?=$row["club_a"]?></span>
                                    </td>
                                    <td>
                                        <img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_a']; ?>" alt="">
                                    </td>
                                    <td>
                                        <!-- <span><?=date("d M Y - H:i:s",strtotime($row["jadwal_pertandingan"]))?></span> -->
                                        <p><?=$row['live_pertandingan']?></p>
                                    </td>
                                    <td>
                                        <img src="<?=imgUrl()?>systems/club_logo/<?php print $row['logo_b']; ?>" alt="">
                                    </td>
                                    <td>
                                        <span><?=$row["club_b"]?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="garis-x4" style="padding-top:5px;"></td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
                <div class="line-b"></div>
                <div class="fl-r">
                    <a href="">
                        <p class="lp" style="margin:0px;"><a href="<?php echo base_url();?>eyevent">Lihat selengkapnya ></a></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>