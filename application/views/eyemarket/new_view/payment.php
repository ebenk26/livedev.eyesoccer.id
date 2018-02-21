

    <br>
    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url(); ?>eyemarket">EyeMarket</a></li>
        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?> ">Keranjang Anda</a></li>
        <li><span>Metode Pembayaran</span></li>
    </ol>

    <div class="col-md-9 clearfix" id="checkout">

        <div class="box">
            <ul class="nav nav-pills nav-justified">
                <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                </li>
                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                </li>
                <li class="active"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                </li>
                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Ulasan Pesanan</a>
                </li>
            </ul>
            <form method="post" action="<?= base_url(); ?>eyemarket/start_order/<?= $id_member; ?>">

                <div class="content">
                    <div class="row">

                        <h4>Transfer</h4>

                <?php
                    foreach ($bank as $banknya)
                    {
                ?>
                        <div class="col-sm-6">
                            <div class="box payment-method" style="text-align: center;">


                                <p><?= $banknya['bank']; ?></p>
                                <img style="height: 40px;" src="<?= base_url() ?>assets/eyemarket/<?= $banknya['logo']; ?>">
                                <br>
                                <br>
                                <p><strong><?= $banknya['rekening']; ?></strong></p>
                                <p>a/n <?= $banknya['nama_pemilik']; ?></p>

                                <div class="box-footer text-center" style="margin: unset;">

                                    <input type="radio" name="payment" value="<?= $banknya['id']; ?>">
                                </div>
                            </div>
                        </div>
                <?php        
                    }
                ?>

                            
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.content -->

                <div class="box-footer">
                    <div class="pull-left">
                        <a href="<?=base_url()?>eyemarket/order_delivery/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali ke Metode Pengiriman</a>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-template-main">Continue to Order review<i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->


    </div>
    <!-- /.col-md-9 -->


    <!-- #### JAVASCRIPT FILES ### -->

    <script src="<?=base_url()?>bs/jud/js/jquery-1.11.0.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?=base_url()?>bs/jud/js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="<?=base_url()?>bs/jud/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.cookie.js"></script>
    <script src="<?=base_url()?>bs/jud/js/waypoints.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.counterup.min.js"></script>
    <script src="<?=base_url()?>bs/jud/js/jquery.parallax-1.1.3.js"></script>
    <script src="<?=base_url()?>bs/jud/js/front.js"></script>