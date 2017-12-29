
<!--img upload-->
    <div class="detail-post-box" id="upload_pop" style="display:none">
        <?php echo form_open_multipart(MEURL.'upload_img',array('name'=> 'uploadform'))?>
        <div class="takepic-box m-0 p-r">
            <div class="pic-l">
                <div class="container ">
                    <div class="image-editor" >
                        <input type="file" class="cropit-image-input fileimg hidden" name="img">
                        <div class="cropit-preview box-pic">
                            <div class="up-pic tx-c p-r ">
                             
                                <ul class="box-up">
                                    <li>
                                        <i class="material-icons">cloud_upload</i>
                                    </li>
                                    <li>
                                        <span>Seret Fotomu Disini</span>
                                        
                                    </li>
                                    <li>
                                        <span>Atau</span>
                                    </li>
                                    <li>
                                        <button class="btn-browse" type="button" style="z-index: 999" id="browse">Pilih file</button>
                                    </li>
                                </ul>
                               

                            </div>
                            <div class="container rsz mt-10">
                                <div id="slidecontainer">
                                    <input type="range" min="1" max="100" value="1" class="slider cropit-image-zoom-input" id="myRange">
                                </div>
                                <button class="btn-danger hidden" id="cancel" type="button">Pilih File</button>
                                <button class="pull-right btn-browse hidden" id="crop" type="button">Potong</button>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pic-r p-r">
                <div class="container com-tag">
                    <ul>
                        <li><span>Keterangan </span></li>
                        <li><input type="text" placeholder="Tuli Keterangan disini..." name="caption" class="c-caption"></li>
                        <li></li>
                        <!--<li><span>Tag</span></li>
                        <li><input type="text" placeholder="Gunakan @ untuk menyebut teman" class="input2"></li>
                        <li></li>
                        <li><span>Lokasi</span></li>
                        <li><input type="text" placeholder="Ketik lokasimu" class="input2"></li>
                        <li></li>
                        <li></li>
                        <li></li>-->
                        <li><button class="btn-me-submit fl-r disable" type="submit" id="upload-act" disabled="disabled">Kirim</button></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--/img-upload-->
    <!--<script src="<?php #echo JSPATH?>home.js"></script>-->
    <script src="<?php echo JSPATH?>sw.js"></script>
    <script type="text/javascript">
 /*
    * Eyeme js v.0.0.1
    * author : sofyan waldy

*/
var html      = "",//html comment 
    tbl       = "",//table notification
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
                            tbl += 'Mengomentari Foto Anda </br><i style="margin:auto">' + v.notif_content + '</i>'; 

                        }
                        else if(v.notif_type.substr(0,3) == 'LIK'){
                            tbl += 'Menyukai Foto Anda'; 
                        }
                        else{
                             tbl += 'Mengikuti Anda'; 
                        }
                        tbl += '</span>';
                        //(v.notif_type.substr(0,3) == '') + '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                    tbl += '</td>';
                    tbl += '<td class="fl-r mr-7">';
                        tbl += '<img src="'+ MEIMG + v.img_thumb + '" alt="post photo" class="notif-photo">';
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
    }
 });

//mouse click event
$(window).click(function(e) {
    /* Act on the event */
     if(e.pageX <= 182  || e.pageX >= 1183){
        $('#upload_pop').css('display','none');

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
        exportZoom: 1.25,
        imageBackground: true,
        imageBackgroundBorderWidth: 40,
        zoom:.75
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