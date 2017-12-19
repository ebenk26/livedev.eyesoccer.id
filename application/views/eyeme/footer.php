
<!--img upload-->
    <div class="detail-post-box" id="upload_pop" style="display:none">
        <div class="takepic-box m-0 p-r" >
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
                        <li><span>Keterangan </span></li>
                        <li><input type="text" placeholder="Tuli Keterangan disini..."></li>
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
    <!--<script src="<?php #echo JSPATH?>home.js"></script>-->
    <script type="text/javascript">
        var html = "";
        var $com  = $('.comment'); //class comment
            
    	$('.img_more').click(function(event) {
    		/* Act on the event */	
    		var attr = $(this).attr('ref');
    		$('.' + attr).toggle('display');
    		//console.log('.'+attr);

    	});
        $('#notif').click(function(event){
           // event.preventDefault();
         
            $('.kotak-popup-notif').slideToggle('slow',function(){
               

            });
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
                    });

                //$(this).val('');
                
            }

        });
        $('#upload').click(function(e) {
            /* Act on the event */
            e.preventDefault();
             $('#upload_pop').css('display','block');

        });
        $(document).keyup(function(e) {  
            /* Act on the event */
             if(e.keyCode == 27){
                
            }
         });
     
        $(window).click(function(e) {
            /* Act on the event */
             if(e.pageX <= 182  || e.pageX >= 1183){
                $('#upload_pop').css('display','none');

             }
        });

        $('#like').click(function(event) {
            /* Act on the event */
            var img = $(this).attr('ref');
               $.ajax({
                url: '<?php echo MEURL?>like/' + img,
                type: 'POST',
                dataType: 'JSON',
                data: {param1: 'value1'},
            })
            .done(function() {
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
            alert($(this).attr('ref'));
        });
        $('#unlike').click(function(event) {
            /* Act on the event */
            alert($(this).attr('ref'));
        });


           
            

       
    </script>