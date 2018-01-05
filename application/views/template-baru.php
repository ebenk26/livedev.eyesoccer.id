<!--start html-->
<!DOCTYPE html>
<html>
<head>

	<!--Meta-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			if(!isset($meta["share"]))
			{
		?>
        <title>EYESOCCER</title>
        <meta property="fb:pages" content="626213127577208" />
        <meta property="og:image" content="<?=base_url()?>img/tab_icon.png" />
        <meta property="og:type" content="article" />
        <meta property="og:description" content="Website dan Social Media khusus sepakbola terkeren dan terlengkap dengan data base seluruh stakeholders sepakbola Indonesia" />
        <meta name="google-site-verification" content="YU4yqbw8pk8N_wcZtK9Lipz_LeZxUoEfD8Ce-doJmkM" />
		<link rel="icon" type="<?=base_url()?>image/png" href="<?=base_url()?>img/tab_icon.png">		
		<?php
			}
			else
			{
				echo $meta["share"];
			}
		?>
	<!--End Meta-->

	<!--icon-->
		<link rel="icon" type="<?=base_url()?>image/png" href="<?=base_url()?>img/tab_icon.png">
	<!--End icon-->

	<!--CSS-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">		
        <link href="<?=base_url()?>newassets/css/bs.css" rel="stylesheet">
        <link href="<?=base_url()?>newassets/css/style.css" rel="stylesheet">       
		<link href="<?=base_url()?>assets/eyenews/css/bs.css" rel="stylesheet">
        <link href="<?=base_url()?>assets/eyenews/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="<?=base_url()?>assets/eyenews/font-awesome/css/font-awesome.min.css">		
        <link href="<?=base_url()?>bs/css/arf-styles.css" rel="stylesheet">		
	<!--End CSS-->	

</head>
<body>
<!--Nav-->
        <nav>
            <div class="dekstop">
                <div class="center-dekstop m-0">
                    <div class="logo">
                        <img src="https://www.eyesoccer.id/img/logo2.png" alt="" height="40px">
                    </div>
                    <div class="btn-login">
                        <span class="btn-reg">Pendaftaran Liga</span><span class="btn-btn-login">Masuk</span>
                    </div>                
                </div>                
            </div>
        </nav>   
<!--End Nav-->

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
                                </ul>
                            </li>
                            <li><a href="<?=base_url()?>eyetube">EyeTube</a></li>
                            <li><a href="<?=base_url()?>eyenews">EyeNews</a></li>
                            <li><a href="<?=base_url()?>eyeme">EyeMe</a></li>
                            <li><a href="<?=base_url()?>eyevent">EyeEvent</a></li>
                            <li><a href="<?=base_url()?>eyetransfer">EyeTransfer</a></li>
                            <li><a href="<?=base_url()?>eyetiket">EyeTiket</a></li>
                            <li><a href="<?=base_url()?>eyemarket">EyeMarket</a></li>
                            <li><a href="<?=base_url()?>eyewallet">EyeWallet</a></li>
                        </ul>
                        <i id="src" class="material-icons">search</i>
                    </span>
                </div>
            </div>
        </div>
<?=$body?>
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
                        <a href="" id="i-fb"><img class="first" src="assets/img/ic_facebook.png" alt=""><img class="scond" src="assets/img/ic_facebook_selected.png" alt=""></a>
                        <a href="" id="i-tw"><img class="first" src="assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="assets/img/ic_twitter-selected.png" alt=""></a>
                        <a href="" id="i-in"><img class="first" src="assets/img/ic_instagram.png" alt=""><img class="scond" src="assets/img/ic_instagram-selected.png" alt=""></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- SEARCHBOX -->
        <div id="srcbox" class="searchbox">
            <input type="text"><button id="srcSub" type="submit">Cari</button>
        </div>		
<!--Javascript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>newassets/js/carousel.js"></script>
<script src="<?=base_url()?>newassets/js/home.js"></script>
<!--End Javascript---->	
</body>
</html>