    <div class="fl-l">
        <h4>Event Lainnya</h4>
    </div>

    <div class="container ">
        <?php 
            foreach ($eyevent->data as $value)
            {
        ?>
                <div class="w4">
                    <a href="<?= base_url(); ?>eyevent/detail/<?= $value->id_event; ?>">
                        <div class="w4-f">
                            <img src="<?= $value->url_pic; ?>" style="min-width:100%; height:100%;">
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