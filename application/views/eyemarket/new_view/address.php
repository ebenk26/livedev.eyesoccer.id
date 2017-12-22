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

        <div class="alert alert-danger hidden"></div>

        <div id="content">
            <div class="container">

                <div class="row">

                    <ol class="breadcrumb" style="text-align: left;margin-bottom: 0px;">
                        <li><a href="#">Home</a></li>
                        <li><span>EyeMarket</span></li>
                        <li><a href="<?= base_url(); ?>eyemarket/view_keranjang/<?= $member_id; ?> ">Keranjang Anda</a></li>
                        <li><span>Alamat Tujuan</span></li>
                    </ol>

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Alamat</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-truck"></i><br>Metode Pengiriman</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Metode Pembayaran</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Ulasan Pesanan</a>
                                </li>
                            </ul>

                    <?php
                        foreach ($member as $data)
                        {
                    ?>        
                            
                            <div class="content">
                                <form method="post" action="<?= base_url(); ?>eyemarket/update_cart_address/<?= $id_member; ?>">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label> Pilih Alamat </label>
                                        <?php 
                                            if ($jumlah < 3)
                                            {
                                        ?>
                                                <a id="tambah-alamat" style="float: right; cursor: pointer;"> Tambah Alamat </a>
                                        <?php
                                            }
                                        ?>
                                                
                                                <select name="pilih_alamat" id="pilih-alamat" class="form-control" required="required">
                                                    <option value="">Pilih Alamat Anda</option>
                                    <?php
                                        if (isset($address) && !empty($address))
                                        {
                                            foreach ($address as $key => $alamat)
                                            {
                                    ?>
                                                    <option value="<?= $alamat['id']; ?>" id="<?= $key; ?>"><?= $alamat['nama']; ?></option>
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                    ?>
                                                    <option value="">Belum Ada Data Alamat</option>
                                    <?php
                                        }
                                    ?>    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                
                                <?php
                                    foreach ($address as $key => $alamat)
                                    {
                                ?>
                                        <div class="alamat-<?= $key; ?>" style="display: none;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="firstname">Nama Lengkap Penerima</label>
                                                        <input type="text" class="form-control" id="firstname" value="<?= $alamat['penerima']; ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="phone">Handphone</label>
                                                        <input type="text" class="form-control" id="phone" value="<?= $alamat['hp'] ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea id="alamat" class="form-control" disabled="disabled"><?= $alamat['alamat']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="zip">Kode Pos</label>
                                                        <input type="number" id="kodepos" class="form-control" value="<?= $alamat['kodepos']; ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php        
                                    }
                                ?>
                                        <div class="box-footer">
                                            <div class="pull-left">
                                                <a href="<?=base_url(); ?>eyemarket/view_keranjang/<?= $id_member; ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali Ke Keranjang</a>
                                            </div>
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-template-main" id="btn-next">Lanjut ke Metode Pengiriman<i class="fa fa-chevron-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                    <?php        
                        }
                    ?>
                                
                        </div>
                        <!-- /.box -->

                        <!-- Modal Form Tambah Alamat -->
                        <div class="modal fade" id="modalAlamat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Alamat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="<?= base_url(); ?>eyemarket/input_address/<?= $id_member; ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="nama_alamat">Simpan alamat sebagai</label>
                                                        <input type="text" name="nama_alamat" id="nama_alamat" value="" class="form-control" placeholder="Rumah 1 / Kantor / Rumah Kakek">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="penerima">Nama Lengkap Penerima</label>
                                                        <input type="text" name="penerima" id="penerima" value="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="hp">Handphone</label>
                                                        <input type="number" name="hp" id="hp" value="" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <select id="provinsi" name="provinsi" class="form-control">
                                                            <option value="">Pilih Provinsi</option>
                                                            <?php
                                                                foreach ($provinsi as $provinsinya)
                                                                {
                                                            ?>
                                                                    <option value="<?= $provinsinya['provinsi'] ?>">
                                                                        <?= $provinsinya['provinsi'] ?> 
                                                                    </option>
                                                            <?php        
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <select id="kota" name="kota" class="form-control" disabled>
                                                            <option value="">Pilih Kota</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <select id="kecamatan" name="kecamatan" class="form-control" disabled>
                                                            <option value="">Pilih Kecamatan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="zip">Kode Pos</label>
                                                        <input type="number" name="kodepos" id="kodepos" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9"></div>
                                                <div class="col-sm-3">
                                                    <input type="submit" value="Simpan" class="btn btn-info">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-md-9 -->

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
    <script src="<?=base_url()?>assets/eyemarket/user/js/jquery.chained.js"></script>

    <script type="text/javascript">
        $('#tambah-alamat').click(function()
        {
            $("#modalAlamat").modal();
        });

        $('select').on('change', function() {
            var id_address  = $(this).val();
            var id_form = $(this).find("option:selected").attr('id');

            if (id_form == "0")
            {
                $('.alamat-0').attr('style','display: block');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: none');
            }
            else
            if (id_form == "1")
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: block');
                $('.alamat-2').attr('style','display: none');
            }
            else
            if (id_form == "2")
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: block');
            }
            else
            {
                $('.alamat-0').attr('style','display: none');
                $('.alamat-1').attr('style','display: none');
                $('.alamat-2').attr('style','display: none');
            }
        });

        $('#provinsi').on('change', function()
        {
            var prov    = $(this).val();
            var urlnya  = "<?= base_url(); ?>Eyemarket/getkota";
            $('#kota').html('');

            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {prov:prov},
                dataType: 'json',
            })
            .done(function(result) {
                var kotanya   = result;

                for (var i = 0; i < kotanya.length; i++)
                {
                    console.log(kotanya[i].kota);
                    $('#kota').prop("disabled", false);
                    $('#kota').append('<option value="'+kotanya[i].kota+'">'+kotanya[i].kota+'</option>');
                    
                }
                
            })
            .fail(function() {
                console.log("error");
            });
        });

        $('#kota').on('change', function()
        {
            var kota    = $(this).val();
            var urlnya  = "<?= base_url(); ?>Eyemarket/getkecamatan";
            $('#kecamatan').html('');
            
            $.ajax({
                url: urlnya,
                type: 'POST',
                data: {kota:kota},
                dataType: 'json',
            })
            .done(function(result) {

                for (var i = 0; i < result.length; i++)
                {
                    console.log(result[i].kecamatan);
                    $('#kecamatan').append('<option value="'+result[i].kecamatan+'">'+result[i].kecamatan+'</option>');
                    $('#kecamatan').prop("disabled", false);
                }

                
            })
            .fail(function() {
                console.log("error");
            });
        });

        
    </script>



</body>

</html>