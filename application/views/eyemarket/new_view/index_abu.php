    <div class="crumb">
        <ul>
            <li><a href="<?= base_url(); ?>" style="display: unset;">Home</a></li>
            <li><a href="<?= base_url(); ?>eyemarket">EyeMarket</a></li>
        </ul>
    </div>
    <div class="center-desktop m-0">
        <div class="menu-3 m-0 tx-c">
            <ul>
                <?php 
                    foreach ($kat as $kt)
                    {
                ?>
                        <li>
                            <a href="#"><?= $kt['nama']; ?></a>
                        </li>
                <?php  
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="row m-0 indexnya">
        <script type="text/javascript">
            jQuery(document).ready(function() {
                $(window).on('load',function() {
                    var urlnya          = "<?= base_url(); ?>Eyemarket/api_index/kaos";

                    $.ajax({
                        url: urlnya
                    })
                    .done(function(result) {
                        result = JSON.parse(result);
                        console.log(result);
                        $('.indexnya').html(result.html);
                    });
                })
            });

        </script>
        <div class="container br-market">
    	    <h2>Kaos</h2>
    	</div>
        <div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12">
            <div class="product">
                <div class="image" style="background-color: #f2f2f2;">
                    <a href="">
                        <img src="" class="img-res-product">
                    </a>
                </div>
                <!-- /.image -->
                <div class="text" style="background-color: #f2f2f2;">
                    <h3>
                        <a href="">
                            
                        </a>
                    </h3>
                </div>
                <!-- /.text -->
                <div class="ribbon new">
                    <div class="theribbon">Available Soon</div>
                    <div class="ribbon-background"></div>
                </div>
            </div>
            <!-- /.product -->
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 mrgn">
            <div class="product">
                <div class="image" style="background-color: #f2f2f2;">
                    <a href="">
                        <img src="" class="img-res-product">
                    </a>
                </div>
                <!-- /.image -->
                <div class="text" style="background-color: #f2f2f2;">
                    <h3>
                        <a href="">
                            
                        </a>
                    </h3>
                </div>
                <!-- /.text -->
                <div class="ribbon new">
                    <div class="theribbon">Available Soon</div>
                    <div class="ribbon-background"></div>
                </div>
            </div>
            <!-- /.product -->
        </div>
        <!-- /.col-md-4 -->
        <div class="col-md-3 col-sm-4 col-xs-6 col-xxs-12 mrgn">
            <div class="product">
                <div class="image" style="background-color: #f2f2f2;">
                    <a href="">
                        <img src="" class="img-res-product">
                    </a>
                </div>
                <!-- /.image -->
                <div class="text" style="background-color: #f2f2f2;">
                    <h3>
                        <a href="">
                            
                        </a>
                    </h3>
                </div>
                <!-- /.text -->
                <div class="ribbon new">
                    <div class="theribbon">Available Soon</div>
                    <div class="ribbon-background"></div>
                </div>
            </div>
            <!-- /.product -->
        </div>
        <!-- /.col-md-4 -->
    </div>