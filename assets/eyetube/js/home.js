$(document).ready(function(){
    $("#jadwal").carousel();
    $(".left").click(function(){
        $("#jadwal").carousel("prev");
    });
    $(".right").click(function(){
        $("#jadwal").carousel("next");
    });
});
$(document).ready(function(){
    $("#epSlide").carousel();
});
$(document).ready(function(){
    $("#topPemain").carousel();
    $(".left").click(function(){
        $("#topPemain").carousel("prev");
    });
    $(".right").click(function(){
        $("#topPemain").carousel("next");
    });
    $("#profilssb").carousel();
    $(".left").click(function(){
        $("#profilssb").carousel("prev");
    });
    $(".right").click(function(){
        $("#profilssb").carousel("next");
    });
    $("#rekom").carousel();
    $(".left").click(function(){
        $("#rekom").carousel("prev");
    });
    $(".right").click(function(){
        $("#rekom").carousel("next");
    });
    $("#soccersains").carousel();
    $(".left").click(function(){
        $("#soccersains").carousel("prev");
    });
    $(".right").click(function(){
        $("#soccersains").carousel("next");
    });
    $("#videokamu").carousel();
    $(".left").click(function(){
        $("#videokamu").carousel("prev");
    });
    $(".right").click(function(){
        $("#videokamu").carousel("next");
    });
});
$(window).scroll(function(){
    if ($(window).scrollTop() >= 72) {
    $('.menu').addClass('fixed-header');
    $('nav').addClass('h-142');
    $('.x-m ul ul').addClass('t-54');
    $('.searchbox').addClass('t-54');
    $('.fill').addClass('fill-red');
    $('.t-30>table>tbody>tr>td:nth-of-type(odd)').addClass('fill-red');
    }
    else {
    $('.menu').removeClass('fixed-header');
    $('nav').removeClass('h-142');
    $('.x-m ul ul').removeClass('t-54');
    $('.searchbox').removeClass('t-54');
    $('.fill').removeClass('fill-red');
    $('.t-30>table>tbody>tr>td:nth-of-type(odd)').removeClass('fill-red');
}
});
var srcbox = document.getElementById('srcbox');
var src = document.getElementById("src");
var srcS = document.getElementById("srcSub");
var close = document.getElementsByClassName("close")[0];
src.onclick = function() {
    srcbox.style.display = "block";
}
srcS.onclick = function() {
    srcbox.style.display = "none";
}
close.onclick = function() {
    srcbox.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == srcbox) {
        srcbox.style.display = "none";
    }
}
// $('#kal').datepicker({
//     inline: true,
//     altField: '#ind'
// });

// $('#ind').change(function(){
//     $('#kal').datepicker('setDate', $(this).val());
// });