<style>
    .news-capt span {
        width: 98%;
    }
    .news-pic h2 {
    font-weight: 600;
    margin: 15px 0px;
}
.rn span {
    font-weight: 600;
    width: 90%;
}
</style>
			<div class="crumb greenhover">
				<ul>
					<li><a href="<?= base_url(); ?>" style="color:unset;">Home</a></li>
					<li><a href="<?= base_url(); ?>eyevent" style="display: unset;">EyeVent</a></li>
				</ul>
			</div>
            <div class="news-pic">
                <h2><?= $model->data->title; ?></h2>
                <div style="width:100%; height:auto;">
                    <img src="<?= $model->data->url_pic; ?>" alt="" style="width:100%; height:auto;">
                </div>
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
                                    <li class="c-g" style="display:block;">
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
            </div>

            <table class="tb-hasil">
                <?php
                    if (empty($model->data->match_event))
                    {
                ?>
                        <tbody>
                            <tr>
                                <td colspan="3" style="text-align: center;">
                                    Tidak Ada Jadwal Pada Tanggal Ini
                                </td>
                            </tr>                            
                        </tbody>  
                <?php        
                    }
                    else
                    {
                        foreach($model->data->match_event as $jdwl)
                        {
                ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="<?= $jdwl->url_team_a; ?>">
                                            <?=$jdwl->team_a; ?>
                                            <img src="<?= $jdwl->url_logo_a; ?>" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <span>
                                            <?php
                                                $tgl = new DateTime($jdwl->match_schedule);
                                                echo $tgl->format('d F Y H:i:s');
                                            ?>
                                        </span>
                                        <?= $jdwl->score_a; ?> - <?= $jdwl->score_b; ?>
                                        <span><?= $jdwl->match_location; ?></span>
                                    </td>
                                    <td>
                                        <a href="<?= $jdwl->url_team_b; ?>">
                                            <img src="<?= $jdwl->url_logo_b; ?>" alt="">
                                            <?=$jdwl->team_b ;?>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                <?php            
                        }
                    }
                ?>
            </table>

            <br>
            <br>

            <div class="container">
                <div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyetube_storage/"></div>
            </div>
        </div>
        <script type='text/javascript' src='<?=base_url()?>bs/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
