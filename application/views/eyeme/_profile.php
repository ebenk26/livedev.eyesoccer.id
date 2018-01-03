
<div class="desktop">
        <div class="center-desktop m-0">
            <div class="w900 m-0 mt-53">
                <div class="mt-30 fl-l">
                    <img class="me-profil-foto" src="<?php echo MEIMG?>d.jpg" alt="foto profil">
                </div>
                <div class="container" style="margin-top:-149px; margin-left: 200px;">
                    <div class="fl-l me-profile" style="margin-bottom: 10px;">
                        <ul>
                            <li>
                                <span class="uname"><?php echo $username?></span>
                                <?php  // if id_member == session Id_member
                                echo ($self == TRUE ? '' : '<button class="btn-white-follow" type="button">FOLLOW</button>') ?>
                            </li>
                            <li class="desc-me-profile">
                                <span><?php echo $bio?></span>
                            </li>
                            <li>
                                <table style="width:unset;">
                                    <tr>
                                        <td>photo</td>
                                        <td>Pengikut</td>
                                        <td>diikuti</td>
                                    </tr>
                                    <tr style="font-size:18px !important;">
                                        <td>200</td>
                                        <td><?php echo anchor('eyeme/follower/'.$id_member,'200','style="text-decoration:none;color:rgb(83, 83, 83)"')?></td>
                                        <td><?php echo anchor('eyeme/following/'.$id_member,'200','style="text-decoration:none;color:rgb(83, 83, 83)"')?></td>
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


                        <div class="me-post">

                            <img src="<?php echo MEIMG.$getImg[$j]->img_name?>" class="me-gambar-post" alt="<?php echo $getImg[$j]->img_alt?>">

                            <div class="tengah tx-c">
                                <i class="material-icons">favorite</i>
                                <span>6</span>
                                <i class="material-icons">chat_bubble</i>
                                <span>10</span>
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