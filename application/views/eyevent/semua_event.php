    <style>
        .eyv h4{
            color: rgb(61, 139, 61);
            padding: 15px 0;
            margin-top: 30px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .w2{
            width: 290px;
            float: left;
            margin-right: 20px;
        }

        .w2:nth-of-type(2n+2){
            margin-right: 0px;
        }

        .w2-f{
            width: 100%;
            height: 160px;
            overflow: hidden;
        }
    </style>

    <div class="crumb">
        <ul>
            <li><a href="<?= base_url(); ?>" style="display: unset;">Home</a></li>
            <li><a href="<?= base_url(); ?>eyevent" style="display: unset;">EyEvent</a></li>
            <li>Event Lainnya</li>
        </ul>
    </div>
    <div class="desktop">
        <div class="center-desktop m-0">
            <!-- <div class="w1020 mt-30 m-0"> -->
            <div class="container">
                <div class="container eyv m-t-20">
                    <div class="fl-l">
                        <h4>Event Lainnya</h4>
                    </div>
                    <div class="container">
                        <div class="w2">
                            <a href="">
                                <div style="width:100%; height:160px; overflow:hidden;">
                                    <img src="<?= base_url(); ?>assets/img/a.jpg" style="min-width:100%; height:100%;">
                                </div>
                                <p class="sub-en">Lorem ipsum dolor sit amet, consectur adipiscing elit.</p>
                                <span class="time-view">2 jam lalu - 123 views</span>
                            </a>
                        </div>
                    </div>
                    <div class="container"><?php /*echo $pagging['pagging'];*/?></div>
                </div>

                <div class="container eyv-r mt-10">
                    <!-- <div class="down-r-vent">
                        <div class="kalender mt-20">
                                <div id="z"></div>
                                <input type="text" id="d" />
                                <button class="btn-white-g" type="button">Lihat</button>
                        </div>
                    </div> -->
                    <div class="container down-r-vent">
                        <div class="fl-l">
                            <h4>BERITA TERBARU</h4>
                        </div>
                        <div class="fl-r bcd">
                            <a href="">
                                <span>Berita Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
                        <div class="pd">
                            <div>
                                <div class="container he">
                                    <a href="">
                                        <div style="width:113px; height:113px; overflow:hidden; display:inline-block; float:left;">
                                            <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                        </div>
                                        <div class="container rx">
                                            <span>Sed uperpisciatis unde omnis iste natus</span>
                                            <div class="rr">
                                                <span>2 jam yang lalu</span>
                                                <span>-</span>
                                                <span>123 view</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="container he">
                                        <a href="">
                                            <div style="width:113px; height:113px; overflow:hidden; display:inline-block; float:left;">
                                                <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                            </div>
                                            <div class="container rx">
                                                <span>Sed uperpisciatis unde omnis iste natus</span>
                                                <div class="rr">
                                                    <span>2 jam yang lalu</span>
                                                    <span>-</span>
                                                    <span>123 view</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="container he">
                                            <a href="">
                                                <div style="width:113px; height:113px; overflow:hidden; display:inline-block; float:left;">
                                                    <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                </div>
                                                <div class="container rx">
                                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                                    <div class="rr">
                                                        <span>2 jam yang lalu</span>
                                                        <span>-</span>
                                                        <span>123 view</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="container he">
                                                <a href="">
                                                    <div style="width:113px; height:113px; overflow:hidden; display:inline-block; float:left;">
                                                        <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                    </div>
                                                    <div class="container rx">
                                                        <span>Sed uperpisciatis unde omnis iste natus</span>
                                                        <div class="rr">
                                                            <span>2 jam yang lalu</span>
                                                            <span>-</span>
                                                            <span>123 view</span>
                                                        </div>
                                                    </div>
                                                </a>
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
                                    <div class="container h105">
                                            <a href="">
                                                <div style="width:145px; height:90px; overflow:hidden; display:inline-block; float:left;">
                                                    <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                </div>
                                                <div class="drn" style="background-color: transparent; color: transparent;">
                                                    <span>2:30</span>
                                                </div>
                                                <div class="container rv" style="margin-top: 10px;">
                                                    <span>Sed uperpisciatis unde omnis iste natus</span>
                                        
                                                    <div class="rr">
                                                        <span>2 jam yang lalu</span>
                                                        <span>-</span>
                                                        <span>123 view</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="container h105">
                                                <a href="">
                                                    <div style="width:145px; height:90px; overflow:hidden; display:inline-block; float:left;">
                                                        <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                    </div>
                                                    <div class="drn" style="background-color: transparent; color: transparent;">
                                                        <span>2:30</span>
                                                    </div>
                                                    <div class="container rv" style="margin-top: 10px;">
                                                        <span>Sed uperpisciatis unde omnis iste natus</span>
                                            
                                                        <div class="rr">
                                                            <span>2 jam yang lalu</span>
                                                            <span>-</span>
                                                            <span>123 view</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="container h105">
                                                    <a href="">
                                                        <div style="width:145px; height:90px; overflow:hidden; display:inline-block; float:left;">
                                                            <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                        </div>
                                                        <div class="drn" style="background-color: transparent; color: transparent;">
                                                            <span>2:30</span>
                                                        </div>
                                                        <div class="container rv" style="margin-top: 10px;">
                                                            <span>Sed uperpisciatis unde omnis iste natus</span>
                                                
                                                            <div class="rr">
                                                                <span>2 jam yang lalu</span>
                                                                <span>-</span>
                                                                <span>123 view</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="container h105">
                                                        <a href="">
                                                            <div style="width:145px; height:90px; overflow:hidden; display:inline-block; float:left;">
                                                                <img src="<?= base_url(); ?>assets/img/a.jpg" alt="" style="width:unset; height:100%;">
                                                            </div>
                                                            <div class="drn" style="background-color: transparent; color: transparent;">
                                                                <span>2:30</span>
                                                            </div>
                                                            <div class="container rv" style="margin-top: 10px;">
                                                                <span>Sed uperpisciatis unde omnis iste natus</span>
                                                    
                                                                <div class="rr">
                                                                    <span>2 jam yang lalu</span>
                                                                    <span>-</span>
                                                                    <span>123 view</span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>

    </div>
    <script>
        $('#z').datepicker({
            inline: true,
            altField: '#d'
        });

        $('#d').change(function(){
            $('#z').datepicker('setDate', $(this).val());
        });
    </script>