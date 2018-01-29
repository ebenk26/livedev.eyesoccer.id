
            <div class="news-pic">
                <h2><?= $model->data->title; ?></h2>
                <img src="<?= $model->data->url_pic; ?>" alt="">
            </div>
            <div class="container mt-10">
                <div class="fl-l n-c">
                    <table>
                        <tr>
                            <td>
                                <a href="">
                                    <img src="<?= base_url(); ?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                </a>
                            </td>
                            <td>
                                <ul>
                                    <li>
                                        <a href="">
                                            <span class="unname" style="text-transform: capitalize;"><?= $model->data->fullname; ?></span>
                                        </a>
                                    </li>
                                    <li class="c-g">
                                        <span>
                                            <?php 
                                                $date       =  new DateTime($model->data->publish_on);
                                                $tanggal    = date_format($date,"Y-m-d");
                                                echo $tanggal;
                                            ?>
                                        </span>
                                        <span>.</span>
                                        <span>21:00 WIB</span>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="fl-r soc">
                    <table>
                        <tr>
                            <td>
                                <a href="">
                                    <img src="assets/img/icon/logo_fb.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <img src="assets/img/icon/logo_twitter.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="">
                                    <img src="assets/img/icon/logo_g_plus.png" alt="">
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="garis-x3 mt-45"></div>
            <div class="news-capt m-t-10">
                <span><?= $model->data->description; ?></span>
                <div class="tab" style="font-size: 13px;width: 100%;">
                    <ul class="nav nav-tabs" id="tab-nav" style="width: 100%;">
                        <li class="active">
                            <a href="#jadwal-pertandingan" data-toggle="tab">JADWAL & HASIL PERTANDINGAN</a>
                        </li>
                        <li>
                            <a href="#klasemen" data-toggle="tab">KLASEMEN</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" style="margin-top: 1em;">
                    <div id="jadwal-pertandingan" class="tab-pane fade in active">
                        <?php
                            foreach ($model->data->match_event as $value)
                            { 
                        ?>
                                <table class="tb-hasil">
                                    <tbody>
                                        <tr>
                                            <td>
                                                
                                                    <?=$value->team_a;?>
                                                    <img src="<?php echo $value->url_logo_a; ?>" alt="">
                                            </td>
                                            <td>
                                                <?= $value->score_a; ?> - <?= $value->score_b; ?>
                                                <span><?= $value->match_location; ?></span>
                                            </td>
                                            <td>
                                                
                                                    <img src="<?php echo $value->url_logo_b; ?>" alt="">
                                                    <?=$value->team_b;?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        <?php        
                            }
                        ?>
                    </div>
                    <div id="klasemen" class="tab-pane fade">
                        <h1>vvvvvv</h1>
                    </div>
                </div>
            </div>
        </div>

       