</div>
<style>
    .pagination > .active > a {
	z-index:1;
    }
    .col-emoji{
	cursor: pointer;
    }
    .news-pic h2 {
	font-weight: 600;
    }
    .menu-3 a:hover{
	border-bottom: 3px solid rgb(200, 0, 0);
	color: rgb(200, 0, 0);
    }
    .tube-l, .h-news-l {
	width: 730px;
    }
</style>

<div class="desktop">
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
        <?php 
            $kanal  = "eyenews";
            $page   = $kategori[0]->news_type;
            echo set_breadcrumb($kanal,$page);
        ?>
        <?php $this->load->view('eyenews/category_menu'); ?>
        
        </div>
        <div class="center-desktop m-0">
            <div class="m-0">
                <div class="container tube-l">
                    <div class="news-pic">
                        <h2><?= $value['title']; ?></h2>
                        <div style="width:100%;height:445px;overflow:hidden;">
                            <img src="<?=imgUrl()?>systems/eyenews_storage/<?= $value['pic']; ?>" alt="" style="width:100%;min-height:100%;">
                        </div>
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
                        <div class="container" style="margin: 10px 0px 30px;">
                            <div class="sharethis-inline-share-buttons" data-image="<?=base_url()?>systems/eyetube_storage/"></div>
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
                            <a class="emoticon" type_emot="proud">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/bangga.png" alt="">
                                </div>
                                <span class="replace_proud"><?=$value['news_smile']?></span>
                                <span class="load-proud" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>bangga</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="inspired">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/bingung.png" alt="">
                                </div>
                                <span class="replace_inspired"><?=$value['news_inspired']?></span>
                                <span class="load-inspired" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>terinspirasi</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="happy"> <!-- tadinya smile -->
                                <div class="img-box box-img-90">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/gembira.png" alt="">
                                </div>
                                <span class="replace_happy"><?=$value['news_happy']?></span>
                                <span class="load-happy" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>gembira</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="sad">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/sedih.png" alt="">
                                </div>
                                <span class="replace_sad"><?=$value['news_sad']?></span>
                                <span class="load-sad" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>sedih</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="angry">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/marah.png" alt="">
                                </div>
                                <span class="replace_angry"><?=$value['news_angry']?></span>
                                <span class="load-angry" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>marah</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="fear">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/takut.png" alt="">
                                </div>
                                <span class="replace_fear"><?=$value['news_fear']?></span>
                                <span class="load-fear" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>takut</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="fun">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/terhibur.png" alt="">
                                </div>
                                <span class="replace_fun"><?=$value['news_fun']?></span>
                                <span class="load-fun" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>terhibur</span>
                            </a>
                        </div>
                        <div class="col-2 col-emoji">
                            <a class="emoticon" type_emot="shock">
                                <div class="img-box">
                                    <img src="<?=base_url()?>assets/eyenews/img/emoji/terkejut.png" alt="">
                                </div>
                                <span class="replace_shock"><?=$value['news_shock']?></span>
                                <span class="load-shock" style="display:none;">
                                    <img src="<?= base_url() ?>bs/loading/LOADING2.gif" style="width: 167%;margin-left: -35px;" >
                                 </span>
                                <span>terkejut</span>
                            </a>
                        </div>
                    </div>					
                    <div style="margin-top: 20px;" id="coba">
                        <span style="font-size: 17px;font-weight: 600;color: rgb(41, 41, 41);">Komentar</span>
                    </div>
					<div class="fb-comments fb-comments-enews-detail" data-href="<?=base_url();?><?=$_SERVER['REQUEST_URI']?>" data-numposts="5"></div>					
                </div>

                <div class="container tube-r fl-r">
                    <div class="up-r-news">
                        <h4>BERITA TERKINI</h4>
						<?php
						$this->load->helper('my');
						foreach ($terkini as $trendnya_news)
						{
						?>						
                        <div class="pd">
                            <div>
                            <a href="<?php echo base_url(); ?>eyenews/detail/<?= $trendnya_news['url']; ?>" class="container">
                                <div class="container h100">
                                    <div class="p-r" style="display: block; width: 110px; height: 110px; float: left; overflow: hidden;">
                                        <img src="<?=imgUrl()?>systems/eyenews_storage/<?= $trendnya_news["thumb1"]; ?>" alt="" style="height: 100%; position: absolute; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">
                                    </div>
                                    <div class="container rn">
                                        <span style="font-weight: 600;"><?= $trendnya_news["title"]; ?></span>  
                                        </div>  
                                        <div class="rr" style="padding-left: 120px;">
                                            <span>
											<?php
											$date 		=  new DateTime($trendnya_news['createon']);
											$tanggal 	= date_format($date,"Y-m-d H:i:s");
											echo relative_time($tanggal) . ' lalu - '.$trendnya_news['news_view'].' views';
											?>
											</span>
                                        </div>
                                </div>
                                </a>
                            </div>
                        </div>
						<?php } ?>						
                    </div>
                    <div class="container banner-eyenews1 img-banner mt-20">
                        <img src="assets/img/iklanbanner/banner 425x100 px-01.jpg" alt="">
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
                            <a href="<?php echo base_url(); ?>eyenews/detail/<?= $terpopulernya['url']; ?>">
                                <div class="container hh">
                                        <div class="p-r" style="display: block; width: 110px; height: 110px; float: left; overflow: hidden;">
                                            <img src="<?php echo imgUrl(); ?>systems/eyenews_storage/<?= $terpopulernya['thumb1']; ?>" alt="" style="height: 100%; position: absolute; top: 50%; left: 50%; margin-right: -50%; transform: translate(-50%, -50%);">
                                        </div>
                                        <div class="container rn">
                                            <span style="font-weight:600"><?= $terpopulernya["title"]; ?></span>
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
                            </a>
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
                                        <a href="<?php echo base_url(); ?>eyetube/detail/<?= $populer['url']; ?>">
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
	<?php
    }
?>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script type='text/javascript' src='<?=base_url()?>bs/js/sharethis.js#property=596cf64cb69de60011989f08&product=inline-share-buttons' async='async'></script>
<script>
    $(document).ready(function () 
    {
	$(".emoticon").click(function()
	{
	    id = $("#eyenews_id22").val();
	    type = $(this).attr("type_emot");
	    link = "eyenews";
	    tbl         = "tbl_eyenews";
	    kanal       = "eyenews";
	    sub_field   = "news_";

	    $.ajax({

		type: "POST",
		data: { 'type': type, 'id': id, 'link': link, 'tbl': tbl, 'kanal': kanal, 'sub_field': sub_field },
		url: "<?=base_url()?>home/set_emot/" + id,
		dataType: "json",

		success: function (data) {
		    $(".load-"+type).attr('style', 'display:block');

		    setTimeout(function () {
			$(".load-"+type).attr('style', 'display:none');
			$(".replace_"+type).empty().html(data.html);
		    }, 2000); 
		}

	    });
	})
		    
	    /* //Start infinite scroll
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
		    */
    }); 

    /* container.bind("infinite-scroll", function(args) {
      console.log("Received", args);
	      $('.load-gif').show();
      setTimeout(function(){ appendToList(); }, 1500);
    });

    var infiniteScroll = new $.InfiniteScroll('#containerss', true).setup();
    setTimeout(function(){ appendToList(); }, 1500);
    })  */
</script>	

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("#scroll-komen").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
	scrollTop: $(hash).offset().top
      }, 800, function(){
   
	// Add hash (#) to URL when done scrolling (default click behavior)
	window.location.hash = hash;
      });
    } // End if
  });
});
</script>