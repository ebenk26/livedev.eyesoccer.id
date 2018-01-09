<div class="desktop">
    <div class="center-desktop m-0">
        <!--<div class="w900 m-0">
            <div class="container" style="margin-top: 90px;">
                <div class="me-sub">
                    <span>TEMUKAN ORANG DI SEKITARMU</span>
                </div>
                <div class="fl-r lihatlainnya">
                    <a href="">Lihat Lainnya ></a>
                </div>
            </div>
        </div>-->
        <!--<div class="w900 m-0">
            <div class="container">
                <?php 

               # for($i= 0; $i < 3; $i++){

                ?>
                <div class="me-explr-find">
                    <div class="me-explr-find-isi m-0">
                        <ul>
                            <li>
                                <img src="<?php# echo DPIC?>" class="gambar-explr-people" alt="foto profil explore org baru">
                            </li>
                            <li>
                                <a href="">Lorem_Ipsum</a>
                            </li>
                            <li>
                                <button class="btn-blue" type="button">Ikuti</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php #}?>

            </div>
        </div>-->
        <div class="w900 m-0">
            <div class="container mt-30">
                <div class="me-sub">
                    <span>JELAJAHI</span>
                </div>
            </div>
        </div>
        <div class="w900 m-0">
        <?php 
            //p($ex);
            //parsing data explore
            foreach($ex as $k => $v){  
                ?>
                <div class="me-post" ref="<?php echo $v->id_img?>">
                    <img src="<?php echo MEIMG.$v->img_thumb?>" class="me-gambar-post" alt="">
                    <div class="tengah tx-c">
                        <i class="material-icons">favorite</i>
                        <span><?php echo $v->countLike?></span>
                        <i class="material-icons">chat_bubble</i>
                        <span><?php echo $v->countComment?></span>
                    </div>
                </div>

          <?php   }?>                  
         </div>
    </div>
</div>


<script>
     obj = JSON.parse('{"img":"http://localhost/eyesoccer/img/eyeme/thumb_05012018013108.jpeg"}');
$('.me-post').click(function(event) {
    var ref  = $(this).attr('ref');
    /* Act on the event */
    $('.dpb').css('display','block');
    $('#img-det').attr('src',obj.img);
    $.ajax({
        url: '<?php echo MEURL?>get_img',
        type: 'POST',
        dataType: 'JSON',
        data: {id: ref},
    })
    .done(function(r) {
        $.each(r,function(k, v) {
            $('#img-det').attr('src','<?php echo MEIMG?>' + v.img_name);
            $('#usern').text(v.username);
            $('#img-user').attr('src',(v.display_picture === '' ? '<?php echo DPIC?>' : '<?php echo MEIMG?>' + v.display_picture));
            $('#time-string').text(v.timeString);
            $('#c-like').text(v.countLike);
            $('#f-icon').addClass('first-icon-'+v.id_img);
            $('#s-icon').attr('ref',v.id_img);
            if(v.has_like === true){
                
                $('#f-icon').attr('style','display:none');
                $('#s-icon').attr('status','active');

            }
            else{
                $('#s-icon').addClass('second-icon');

            }


            /*$.each(v.like,function($k,$v){
                $('#img-det').attr('src',)
 ;           });*/
            console.log(v.img_name);
        });
        console.log(r[0].id_img);
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
   
    
    /*alert($(this).attr('id'));*/
});
</script>

