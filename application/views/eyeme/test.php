<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<div id="coba">
		cb
	</div>



</body>
<script>
	$('#coba').click(function(event) {
		alert('test');
		/* Act on the event */
		$.ajax({
			url: '<?php echo MEURL ?>get_notif',
			type: 'GET',
			dataType: 'JSON',
			
		})
		.done(function(data) {
			//console.log(data.id_member);
			$.each(data,function(k, v) {
				alert(v.id_member);
			});
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
</script>
</html>
