

                <div class="row">
                    <br>
                    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
                        <li><a href="#">Home</a></li>
                        <li><span>EyeMarket</span></li>
                        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?> ">Keranjang Anda</a></li>
                        <li><span>Metode Pengiriman</span></li>
                    </ol>

					<div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="<?= base_url(); ?>eyemarket/update_cart_delivery/<?= $id_member; ?>">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                                    </li>
                                    <li class="active"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Ulasan Pesanan</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                    <?php 
                                        if ($ctc != NULL || $reg != NULL)
                                        {
                                    ?>
                                            <div class="box shipping-method">

                                                <h4>JNE Reguler</h4>

                                                <p>JNE Reguler adalah paket reguler yang ditawarkan JNE. Kecepatan pengiriman tergantung dari lokasi pengiriman dan lokasi tujuan. Untuk kota yang sama, umumnya memakan waktu 2-3 hari.</p>
                                                Tujuan : <strong><?= $alamat; ?></strong>
                                                <br>
                                                Ongkir : <strong> Rp. <?php echo ($ctc != NULL) ? number_format($ctc,0,',','.') : number_format($reg,0,',','.'); ?> </strong>

                                                <div class="box-footer text-center">
                                                    <input type="radio" name="delivery" value="1">
                                                    <input type="hidden" name="ongkir1" value="<?php echo ($ctc != NULL) ? $ctc: $reg; ?>">
                                                </div>
                                            </div>
                                    <?php        
                                        }
                                    ?>
                                            
                                        </div>
                                        <div class="col-sm-6">
                                    <?php
                                        if ($ctcyes != NULL || $yes != NULL)
                                        {
                                    ?>
                                            <div class="box shipping-method">

                                                <h4>JNE YES</h4>

                                                <p>JNE YES adalah paket dengan prioritas pengiriman tercepat yang ditawarkan JNE. Hanya saja perlu diperhatikan kecepatan barang diterima juga dipengaruhi oleh kecepatan penjual melakukan pengiriman barang.</p>
                                                Tujuan : <strong><?= $alamat; ?></strong>
                                                <br>
                                                Ongkir : <strong> Rp. <?php echo ($ctcyes != NULL) ? number_format($ctcyes,0,',','.') : number_format($yes,0,',','.'); ?> </strong>

                                                <div class="box-footer text-center">
                                                    <input type="radio" name="delivery" value="2">
                                                    <input type="hidden" name="ongkir2" value="<?php echo ($ctcyes != NULL) ? $ctcyes: $yes; ?>">
                                                </div>
                                            </div>
                                    <?php        
                                        }
                                    ?>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?=base_url()?>eyemarket/order_address/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembeli ke Data Alamat</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Lanjut ke Metode Pembayaran<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>	
                    

                </div>
                <!-- /.row -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?=base_url()?>bs/jud/js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.cookie.js"></script>
    <script src="<?=base_url()?>bs/jud/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.parallax-1.1.3.js"></script>
    <script src="<?=base_url()?>bs/jud/js/front.js"></script>