$(document).ready(function(){
    $("#jadwal").carousel();
    $(".left").click(function(){
        $("#jadwal").carousel("prev");
    });
    $(".right").click(function(){
        $("#jadwal").carousel("next");
    });
	
	// We can attach the `fileselect` event to all file inputs on the page
		$(document).on('change', ':file', function() {
		var input = $(this),
		numFiles = input.get(0).files ? input.get(0).files.length : 1,
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
		});

		// We can watch for our custom `fileselect` event like this
		$(document).ready( function() {
		$(':file').on('fileselect', function(event, numFiles, label) {

		  var input = $(this).parents('.input-group').find(':text'),
			  log = numFiles > 1 ? numFiles + ' files selected' : label;

		  if( input.length ) {
			  input.val(log);
		  } else {
			  // if( log ) alert(log);
		  }

		});
		});
});
$(document).ready(function(){
    $("#epSlide").carousel();
});
$(document).ready(function(){
    $("#topPemain").carousel();
    $(".leftp").click(function(){
        $("#topPemain").carousel("prev");
    });
    $(".rightp").click(function(){
        $("#topPemain").carousel("next");
    });
});
$(window).scroll(function(){
    if ($(window).scrollTop() >= 72) {
    $('.menu').addClass('fixed-header');
    $('nav').addClass('h-142');
    $('.x-m ul ul').addClass('t-65');
    $('.searchbox').addClass('t-65');
    }
    else {
    $('.menu').removeClass('fixed-header');
    $('nav').removeClass('h-142');
    $('.x-m ul ul').removeClass('t-65');
    $('.searchbox').removeClass('t-65');
    }
});
var srcbox = document.getElementById('srcbox');
var src = document.getElementById("src");
var srcS = document.getElementById("srcSub");
var close = document.getElementsByClassName("xclose")[0];
var clickSearch = 0;
src.onclick = function() {
	if(clickSearch == 0){
		srcbox.style.display = "block";
		clickSearch = 1;
	}else{
		srcbox.style.display = "none";
		clickSearch = 0;
	}    
}
srcS.onclick = function() {
    srcbox.style.display = "none";
}
/* close.onclick = function() {
    srcbox.style.display = "none";
} */
window.onclick = function(event) {
    if (event.target == srcbox) {
        srcbox.style.display = "none";
    }
}
$(document).ready(function(){
    $("#topPemain").carousel();
    $(".leftp").click(function(){
        $("#topPemain").carousel("prev");
    });
    $(".rightp").click(function(){
        $("#topPemain").carousel("next");
    });
    $("#profilssb").carousel();
    $(".left4").click(function(){
        $("#profilssb").carousel("prev");
    });
    $(".right4").click(function(){
        $("#profilssb").carousel("next");
    });
    $("#rekom").carousel();
    $(".left1").click(function(){
        $("#rekom").carousel("prev");
    });
    $(".right1").click(function(){
        $("#rekom").carousel("next");
    });
    $("#soccersains").carousel();
    $(".left2").click(function(){
        $("#soccersains").carousel("prev");
    });
    $(".right2").click(function(){
        $("#soccersains").carousel("next");
    });
    $("#videokamu").carousel();
    $(".left3").click(function(){
        $("#videokamu").carousel("prev");
    });
    $(".right3").click(function(){
        $("#videokamu").carousel("next");
    });
    $("#eventsli").carousel();
        $(".left4").click(function(){
            $("#eventsli").carousel("prev");
        });
        $(".right4").click(function(){
            $("#eventsli").carousel("next");
        });
});
