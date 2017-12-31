<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta name="viewport" content="width=1000">
    <link href="<?=base_url()?>assets/css/style.css" rel="stylesheet">
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

<?php
    foreach ($model as $value)
    {
        $date           = new DateTime($value['publish_on']);
        $description    = explode("<p>",$value['description']);
        $paragraf       = count($description);

        $tengah         = "";
        if ($paragraf%2 == 0)
        {
            $tengah     = $paragraf / 2;
        }
        else
        {
            $tengah     = ($paragraf - 1) / 2;
        }

        $tipe           = $value['news_type'];
        $id             = $value['eyenews_id'];
        $bacajuga       = $this->Eyenews_model->get_baca_juga($tipe,$id,2);
        $video          = $this->Eyenews_model->get_eyetube_title();

        
?>
	
    <div class="desktop">
        <div class="center-desktop m-0">
            <div class="menu-4 w1020 m-0">
                <ul>
                    <li>
                        <a href="">LIGA</a>
                    </li>
                    <li>
                        <a href="">PEMBINAAN</a>
                    </li>
                    <li>
                        <a href="">UMPAN LAMBUNG</a>
                    </li>
                    <li>
                        <a href="">PREDIKSI</a>
                    </li>
                    <li>
                        <a href="">PERISTIWA</a>
                    </li>
                    <li>
                        <a href="">SOCCER SAINS</a>
                    </li>
                    <li>
                        <a href="">ULAS TUNTAS</a>
                    </li>
                    <li class="m-0-0">
                        <a href="">PINGGIR LAPANGAN</a>
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
                    <div class="news-pic">
                        <h2><?= $value['title']; ?></h2>
                        <img src="<?=base_url()?>systems/eyenews_storage/<?= $value['pic']; ?>" alt="">
                    </div>
                    <div class="container mt-10">
                        <div class="fl-l n-c">
                            <table>
                                <tr>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                        </a>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>
                                                <a href="">
                                                    <span class="unname"><?= $value['fullname']; ?></span>
                                                </a>
                                            </li>
                                            <li class="c-g">
                                                <span><?= date_format($date,"d M Y H:i:s"); ?></span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="fl-r soc">
                            <table>
                                <tr>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/icon/logo_fb.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/icon/logo_twitter.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/icon/logo_g_plus.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/icon/logo_email.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <button class="cc" type="button">
                                            <i class="fa fa-comment" aria-hidden="true"></i>
                                            <span>16</span>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="garis-x3 mt-45"></div>
                    <div class="news-capt m-t-10">
                        <span><?= $value['description']; ?></span>
                    </div>

                    <!--<div style="margin-top: 20px;">
                        <span style="font-size: 17px;font-weight: 600;color: rgb(41, 41, 41);">Komentar</span>
                        <div class="tube-komen mt-10">
                            <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                            <input type="text" placeholder="Tulis komentar kamu...">
                        </div>
                        <div class="fl-r">
                            <button class="btn-abu" type="button">Batal</button>
                            <button class="btn-merah" type="button">Kirim</button>
                        </div>
                        <div class="garis-x3 mt-20"></div>
                    </div>
                    <div>
                        <div class="tube-komen">
                            <table>
                                <tr>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/img/EYEME/user-discover.png" alt="profil foto">
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="">
                                                <span class="d-b unname">Lorem ipsum</span>
                                            </a>
                                            <span class="d-b">25 minutes ago</span>
                                        </div>

                                    </td>
                                </tr>
                            </table>
                            <div class="garis-x3 m-t-10"></div>

                            <div class="tx-c">
                                <button class="btn-white-r mt-10" type="button">Lihat komentar lainnya</button>
                            </div>

                        </div>
                    </div>-->
					<input type="hidden" id="eyenews_id22" value="<?=$id?>" />
					<div id="emoji">
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="smile">
								<img src="<?=base_url()?>img/emoticon/senang.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Senang</small>
								<center class="replace_smile" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_smile']?>
								</center>
							</a>
						</div>	
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="shock">
								<img src="<?=base_url()?>img/emoticon/terkejut.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Terkejut</small>
								<center class="replace_shock" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_shock']?>
								</center>
							</a>
						</div>						
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="inspired">
								<img src="<?=base_url()?>img/emoticon/terinspirasi.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Terinspirasi</small>
								<center class="replace_inspired" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_inspired']?>
								</center>
							</a>
						</div>
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="happy">
								<img src="<?=base_url()?>img/emoticon/bangga.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Bangga</small>
								<center class="replace_happy" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_happy']?>
								</center>
							</a>
						</div>						
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="sad">
								<img src="<?=base_url()?>img/emoticon/sedih.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Sedih</small>
								<center class="replace_sad" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_sad']?>
								</center>
							</a>
						</div>						
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="fear">
								<img src="<?=base_url()?>img/emoticon/takut.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Takut</small>
								<center class="replace_fear" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_fear']?>
								</center>
							</a>
						</div>					
						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="fun" style="cursor:pointer">
								<img src="<?=base_url()?>img/emoticon/terhibur.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Terhibur</small>
								<center class="replace_fun" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_fun']?>
								</center>
							</a>
						</div>			

						<div style="background:#117A65;color:#fff;border:solid #fff 1px;text-align:center;padding:1px;cursor:pointer">
							<a class="emoticon" type_emot="angry" style="cursor:pointer">
								<img src="<?=base_url()?>img/emoticon/marah.png" class="img-responsive max-width: 100% height: auto">
								<small style="color:#fff">Marah</small>
								<center class="replace_angry" style="background:#117A65;color:#fff;text-align:center;padding:1px;">
									<?=$value['news_angry']?>
								</center>
							</a>
						</div>
					</div>
					<br>
					<h6 id="t4">Bagikan</h6>					
					<div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyenews_storage/<?php print $value['pic']; ?>"></div>					
					<div class="fb-comments" data-href="http://eyesoccer.id<?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>					
                </div>

                <div class="container tube-r">
                    <div class="up-r-news">
                        <h4>TRENDING</h4>
						<?php
						$this->load->helper('my');
						foreach ($trending_eyenews as $trendnya_news)
						{
						?>						
                        <div class="pd">
                            <div>
                                <div class="container h100">
                                    <a href="">
                                        <img src="<?=base_url()?>systems/eyenews_storage/<?= $trendnya_news["thumb1"]; ?>" alt="">
                                    </a>
                                    <div class="container rn">
                                        <a href="">
                                            <span><?= $trendnya_news["title"]; ?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
											<?php
											$date 		=  new DateTime($trendnya_news['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");
											echo relative_time($tanggal) . ' lalu - '.$trendnya_news['news_view'].' views';
											?>
											</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
						<?php } ?>
                    </div>

                    <div class="down-r-news">
                        <div class="fl-l">
                            <h4>POPULER</h4>
                        </div>
                        <div class="fl-r abc">
                            <a href="">
                                <span>Berita Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
						<?php 
						
							foreach ($terpopuler as $terpopulernya)
							{
						?>						
                        <div class="pd">
                            <div>
                                <div class="container hh">
                                    <a href="">
                                        <img src="<?php echo base_url(); ?>systems/eyenews_storage/<?= $terpopulernya['thumb1']; ?>" alt="">
                                    </a>
                                    <div class="container rn">
                                        <a href="">
                                            <span><?= $terpopulernya["title"]; ?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
											<?php
											$date 		=  new DateTime($terpopulernya['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");
											echo relative_time($tanggal) . ' lalu'
											?> - <?= $terpopulernya['news_view']; ?> View
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
                    </div>

                    <div class="d-r-n">
                        <div class="fl-l">
                            <h4>VIDEO</h4>
                        </div>
                        <div class="fl-r abc">
                            <a href="">
                                <span>Video Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
						<?php
						foreach($new_eyetube as $newtube){
						?>
                        <div class="pd">
                            <div>
                                <div class="container h105">
                                    <a href="">
                                        <img src="<?=base_url()?>assets/img/a.jpg" alt="">
                                    </a>

                                    <div class="container rd">
                                        <a href="">
                                            <span><?= $newtube["title"]; ?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
											
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php        
    }
?>	
<script>
        $(document).ready(function () 
        {
            $(".emoticon").click(function()
            {
                // alert("tes");
                id = $("#eyenews_id22").val();
                type = $(this).attr("type_emot");
                link = "eyenews";
                $.ajax({

                    type: "POST",
                    data: { 'type': type, 'id': id, 'link': link },
                    url: "<?=base_url()?>eyenews/new_emot/" + id,
                    dataType: "json",
                    success: function (data) {

                        $(".replace_" + type).empty().html(data.html);
                    }

                });
            })
			
			//Start infinite scroll
		var offset = 1;
        // create a long list of items
        var container = $("#containerss");
        var lastItemIndex = 0;
        var title = "";
        var loading = "<img style='width: 40%;margin-left: 30%;' class='load-gif' src='../../assets/img/loadingsoccer.gif' alt='Loading'>";
        var appendToList = function() {
			//getjson
			$.ajax({
				url: "../getRecentEyenews/" + offset,
				type: "GET",
				dataType: "JSON",
				success: function(data)
				{
					if(data[0]['title'] == 0){
						
					}else{
						// alert(JSON.stringify(data[0]['title']));
						$.each( data, function( key, data ) {
							$('.load-gif').hide();
							// console.log(data.title);
							var contentScroll = "<a style='font-size:14px;' href='/eyenews/detail/"+data.url+"'><div><img src='/systems/eyenews_storage/"+data.thumb1+"' style='height: 101px;float: left;'><div class='data-title'>"+data.title+"</div></div></a>"
                            var el = $("<div>").attr("class", "itemss").html(contentScroll);
                            
							lastItemIndex = lastItemIndex + 1;
							container.append(el);
							
						});
					}
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
			offset = offset+5;
			//end getjson
        }

        container.bind("infinite-scroll", function(args) {
          console.log("Received", args);
		  $('.load-gif').show();
          setTimeout(function(){ appendToList(); }, 1500);
        });

        var infiniteScroll = new $.InfiniteScroll('#containerss', true).setup();
        setTimeout(function(){ appendToList(); }, 1500);
        }) 
    </script>
</body>
</html>