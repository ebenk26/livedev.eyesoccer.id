<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Invoice EyeMarket</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>assets/eyemarket/invoice/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>assets/eyemarket/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        
        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url(); ?>assets/eyemarket/invoice/custom.min.css" rel="stylesheet">
</head>
<body>
    
    <?php
    // var_dump($model);exit();
        if ($model->status == 3)
        {
    ?>
            <img src="<?php echo base_url(); ?>assets/eyemarket/lunas.png" style="z-index: 999;
            position: absolute;
            margin: 11% 22%;
            width: 59%;
            transform: rotate(13deg);
            opacity: 0.2;">
    <?php        
        }
    ?>

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Eyemarket Invoice</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <section class="content invoice">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                        <h1>
                                            <i class="fa fa-globe"></i> Invoice.
                                            <small class="pull-right">Tanggal: <?= date('d F Y',strtotime($model->order_date)); ?></small>
                                        </h1>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>No. <span style="font-size: 16px;"><?= $model->no_invoice; ?></span></b>
                                        <br>
                                        <br>
                                        <b>Order ID:</b> <?= $model->no_order; ?>
                                        <br>
                                        <b>Tanggal Jatuh Tempo:</b> <?= date('d F Y H:i:s',strtotime($model->expired_date)); ?>
                                        <br>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <br>

                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Kuantitas</th>
                                                    <th>Produk</th>
                                                    <th>Toko</th>
                                                    <th style="width: 39%">Catatan</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                            foreach ($cart as $value)
                                            {
                                        ?>
                                                <tr>
                                                    <td><?= $value['jumlah']; ?></td>
                                                    <td><?= $value['nama']; ?></td>
                                                    <td><?= $value['toko']; ?></td>
                                                    <td><?= $value['catatan']; ?></td>
                                                    <td>Rp. <?= number_format($value['harga'],0,',','.'); ?> </td>
                                                    <td>Rp. <?= number_format($value['total'],0,',','.'); ?> </td>
                                                </tr>
                                        <?php        
                                            }
                                        ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                        <p class="lead">Metode Pengiriman</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td>Kurir</td>
                                                    <td>:</td>
                                                    <td><?= $model->kurir; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat Keseluruhan</td>
                                                    <td>:</td>
                                                    <td><?= $model->berat_all; ?> gram</td>
                                                </tr>
                                                <tr>
                                                    <td>Penerima</td>
                                                    <td>:</td>
                                                    <td><?= $model->penerima; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><?= $model->alamat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $model->kota; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $model->kecamatan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td><?= $model->provinsinya; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                         </p> -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                        <p class="lead">Total Keseluruhan</p>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th style="width:50%">Subtotal:</th>
                                                        <td>Rp. <?= number_format($model->harga,0,',','.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ongkir <strong> (<?= $model->kurir; ?>) </strong></th>
                                                        <td>Rp. <?= number_format($model->ongkir,0,',','.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total:</th>
                                                        <td> 
                                                            <span style="font-size: larger; font-weight: bolder;">
                                                                <mark>Rp. <?= number_format($model->harga_all,0,',','.'); ?></mark>
                                                            </span>
                                                         </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                                        <!-- <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                        <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button> -->
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/eyemarket/invoice/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/eyemarket/invoice/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/eyemarket/invoice/fastclick.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/eyemarket/invoice/custom.min.js"></script>
    
</body>
</html>
