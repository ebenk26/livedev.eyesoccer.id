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
               
                    <a href="">andrey_ipsum</a>
                    <span><?php echo $v['img_caption']?> </span>
                    <a href="" class="c-g">selengkapnya</a>
                
                <div class="komen">
                    <ul class="plus-c">
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
            	
                <input type="text" placeholder="Tambah komentar..." name="comment" rel="<?php echo $v['id_img']?>" class="comment">
                
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

    <script src="<?php echo JSPATH?>home.js"></script>
    <script type="text/javascript">
        var html = "",
            $com  = $('.comment'), //class comment
            valCom = $com.val(); 
            
    	
    	$('.img_more').click(function(event) {
    		/* Act on the event */	
    		var attr = $(this).attr('ref');
    		$('.' + attr).toggle('display');
    		//console.log('.'+attr);

    	});



    	$com.on('keypress',function(event){
            console.log(valCom);
            var id_img  = $(this).attr('rel');
            //console.log($(this).serializ  var com     = $(this).val();
            html        += "<li>";
            html        += "<a href=\"<?php echo MEPROFILE.$_SESSION['username']?>\"><?php echo $_SESSION['username']?></a>";
            html        += "<span>"+ valCom+"</span>";
            html        += "</li>";
          

            if(event.keyCode == 13){
                 $.ajax({
                        url: '<?php echo EYEMEPATH?>' + 'post_comment',
                        type: 'POST',
                        dataType: 'JSON',
                        data: 
                        $(this).serialize()+'&img=' + id_img,

                    })
                    .done(function(r) {
                        $('.plus-c').html(html);

                        
                    })
                    .fail(function() {
                        console.log("error");
                    })
                    .always(function() {
                        console.log("complete");
                    });
                
            }



        });
       
    	
    
    </script>
</body>
