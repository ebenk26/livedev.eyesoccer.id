<style>
    .ev-img{
        width: 113px;
    height: 113px;
    overflow: hidden;
    display: inline-block;
    float: left;
    }
</style>
<div class="container tube-r">
    <div class="up-r-vent">
        <a href="<?= base_url(); ?>eyevent/semua_event"><h4>EVENT LAINNYA</h4></a>
        <div class="pd">
            <div>
                <?php
                    foreach ($eyevent->data as $value)
                    {
                ?>
                        <div class="container iven">
                            <a href="<?= base_url().'eyevent/detail/'.$value->slug; ?>">
                                <div class="iven-im">
                                    <img src="<?= $value->url_pic; ?>" alt="">
                                </div>
                            </a>
                            <div class="container rn tx-c" id="iven">
                                <a href="<?= base_url().'eyevent/detail/'.$value->slug; ?>">
                                    <span><?= $value->title; ?></span>
                                </a>
                                <div class="rr">
                                    <span>
                                        <?php
                                            $date       =  new DateTime($value->createon);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu';
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- <div class="down-r-vent">
        <div class="fl-l">
            <h4>Terbaru</h4>
        </div>
        <div class="fl-r bcd">
            <a href="<?= base_url(); ?>eyenews">
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
                        <div class="container hh">
                            <a href="<?= base_url(); ?>eyenews/detail/<?= $value->slug; ?>">
                                <img src="<?= $value->url_pic; ?>" alt="" style="width: 113px;height: 113px;">
                            </a>
                            <div class="container rn">
                                <a href="<?= base_url(); ?>eyenews/detail/<?= $value->slug; ?>">
                                    <span><?= $value->title; ?></span>
                                </a>
                                <div class="rr">
                                    <span>
                                        <?php
                                            $date       =  new DateTime($value->publish_on);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu';
                                        ?>
                                    </span>
                                    <span>-</span>
                                    <span><?= $value->news_view; ?> views</span>
                                </div>
                            </div>
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
        <div class="fl-r bcd">
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
                            <a href="<?= $value->share_url; ?>">
                                <img src="<?= $value->url_thumb; ?>" alt="">
                            </a>
                            <div class="drn">
                                <span style="visibility: hidden;">2:30</span>
                            </div>
                            <div class="container rd">
                                <a href="">
                                    <span><?= $value->title; ?></span>
                                </a>
                                <div class="rr">
                                    <span>
                                        <?php
                                            $date       =  new DateTime($value->createon);
                                            $tanggal    = date_format($date,"Y-m-d H:i:s");

                                            echo relative_time($tanggal) . ' lalu';
                                        ?>  
                                    </span>
                                    <span>-</span>
                                    <span><?= $value->tube_view; ?> views</span>
                                </div>
                            </div>
                        </div>
                <?php        
                    }
                ?>
            </div>
        </div>
    </div> -->
</div>