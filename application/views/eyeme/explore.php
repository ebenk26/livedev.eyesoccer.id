

<div class="desktop">
    <div class="center-desktop m-0">
        <div class="w900 m-0">
            <div class="container" style="margin-top: 90px;">
                <div class="me-sub">
                    <span>TEMUKAN ORANG DI SEKITARMU</span>
                </div>
                <div class="fl-r lihatlainnya">
                    <a href="">Lihat Lainnya ></a>
                </div>
            </div>
        </div>
        <div class="w900 m-0">
            <div class="container">
                <?php 

                for($i= 0; $i < 3; $i++){

                ?>
                <div class="me-explr-find">
                    <div class="me-explr-find-isi m-0">
                        <ul>
                            <li>
                                <img src="<?php echo DPIC?>" class="gambar-explr-people" alt="foto profil explore org baru">
                            </li>
                            <li>
                                <a href="">Lorem_Ipsum</a>
                            </li>
                            <li>
                                <button class="btn-blue" type="button">Ikuti</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php }?>

            </div>
        </div>
        <div class="w900 m-0">
            <div class="container mt-30">
                <div class="me-sub">
                    <span>JELAJAHI</span>
                </div>
            </div>
        </div>
        <div class="w900 m-0">
            <?php 
            //parsing data explore
            foreach($ex as $k => $v){?>
                <div class="me-post">
                    <img src="<?php echo MEIMG.$v->img_thumb?>" class="me-gambar-post" alt="">
                    <div class="tengah tx-c">
                        <i class="material-icons">favorite</i>
                        <span><?php echo $v->countLike?></span>
                        <i class="material-icons">chat_bubble</i>
                        <span><?php echo $v->countComment?></span>
                    </div>
                </div>

          <?php   }?>                
         </div>
    </div>
</div>

