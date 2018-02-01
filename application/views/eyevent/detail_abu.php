<style>
    .tube-l{
        width: 730px;
    }
</style>
<div class="center-desktop m-0">
    <div class="m-0">
        <div class="container tube-l event-detail">
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    $(window).on('load',function() {
                        var urlnya          = "<?= base_url(); ?>Eyevent/api_detail/<?= $event_id; ?>";

                        $.ajax({
                            url: urlnya
                        })
                        .done(function(result) {
                            result = JSON.parse(result);
                            console.log(result);
                            $('.event-detail').html(result.html);
                        });
                    })
                });

            </script>
            <div class="news-pic" style="background-color: #f2f2f2;">
                <h2></h2>
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
                                            <span class="unname" style="text-transform: capitalize;"></span>
                                        </a>
                                    </li>
                                    <li class="c-g">
                                        <span>
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
                <span></span>


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
            </div>
        </div>

        <script type="text/javascript">
            jQuery(document).ready(function() {
                $(window).on('load',function() {
                    var urlnya          = "<?= base_url(); ?>Eyevent/detail_kanan/";

                    $.ajax({
                        url: urlnya
                    })
                    .done(function(result) {
                        result = JSON.parse(result);
                        console.log(result);
                        $('.kanan-video').html(result.html);
                    });
                })
            });

        </script>

        <div class="container tube-r kanan-video fl-r">
            <div class="up-r-vent">
                <h4>EVENT LAINNYA</h4>
                <div class="pd">
                    <div>
                        <div class="container h100">
                            <a href="">
                                
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container h100">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container h100">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container h100">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="down-r-vent">
                <div class="fl-l">
                    <h4>POPULER</h4>
                </div>
                <div class="fl-r bcd">
                    <a href="">
                        <span>Berita Lainnya</span>
                        <i class="material-icons">keyboard_arrow_right</i>
                    </a>
                </div>
                <div class="pd">
                    <div>
                        <div class="container hh">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container hh">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container hh">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                        <div class="container hh">
                            <a href="">
                                <img src="assets/img/a.jpg" alt="">
                            </a>
                            <div class="container rn">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-r-v">
                <div class="fl-l">
                    <h4>VIDEO</h4>
                </div>
                <div class="fl-r bcd">
                    <a href="">
                        <span>Berita Lainnya</span>
                        <i class="material-icons">keyboard_arrow_right</i>
                    </a>
                </div>
                <div class="pd">
                    <div>
                        <div class="container h105" style="background-color: #f2d2d2;">
                            <a href="">
                                
                            </a>
                            <div class="drn">
                                <span style="visibility: hidden;">2:30</span>
                            </div>
                            <div class="container rd">
                                <a href="">
                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                </a>
                                <div class="rr">
                                    <span>2 jam yang lalu</span>
                                    <span>-</span>
                                    <span>123 view</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>