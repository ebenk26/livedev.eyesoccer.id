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

    <div id="all">
        <?php
            if ($this->session->userdata('member_id') != NULL)
            {
                $username   = $this->session->userdata('username');
                $member_id  = $this->session->userdata('member_id');
            }
        ?>

        <header>

            <!-- *** TOP ***  -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contact us on 021- 29629348 or info@eyesoccer.id.</p>
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="login">
                        <?php 
                            if (isset($username))
                            {
                        ?>
                                <a href="<?= base_url(); ?>eyemarket/user/<?= $member_id; ?>">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs text-uppercase"><?= $username; ?></span>
                                </a>
                                <a href="<?= base_url(); ?>eyemarket/user/<?= $member_id; ?>">
                                    <i class="fa fa-cart-plus"></i>
                                </a>
                                <a href="<?= base_url(); ?>eyemarket/logout">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs text-uppercase">Logout</span>
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
                        <form action="<?= base_url(); ?>eyemarket/login" method="post" accept-charset="utf-8">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email_modal" placeholder="email" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password_modal" placeholder="password" name="password">
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
        <?php
            if ($this->session->flashdata('sukses') == TRUE)
            {
        ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('sukses'); ?>
                </div>
        <?php        
            }
        ?>

        <?php
            if ($this->session->flashdata('gagal') == TRUE)
            {
        ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <?php echo $this->session->flashdata('gagal'); ?>
                </div>
        <?php        
            }
        ?>
                
                <?= $content; ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

        <!-- *** FOOTER END *** -->

        <!-- *** COPYRIGHT *** -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2017. EYESOCER</p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


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
</body>

</html>

<!-- jQuery -->
<script>
$(document).ready(function(){   
        $(".form-item").submit(function(e){
            var form_data = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            button_content.html('Adding...'); //Loading button text 

            $.ajax({ //request ajax ke cart_process.php
                url: "cart_process.php",
                type: "POST",
                dataType:"json", 
                data: form_data
            }).done(function(data){ //Jika Ajax berhasil
                $("#cart-info").html(data.items); //total items di cart-info element
                button_content.html('BELI'); //
                alert("Item telah dimasukan ke keranjang belanja anda"); 
                if($(".shopping-cart-box").css("display") == "block"){
                    $(".cart-box").trigger( "click" ); 
                }
            })
            e.preventDefault();
        });

    //menampilkan item ke keranjang belanja
    $( ".cart-box").click(function(e) { 
        e.preventDefault(); 
        $(".shopping-cart-box").fadeIn(); 
        $("#shopping-cart-results").html('<img src="img/ajax-loader.gif">'); //menampilkan loading gambar
        $("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //membuat permintaan ajax menggunakan dengan jQuery Load() & update
    });
    
    //keluar keranjang belanja
    $( ".close-shopping-cart-box").click(function(e){ //fungsi klik pengguna pada keranjang belanja
        e.preventDefault(); 
        $(".shopping-cart-box").fadeOut(); //keluar keranjang belanka
    });
    
    //Menghapus item dari keranjang
    $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
        e.preventDefault(); 
        var pcode = $(this).attr("data-code"); //mendapatkan get produk
        $(this).parent().fadeOut(); //menghapus elemen item dari kotak
        $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //mendapatkan Harga Barang dari Server
            $("#cart-info").html(data.items); //update Menjullahkan item pada cart-info
            $(".cart-box").trigger( "click" ); //trigger click on cart-box to untuk memperbarui daftar item
        });
    });
	
});
</script>