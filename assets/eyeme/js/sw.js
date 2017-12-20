/*
    * Eyeme js v.0.0.1
    * author : sofyan waldy

*/
var html = "";
var $com = $('.comment'); //class comment
    
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
         $('#upload_pop').css('display','none');
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
