<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Marquee Test</title>
	<link rel="stylesheet" href="">
	<style>
		.marquee {
			width: 300px; /* the plugin works for responsive layouts so width is not necessary */
			overflow: hidden;
			border:1px solid #ccc;
		}
	</style>
</head>
<body>
	<div class="alerts">
	</div>
		
	<button class ="btn" value = "coahuila">Coahuila</button>
	<button class ="btn" value = "veracruz">Veracruz</button>
	<button class ="btn" value = "edomex">Estado de México</button>
	<button class ="btn" value = "nayarit">Nayarit</button>
	<script	src="https://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous">
	</script>
	<script src="//cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js" 
		type="text/javascript">
	</script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'txts.php',
				method: 'GET',
				success: function(response){
					console.log(response);
					$('.alerts').html(response);
					$('.marquee').marquee({duration:10000, gap: 100,delayBeforeStart: 0, direction: 'left',duplicated: true});
				}
			});
			$('.btn').click(function(event){
				event.preventDefault(event);
				texto = $(this).attr('value');
				$.ajax({
					url: 'txt_estado.php',
					method: 'POST',
					data: {
						'estado': texto
					},
					success: function(response){
						$('.alerts').html(response);
						$('.marquee').marquee({duration:10000, gap: 100,delayBeforeStart: 0, direction: 'left',duplicated: true});
					}
				});
			});
		});
	</script>
</body>
</html>