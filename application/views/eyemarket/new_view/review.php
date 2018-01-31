
    <br>
    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="<?= base_url(); ?>eyemarket">EyeMarket</a></li>
        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?> ">Keranjang Anda</a></li>
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
                                            <img src="<?= base_url(); ?>img/eyemarket/produk/<?= $cart['image1']; ?>" alt="<?= $cart['nama']; ?>">
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
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Berat total barang yang kurang dari 1.3 kg, maka terhitung 1 kg sesuai ketentuan JNE."><i class="fa fa-info-circle" aria-hidden="true"></i></a>
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