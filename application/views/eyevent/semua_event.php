    <style>
    body{
        margin-top: -10px; 
    }
    </style>
    <div class="fl-l">
        <h4 style="color: rgb(61, 139, 61); cursor: default !important;">Event Lainnya</h4>
    </div>

    <div class="container ">
        <?php 
            foreach ($eyevent->data as $value)
            {
        ?>
                <div class="w4">
                    <a href="<?= base_url(); ?>eyevent/detail/<?= $value->slug; ?>">
                        <div class="w4-f p-r">
                            <img src="<?= $value->url_pic; ?>" style="min-width:100%;height: 100%;position: absolute;top: 50%;left: 50%;margin-right: -50%;transform: translate(-50%, -50%);">
                        </div>
                        <p class="sub-en"><?= $value->title; ?></p>
                        <span class="time-view">
                            <?php
                                $date       =  new DateTime($value->createon);
                                $tanggal    = date_format($date,"Y-m-d H:i:s");

                                echo relative_time($tanggal) . ' lalu';
                            ?>                       
                        </span>
                    </a>
                </div>
        <?php        
            }
        ?>
    </div>
    <div class="container"><?php /*echo $pagging['pagging'];*/?></div>
</div>