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
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					
			// alert( e.target.result);
					$('.blah').attr('src', e.target.result);
					//$("#profil_pic_button").hide();
					$("#submit_pic").show();
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		
		$("#file_pic").change(function(){
			//alert($(this).val());
			//$("#submit_pic").show();
			readURL(this);
		});
		
		$('#reg_form_player').bootstrapValidator({
			// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
			/* feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			}, */
			fields: {
			 
				
			player_id: {
					validators: {
						notEmpty: {
							message: 'Pemain tidak boleh kosong.'
						}
					}
				},
				file_ibukandung: {
					validators: {
						notEmpty: {
							message: 'Nama ibu tidak boleh kosong.'
						}
					}
				},
				file_ktp: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				file_kk: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				file_akte: {
					validators: {
						notEmpty: {
							message: 'File tidak boleh kosong.'
						},
					}
				},
				
				}
		}).on('success.form.bv', function(e) {

			  alert("tes");
		   // $('#success_message').slideDown({ opacity: "show" }, "slow");
			$('#submit-button').removeAttr("disabled");

			
		});
		
		$("[name=player_id]").focusin(function(){
			if($("[name=player_id]").val()!=""){
				// alert();
				// $("#form_verification_player").show();
			}else{
				// $("#form_verification_player").hide();
			}
		});
		
		$(".auto").autocomplete({
			source: "search_player",
			minLength: 3
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
var close = document.getElementsByClassName("close")[0];
src.onclick = function() {
    srcbox.style.display = "block";
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