
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
    loadingAni= $('#loading'); //Loading Animation 
    
$('.img_more').click(function(event) {
    /* Act on the event */  
    var attr = $(this).attr('ref');
    $('.' + attr).toggle('display');
    //console.log('.'+attr);

});
$('#notif').click(function(event){ //event notif click
   // event.preventDefault();
 
    $('.kotak-popup-notif').slideToggle('slow',function(){//toggle down
        $.ajax({
            url: '<?php echo MEURL?>get_notif',
            type: 'GET',
            dataType: 'JSON',
        })
        .done(function(r) {
            
            if(r.length > 0 ){
            $.each(r,function(k, v) { //parsing jsondata
               tbl += '<tr class="notif-link" rel="' + v.link + '">';
                    tbl += '<td>';
                        tbl += '<img class="notif-profil-foto" src="' +
                        (v.display_picture == '' ? DPIC : MEIMG + v.display_picture ) +' " alt="user photo" />';
                    tbl += '</td>';
                    tbl += '<td>';
                        tbl += '<a href="'+ MEPROFILE + v.username +'">'+ v.username +'</a>';
                        tbl += '<span class="ntf">';

                        if(v.notif_type.substr(0,3) == 'COM'){
                            tbl += 'Mengomentari Foto Anda'; 

                        }
                        else if(v.notif_type.substr(0,3) == 'LIK'){
                            tbl += 'menyukai Foto Anda'; 
                        }
                        else{
                             tbl += 'Mengikuti Anda'; 
                        }
                        tbl += '</span>';
                        //(v.notif_type.substr(0,3) == '') + '</span>';
                        tbl += '<span class="time-notif">'+ v.timeString +'</span>';
                    tbl += '</td>';
                    tbl += '<td class="fl-r mr-7">';
                        tbl += '<img src="'+ MEIMG + v.img_name + '" alt="post photo" class="notif-photo">';
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
        console.log($('.notif-link').attr(rel));
        tbl = "";
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
    /* Act on the event */
    var img = $(this).attr('ref');
       $.ajax({
        url: '<?php echo MEURL?>like/',
        type: 'POST',
        dataType: 'html',
        data: {id: img},
    })
    .done(function(r) {
        $('.ref-'+img).text(r);
        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });
    
    //alert($(this).attr('ref'));
});
//unlike 
$('#unlike').click(function(event) {
    /* Act on the event */
    alert($(this).attr('ref'));
});

</script>