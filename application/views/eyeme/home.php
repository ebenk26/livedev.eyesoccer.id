<div class="desktop">
    <div class="center-desktop m-0">
        <div class="container mt-20">
    	<?php 
    		#p($imgFollowing);
    		foreach($imgFollowing as $k=> $v){?>

    		<div class="box-feed m-0">
            <div>
                <img class="feed-profil-foto m-t-15 m-l-20" 
                src="<?php echo ($v['dp'] == NULL || '' ? DPIC : sIMGPATH.$v['dp'])?>" alt="user photo" />
                <div class="nama-pro-feed p-r">

                    <a href="<?php echo MEPROFILE.$v['username']?>">
                    	<?php echo $v['username']?>
                    </a>

                </div>
                <div class="p-r titik3 fl-r">
                    <img src="<?php echo sIMGPATH?>EYEME/ic-more.png" class="img_more" ref="v-<?php echo $v['id_img']?>">
                    <div class="posisi-kotak-popup p-a v-<?php echo $v['id_img']?>" style="display:none;">
                        <div class="kotak-popup">
                            <div class="panah-popup p-r m-0">
                            </div>
                            <span class="teks-popup p-r">Laporkan</span>
                            <span class="teks-popup p-r">Bagikan</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="post-photo m-t-10">
                <img src="<?php echo MEIMG.$v['img_name']?>" alt="<?php echo $v['img_alt']?>">
            </div>
            <div class="mt-10 m-l-20">
                
                    <i class="material-icons first-icon">favorite_border</i>
                    <i class="material-icons second-icon">favorite</i>
                    <div class="p-r like">
                        <a href="">andrey_ipsum</a>
                        <span>dan</span>
                        <a href="">678</a>
                        <span>menyukai ini</span>
                    </div>
                
                <div class="w567 m-t-15">
                    <div class="garis-x2"></div>
                </div>
            </div>
            <div class="p-r comment m-l-20">
               
                    <a href="<?php echo MEURL.$v['username']?>"><?php echo $v['username']?></a>
                    <span><?php echo $v['img_caption']?> </span>
                    <a href="test" class="c-g">selengkapnya</a>
                
                <div class="komen">
                    <ul class="plus-c<?php echo $v['id_img']?>">
                        <li>
                            <a href="" class="c-g">Lihat komentar lainnya</a>
                        </li>
                        <?php 

                        	if(count($v['comment']) >  0 ){

                        		foreach($v['comment'] as $i => $j){
                        		echo '<li>';
                        			echo "<a href=\"".MEPROFILE."{$j->username}\">{$j->username}</a>";
                        			echo "<span>{$j->comment}</span>";
                        		echo '</li>';
                        		}
                        	} 

                        ?>
                       
                    </ul>
                </div>
                <span class="waktu-post"><?php echo $v['timeString']?></span>
            </div>
            <div class="m-t-15 kolom-komentar">
            	
                <input type="text" placeholder="Tambah komentar..." name="comment" rel="<?php echo $v['id_img']?>" class="comment" autocomplete="off">
                
            </div>

        </div>
        <?php }?>
            
    </div>   
        <div class="container m-0">
            <div class="tx-c mt-53">
                <button class="btn-white" type="button">Lihat lainnya</button>
            </div>
        </div>
    </div>
    </div>
    <!--img upload-->

    <div class="detail-post-box" id="upload" style="display:none">
        <div class="takepic-box m-0 p-r">
            <div class="pic-l">
                <div class="container box-pic">
                    <div class="up-pic tx-c p-r">
                        <ul>
                            <li>
                                <i class="material-icons">cloud_upload</i>
                            </li>
                            <li>
                                <span>Drop your photo here</span>
                            </li>
                            <li>
                                <span>or</span>
                            </li>
                            <li>
                                <button class="btn-browse" type="button">Browse file</button>
                            </li>
                        </ul>
                    </div>
                    <div class="container rsz mt-10">
                        <span>Resize photo</span>
                        <div id="slidecontainer">
                            <input type="range" min="1" max="100" value="0" class="slider" id="myRange">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pic-r p-r">
                <div class="container com-tag">
                    <ul>
                        <li><span>Komentar</span></li>
                        <li><input type="text" placeholder="Tulis komentarmu disini..."></li>
                        <li></li>
                        <li><span>Tag</span></li>
                        <li><input type="text" placeholder="Gunakan @ untuk menyebut teman" class="input2"></li>
                        <li></li>
                        <li><span>Lokasi</span></li>
                        <li><input type="text" placeholder="Ketik lokasimu" class="input2"></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li><button class="btn-me-submit fl-r" type="button">Submit</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <!--/img-upload-->
    <script src="<?php echo JSPATH?>home.js"></script>
    <script type="text/javascript">
        var html = "";
        var $com  = $('.comment'); //class comment
            
    	$('.img_more').click(function(event) {
    		/* Act on the event */	
    		var attr = $(this).attr('ref');
    		$('.' + attr).toggle('display');
    		//console.log('.'+attr);

    	});

    	$com.on('keypress',function(event){   

        var valCom = $(this).val();        

            if(event.keyCode == 13){
                
                var id_img  = $(this).attr('rel');
                $this   = $(this);
                //console.log($(this).serializ  var com     = $(this).val();
                html        += "<li>";
                html        += "<a href=\"<?php echo MEPROFILE.$_SESSION['username']?>\"><?php echo $_SESSION['username']?></a>";
                html        += "<span>"+ valCom+"</span>";
                html        += "</li>";
                
                 $.ajax({
                        url: '<?php echo EYEMEPATH?>' + 'post_comment',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 
                        $(this).serialize()+'&img=' + id_img,

                    })
                    .done(function(r){

                        $('.plus-c'+id_img).append(html);
                        html = "";
                        $this.val('');

                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");

                    });

                //$(this).val('');
                
            }

        });	
    
    </script>
</body>
