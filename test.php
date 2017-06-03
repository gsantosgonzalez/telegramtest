<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mensajes</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
		date_default_timezone_set("America/Mexico_City"); 
		echo ceil(time()/(60*60*24*12*365))+5;
		echo " : ";
		echo ceil(time()/(100*60*60*24*12*365));
		echo "<br>"; 
	?>
	<div class="wrapper">
		<div class="feedback"></div>
		<div class="messages">
			<div class = lista></div>
		</div>
		<div class="sendMessage">
			<input type="text" name = "texto" placeholder="Ingresa el mensaje">
			<button class = "btnSend">Enviar</button>
		</div>
	</div>
	<script	src="https://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous">
	</script>
	<script>
		$(document).ready(function() {

			$('.btnSend').on('click', function() {
				texto = $('input[name="texto"]').val();
				$.ajax({
					url: 'sendMessage.php',
					method: 'GET',
					data: {
						'texto': texto
					},
					success: function(response) {
						if(response == 1){
							$('input[name="texto"]').val('');
							$('.lista').append('<p class = "message">From: PopGroup - "'+texto+'"</p>');
						}
						else {
							$('input[name="texto"]').val('');
							$('.feedback').show('linear');
							$('.feedback').append('<p>El mensaje no ha sido enviado</p>');
							setTimeout(function() {
								$('.feedback').hide('swing');
							}, 3000)
						}
					}
				});
			});

			(function reloader(){
				$.ajax({
					url: 'https://api.telegram.org/bot387329418:AAHabsKlveb5W-d_V9c3wWCxBxdL5fo67Ro/getUpdates',
					method: 'GET',
					success: function(response){
						$('.lista').empty();
						$.each(response.result, function(index, val) {
							if(val.message.text !== 'undefined'){
								$('.lista').append('<div class =message><small>'+val.message.from.first_name+' dice: </small>\
														<p>'+val.message.text+'</p></div>');
							}
							else {
								$('.lista').append('<p class = "message">From: '+val.message.from.first_name+' - "'+twemoji.parse(val.message.sticker.emoji)+'"</p>');
							}
						});
					},
					complete: function() {
						setTimeout(reloader, 5000);
					}
				});
			})();
		});
	</script>
</body>
</html>
