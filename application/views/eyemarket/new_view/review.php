<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EYESOCCER | EYEMARKET</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link href="<?php echo base_url(); ?>bs/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bs/jud/css/bootstrap.min.css ">

    <!-- Css animations  -->
    <link href="<?=base_url()?>bs/jud/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>bs/jud/css/style.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url()?>bs/jud/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url()?>bs/jud/css/custom.css" rel="stylesheet">


    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?=base_url()?>img/tab_icon.png" type="image/x-icon" />
</head>

<body>

    <?php
        $username   = $this->session->userdata('username');
        $member_id  = $this->session->userdata('member_id');
    ?>

    <div id="all">
        <header>

            <!-- *** TOP *** -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contact us on 021- 29629348 or info@eyesoccer.id.</p>
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <!-- <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div> -->
                            <div class="login">
                        <?php 
                            if ($username != NULL)
                            {
                        ?>
                                <a href="#">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs text-uppercase"><?= $username; ?></span>
                                </a>
                                <a href="<?= base_url(); ?>eyemarket/logout">
                                    <i class="fa fa-sign-out"></i>
                                    <span class="hidden-xs text-uppercase">Sign Out</span>
                                </a>
                        <?php
                            }
                            else
                            {
                        ?>
                                <a href="#" data-toggle="modal" data-target="#login-modal">
                                    <i class="fa fa-sign-in"></i>
                                    <span class="hidden-xs text-uppercase">Sign in</span>
                                </a>
                                <a href="customer-register.html">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs text-uppercase">Sign up</span>
                                </a>
                        <?php
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

        </header>

        <!-- *** LOGIN MODAL *** -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url(); ?>eyemarket/login" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="customer-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->

        <div id="content">
            <div class="container">

                <div class="row">

                    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
                        <li><a href="#">Home</a></li>
                        <li><span>EyeMarket</span></li>
                        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $member_id; ?> ">Keranjang Anda</a></li>
                        <li><span>Review Pesanan</span></li>
                    </ol>

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="<?= base_url(); ?>eyemarket/order_fix/<?= $id_member; ?>">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="disabled"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                                    </li>
                                    <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                                    </li>
                                    <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Ulasan Pesanan</a>
                                    </li>
                                </ul>

                                <div class="content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Produk</th>
                                                    <th>Kuantitas</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                        <?php 
                                            foreach ($model as $cart)
                                            {
                                                $qty = $cart['jumlah'];
                                        ?>
                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="<?= base_url(); ?>produk_image/<?= $cart['image1']; ?>" alt="<?= $cart['nama']; ?>">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url(); ?>eyemarket/detail/<?= $cart['toko']; ?>/<?= $cart['title_slug']; ?>" target="_blank">
                                                            <?= $cart['nama']; ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?= $cart['jumlah']; ?>
                                                    </td>
                                                    <td>
                                                        Rp. <?= number_format($cart['harga'],0,',','.'); ?>
                                                    </td>
                                                    <td>
                                                        Rp. <?= number_format($cart['total'],0,',','.'); ?>
                                                    </td>
                                                </tr>
                                        <?php        
                                            }
                                        ?>
                                                <tr>
                                                    <th colspan="4">Total</th>
                                                    <th colspan="2">
                                                        Rp. <?= number_format($total_all->total_all,0,',','.'); ?> 
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <div style="font-weight:bold;">
                                                            Alamat Tujuan (<i class="fa fa-truck" aria-hidden="true"></i><?= $kurir; ?>)
                                                            <br>
                                                            <?= $penerima; ?>
                                                        </div>
                                                        <?= $alamat; ?>
                                                        <br>
                                                        Telp: <?= $hp; ?>
                                                    </td>
                                                    <td style="vertical-align: unset;">
                                                        <span style="font-weight:bold;">
                                                            Jumlah Barang
                                                        </span>
                                                        <br>
                                                        <span>
                                                            <?= $qty; ?> barang (<?= $berat_all; ?> gram)
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Berat total barang yang kurang dari 1.4 kg, maka terhitung 1 kg sesuai ketentuan JNE."><i class="fa fa-info-circle" aria-hidden="true"></i></a>
                                                        </span>
                                                    </td>
                                                    <td style="vertical-align: unset;">
                                                        <span style="font-weight:bold;">
                                                            Ongkos Kirim
                                                        </span>
                                                        <br>
                                                        <span>
                                                    <?php
                                                        if ($ongkir != NULL)
                                                        {
                                                    ?>
                                                            Rp. <?= number_format($ongkir,0,',','.'); ?>
                                                    <?php        
                                                        }
                                                    ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="4">
                                                        <h1 style="font-size: 20px;margin-top: 6px;">
                                                            TOTAL PEMBAYARAN 
                                                        </h1>
                                                    </th>
                                                    <th>
                                                        <h1 style="font-size: 20px;margin-top: 6px;">
                                                            Rp. <?= number_format($total_finish,0,',','.'); ?>
                                                        </h1>
                                                    </th>
                                                </tr>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="<?=base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali ke Keranjang</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?=base_url(); ?>eyemarket/order_payment/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali ke Metode Pembayaran</a>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-template-main pull-right"> 
                                                Pesan Sekarang<i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">

                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Ringkasan Pesanan</h3>
                            </div>
                            <p class="text-muted">Berikut Total Keseluruhan setelah dikurangi dengan Biaya Pengiriman menggunakan <strong><?= $kurir; ?></strong></p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Total Pesanan</td>
                                            <th>Rp. <?= number_format($total_all->total_all,0,',','.'); ?></th>
                                        </tr>
                                        <tr>
                                            <td>Ongkos Kirim</td>
                                            <th>Rp. <?= number_format($ongkir,0,',','.'); ?></th>
                                        </tr>
                                        <tr class="total">
                                            <td>
                                                <span class="text-primary">
                                                    Total Pembayaran
                                                </span>
                                            </td>
                                            <th>
                                                <span class="text-primary">
                                                    Rp. <?= number_format($total_finish,0,',','.'); ?>
                                                </span>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** COPYRIGHT *** -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2017. EYESOCCER</p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

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


</body>

</html>