
<div class="desktop">
        <div class="center-desktop m-0">
            <div class="w900 m-0 ">
                <div class="mt-30 fl-l">
                    <img class="me-profil-foto" src="<?php echo ($display_pic == '' ? DPIC : MEIMG.$display_pic)?>" alt="foto profil">
                </div>
                <div class="container" style="margin-top:-149px; margin-left: 200px;">
                    <div class="fl-l me-profile" style="margin-bottom: 10px;">
                        <ul>
                            <li>
                                <span class="uname"><?php echo $username?></span>
                                <?php  // if id_member == session Id_member

                                if(!$self){
                                    //checkFollowed is bool
                                    echo btnFol($id_member,$checkFollowed);
                                            
                                }
                                         
                                 ?>
                            </li>
                            <li class="desc-me-profile">
                                <span><?php echo $bio?></span>
                            </li>
                            <li>
                                <table style="width:unset;">
                                    <tr>
                                        <td>Photo</td>
                                        <td>Pengikut</td>
                                        <td>Diikuti</td>
                                    </tr>
                                    <tr style="font-size:18px !important;">
                                        <td><?php echo count($getImg)?></td>

                                        <td><?php echo anchor('eyeme/follower/'.$id_member,count($follower),'class="a-fol follower " ref="follower-'.$id_member.'"')?></td>
                                        
                                        <td><?php echo anchor('eyeme/following/'.$id_member,count($following),'class="a-fol following" ref="following-'.$id_member.'"')?></td>
                                    </tr>
                                </table>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w900 m-0">
                <?php if(count($getImg) > 0 ){

                        for($j= 0; $j<count($getImg); $j++){?>

                            <div class="me-post" ref="<?php echo $getImg[$j]->id_img?>">

                                <img src="<?php echo MEIMG.$getImg[$j]->img_thumb?>" class="me-gambar-post" alt="<?php echo $getImg[$j]->img_alt?>">

                                <div class="tengah tx-c">
                                    <i class="material-icons">favorite</i>
                                    <span><?php echo $getImg[$j]->countLike?></span>
                                    <i class="material-icons">chat_bubble</i>
                                    <span><?php echo $getImg[$j]->countComment?></span>
                                </div>
                            </div>

                        <?php

                        }
                    }
                ?>
            </div>
        </div>
        <div class="container">
            <div class="w900 m-0 mt-53 tx-c">
                <button class="btn-white" type="button">Lihat Lainnya</button>
            </div>
        </div>
    </div>
</body>
