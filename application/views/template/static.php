<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <?php 
            if ($kanal != 'eyemarket')
            {
        ?>
                <meta name="viewport" content="width=1000">
        <?php        
            }
            else
            {
        ?>
                <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php        
            }
        ?>
		
		<?php
		if(!isset($meta["share"]))
		{
		?>

    		<!-- Begin of SEO Meta Tags -->
    		<title>EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia</title>
    		<meta name="title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
    		<meta name="description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
    		<meta name="news_keywords" content="jadwal bola, berita bola, sepak bola, jadwal siaran bola, jadwal sepak bola, berita bola terkini, berita bola terbaru, berita sepak bola, info bola, berita bola hari ini, bola hari ini">
    		<meta name="googlebot-news" content="index,follow" />
    		<meta name="googlebot" content="index,follow" />
    		<meta name="robots" content="index,follow, noodp, noydir" />
    		<meta name="author" content="EyeSoccer.id" />
    		<meta name="language" content="id" />
    		<meta name="geo.country" content="id" name="geo.country" />
    		<meta http-equiv="content-language" content="In-Id" />
    		<meta name="geo.placename"content="Indonesia" />
    		<link rel="publisher" href="https://plus.google.com/u/1/105520415591265268244" />
    		<link rel="canonical" href="https://www.eyesoccer.id" />
    		<meta name="google-site-verification" content="Ypg1XCrvdn4IyWbgoGHkEWqmK5c8tz6wnBQvOObVRJE" />
    		<!-- End of SEO Meta Tags-->

    		<!-- Begin of Facebook Open graph data-->
    		<meta property="fb:app_id" content="140611863350583" />
    		<meta property="og:site_name" content="EyeSoccer" />
    		<meta property="og:url" content="https://www.eyesoccer.id" />
    		<meta property="og:type" content="Website" />
    		<meta property="og:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
    		<meta property="og:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
    		<meta property="og:locale" content="id_ID" />
    		<meta property="og:image" content="<?=base_url()?>img/tab_icon.png" />
    		<!--End of Facebook open graph data-->
    		   
    		<!--begin of twitter card data-->
    		<meta name="twitter:card" content="summary" />    
    		<meta name="twitter:site" content="@eyesoccer_id" />
    		<meta name="twitter:creator" content="@eyesoccer_id" />
    		<meta name="twitter:domain" content="EyeSoccer"/>
    		<meta name="twitter:title" content="EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia" />
    		<meta name="twitter:description" content="Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia." />
    		<meta name="twitter:image" content="<?=base_url()?>img/tab_icon.png" />
    		<!--end of twitter card data-->

		<?php
		}
		else
        {
			echo $meta["share"];
		}
		?>

        <?php 
            if ($kanal == 'eyemarket')
            {
    ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>bs/jud/css/bootstrap.min.css ">
                <link href="<?=base_url()?>bs/jud/css/animate.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
                <link href="<?= base_url(); ?>assets/css/bs.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/custom.css" rel="stylesheet">
		<?php
            }
            else
            {
        ?>
				<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
                <!-- <link href="<?= base_url(); ?>bs/css/jquery-ui.css" rel="stylesheet"> -->
                <link href="<?= base_url(); ?>assets/css/bs.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
        <?php
            }
        ?>

            <link href="<?php echo base_url(); ?>bs/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    		
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
            <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
            <script src="<?php echo base_url();?>bs/jquery/jquery-ui.js"></script>
            <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
            <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
			<script type="text/javascript" language="javascript" src="<?=base_url()?>/bs/datatables/media/js/dataTables.responsive.min.js"></script>	
			<script type="text/javascript" language="javascript" src="<?=base_url()?>/bs/datatables/media/js/jquery.dataTables.js">	</script>
    </head>
    <?php
        if ($kanal != 'eyemarket')
        {
    ?>
            <body>
    <?php    
        }
        else
        {
    ?>
            <body class="over-x-unset">
                <navmobile>
                    <i id="menu" class="material-icons f-l">menu</i>
                    <img src="https://www.eyesoccer.id/img/logo2.png" alt="">
                    <i id="srcMobile" class="material-icons f-r">search</i>
                </navmobile>
                <div class="menu-mobile">
                    <div class="m-top">
                        <span class="m-log" href=""><i class="material-icons xClose">clear</i></span>
                        <a class="m-reg" href=""><i class="material-icons">input</i>Login</a>
                    </div>
                    <span>kanal</span>
                    <a href="<?=base_url()?>eyeprofile/klub"><img src="<?=base_url()?>assets/img/ic_eyeprofile.png" alt="">Eye Profile</a>
                    <a href="<?=base_url()?>eyetube"><img src="<?=base_url()?>assets/img/ic_eyetube.png" alt="">Eye Tube</a>
                    <a href="<?=base_url()?>eyenews"><img src="<?=base_url()?>assets/img/ic_eyenews.png" alt="">Eye News</a>
                    <a href="<?=base_url()?>eyemarket"><img src="<?=base_url()?>assets/img/ic_eyemarket.png" alt="">Eye Market</a>
                    <a href="<?=base_url()?>eyeme"><img src="<?=base_url()?>assets/img/ic-eyeme.png" alt="">Eye Me</a>
                    <a href="<?=base_url()?>eyevent"><img src="<?=base_url()?>assets/img/ic_eyevent.png" alt="">Eye Vent</a>
                </div>
                <div id="srcboxMobile" class="searchbox-mobile">
                    <input type="text" placeholder="cari apa hari ini?"><button id="srcSub" type="submit">Cari</button>
                    <div class="close">
                    </div>
                </div>
                <script>
                    var menu = document.getElementById('menu');
                    var xMenu = document.getElementsByClassName("menu-mobile")[0];
                    var xClose = document.getElementsByClassName("xClose")[0];
                    var srcMobile = document.getElementById('srcMobile');
                    var srcS = document.getElementById("srcSub");
                    var srcboxMobile = document.getElementById('srcboxMobile');
                    var close = document.getElementsByClassName("close")[0];

                    window.onload = function(){
                        menu.onclick = function() {
                            xMenu.style.display = "block";
                        }
                        xClose.onclick = function() {
                            xMenu.style.display = "none";
                        }
                        srcMobile.onclick = function() {
                            srcboxMobile.style.display = "block";
                        }
                        srcS.onclick = function() {
                            srcboxMobile.style.display = "none";
                        }
                        close.onclick = function() {
                            srcboxMobile.style.display = "none";
                        }
                    }
                </script>
    <?php
        }
    ?>

        <nav>
            <div class="desktop">
                <div class="x-m">
					<a href="<?php echo base_url()?>">
						<div class="logo">
							<img src="https://www.eyesoccer.id/img/logo2.png" alt="" height="40px">
						</div>
					</a>
                    <div class="btn-login">
					
<?php	if(!isset($_SESSION["id_member"]))
{
?>
<span class="btn-reg">Pendaftaran Liga</span><span class="btn-btn-login"><a style="text-decoration: none;" href="<?=base_url()?>home/login">Masuk</a></span>
	<?php
}
else{
	
	?>
	
	<span class="btn-reg">Pendaftaran Liga</span><span class="btn-btn-login"><a style="text-decoration: none;" href="<?=base_url()?>home/member_area"><img src="<?=base_url()?>assets/img_storage/<?=load_top_avatar() ?>" class="img img-circle" width="30px" height="30px" style="border-radius: 20px;float: right;margin-left: 15px;"><?=load_top_name()?></a></span>
	<?php
}
?>
					
                        
                    </div>                
                </div>                
            </div>
        </nav>
        <!-- MENU -->
        <div class="menu">
            <div class="desktop">
                <div class="center-desktop m-0">
                    <span class="x-m">
                        <ul>
                            <li><a href="" onclick="return false">EyeProfile</a>
                                <ul>
                                    <li><a href="<?=base_url()?>eyeprofile/klub">Klub</a></li>
                                    <li><a href="<?=base_url()?>eyeprofile/pemain">Pemain</a></li>
                                    <li><a href="<?=base_url()?>eyeprofile/official">Ofisial</a></li>
                                    <li><a href="<?=base_url()?>eyeprofile/referee">Perangkat Pertandingan</a></li>
                                    <li><a href="<?=base_url()?>eyeprofile/supporter">Supporter</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>eyetube">EyeTube</a></li>
                            <li><a href="<?=base_url()?>eyenews">EyeNews</a></li>
                            <li><a href="<?=base_url()?>eyeme">EyeMe</a></li>
                            <li><a href="<?=base_url()?>eyevent">EyEvent</a></li>
                            <li><a href="<?=base_url()?>eyemarket">EyeMarket</a></li>							
                            <li><a href="<?=base_url()?>eyetransfer">EyeTransfer</a></li>
                            <li><a href="<?=base_url()?>eyetiket">EyeTiket</a></li>
                            <li><a href="<?=base_url()?>eyewallet">EyeWallet</a></li>
                        </ul>
                        <i id="src" class="material-icons">search</i>
                    </span>
                </div>
            </div>
        </div>

        <?php
            if ($kanal == 'eyemarket')
            {
        ?>
                <div class="m-0 center-desktop">
                    <div class="center-desktop">
                        <?php echo $body;?>
                    </div>
                </div>
        <?php    
            }
            else
            {
        ?>
                <div class="desktop">
                    <?php echo $body;?>
                </div>
        <?php        
            }
        ?>
        

    <script>
        (function(d, s, id)
        {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.10&appId=478665635841729";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
	</script>		
        <!-- FOOTER -->
        <footer>
            <div class="f-w">
                <a class="p-d-l-0" href="<?php echo base_url() ?>tentang-kami">Tentang Kami</a>
                <a href="<?php echo base_url() ?>tim-eyesoccer">Tim EyeSoccer</a>
                <a href="<?php echo base_url() ?>pedoman-media-siber">Pedoman Media Siber</a>
                <a href="<?php echo base_url() ?>kebijakan-privasi">Kebijakan Privasi</a>
                <a href="<?php echo base_url() ?>panduan-komunitas">Panduan Komunitas</a>
                <a href="<?php echo base_url() ?>kontak">Kontak</a>
                <a href="#">Karir</a>
                <div class="container">
                    <div class="center50 c-l">
                        Copyright 2018 eyesoccer.id. All Rights Reserved.
                    </div>
                    <div class="center50">
                        <a target="_blank" href="https://www.facebook.com/eyesoccerindonesia/?ref=content_filter" id="i-fb"><img class="first" src="<?php echo base_url()?>assets/img/ic_facebook.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_facebook_selected.png" alt=""></a>
                        <a target="_blank" href="https://twitter.com/eyesoccer_id" id="i-tw"><img class="first" src="<?php echo base_url()?>assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="<?php echo base_url()?>assets/img/ic_twitter-selected.png" alt=""></a>
                        <a target="_blank" href="https://instagram.com/eyesoccer" id="i-in"><img class="first" src="<?php echo base_url()?>assets/img/ic_instagram.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_instagram-selected.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- SEARCHBOX -->
			<form id="global_search" action="<?php echo base_url(); ?>home/search" method="get">
        <div id="srcbox" class="searchbox">
            <input type="search" name="q" required><button id="srcSub" type="submit" style="cursor:pointer;">Cari</button>
        </div>
			</form>
    <script src="<?=base_url()?>bs/js/bootstrapvalidator.min.js"></script>
    <script src="<?=base_url()?>assets/js/home.js"></script>
    <script src="<?=base_url()?>assets/js/jquery.pagination.js"></script>
    </body>
</html>