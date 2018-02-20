<?php $this->load->view('eyeme/header');?>
<div class="desktop">
        <div class="center-desktop m-0">
            <div class="container mt-20">
            <div class="w900 m-0 mb-20">
                <div class="mt-30 fl-l me-profil-foto">
                    <img src="<?php echo ($display_pic == '' ? DPIC : IMGSTORE.$display_pic)?>" alt="foto profil">
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
                                        <td>Foto</td>
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
           
            <?php if(count($getImg) > 0 ){
                echo ' <div class="w900 m-0 mb-20">';
                    for($j= 0; $j<count($getImg); $j++){?>

                        <div class="me-post" ref="<?php echo $getImg[$j]->id_img?>">

                            <img src="<?php echo MEIMG.$getImg[$j]->img_name?>" class="me-gambar-post" alt="<?php echo $getImg[$j]->img_alt?>">

                            <div class="tengah tx-c">
                                <i class="material-icons">favorite</i>
                                <span><?php echo $getImg[$j]->countLike?></span>
                                <i class="material-icons">chat_bubble</i>
                                <span><?php echo $getImg[$j]->countComment?></span>
                            </div>

                        </div>

                    <?php
                    }
                    echo '<!--<div class="container">
                            <div class="w900 m-0 mt-53 tx-c">
                                <button class="btn-white" type="button">Lihat Lainnya</button>
                            </div>
                        </div>-->';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
                }

                else{
                echo '</div>';
            echo '</div>';
                echo '<div class="bl-img mb-20">';
                    echo ($self == true ? 'Kamu ' : 'Pengguna Ini ').'Belum Memiliki Photo </br>';
                    echo '<i class="material-icons '.($self == true ? 'upl' : '').'" style="font-size:3em" >camera_enhance</i></a>';
                echo '</div>';
               
                }
            ?>
           
        
    </div>
</div>

<?php 
$this->load->view('eyeme/notif');
$this->load->view('eyeme/img_upload');
$this->load->view('eyeme/post_detail');
$this->load->view('eyeme/list_fol');
$this->load->view('eyeme/footer');
?>
</body>