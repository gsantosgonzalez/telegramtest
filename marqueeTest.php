<?php include('txts.php'); ?>
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
	<!-- <div class='marquee' data-duration='5000' data-gap='10' data-duplicated='true' > -->
		<? get_alerts(); ?>
	<!-- </div> -->
	<button class ="btn" value = "contenido 1">Contenido 1</button>
	<button class ="btn" value = "contenido 2">Contenido 2</button>
	<button class ="btn" value = "contenido 3">Contenido 3</button>
	<button class ="btn" value = "contenido 4">Contenido 4</button>
	<button class ="btn" value = "contenido 5">Contenido 5</button>
	<script	src="https://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous">
	</script>
	<script src="//cdn.jsdelivr.net/jquery.marquee/1.4.0/jquery.marquee.min.js" 
		type="text/javascript">
	</script>
	<script>
		$('.marquee').marquee({duration:10000, gap: 100,delayBeforeStart: 0, direction: 'left',duplicated: true});
		$('.btn').click(function(){
			texto = $(this).attr('value');
			$.ajax({
				url: 'txt_estado.php',
				method: 'GET',
				data: {
					'estado': texto
				},
				beforeSend: {
					$('.marquee')
				}
			});
		});
	</script>
</body>
</html>