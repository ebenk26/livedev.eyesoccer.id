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
                <a href="" id="i-fb"><img class="first" src="<?php echo base_url()?>assets/img/ic_facebook.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_facebook_selected.png" alt=""></a>
                <a href="" id="i-tw"><img class="first" src="<?php echo base_url()?>assets/img/ic_twitter.png" alt=""><img class="scond scond-t" src="<?php echo base_url()?>assets/img/ic_twitter-selected.png" alt=""></a>
                <a href="" id="i-in"><img class="first" src="<?php echo base_url()?>assets/img/ic_instagram.png" alt=""><img class="scond" src="<?php echo base_url()?>assets/img/ic_instagram-selected.png" alt=""></a>
            </div>
        </div>
    </div>
</footer>
<!-- SEARCHBOX -->
<div id="srcbox" class="searchbox">
    <input type="text"><button id="srcSub" type="submit">Cari</button>
</div>

<!--<script src="<?php #echo JSPATH?>home.js"></script>-->
<!--<script src="<?php #echo JSPATH?>sw.js"></script>-->
<script type="text/javascript">
 /*
    * Eyeme js v.0.0.1
    * author : sofyan waldy

*/
var html      = "",//html comment 
    tbl       = "",//table notification
    tbl_com   = "",
    $com      = $('.comment'), //class comment
    $notif    = $('#notif-content'),
    DPIC      = '<?php echo DPIC?>',
    MEIMG     = '<?php echo MEIMG?>',
    MEPROFILE = '<?php echo MEPROFILE?>',
    MYPROFILE = MEPROFILE + '<?php echo $myusername?>';
    loadingAni= $('#loading'); //Loading Animation 
    
$('.img_more').click(function(event) {
    /* Act on the event */  
    var attr = $(this).attr('ref');
    $('.' + attr).toggle('display');
    //console.log('.'+attr);

});
$('#notif').click(function(event){ //event notif click
   event.preventDefault();
 
    $('.kotak-popup-notif').slideToggle('slow',function(){//toggle down
        $.ajax({
            url: '<?php echo MEURL?>get_notif',
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(r) {
            
            if(r.length > 0 ){
            $.each(r,function(k, v) { //parsing jsondata
               tbl += '<tr class="notif-link" rel="' + v.id_img + '">';
                    tbl += '<td>';
                        tbl += '<img class="notif-profil-foto" src="' +
                        (v.display_picture == '' ? DPIC : MEIMG + v.display_picture ) +' " alt="user photo" />';
                    tbl += '</td>';
                    tbl += '<td>';
                        tbl += '<a href="'+ MEPROFILE + v.username +'">'+ v.username +'</a>';
                        tbl += '<span class="ntf">';

                        if(v.notif_type.substr(0,3) == 'COM'){
                            tbl += 'Mengomentari Foto Anda </br><span style="margin:auto">' + v.notif_content + '</span>'; 

                        }
                        else if(v.notif_type.substr(0,3) == 'LIK'){
                            tbl += 'Menyukai Foto Anda'; 
                        }
                        else if(v.notif_type.substr(0,3) == 'FOL'){
                            tbl += 'Mengikuti Anda';

                        }
                        else{
                             tbl += 'Mengikuti Anda'; 
                        }
                        tbl += '</span>';
                        //(v.notif_type.substr(0,3) == '') + '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                    tbl += '</td>';
                    tbl += '<td class="fl-r mr-7">';
                        tbl += (v.img_thumb == null ? '' : '<img src="'+ MEIMG + v.img_thumb + '" alt="post photo" class="notif-photo">');
                    tbl += '</td>';
                tbl += '</tr>';
                tbl += '<tr>';
                    tbl += '<td colspan="3">';
                    tbl += '<div class="garis-notif"></div>';
                    tbl += '</td>';
                tbl += '</tr>';
                });
            }
            else{
                tbl += '<div style="margin:auto">Anda belum memiliki pemberitahuan</div>';
            }
        loadingAni.hide();
            $('.c').html(tbl);
        //console.log($('.notif-link').attr(rel));
        tbl = "";
            console.log(tbl);
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
            

    });
});

//comment event press enter
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

//upload click event
$('#upload').click(function(e) {
    /* Act on the event */
    e.preventDefault();
     $('#upload_pop').css('display','block');

});

//esc press event
$(document).keyup(function(e) {  
    /* Act on the event */
     if(e.keyCode == 27){
        $('#upload_pop').css('display','none');
        $('.dpb').css('display','none');
        $('#f-icon').removeAttr('class');
        $('#f-icon').attr('class','material-icons first-icon');
        $('#f-icon').removeAttr('style');
        $('#s-icon').removeAttr('status');
        $('#s-icon').removeAttr('class');
        $('#s-icon').attr('class','material-icons click-like r');
        $('#c-like').removeAttr('class');
    }
 });

//mouse click event
$(window).click(function(e) {
    /* Act on the event */
     if(e.pageX <= 182  || e.pageX >= 1183){
        $('#upload_pop').css('display','none');
        $('.dpb').css('display','none');
        $('#f-icon').removeAttr('class');
        $('#f-icon').attr('class','material-icons first-icon');
        $('#f-icon').removeAttr('style');
        $('#s-icon').removeAttr('status');
        $('#s-icon').removeAttr('class');
        $('#s-icon').attr('class','material-icons click-like r');
        $('#c-like').removeAttr('class');

     }
});
//like button click event 
$('.click-like').click(function(event) {
    var $this = $(this);
    var status = $this.attr('status');
    var img = $(this).attr('ref');

    if(typeof status !== typeof undefined && status !== false ){//check apakah attribut ref terdefenisi 
        //fitur like 
    /* Act on the event */
        $.ajax({
            url: '<?php echo MEURL?>unlike/',
            type: 'POST',
            dataType: 'html',
            data: {id: img},
        })
        .done(function(r) {
            $('.ref-'+img).text(r);
           
            $('.first-icon-' + img).show();
            $this.addClass('second-icon');
            $this.removeAttr('status');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
       

    }
    else{
         
        $.ajax({
            url: '<?php echo MEURL?>like/',
            type: 'POST',
            dataType: 'html',
            data: {id: img},
        })
        .done(function(r) {
            $('.ref-'+img).text(r);
            $('.first-icon-' + img).hide();
            $this.addClass('r');
            $this.removeClass('second-icon');
            $this.attr('status','active');
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
   
    
    //alert($(this).attr('ref'));
});
//follow 
$('.btn-white-follow').click(function(event) {

    var id_friend = $(this).attr('rel');
    $this   = $(this);
    /* Act on the event */
    if($this.hasClass('fol')){
        $.ajax({
            url: '<?php echo EYEMEPATH?>' + 'follow',
            type: 'POST',
            dataType: 'JSON',
            data: {id_friend: id_friend},
        })
        .done(function(r) {
            if(r.msg == 'success'){
                $('.following').text(r.following);
                $('.follower').text(r.follower);
                $this.removeClass('fol');
                $this.addClass('unfol');
                $this.text('Mengikuti');
            }
           
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
    else{
         $.ajax({
            url: '<?php echo EYEMEPATH?>' + 'unfollow',
            type: 'POST',
            dataType: 'JSON',
            data: {id_friend: id_friend},
        })
        .done(function(r) {
            if(r.msg == 'success'){
                $('.following').text(r.following);
                $('.follower').text(r.follower);
                $this.removeClass('unfol');
                $this.addClass('fol');
                $this.text('ikuti');
            }
           
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });

    }
    
});
//unlike 
$('#unlike').click(function(event) {
    /* Act on the event */
    alert($(this).attr('ref'));
});
$('#browse').click(function(event) {
    /* Act on the event */
    $('.fileimg').click();
});
/*function readImg(input){
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('.box-up').hide();
            $('.up-pic').css('top','0px');
            $('#show_img').removeClass('hidden');
            $('#show_img').attr('src',e.target.result);

        }
        reader.readAsDataURL(input.files[0]);

    }
}*/
/*$('.fileimg').change(function(event) {
    Act on the event 
    readImg(this);
});*/
/*cropit:: function*/
$(function() {
    $('.image-editor').cropit({
        
        imageBackground: true,
        imageBackgroundBorderWidth: 40,
        minZoom:'fit'

       
    });     

});
//crop::click
$('#crop').click(function(event) {
    /* Act on the event */
    $('.cropit-preview-background-container').hide();
     imageData = $('.image-editor').cropit('export');
    $('.hidden-image-data').val(imageData);
    // Print HTTP request params
    var formValue = $(this).serialize();
    $('#tc').attr('src',decodeURIComponent(imageData));
    //console.log(decodeURIComponent(imageData));

    $('.cropit-preview-image').on('mousedown',function(e){
        e.preventDefault();
        e.stopPropagation();
      });
    $('.fileimg').attr('value',decodeURIComponent(imageData));
    $('#upload-act').removeClass('disable');
    $('#upload-act').removeAttr('disabled');
   // console.log(imageData);

});

   /* $('#browse').submit(function() {
      // Move cropped image data to hidden input
      var imageData = $('.image-editor').cropit('export');
      $('.hidden-image-data').val(imageData);

      // Print HTTP request params
      var formValue = $(this).serialize();
      $('#tc').attr('src',decodeURIComponent(imageData));

      $('#result-data').text(formValue);

      // Prevent the form from actually submitting
      return false;
    });*/
//fileimg::change
$('.fileimg').on('change',function(){

    $('#cancel').removeClass('hidden');
    $('#crop').removeClass('hidden');
    $('.cropit-preview-background-container').show();
    $('.c-p').remove();
     
    $('#browse').hide();
  
});
//cancel::click
$('#cancel').click(function(event) {
    /* Act on the event */
     $('.fileimg').click();
      $('.cropit-preview-image').unbind('mousedown');

     //alert('test');
});

//upload-act::click


$('#upload-act').click(function(event) {
    var imageCaption  = $('.c-caption').val(); 
    event.preventDefault();
    //alert(imageCaption);
    /* Act on the event */
   $.ajax({
        url: '<?php echo base_url()?>eyeme/upload_img',
        type: 'POST',
        dataType: 'HTML',
        data: {imageData: imageData,
                caption: imageCaption},
    })
    .done(function(e) {
        alert(e);
        window.location.replace(MYPROFILE);
        $(this).attr('disabled', 'disable');
        $(this).addClass('disable');
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

    
});
/*
    fungsi get_follow
*/
$('.a-fol').click(function(event) {
    /* Act on the event */
    event.preventDefault();
    ref = $(this).attr('ref');
    split = ref.split('-');
    
});

/*
    fungsi image-detail::

*/
 // obj = JSON.parse('{"img":"http://localhost/eyesoccer/img/eyeme/thumb_05012018013108.jpeg"}');
$('.me-post').click(function(event) {
    var ref  = $(this).attr('ref');

    /* Act on the event */
    $('.dpb').css('display','block');
    //$('#img-det').attr('src',obj.img);
    $.ajax({
        url: '<?php echo MEURL?>get_img',
        type: 'POST',
        dataType: 'JSON',
        data: {id: ref},
    })
    .done(function(r) {
        //console.log(r);
        $.each(r,function(k, v) {
            $('#img-det').attr('src','<?php echo MEIMG?>' + v.img_name);
            $('#usern').text(v.username);
            $('#img-user').attr('src',(v.display_picture === '' ? '<?php echo DPIC?>' : '<?php echo MEIMG?>' + v.display_picture));
            $('#time-string').text(v.timeString);
            $('#c-like').addClass('ref-'+ v.id_img);
            $('#c-like').text(v.countLike);
            $('#f-icon').addClass('first-icon-'+v.id_img);
            $('#s-icon').attr('ref',v.id_img);
            $('.comment').attr('rel',v.id_img);
            //tbl_com += '<table>';
            tbl_com += '<div class="komen">';
            tbl_com += '<ul class="plus-c' + v.id_img + '">';
            $.each(v.comment,function($k,$v){
                //tbl_com += '<tr>';
                    tbl_com += '<li>';
                        tbl_com += '<a href="<?php echo MEPROFILE?>'+ $v.username +'" class="tbl-com">'+ $v.username +'</a>';
                        tbl_com += '<span>' + $v.comment+ '</span>'
                    tbl_com += '</li>';
                //tbl_com += '</tr>';
           });
            tbl_com += '</ul>';
            tbl_com += '</div>';
            //tbl_com += '</table>';
            $('.d-comment').html(tbl_com);
            tbl_com ='';
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

       
    });
   
    
    /*alert($(this).attr('id'));*/
});


/*$('.box-pic').on({
    dragover:function(event){
        event.preventDefault();
        event.stopPropagation();
    },
    dragenter:function(event){
        event.preventDefault();
        event.stopPropagation();
        $(this).css('background-color','lightBlue');
    },
   
    drop:function(e){
        event.preventDefault();
        event.stopPropagation();
        console.log('test');
        alert('test');
    }
})*/

  </script>