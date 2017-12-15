<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EYESOCCER | EYEMARKET</title>

    <meta name="keywords" content="">

    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'> -->

    <!-- Bootstrap and Font Awesome css -->
    <link href="<?php echo base_url(); ?>bs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>bs/jud/css/bootstrap.min.css ">

    <!-- Css animations  -->
    <link href="<?=base_url()?>bs/jud/css/animate.css" rel="stylesheet">
    <link href="<?=base_url()?>bs/jud/css/style.css" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="<?=base_url()?>bs/jud/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="<?=base_url()?>bs/jud/css/custom.css" rel="stylesheet">


    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="<?=base_url()?>bs/jud/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?=base_url()?>bs/jud/img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?=base_url()?>bs/jud/img/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?=base_url()?>bs/jud/img/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?=base_url()?>bs/jud/img/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?=base_url()?>bs/jud/img/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?=base_url()?>bs/jud/img/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?=base_url()?>bs/jud/img/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url()?>bs/jud/img/apple-touch-icon-152x152.png" />
</head>

<body>

<?php 
// var_dump($model);exit();
?>
    <div id="all">
        <?php
            $username   = $this->session->userdata('username');
            $member_id  = $this->session->userdata('member_id');
        ?>
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
                    <div class="col-md-12">
                        <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
                            <li><a href="#">Home</a></li>
                            <li><span>EyeMarket</span></li>
                            <li><span>Keranjang Anda</span></li>
                        </ol>
                        <p class="text-muted lead">Anda mempunyai <?= $jumlah->jumlah; ?> barang di keranjang.</p>
                    </div>


                    <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th>Catatan</th>
                                            <th>Kuantitas</th>
                                            <th>Harga Satuan</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                    foreach ($model as $cart)
                                    { 
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
                                                <span id="text-catatan-<?= $cart['id']; ?>">
                                                    <?php echo isset($cart['catatan']) ? $cart['catatan'] : ""; ?>
                                                </span>
                                                
                                                <a href="#" data-toggle="modal" data-target="#form-catatan-<?= $cart['id']; ?>" style="cursor: pointer;">Edit?</a>
                                            </td>
                                            <td>
                                                <input type="number" id="jumlah-<?= $cart['id']; ?>" name="jumlah" value="<?= $cart['jumlah']; ?>" class="form-control" style="width: 60px;" onchange="editJumlah(<?= $cart['id']; ?>)">
                                            </td>
                                            <td>
                                                Rp. <?= number_format($cart['harga'],0,',','.'); ?>
                                            </td>
                                            <td>
                                                <span id="total-<?= $cart['id']; ?>">
                                                    Rp. <?= number_format($cart['total'],0,',','.'); ?>
                                                </span>
                                            </td>
                                            <td class="hidden">
                                                <span id="id_keranjang"><?= $cart['id']; ?></span>
                                            </td>
                                            <td> 
                                                <a href="<?= base_url(); ?>eyemarket/hapus_keranjang/<?= $cart['id']; ?>"> 
                                                    <i class="fa fa-trash-o"></i> 
                                                </a>
                                            </td>
                                        </tr>
                                <?php        
                                    }
                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th>
                                                <span id="total-all">Rp. <?= number_format($total_all->total_all,0,',','.'); ?></span>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="<?= base_url(); ?>eyemarket" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjut Berbelanja</a>
                                </div>
                                <div class="pull-right">
                                    <!-- <button class="btn btn-default"><i class="fa fa-refresh"></i> Update cart</button> -->
                                    <a href="<?= base_url(); ?>eyemarket/input_order/<?= $cart['id_member']; ?>" class="btn btn-template-main">Pesan Sekarang <i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">
                <?php
                    foreach ($model as $cart)
                    {
                ?>
                        <div class="modal fade" id="form-catatan-<?= $cart['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="Login">Edit Catatan <?= $cart['nama']; ?></h4>
                                    </div>
                                    <div class="modal-body">
                                        <!-- <form action="<?= base_url(); ?>eyemarket/edit_catatan/<?= $cart['id']; ?>" method="post"> -->
                                            <div class="form-group">
                                                <textarea name="catatan" class="form-control" id="catatan-<?= $cart['id']; ?>"><?php echo isset($cart['catatan']) ? $cart['catatan'] : ""; ?></textarea>
                                            </div>
                                            <!-- <input type="submit" name="simpan" value="Simpan" class="btn btn-info"> -->
                                            <button class="btn btn-info" id="btn-catatan-<?= $cart['id']; ?>" onclick="editCatatan(<?= $cart['id']; ?>)">
                                                Simpan 
                                            </button>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php        
                    }
                ?>
                        <div class="form-edit-">
                            
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container -->
        </div>

        <!-- /#content -->

        <style type="text/css" media="screen">
            .loading_eyesoccer{
                position: absolute;
                top: 0px;
                width: 100%;
                height: 100vh;
                text-align: center;
                background: #00000061;
            }

            .loading_eyesoccer > img{
                margin-top: 15%;
            }
        </style>

        <!-- loading -->
        <div class="loading_eyesoccer hidden">
            <img src="<?= base_url(); ?>bs/loading/LOADING2.gif" alt="">
        </div>

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
    
    <script type="text/javascript">
        function editJumlah(id_keranjang)
        {
            var id_member           = <?php echo $member_id; ?>;
            var jumlah_sekarang     = $('#jumlah-'+id_keranjang).val();
            var urlnya              = "<?= base_url(); ?>Eyemarket/edit_keranjang";

            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {jumlah_sekarang:jumlah_sekarang,id_member:id_member,id_keranjang:id_keranjang},
                dataType: 'json',
            })
            .done(function(result) {
                var harga_per_prod  = result.total_update;
                var output_harga    = 'Rp. '+harga_per_prod.toLocaleString('id',{currency: 'IDR',minimumFractionDigits: 0});

                var total_all       = result.total_all_update;
                        
                var reverse = total_all.toString().split('').reverse().join(''),
                    ribuan  = reverse.match(/\d{1,3}/g);
                    ribuan  = 'Rp. '+ribuan.join('.').split('').reverse().join('');

                $('#total-'+id_keranjang).html(output_harga);
                $('#total-all').html(ribuan);
            })
            .fail(function() {
                console.log("error");
            });
        }

        function editCatatan(id_keranjang)
        {
            var id_member       = <?php echo $member_id; ?>;

            var new_catatan     = $('#catatan-'+id_keranjang).val();
            var urlnya          = "<?= base_url(); ?>Eyemarket/edit_catatan";

            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {new_catatan:new_catatan,id_member:id_member,id_keranjang:id_keranjang},
                dataType: 'json',
            })
            .done(function(result) {
                
                $('.loading_eyesoccer').removeClass('hidden');

                $('#form-catatan-'+id_keranjang).removeClass('in').attr('hidden','true').attr('style','display:none');
                $('#text-catatan-'+id_keranjang).html(result.catatan_update);

                var stopScroll = ($( window ).width() < 760) ? 600 : 530;
                $("html, body").animate({ scrollTop: stopScroll }, 1000,function(){$('.loading_eyesoccer').addClass('hidden');});
                console.log(result);
            })
            .fail(function() {
                console.log("error");
            });
        }
        
    </script>
    



</body>

</html>