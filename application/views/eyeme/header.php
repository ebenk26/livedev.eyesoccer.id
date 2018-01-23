
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title?></title>
   <?php  
   /*
       CSS link tag 

    */
    $style  = CSSPATH.'style.css';
    $bs     = CSSPATH.'bs.css';
    $icon   = 'https://fonts.googleapis.com/icon?family=Material+Icons';

    $link_style   = $link_option['href'] = $style; 
    $link_bs      = $link_option['href'] = $bs;
    $link_icon    = $link_option['href'] = $icon;
    $link_option  = array(
                    'rel'   => 'stylesheet',
                    'type'  => 'text/css');

    $link_rel    = array(
                    array('rel' => 'publisher','link' => 'https://plus.google.com/u/1/105520415591265268244'),
                    array('rel' => 'canonical','link' => 'https://www.eyesoccer.id'));//link rel html tag 
    /*

        Meta Tag begin 

    */
    $meta = 
    array(
        array('name' => 'viewport','content' => 'width=1000'),
        array('name' => 'keyword','content'  =>'social media bola'),
        array('name' => 'title','content'    => 'EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia'),
        array('name' => 'description', 'content' => 'Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia.'),
        array('name' => 'news_keywords','content','jadwal bola, berita bola, sepak bola, jadwal siaran bola, jadwal sepak bola, berita bola terkini, berita bola terbaru, berita sepak bola, info bola, berita bola hari ini, bola hari ini'),
        array('name' => 'googlebot-news','content' => 'index,follow'),
        array('name' => 'googlebot','content'      => 'index,follow'),
        array('name' => 'robots','content'         => 'index,follow, noodp, noydir'),
        array('name' => 'author','content'         => 'EyeSoccer.i'),
        array('name' => 'language','content'       => 'id'),
        array('name' => 'geo.country','content'    => 'id'),
        array('name' => 'geo.placename','content' => 'Indonesia'),
        array('name' => 'google-site-verification','content'=> 'Ypg1XCrvdn4IyWbgoGHkEWqmK5c8tz6wnBQvOObVRJE'),
        //twitter card
        array('name' => 'twitter:card','content' => 'summary'),
        array('name' => 'twitter:site','content' => '@eyesoccer_id'),
        array('name' => 'twitter:creator','content'=> '@eyesoccer_id'),
        array('name' => 'twitter:domain','content' => 'EyeSoccer'),
        array('name' => 'twitter:title','content'  => 'EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia'),
        array('name' => 'twitter:description','content'=> 'Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia.'),
        array('name' => 'twitter:image','content' => MEIMG.'tab_icon.png'));
    //meta property 
    $property = 
    array(
        array('property'=> 'fb:app_id','content'=> '140611863350583'),
        array('property'=> 'og:site_name','content'=> 'EyeSoccer'),
        array('property' => 'og:url', 'content' => 'https://www.eyesoccer.id'),
        array('property' => 'og:type','content' => 'Website'),
        array('property' => 'og:title','content' => 'EyeSoccer: Portal Database & Berita Sepak Bola Terlengkap di Indonesia'),
        array('property' => 'og:description','content' => 'Berita sepak bola terbaru, jadwal dan hasil pertandingan, live score, transfer, klasemen liga Indonesia dan dunia & profil pemain & klub dari seluruh Indonesia.'),
        array('property' => 'og:locale','content' => 'id_ID'),
        array('property'=> 'og:image','content' => MEIMG.'/tab_icon.png'));

    echo meta($meta);
    echo meta('content-language','In-Id','equiv');
    echo meta_property($property);
    
    for($i=0;$i < count($link_rel);$i++){
        echo '<link rel="'.$link_rel[$i]['rel'].'" href="'.$link_rel[$i]['link'].'"/>';
    }
    //meta tag end
    //link tag begin 
    echo link_tag($link_icon);
    echo link_tag($link_style);   
    echo link_tag($link_bs);
    //link tag end 
    
    ?>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script src="<?php echo JSPATH?>jquery.cropit.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="m-0">
<nav>
    <div class="desktop">
         <div class="center-desktop"> 
            <!--<div class="x-m">-->
            <a href="<?php echo base_url()?>">
                <div class="logo">
                    <img src="https://www.eyesoccer.id/img/logo2.png" alt="" height="40px">
                </div>
            </a>
            <div class="btn-login"> 
            <?php   
                echo btnLogin($this->session->id_member);
            ?>   
            </div>                    
           <!-- </div>                 -->
        </div>                
    </div>
</nav>

<div class="menu">  
   <div class="desktop">
        <div class="center-desktop m-0">
            <span class="x-m">
                <?php 
                    $attr = array();
                    $list = array(
                                anchor('','EyeProfile') 
                                    => array(
                                        anchor(pCLUB,'Klub'),
                                        anchor(pPLAYER,'Pemain'),
                                        anchor(pOFFICIAL,'Official'),
                                        anchor(pREFEREE,'Perangkat Pertandingan'),
                                        anchor(pSUPPORT,'Supporter')),
                                anchor(EYETUBE,'EyeTube'),
                                anchor(EYENEWS,'EyeNews'),
                                anchor(EYEME,'EyeMe'),
                                anchor(EYEEVENT,'EyeEvent'),
                                anchor(EYEMARKET,'EyeMarket'),
                                anchor(EYETRANSFER,'EyeTransfer'),
                                anchor(EYETIKET,'EyeTiket'),
                                anchor(EYEWALLET,'EyeWallet'));
                    echo ul($list);
                    
                ?>
               
                <i id="src" class="material-icons">search</i>
            </span>
        </div>
    </div>
</div><!--navbar-menu-->

<div class="center-desktop container me-head">
    <div class="w1020 m-0">
        <div class="container">
            <div class="pd-t-20 p-r" style="float:left">
            <a href="<?php echo MEURL?>" title="test" style="text-decoration: none;""><i class="material-icons ikon">home</i></a>
            </div>
            <div class="fl-r pd-t-20 p-r">
            <?php 
               
                //icon setting 
                $icon = array(
                            array('icon'=> 'camera','link'=> MEURL.'explore','title'=> 'Jelajah','id' => 'explore'),
                            array('icon'=> 'notifications_none','link'=> '#','title'=> 'Pemberitahuan','id'=>'notif'),
                            array('icon'=> 'camera_alt','link'=> '#','title'=> 'Upload Gambar','id'=>'upload'),
                            array('icon'=> 'person_outline','link'=> MEURL.'profile/'.$myusername,'title'=> 'Profil','id'=> 'prof'));
                //icon menu 
                foreach($icon as $k => $v){

                    echo  '<a href="'.$v['link'].'" title="'.$v['title'].'" style="text-decoration:none;" id="'.$v['id'].'">
                    <i class="material-icons ikon">'.$v['icon'].'</i></a>';
                }

            ?>
            </div>
        </div>
    </div>
</div>
