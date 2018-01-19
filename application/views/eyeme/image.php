<?php $this->load->view('eyeme/header',$this->data);?>
<div class="desktop">
    <div class="center-desktop m-0">
        <div class="container mt-20 mb-20">
        <div class="box-feed m-0">
            <div class="pd3">
                <img class="feed-profil-foto m-t-15 m-l-20" src="<?php echo ($img[0]->display_picture == NULL || $img[0]->display_picture == '' ? DPIC : MEIMG.$img[0]->display_picture )?>" alt="user photo" />
                <div class="nama-pro-feed p-r">
                    <a href="<?php echo MEPROFILE.$img[0]->username?>"><?php echo $img[0]->username?></a>
                </div>
                <div class="p-r titik3 fl-r">
                    <img src="<?php echo sIMGPATH?>ic-more.png" class="img_more" ref="v-<?php echo $img[0]->id_img?>">
                    <div class="posisi-kotak-popup p-a v-<?php echo $img[0]->id_img?>" style="display:none;">
                        <div class="kotak-popup">
                            <div class="panah-popup p-r m-0">
                            </div>
                            <span class="teks-popup p-r">Laporkan</span>
                            <span class="teks-popup p-r">Bagikan</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="post-photo m-t-10">
                <img src="<?php echo MEIMG.$img[0]->img_name?>" alt="post photo">
            </div>
            <div class="mt-10 m-l-20">
                <?php 
                /*ternary if button like clicked = has like 
                      first icon = style display none
                      second icon = ''
                      attrib status = "active"
                  else:
                      firts icon =''
                      second icon = 'second-icon'
                      attrib status = ''
                */
                echo '<i class="material-icons first-icon first-icon-'.$img[0]->id_img.'" 
                '.($img[0]->has_like == true ? 'style="display:none"':'').'>favorite_border</i>

                    <i class="material-icons '
                    .($img[0]->has_like == true ? '' : 'second-icon').' click-like r"  ref="'.$img[0]->id_img.'" 
                    '.($img[0]->has_like == true ? 'status="active"' : '').'>favorite</i>';

                ?>
                    
                    <div class="p-r like ref-<?php echo $img[0]->id_img?>">
                        <?php echo $img[0]->countLike?>
                    </div>
                <div class="w567 m-t-15">
                    <div class="garis-x21"></div>
                </div>
            </div>
            <div class="p-r comment m-l-20">
                <div>
                    <a href=""><?php echo $img[0]->username?></a>
                    <span><?php echo $img[0]->img_caption?></span>
                    
                </div>
                <div class="komen">
                    <ul class="plus-c<?php echo $img[0]->id_img?>">
                        <?php 
                        if(count($img[0]->countComment) > 0){

                             foreach($img[0]->comment as $k){
                                echo '<li>';
                                    echo '<a href="" >'.$k->username.'</a>';
                                    echo '<span>'.$k->comment.'</span>';
                                echo '</li>';
                             }
                        }?>
                        
                    </ul>
                </div>
                <span class="waktu-post"><?php echo $img[0]->timeString?></span>
            </div>
            <div class="m-t-15 kolom-komentar">
                <input type="text" placeholder="Tambah komentar..." name="comment" rel="<?php echo $img[0]->id_img?>" class="comment" autocomplete="off">
            </div>
        </div>
        </div>
    </div>
</div>
<?php 
$this->load->view('eyeme/notif');
$this->load->view('eyeme/img_upload');
$this->load->view('eyeme/footer');
?>