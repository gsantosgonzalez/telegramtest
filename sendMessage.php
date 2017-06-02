<?php

include('telegram/src/Autoloader.php');

$texto = isset($_GET['texto']) ? $_GET['texto'] : null;
$texto = str_replace('/', '', $texto);

function sendMessage($text){
	$bot = new Telegram\Bot('387329418:AAHabsKlveb5W-d_V9c3wWCxBxdL5fo67Ro', 'popmsg', 'popmsgbot');
	$reciever = new Telegram\Receiver($bot);
	if ( $reciever->send->chat('366293472')->text($text)->send() ){
		return 2;
	}
	else {
		return 0;
	}
}

echo sendMessage($texto);

?>