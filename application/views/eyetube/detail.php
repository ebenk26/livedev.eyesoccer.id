<?php
defined('BASEPATH') OR exit('No direct script access allowed');	
$this->load->helper('my');
$cmd=$this->db->query("select a.*,b.fullname from tbl_eyetube a INNER JOIN tbl_admin b ON b.admin_id=a.admin_id where eyetube_id='$eyetube_id' LIMIT 1");
$row=$cmd->row_array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta name="viewport" content="width=1000">
    <link href="<?=base_url()?>assets/style.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/bs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="crumb">
        <ul>
            <li>Home</li>
            <li>EyeProfile</li>
            <li>Klub</li>
            <!-- <li>Pemain</li> -->
        </ul>
    </div>
    <div class="desktop">
        <div class="center-desktop m-0">
            <div class="menu-3 w1020 m-0">
                <ul>
                    <li>
                        <a href="">EYESOCCER FACT</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER FLASH</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER PEDIA</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER PREVIEW</a>
                    </li>
                    <li>
                        <a href="">EYESOCCER HITS</a>
                    </li>
                    <li class="m-0-0">
                        <a href="">EYESOCCER STAR</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-0 w1020">
            <div class="garis-x m-t-30"></div>
        </div>
        <div class="center-desktop m-0">
            <div class="w1020 m-0">
                <div class="container tube-l">
                    <div>
                        <!--<video width="690px" height="380px" controls style="border-bottom: 1px solid gainsboro;">
                            <source src="<?=base_url()?>systems/eyetube_storage/<?php print $row['video']; ?>" type="video/mp4">
                        </video>-->
						<video width="640" height="360" poster="<?=base_url()?>systems/eyetube_storage/<?php print $row['thumb']; ?>" controls controlsList="nodownload">
						<source src="<?=base_url()?>systems/eyetube_storage/<?php print $row['video']; ?>" type="video/mp4"/></video>						
                        <div class="top-r ">
                            <ul>
                                <li>
                                    <i class="fa fa-heart ic-v" aria-hidden="true"></i>
                                </li>
                                <li>
                                    <i class="material-icons ic-v">access_time</i>
                                </li>
                                <li>
                                    <i class="fa fa-paper-plane-o ic-v" aria-hidden="true"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="t-title">
                            <span><?php print $row['title']; ?></span>
                        </div>
                        <div class="t-etc">
                            <div class="fl-l">
                                <ul>
                                    <li>
                                        <span><?php
										$date 		=  new DateTime($row['createon']);
										$tanggal 	= date_format($date,"Y-m-d H:i:s");

										echo relative_time($tanggal).' ';
										?></span>
                                    </li>
                                    <li>
                                        <span>-</span>
                                    </li>
                                    <li>
                                        <span><?=$row['fullname']?></span>
                                    </li>
                                    <li>
                                        <span>-</span>
                                    </li>
                                    <li>
                                        <span><?php
										$date 		=  new DateTime($row['createon']);
										$tanggal 	= date_format($date,"Y-m-d H:i:s");

										echo' '.$row['tube_view'].' diputar';
										?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="fl-r zz p-r">
                                <ul>
                                    <li>
                                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <!-- <i class="material-icons">favorite</i> -->
                                        <span><?=$row['tube_like']?></span>
                                    </li>
                                    <li>

                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <!-- <i class="material-icons">comment</i> -->
                                        <span>456</span>
                                    </li>
                                    <li>

                                        <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                        <!-- <i class="material-icons">send</i> -->
                                        <span>Share</span>
                                    </li>
                                    <li>
                                        <i class="material-icons">more_horiz</i>
                                    </li>
                                </ul>
                                <div class="p-a posisi-p">
                                    <div class="kotak-popup2">
                                        <div class="panah-popup p-r m-0">
                                        </div>
                                        <span class="teks-p p-r">Tambahkan ke</span>
                                        <span class="teks-p p-r">Laporkan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="garis-x3"></div>
                        <div class="zz2">
                            <p>
							<?php
								$keterangan = strip_tags($row['description']);
								echo word_limiter($keterangan,15);
							?>							
							</p>

                            <div class="tx-c">
                                <a href="" class="p-r" style="top: -8px;">Tampilkan lebih banyak
                                    <i class="material-icons p-r t-8">expand_more</i>
                                </a>

                            </div>
                        </div>
                        <div class="garis-x3"></div>
                    </div>
                    <div>
                        <span style="font-size: 17px;font-weight: 600;color: rgb(41, 41, 41);">Komentar</span>
                        <div class="tube-komen mt-10">
                            <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                            <input type="text" placeholder="Tulis komentar kamu...">
                        </div>
                        <div class="fl-r">
                            <button class="btn-abu" type="button">Batal</button>
                            <button class="btn-blue" type="button">Kirim</button>
                        </div>
                        <div class="garis-x3 mt-20"></div>
                    </div>
                    <div>
                        <div class="tube-komen">
                            <table>
                                <tr>
                                    <td>
                                        <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="d-b unname">Lorem ipsum</span>
                                            <span class="d-b">25 minutes ago</span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                                laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                            </span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <ul>
                                                <li>
                                                    <a href="">Balas</a>
                                                </li>
                                                <li>
                                                    <a href="">Laporkan</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="garis-x3 m-t-10"></div>

                            <table>
                                <tr>
                                    <td>
                                        <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="d-b unname">Lorem ipsum</span>
                                            <span class="d-b">25 minutes ago</span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                                laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                            </span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <ul>
                                                <li>
                                                    <a href="">Balas</a>
                                                </li>
                                                <li>
                                                    <a href="">Laporkan</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="garis-x3 m-t-10"></div>

                            <table>
                                <tr>
                                    <td>
                                        <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                    </td>
                                    <td>
                                        <div>
                                            <span class="d-b unname">Lorem ipsum</span>
                                            <span class="d-b">25 minutes ago</span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <span>sed ut perticipan. Ut denim am minim venian, quis nostrud exercitation ullamco
                                                laboris nisi up aliquip ex ea consepuat. Ut denim am minim venian, quis nostrud
                                            </span>
                                        </div>

                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div>
                                            <ul>
                                                <li>
                                                    <a href="">Balas</a>
                                                </li>
                                                <li>
                                                    <a href="">Laporkan</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="garis-x3 m-t-10"></div>

                            <div class="tx-c">
                                <button class="btn-white mt-10" type="button">Lihat komentar lainnya</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="container tube-r">
                    <div>
                        <div class="up-r-tube">
                            <span>Gojek dan Traveloka Liga 1</span>
                            <span class="aa">Menampilkan 36 video</span>
                        </div>
                        <div class="up-r-tube-cont">
                            <div class="pd">
                                <div class="h-a">
										<?php
										foreach ($eyetube_right_detail as $videonya){
										?>									
                                    <div class="container h105">								
                                        <img src="<?=base_url()?>assets/img/a.jpg" alt="">
                                        <div class="upr">
                                            <span>2:30</span>
                                        </div>
                                        <div class="container r">
                                            <span><?=$row['title']?></span>
                                            <div class="rr">
                                                <span><?php
													$date 		=  new DateTime($videonya['createon']);
													$tanggal 	= date_format($date,"Y-m-d H:i:s");
													echo relative_time($tanggal) . ' ago';						
												?></span>
                                                <span>-</span>
                                                <span><?=$row['tube_view']?> view</span>
                                            </div>
                                        </div>										
                                    </div>
										<?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="down-r-tube">
                            <div class="pd">
                                <div class="subjudul m-t-10">
                                    <h4>REKOMENDASI</h4>
                                </div>
                                <div>
										<?php
										foreach($eyetube_rekomendasi as $row){
										?>									
                                    <div class="container h105">								
                                        <img src="<?=base_url()?>assets/img/a.jpg" alt="">
                                        <div class="upr">
                                            <span>2:30</span>
                                        </div>
                                        <div class="container r">
                                            <span><?=$row['title']?></span>
                                            <div class="rr">
                                                <span><?php
													$date 		=  new DateTime($videonya['createon']);
													$tanggal 	= date_format($date,"Y-m-d H:i:s");
													echo relative_time($tanggal) . ' ago';						
												?></span>
                                                <span>-</span>
                                                <span><?=$row['tube_view']?> view</span>
                                            </div>
                                        </div>										
                                    </div>
										<?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="container tx-c">
                            <button class="btn-white mt-10" type="button">Tampilkan lebih banyak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
$(document).ready(function(){

    // hide .navbar first
    $(".gotop").hide();

    // fade in .navbar
    $(function () {
        $(window).scroll(function () {

                 // set distance user needs to scroll before we start fadeIn
            if ($(this).scrollTop() > 100) {
                $('.gotop').fadeIn();
            } else {
                $('.gotop').fadeOut();
            }
        });
    });

});
</script>
<script> 
$(document).ready(function(){
   $('video').bind('contextmenu',function() { return false; });
});
function openNav1() {document.getElementById("myNav1").style.width = "100%";}
function openNav2() {document.getElementById("myNav2").style.width = "100%";}
function closeNav1() {document.getElementById("myNav1").style.width = "0%";}  
function closeNav2() {document.getElementById("myNav2").style.width = "0%";}  
</script>
<script>
$(document).ready(function(){
  pw=parseInt($(".parent-image").width());
  cw=parseInt($(".child-image").width());
  perpc=(cw/pw)*100;
  if(perpc>=70)
  {
    $(".child-image").width(pw);
  }
//alert(perpc);
  $(".emoticon").click(function(){
   // alert("tes");
    id=$("#eyetube_id22").val();
    type=$(this).attr("type_emot");
    link="eyetube";
    $.ajax({

    type: "POST",
    data: { 'type':type,'id':id,'link':link},
    url: "<?=base_url()?>eyetube/emot/"+id,
    dataType: "json",
    success:function(data){
  
    $(".replace_"+type).empty().html(data.html);
    



    //alert(  $(".replace-"+replaced).html());


    }

    });
  })
}) 
</script>