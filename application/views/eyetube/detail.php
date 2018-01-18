<style type="text/css">
    .col-emoji{
        cursor: pointer;
    }
</style>

<div class="crumb">
    <ul>
        <li><a href="<?= base_url(); ?>" style="display: unset;">Home</a></li>
        <li><a href="<?= base_url(); ?>eyetube" style="display: unset;">Eyetube</a></li>
    </ul>
</div>
<div class="desktop">
    <div class="center-desktop m-0">
        <div class="menu-3 w1020 m-0">
            <ul>
                <?php 
                    foreach ($tube_type as $value)
                    {
                        $url1   = str_replace(' ', '-', $value->category_name);
                ?>
                        <li>
                            <a href="<?= base_url(); ?>eyetube/kategori/<?= $url1; ?>"><?= $value->category_name; ?></a>
                        </li>
                <?php  
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="m-0 w1020">
        <div class="garis-x m-t-30"></div>
    </div>
    <div class="center-desktop m-0">
        <div class="w1020 m-0">
            <div class="container tube-l">
                <div>
                    <video width="690px" height="380px" controls style="border-bottom: 1px solid gainsboro;" poster="<?= imgUrl(); ?>systems/eyetube_storage/<?= $eyetube_headline->thumb; ?>">
                        <source src="<?= imgUrl(); ?>systems/eyetube_storage/<?= $eyetube_headline->video; ?>" type="video/mp4">
                    </video>
                    <div class="top-r ">
                        <ul>
                            <li>
                                <i class=" ic-v" aria-hidden="true" style="background-color: unset;"></i>
                            </li>
                            <li>
                                <i class=" ic-v" style="background-color: unset;"></i>
                            </li>
                            <li>
                                <i class=" ic-v" aria-hidden="true" style="background-color: unset;"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="t-title">
                        <span><?= $eyetube_headline->title; ?></span>
                    </div>
                    <div class="t-etc">
                        <div class="fl-l">
                            <ul>
                                <li>
                                    <span>
                                        <?php
                                                $date       =  new DateTime($eyetube_headline->createon);
                                                $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                echo relative_time($tanggal) . ' lalu';
                                        ?>
                                    </span>
                                </li>
                                <li>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span>oleh <?= $eyetube_headline->fullname; ?></span>
                                </li>
                                <li>
                                    <span>-</span>
                                </li>
                                <li>
                                    <span><?= $eyetube_headline->tube_view; ?> diputar</span>
                                </li>
                            </ul>
                        </div>
                        <div class="fl-r zz p-r">
                            <ul>
                                <li>
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <!-- <i class="material-icons">favorite</i> -->
                                    <span><?= $eyetube_headline->tube_like; ?></span>
                                </li>
                                <li>

                                    <!-- <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    <i class="material-icons">comment</i>
                                    <span>456</span> -->
                                </li>
                                <li>
                                    <span style="cursor: pointer;" id="showBtnShare">
                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        <!-- <i class="material-icons">send</i> -->
                                        <span>Share</span>
                                    </span>
                                </li>
                                <li>
                                    <i class="material-icons">more_horiz</i>
                                </li>
                            </ul>
                            <div class="p-a posisi-p">
                                <div class="kotak-popup2">
                                    <div class="panah-popup p-r m-0">
                                    </div>
                                    <span class="teks-p p-r">Tambahkan ke</span>
                                    <span class="teks-p p-r">Laporkan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="garis-x3"></div>
                    <div class="btn-share" style="display: none;">
                        <div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyetube_storage/"></div>
                    </div>
                    <div class="zz2">
                        <p><?= $eyetube_headline->description; ?></p>

                        <div class="tx-c">
                            <!-- <a href="" class="p-r" style="top: -8px;">Tampilkan lebih banyak
                                <i class="material-icons p-r t-8">expand_more</i>
                            </a> -->

                        </div>
                    </div>
                    <div class="garis-x3"></div>
                </div>
                <!-- EMOTICON -->
                <input type="hidden" id="eyetube-id" value="<?= $eyetube_headline->eyetube_id; ?>" />
                <h3 id="t1">Bagaimana reaksi Anda tentang video ini?</h3>                   
                <div class="container mt-45 mb-30">
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="proud"> <!-- tadinya happy -->
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/bangga.png" alt="">
                            </div>
                            <span class="replace_proud"><?= $eyetube_headline->tube_proud; ?></span>
                            <span class="load-proud" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>bangga</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="inspired">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/bingung.png" alt="">
                            </div>
                            <span class="replace_inspired"><?= $eyetube_headline->tube_inspired; ?></span>
                            <span class="load-inspired" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>terinspirasi</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="happy"> <!-- tadinya smile -->
                            <div class="img-box box-img-90">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/gembira.png" alt="">
                            </div>
                            <span class="replace_happy"><?= $eyetube_headline->tube_happy; ?></span>
                            <span class="load-happy" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>gembira</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="sad">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/sedih.png" alt="">
                            </div>
                            <span class="replace_sad"><?= $eyetube_headline->tube_sad; ?></span>
                            <span class="load-sad" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>sedih</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="angry">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/suka.png" alt="">
                            </div>
                            <span class="replace_angry"><?= $eyetube_headline->tube_angry; ?></span>
                            <span class="load-angry" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>marah</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="fear">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/takut.png" alt="">
                            </div>
                            <span class="replace_fear"><?= $eyetube_headline->tube_fear; ?></span>
                            <span class="load-fear" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>takut</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="fun">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/terhibur.png" alt="">
                            </div>
                            <span class="replace_fun"><?= $eyetube_headline->tube_fun; ?></span>
                            <span class="load-fun" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>terhibur</span>
                        </a>
                    </div>
                    <div class="col-2 col-emoji">
                        <a class="emoticon" type_emot="shock">
                            <div class="img-box">
                                <img src="<?=base_url()?>assets/eyenews/img/emoji/terkejut.png" alt="">
                            </div>
                            <span class="replace_shock"><?= $eyetube_headline->tube_shock; ?></span>
                            <span class="load-shock" style="display:none;">
                                <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                             </span>
                            <span>terkejut</span>
                        </a>
                    </div>
                </div>      
                <div>
                    <span style="font-size: 17px;font-weight: 600;color: rgb(41, 41, 41);">Komentar</span>

                    <!-- <div class="tube-komen mt-10">
                        <img src="<?= base_url() ?>assets/img/EYEME/user-discover.png" alt="profil foto">
                        <input type="text" placeholder="Tulis komentar kamu...">
                    </div>
                    <div class="fl-r">
                        <button class="btn-abu" type="button">Batal</button>
                        <button class="btn-blue" type="button">Kirim</button>
                    </div> -->
                    <!-- <div class="garis-x3 mt-20"></div> -->
                </div>

                <div class="fb-comments" data-href="<?=base_url();?><?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>

                <div>
                    <div class="tube-komen">
                        <!-- <table>
                            <tr>
                                <td>
                                    <img src="<?= base_url() ?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                </td>
                                <td>
                                    <div>
                                        <span class="d-b unname">Lorem ipsum</span>
                                        <span class="d-b">25 minutes ago</span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                            laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                        </span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <a href="">Balas</a>
                                            </li>
                                            <li>
                                                <a href="">Laporkan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="garis-x3 m-t-10"></div>

                        <table>
                            <tr>
                                <td>
                                    <img src="<?= base_url() ?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                </td>
                                <td>
                                    <div>
                                        <span class="d-b unname">Lorem ipsum</span>
                                        <span class="d-b">25 minutes ago</span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                            laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                        </span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <a href="">Balas</a>
                                            </li>
                                            <li>
                                                <a href="">Laporkan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="garis-x3 m-t-10"></div>

                        <table>
                            <tr>
                                <td>
                                    <img src="<?= base_url() ?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                </td>
                                <td>
                                    <div>
                                        <span class="d-b unname">Lorem ipsum</span>
                                        <span class="d-b">25 minutes ago</span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                            laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                        </span>
                                    </div>

                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <div>
                                        <ul>
                                            <li>
                                                <a href="">Balas</a>
                                            </li>
                                            <li>
                                                <a href="">Laporkan</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div class="garis-x3 m-t-10"></div> -->

                        <!-- <div class="tx-c">
                            <button class="btn-white mt-10" type="button">Lihat komentar lainnya</button>
                        </div> -->

                    </div>
                </div>
            </div>
            <div class="container tube-r">
                <div>
                    <div class="up-r-tube">
                        <span><?= $eyetube_headline->category_name; ?></span>
                        <span class="aa">Menampilkan 10 video</span>
                    </div>
                    <div class="up-r-tube-cont">
                        <div class="pd">
                            <div class="h-a">
                                <?php 
                                    foreach ($eyetube_lain as $tube_lain)
                                    {
                                ?>
                                        <a href="<?= base_url() ?>eyetube/detail/<?= $tube_lain['url']; ?>">
                                            <div class="container h105">
                                                <div>
                                                    <img src="<?= imgUrl(); ?>systems/eyetube_storage/<?= $tube_lain['thumb']; ?>" alt="">
                                                    <div class="upr" style="background-color: unset;">
                                                        <span style="visibility: hidden;">2:30</span>
                                                    </div>
                                                </div>
                                                <div class="container rb">
                                                    <span><?= $tube_lain['title']; ?></span>
                                                    <div class="rr">
                                                        <span>
                                                            <?php
                                                                    $date       =  new DateTime($tube_lain['createon']);
                                                                    $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                                    echo relative_time($tanggal) . ' lalu';
                                                            ?>
                                                        </span>
                                                        <span>-</span>
                                                        <span><?= $tube_lain['tube_view']; ?> view</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                <?php        
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="down-r-tube">
                        <div class="pd">
                            <div class="subjudul m-t-10">
                                <h4>REKOMENDASI</h4>
                            </div>
                            <div>
                                <?php
                                    foreach ($eyetube_populer as $populer)
                                    {
                                ?>
                                        <a href="<?= base_url() ?>eyetube/detail/<?= $populer['url']; ?>">
                                            <div class="container h105">
                                                <img src="<?= imgUrl(); ?>systems/eyetube_storage/<?= $populer['thumb']; ?>" alt="">
                                                <div class="upr" style="background-color: unset;">
                                                    <span style="visibility: hidden;">2:30</span>
                                                </div>
                                                <div class="container rb">
                                                    <span><?= $populer['title']; ?></span>
                                                    <div class="rr">
                                                        <span>
                                                            <?php
                                                                    $date       =  new DateTime($populer['createon']);
                                                                    $tanggal    = date_format($date,"Y-m-d H:i:s");

                                                                    echo relative_time($tanggal) . ' lalu';
                                                            ?>
                                                        </span>
                                                        <span>-</span>
                                                        <span><?= $populer['tube_view']; ?> view</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                <?php        
                                    }
                                ?>
                            </div>

                        </div>
                    </div>
                    <div class="container tx-c">
                        <button class="btn-white mt-10" type="button">Tampilkan lebih banyak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type='text/javascript' src='<?=base_url()?>bs/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#showBtnShare").click(function(){
            $(".btn-share").toggle();
        });
    });
</script>

<script>
    $(document).ready(function () 
    {
        $(".emoticon").click(function()
        {
            
            id          = $("#eyetube-id").val();
            type        = $(this).attr("type_emot");
            link        = "eyetube";
            tbl         = "tbl_eyetube";
            kanal       = "eyetube";
            sub_field   = "tube_";
            
            $.ajax({

                type: "POST",
                data: { 'type': type, 'id': id, 'link': link, 'tbl': tbl, 'kanal': kanal, 'sub_field': sub_field },
                url: "<?=base_url()?>home/set_emot/" + id,
                dataType: "json",

                success: function (data) {
                    $(".load-"+type).attr('style', 'display:block');

                    setTimeout(function () {
                        $(".load-"+type).attr('style', 'display:none');
                        $(".replace_"+type).empty().html(data.html);
                    }, 2000); 
                }

            });
        });
    });
</script>