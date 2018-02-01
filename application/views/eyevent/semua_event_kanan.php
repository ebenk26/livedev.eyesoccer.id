<style>
body{
    margin-top: -10px;
}
.rx {
    width: 280px;
    top: -120px !important;
    left: 125px !important;
    font-weight: 600;
}
.rv {
    width: 245px !important;
    top: -15px;
    left: 15px;
}
.bcd{
    margin-right: 10px;
}
.down-r-vent .he>a{
    overflow: unset;
}
</style>

<div class="container eyv-r mt-10">
    <!-- <div class="down-r-vent">
        <div class="kalender mt-20">
                <div id="z"></div>
                <input type="text" id="d" />
                <button class="btn-white-g" type="button">Lihat</button>
        </div>
    </div> -->
    <div class="container down-r-vent">
        <div class="fl-l">
            <h4>BERITA TERBARU</h4>
        </div>
        <div class="fl-r bcd">
            <a href="<?= base_url(); ?>eyevent">
                <span>Berita Lainnya</span>
                <i class="material-icons">keyboard_arrow_right</i>
            </a>
        </div>
        <div class="pd">
            <div>
                <?php 
                    foreach ($eyenews->data as $value)
                    {
                ?>
                        <div class="container he">
                            <a href="<?= base_url();?>eyenews/detail/<?= $value->slug; ?>">
                                <div style="width:113px; height:113px; overflow:hidden; display:inline-block; float:left;">
                                    <img src="<?= $value->url_pic; ?>" alt="" style="width:unset; height:100%;">
                                </div>
                                <div class="container rx">
                                    <span><?= $value->title; ?></span>
                                    <div class="rr">
                                        <span>
                                            <?php
                                                $date       =  new DateTime($value->createon);
                                                $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                echo relative_time($tanggal) . ' lalu';
                                            ?>
                                        </span>
                                        <span>-</span>
                                        <span><?= $value->news_view; ?> view</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="d-r-v">
        <div class="fl-l">
            <h4>VIDEO</h4>
        </div>
        <div class="fl-r bcd">0
            <a href="<?= base_url(); ?>eyetube">
                <span>Video Lainnya</span>
                <i class="material-icons">keyboard_arrow_right</i>
            </a>
        </div>
        <div class="pd">
            <div>
                <?php
                    foreach ($eyetube->data as $value)
                    {
                ?>
                        <div class="container h105">
                            <a href="<?= base_url();?>eyetube/detail/<?= $value->slug; ?>">
                                <div style="width:145px; height:90px; overflow:hidden; display:inline-block; float:left;">
                                    <img src="<?= $value->url_thumb; ?>" alt="" style="width:unset; height:100%;">
                                </div>
                                <div class="drn" style="background-color: transparent; color: transparent;">
                                    <span style="visibility: hidden;"></span>
                                </div>
                                <div class="container rv" style="margin-top: 10px;">
                                    <span><?= $value->title; ?></span>
                        
                                    <div class="rr">
                                        <span>
                                            <?php
                                                $date       =  new DateTime($value->createon);
                                                $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                echo relative_time($tanggal) . ' lalu';
                                            ?>
                                        </span>
                                        <span>-</span>
                                        <span><?= $value->tube_view; ?> view</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div>
</div>