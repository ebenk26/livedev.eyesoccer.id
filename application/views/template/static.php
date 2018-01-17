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
            if ($kanal == 'eyenews')
            {
        ?>
                <link href="<?=base_url()?>assets/eyenews/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>assets/eyenews/css/bs.css" rel="stylesheet">
				<style>
					.center-dekstop{
						width: 1065px;
					}
					.x-m {
						font-size: .9em;
						margin-left: -50px;
						width: 1105px;
					}
				</style>
        <?php    
            }
            else if($kanal == 'registration')
			{
		?>
				<link href="<?=base_url()?>assets/registration/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>assets/registration/css/bs.css" rel="stylesheet">
		<?php
			}
            else if ($kanal == 'eyemarket')
            {
    ?>
                <link rel="stylesheet" href="<?php echo base_url(); ?>bs/jud/css/bootstrap.min.css ">
                <link href="<?=base_url()?>bs/jud/css/animate.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>bs/jud/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
                <link href="<?=base_url()?>bs/jud/css/custom.css" rel="stylesheet">

                <link href="<?= base_url(); ?>assets/css/bs.css" rel="stylesheet">
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
        <?php
            }
            else if ($kanal == 'eyetube')
            {
        ?>
                <link href="<?= base_url(); ?>assets/eyetube/css/bs.css" rel="stylesheet">
                <!-- <link href="<?= base_url(); ?>assets/eyetube/css/style.css" rel="stylesheet"> -->
                <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
                <style type="text/css">
                    .x-m{
                        margin-left: unset;
                    }
                </style>
        <?php
            }
            else if ($kanal == 'eyetube_detail')
            {
        ?>
                <link href="<?=base_url()?>assets/eyetube/css/style.css" rel="stylesheet">
                <link href="<?=base_url()?>assets/css/bs.css" rel="stylesheet">
                <style type="text/css">
                    .center-dekstop{
                        width: 1065px;
                    }
                </style>
        <?php        
            }
            else
            {
        ?>
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
            <body style="overflow-x: unset;">
    <?php
        }
    ?>
    
        <nav>
            <div class="dekstop">
                <div class="center-dekstop m-0">
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
	
	<span class="btn-reg">Pendaftaran Liga</span><span class="btn-btn-login"><a style="text-decoration: none;" href="<?=base_url()?>home/member_area"><img src="<?=imgUrl()?>systems/img_storage/<?=load_top_avatar() ?>" class="img img-circle" width="30px" height="30px" style="border-radius: 20px;float: right;margin-left: 15px;"><?=load_top_name()?></a></span>
	<?php
}
?>
					
                        
                    </div>                
                </div>                
            </div>
        </nav>
        <!-- MENU -->
        <div class="menu">
            <div class="dekstop">
                <div class="center-dekstop m-0">
                    <span class="x-m">
                        <ul>
                            <li><a href="">EyeProfile</a>
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
                            <li><a href="<?=base_url()?>eyevent">EyeEvent</a></li>
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
                <div class="m-0" style="width: 1065px;">
                    <div style="width: 1065px; margin: 0 auto; vertical-align: middle;">
                        <?php echo $body;?>
                    </div>
                </div>
        <?php    
            }
            else
            {
        ?>
                <div class="dekstop">
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
                <a class="p-d-l-0" href="">Tentang Kami</a>
                <a href="">Tim EyeSoccer</a>
                <a href="">Pedoman Media Siber</a>
                <a href="">Kebijakan Privasi</a>
                <a href="">Panduan Komunitas</a>
                <a href="">Kontak</a>
                <a href="">Karir</a>
                <div class="container">
                    <div class="center50 c-l">
                        Copyright 2017 eyesoccer.com. All Rights Reserved.
                    </div>
                    <div class="center50">
                        <a href="" id="i-fb"><img class="first" src="<?php echo base_url()?>assets/img/ic_facebook.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_facebook_selected.png" alt=""></a>
                        <a href="" id="i-tw"><img class="first" src="<?php echo base_url()?>assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="<?php echo base_url()?>assets/img/ic_twitter-selected.png" alt=""></a>
                        <a href="" id="i-in"><img class="first" src="<?php echo base_url()?>assets/img/ic_instagram.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_instagram-selected.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- SEARCHBOX -->
        <div id="srcbox" class="searchbox">
            <input type="text"><button id="srcSub" type="submit">Cari</button>
        </div>
    <script src="<?=base_url()?>bs/js/bootstrapvalidator.min.js"></script>
    <script src="<?=base_url()?>assets/js/home.js"></script>
    </body>
</html>