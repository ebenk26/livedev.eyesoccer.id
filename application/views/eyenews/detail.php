<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta name="viewport" content="width=1000">    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                        <img src="<?=imgUrl()?>systems/eyenews_storage/<?= $value['pic']; ?>" alt="">
                    </div>
                    <div class="container mt-10">
                        <div class="fl-l n-c">
                            <table>
                                <tr>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/eyenews/img/EYEME/user-discover.png" alt="profil foto">
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
                                            <img src="<?=base_url()?>assets/eyenews/img/icon/logo_fb.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/eyenews/img/icon/logo_twitter.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/eyenews/img/icon/logo_g_plus.png" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <img src="<?=base_url()?>assets/eyenews/img/icon/logo_email.png" alt="">
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
                    <!-- EMOTICON -->
					<input type="hidden" id="eyenews_id22" value="<?=$id?>" />
					<h3 id="t1">Bagaimana reaksi Anda tentang artikel ini?</h3>					
                    <div class="container mt-45 mb-30">
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="smile">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/bangga.png" alt="">
                                </div>
                                <span><?=$value['news_smile']?></span>
                                <span>bangga</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="shock">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/bingung.png" alt="">
                                </div>
                                <span><?=$value['news_shock']?></span>
                                <span>bingung</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="happy">
                                <div class="img-box box-img-90">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/gembira.png" alt="">
                                </div>
                                <span><?=$value['news_happy']?></span>
                                <span>gembira</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="sad">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/sedih.png" alt="">
                                </div>
                                <span><?=$value['news_sad']?></span>
                                <span>sedih</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="inspired">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/suka.png" alt="">
                                </div>
                                <span><?=$value['news_inspired']?></span>
                                <span>suka</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="fear">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/takut.png" alt="">
                                </div>
                                <span><?=$value['news_fear']?></span>
                                <span>takut</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="fun">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/terhibur.png" alt="">
                                </div>
                                <span><?=$value['news_fun']?></span>
                                <span>terhibur</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a ="emoticon" type_emot="angry">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/terkejut.png" alt="">
                                </div>
                                <span><?=$value['news_angry']?></span>
                                <span>terkejut</span>
                            </a>
                        </div>
                    </div>					
                    <div style="margin-top: 20px;">
                        <span style="font-size: 17px;font-weight: 600;color: rgb(41, 41, 41);">Komentar</span>
                    </div>
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
                                        <img src="<?=imgUrl()?>systems/eyenews_storage/<?= $trendnya_news["thumb1"]; ?>" alt="">
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
                                        <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $terpopulernya['thumb1']; ?>" alt="">
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
					<br><br>
                    <div class="d-r-n">
                        <div class="fl-l">
                            <h4>VIDEO</h4>
                        </div>
                        <div class="fl-r abc">
                            <a href="">
                                <span>Berita Lainnya</span>
                                <i class="material-icons">keyboard_arrow_right</i>
                            </a>
                        </div>
						<?php
									
						foreach ($new_eyetube as $populer)
						{
						?>						
                        <div class="pd">
                            <div>
                                <div class="container h105">
                                    <a href="">
                                        <img src="<?=imgUrl()?>systems/eyetube_storage/<?= $populer['thumb']; ?>" alt="">
                                    </a>

                                    <div class="container rd">
                                        <a href="">
                                            <span style="margin-top:12px;"><?= $populer['title']; ?></span>
                                        </a>
                                        <div class="rr">
                                            <span>
												<?php
													$date 		=  new DateTime($populer['createon']);
													$tanggal 	= date_format($date,"Y-m-d H:i:s");

													echo relative_time($tanggal) . ' ago - '.$populer['tube_view'].' views';
												?>										
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
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
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