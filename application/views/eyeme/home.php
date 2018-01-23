<?php $this->load->view('eyeme/header');?>
<div class="desktop">
    <div class="center-desktop m-0">
        <div class="container mt-20">
            
    	<?php 
    	if(count($imgFollowing) > 0){

    		foreach($imgFollowing as $k=> $v){?>

    		<div class="box-feed m-0">
            <div>
                <img class="feed-profil-foto m-t-15 m-l-20" 
                src="<?php echo ($v['dp'] == NULL || $v['dp'] == '' ? DPIC : IMGSTORE.$v['dp'])?>" alt="user photo" />
                <div class="nama-pro-feed p-r">

                    <a href="<?php echo MEPROFILE.$v['username']?>">
                    	<?php echo $v['username']?>
                    </a>

                </div>

                <div class="p-r titik3 fl-r">
                    <?php if($v['id_member'] == $id_member){
                        echo '<i class="material-icons ikon" onclick="discard_img('.$v['id_img'].')">delete</i>';
                    }?>
                    
                    
                </div>
            </div>

            <div class="post-photo m-t-10">
                <img src="<?php echo MEIMG.$v['img_name']?>" alt="<?php echo $v['img_alt']?>">
            </div>
            <div class="mt-10 m-l-20" ref= "ref-<?php echo $v['id_img']?>">
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
                echo '<i class="material-icons first-icon first-icon-'.$v['id_img'].'" 
                '.($v['has_like'] == true ? 'style="display:none"':'').'>favorite_border</i>

                    <i class="material-icons '
                    .($v['has_like'] == true ? '' : 'second-icon').' click-like r"  ref="'.$v['id_img'].'" 
                    '.($v['has_like'] == true ? 'status="active"' : '').'>favorite</i>';

                ?>
                    
                    <div class="p-r like ref-<?php echo $v['id_img']?>">
                        <?php echo count($v['like'])?>
                    </div>

                
                <div class="w567 m-t-15">
                    <div class="garis-x2"></div>
                </div>
            </div>
            <div class="p-r comment m-l-20">
               
                    <a href="<?php echo MEURL.$v['username']?>"><?php echo $v['username']?></a>
                    <span><?php echo $v['img_caption']?> </span>
                    <!--<a href="test" class="c-g">selengkapnya</a>-->
                
                <div class="komen">
                    <ul class="plus-c<?php echo $v['id_img']?>">
                        <li>
                            <!--<a href="" class="c-g">Lihat komentar lainnya</a>-->
                        </li>
                        <?php 

                        	if(count($v['comment']) >  0 ){

                        		foreach($v['comment'] as $i => $j){
                        		echo '<li>';
                        			echo "<a href=\"".MEPROFILE."{$j->username}\">{$j->username}</a>";
                        			echo "<span>{$j->comment}</span>";
                        		echo '</li>';
                        		}
                        	} 

                        ?>
                       
                    </ul>
                </div>
                <span class="waktu-post"><?php echo $v['timeString']?></span>
            </div>
            <div class="m-t-15 kolom-komentar">
            	
                <input type="text" placeholder="Tambah komentar..." name="comment" rel="<?php echo $v['id_img']?>" class="comment" autocomplete="off">
                
            </div>

        </div>
        <?php }
    }else{

?>
        <div class="w900 m-0">
            <div class="container" style="margin-top: 90px;">
                <div class="me-sub">
                    <span>TEMUKAN ORANG DI SEKITARMU</span>
                </div>
                <!--<div class="fl-r lihatlainnya">
                    <a href="">Lihat Lainnya ></a>
                </div>-->
            </div>
        </div>
        <div class="w900 m-0">
            <div class="container">
              <?php 
              for($i=0;$i < count($usr);$i++){?>

                <div class="me-explr-find mb-20">
                    <div class="me-explr-find-isi m-0">
                        <ul class="list-usr">
                            <li>
                                <img src="<?php echo ($usr[$i]->profile_pic == '' || $usr[$i]->profile_pic == NULL ? DPIC : IMGSTORE.$usr[$i]->profile_pic)?>" class="gambar-explr-people" alt="foto profil explore org baru">
                            </li>
                            <li>
                                <a href=""><?php echo $usr[$i]->username?></a>
                            </li>
                            <li>
                                <?php echo $usr[$i]->btnFol;?>
                            </li>
                        </ul>
                    </div>
                </div>


             <?php } ?>
                


            </div>
        </div>



   <?php }


    ?>
            
        </div>   
        <!--<div class="container m-0">
            <div class="tx-c mt-53">
                <button class="btn-white" type="button">Lihat lainnya</button>
            </div>
        </div>-->
    </div>
</div>
<?php 
$this->load->view('eyeme/notif');
$this->load->view('eyeme/img_upload');
$this->load->view('eyeme/footer');
?>
    

