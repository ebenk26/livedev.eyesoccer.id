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
                <a href="" id="i-fb">
                    <img class="first" src="<?php echo base_url()?>assets/img/ic_facebook.png" alt="">
                    <img class="scond" src="<?php echo base_url()?>assets/img/ic_facebook_selected.png" alt=""></a>
                <a href="" id="i-tw">
                    <img class="first" src="<?php echo base_url()?>assets/img/ic_twitter.png" alt="">
                    <img class="scond scond-t" src="<?php echo base_url()?>assets/img/ic_twitter-selected.png" alt=""></a>
                <a href="" id="i-in">
                    <img class="first" src="<?php echo base_url()?>assets/img/ic_instagram.png" alt="">
                    <img class="scond" src="<?php echo base_url()?>assets/img/ic_instagram-selected.png" alt=""></a>
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

var html      = "",//html comment 
    tbl       = "",//table notification
    tbl_com   = "",
    $com      = $('.comment'), //class comment
    $notif    = $('#notif-content'),
    $id_member = '<?php echo $id_member?>';
    DPIC      = '<?php echo DPIC?>',
    MEIMG     = '<?php echo MEIMG?>',
    MEPROFILE = '<?php echo MEPROFILE?>',
    IMGSTORE  = '<?php echo IMGSTORE?>';
    MEURL     = '<?php echo MEURL?>';
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
                var tc='';
               tbl += '<tr class="notif-link" rel="' + v.id_img + '">';
                    tbl += '<td>';
                        tbl += '<img class="notif-profil-foto" src="' +
                        (v.display_picture == '' ? DPIC : IMGSTORE + v.display_picture ) +' " alt="user photo" />';
                    tbl += '</td>';

                    if(v.notif_type.substr(0,3) == 'COM'){
                        tbl += '<td onclick="location.href=\'<?php echo MEURL.'img/'?>'+ v.id_img +'\'">';
                        tbl += '<a href="'+ MEPROFILE + v.username +'">'+ v.username +'</a>';
                        tbl += '<span class="ntf">';
                        tbl += 'Mengomentari Foto Anda </br><span style="margin:auto">' + v.notif_content + '</span>'; 
                        tbl += '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                        tbl += '</td>';

                    }
                    else if(v.notif_type.substr(0,3) == 'LIK'){
                        tbl += '<td onclick="location.href=\'<?php echo MEURL.'img/'?>'+ v.id_img +'\'">';
                        tbl += '<a href="'+ MEPROFILE + v.username +'">'+ v.username +'</a>';
                        tbl += '<span class="ntf">';
                        tbl += 'Menyukai Foto Anda'; 
                        tbl += '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                        tbl += '</td>';

                    }
                    else if(v.notif_type.substr(0,3) == 'FOL'){
                        tbl += '<td onclick="location.href=\'<?php echo MEPROFILE?>\'' + v.username +'">';
                        tbl += '<a href="'+ MEPROFILE + v.username +'">'+ v.username +'</a>';
                        tbl += '<span class="ntf">';
                        tbl += 'Mengikuti Anda';
                        tbl += '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                        tbl += '</td>';
                    }
                    else{
                         tbl += 'Mengikuti Anda'; 
                    }
                      
                    tbl += '<td class="fl-r mr-7">';
                        tbl += (v.img_name == null ? '' : '<img src="'+ MEIMG + v.img_name + '" alt="post photo" class="notif-photo">');
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
        html        += "<span>"+ inputS(valCom)+"</span>";
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
$('#upload,.upl').click(function(e) {
    /* Act on the event */
    e.preventDefault();
    //alert('test');
     $('#upload_pop').css('display','block');


});

//esc press event
$(document).keyup(function(e) {  
    /* Act on the event */
     if(e.keyCode == 27){
        $('#upload_pop').css('display','none');
        $('.dpb').css('display','none');
        $('#fol-box').css('display','none');//box follow-list
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
        $('#fol-box').css('display','none');//box follow-list

     }
});
//like button click event 
$('.click-like').click(function(event) {
    var $this = $(this);
    var status = $this.attr('status');
    var img = $(this).attr('ref');
    if($this.data('requestRunning')){
        return;
    }

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
        .complete(function() {
            $this.data('requestRunning',false);
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
class fol{
    constructor(instance,id_friend = null,ref = null){
        this.in = instance;
        this.id_friend = (id_friend == null ? this.in.attr('rel'): this.id_friend);
        this.ref       = ref;
        this.class     = 'fol'; 
        
    }
    wanna_do(){

        if(this.in.hasClass('fol')){
            this.do_fol();
        }
        else{
            this.do_unfol();
        }
    }
    do(){
        /*if(this.ref != null && this.ref== 'followed'){
            do_

        }*/
    }
    do_fol(){
         var $this  = this.in;
         
             $this.data('requestRunning',true);
             $.ajax({
                    url: '<?php echo EYEMEPATH?>' + 'follow',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {id_friend : this.id_friend},
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
                .always(function(){
                    console.log('complete');
                })
               
    }
    do_unfol(){
        var $this  = this.in;
        $.ajax({
                url: '<?php echo EYEMEPATH?>' + 'unfollow',
                type: 'POST',
                dataType: 'JSON',
                data: {id_friend: this.id_friend},
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
          
    }

}

//follow 
$('.btn-white-follow,.btn-fol').click(function(event) {
  // alert($(this));
    var follow = new fol($(this));
    follow.wanna_do();
    
});
//unlike 
$('#unlike').click(function(event) {
    /* Act on the event */
    alert($(this).attr('ref'));
});

function readImg(input){
     var reader = new FileReader();
     reader.onload = function(e){
            $('.box-up').hide();
            $('.up-pic').css({"top":"0px","height":"auto"});
            $('.box-pic').css({"background":"none","border":"none"});
          
            $('#dropzone').attr('src',e.target.result);
            $('#dropzone').css({"background":"none","border-radius":"5px","padding":"5px","background":"#e5e5e5"});

        }
    if(input.files && input.files[0]){
        reader.readAsDataURL(input.files[0]);
    }
    else{    
        reader.readAsDataURL(input);    
    }
}
$('.fileimg').change(function(event) {
   //Act on the event 
    readImg(this);

});
/*cropit:: function*/
/*$(function() {
    $('.image-editor').cropit({
        
        imageBackground: true,
        imageBackgroundBorderWidth: 40,
        minZoom:'fit'

       
    });     

});*/
//crop::click
/*$('#crop').click(function(event) {
   
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

});*/

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

    $('.c-p').remove();
     
    $('#browse').hide();
  
});
$('#dropzone').click(function(){
     $('.fileimg').click();

});
//cancel::click
$('#cancel').click(function(event) {
    /* Act on the event */
     $('.fileimg').click();
      $('.cropit-preview-image').unbind('mousedown');

     //alert('test');
});

/*
    fungsi get_follow
*/
$('.a-fol').click(function(event) {
    var tbl_fol = '';
    /* Act on the event */
    event.preventDefault();
   attr   = $(this).attr('ref');
    split  = attr.split('-');
    ref    = split[0];
    id     = split[1];

     
    $.ajax({
        url: '<?php echo MEURL?>get_follow',
        type: 'GET',
        dataType: 'JSON',
        data: {data:ref,id:id},
    })
    .done(function(r) {
        $('#fol-box').css('display','block');
        
        $.each(r,function(k,v){
            tbl_fol += '<tr>';
                tbl_fol += '<td>';
                     tbl_fol += '<div class="me-img">';
                        tbl_fol += '<img src="' + 
                            (v.profile_pic == '' ? 
                            '<?php echo DPIC?>': 
                            '<?php echo IMGSTORE?>' + v.profile_pic) + '" alt="' + v.profile_pic +'" class="w-100">';
                     tbl_fol += '</div>';
                tbl_fol += '</td>';
                tbl_fol += '<td>';
                    tbl_fol += '<a href="' + '<?php echo MEPROFILE?>' + v.username + '"> '+ v.username + '</a>';
                tbl_fol += '</td>';
                tbl_fol += '<td>';
                    tbl_fol += v.btnFol;
                tbl_fol += '</td>';
            tbl_fol += '</tr>';


        });
    
        $('#tbl-fol').html(tbl_fol);
        //tbl_fol  += 
    })  
});
function folclick($ref,ref){
    var $split = $ref.split('i');
    var $thisId = $split[1];
    var $this  = $('#'+$ref);
    if(ref == 'followed'){
        $.ajax({
            url: '<?php echo MEURL?>unfollow',
            type: 'POST',
            dataType: 'JSON',
            data: {id_friend: $thisId},
        })
        .done(function(r) {
            if(r.msg == 'success'){
                $this.removeClass('unfol');
                $this.addClass('fol');
                $this.text('ikuti');
                $this.attr('onclick','folclick(this.id,\'notfollowed\')');
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
            url: '<?php echo MEURL?>follow',
            type: 'POST',
            dataType: 'JSON',
            data: {id_friend: $thisId},
        })
        .done(function(r) {
            
            if(r.msg == 'success'){
                $this.removeClass('fol');
                $this.addClass('unfol');
                $this.text('mengikuti');
                $this.attr('onclick','folclick(this.id,\'followed\')');
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
        
   

    //$('#' + $ref).hide();
  
    /*$.ajax({
        url: '/path/to/file',
        type: 'default GET (Other values: POST)',
        dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
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
    });*/
    
}

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
        console.log(r);
        $.each(r,function(k, v) {
            $('#img-det').attr('src','<?php echo MEIMG?>' + v.img_name);
            $('.usern').text(v.username);
            $('.usern').attr('href',MEPROFILE + v.username);
            $('.cap').text(v.img_caption);
            $('#img-user').attr('src',(v.display_picture === '' ? '<?php echo DPIC?>' : '<?php echo IMGSTORE?>' + v.display_picture));
            $('#time-string').text(v.timeString);
            $('#c-like').addClass('ref-'+ v.id_img);
            $('#c-like').text(v.countLike);
            $('#f-icon').addClass('first-icon-'+v.id_img);
            $('#s-icon').attr('ref',v.id_img);
            $('.comment').attr('rel',v.id_img);
           
            if(v.id_member === v.self){

                $('.del-icon').html('<i class="material-icons " id="del" onclick="discard_img(' + v.id_img +',3)" >delete</i>');
                       
                }
            else{
                 $('.del-icon').html('');
            }
                
            
            //tbl_com += '<table>';
            tbl_com += '<div class="c-title">Komentar</div>';
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
function discard_img(id,more = 1){
    var c = confirm('yakin ingin menghapus gambar ? ');
    if(c == true){
        $.ajax({
        url: '<?php echo MEURL?>discard_post',
        type: 'POST',
        dataType: 'JSON',
        data: {id_img: id},
        })
        .done(function(r) {
            alert(r.msg);
            location.reload();
           
           
            
        })
        .fail(function() {
            //console.log("error" + e);
        })
        .always(function() {
            console.log("complete");
        });

    }
    
    
}
$(function(){
    $('.box-pic').on('dragenter',function(e){

        e.stopPropagation();
        e.preventDefault();

        $(this).css('background','#e5e5e5');
    })
     $('.box-pic').on('dragover',function(e){
           e.stopPropagation();
        e.preventDefault();
        $(this).css('background','#e5e5e5');
    })
      $('.box-pic').on('drop',function(e){
       // $('.fileimg').val(e);
        e.stopPropagation();
        e.preventDefault();
        readImg(e.originalEvent.dataTransfer.files[0]);
        $(this).css('background','green');
        $('.fileimg').change();
        console.log(e.originalEvent.dataTransfer.files);
        
    })

});


var dropzone = $("#dropzone"),
    input    = dropzone.find('input');

dropzone.on({
    dragenter : dragin,
    dragleave : dragout
});

input.on('change', drop);
input.on('change',function(){
      $('.uplda').css('margin-top','0px');
  });

function dragin(e) { //function for drag into element, just turns the bix X white
    $(dropzone).addClass('hover');
}

function dragout(e) { //function for dragging out of element                         
    $(dropzone).removeClass('hover');
}

function drop(e) {
    var file = this.files[0];
    
    $('#dropzone').removeClass('hover').addClass('dropped').find('img').remove();
  
    // upload file here
    showfile(file); // showing file for demonstration ... 
}

function showfile(file) {
    var reader = new FileReader(file);
    reader.readAsDataURL(file);

    reader.onload = function(e) {
        $('#dropzone div').html($('<img />').attr('src', e.target.result).fadeIn());
    }
}
function inputS(text) {
  var map = {
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    '"': '&quot;',
    "'": '&#039;',
    
  };

  return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}
  </script>