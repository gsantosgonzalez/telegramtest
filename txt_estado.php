<?php

$estado = $_POST['estado'];

switch ($estado) {
	case 'coahuila':
		echo "<span class='titulo'>Coahuila</span>";
		echo "<div class='marquee'><a href='".$estado."' target='_blank'>".$estado."</a></div>";
		break;
	case 'veracruz':
		echo "<span class='titulo'>Veracruz</span>";
		echo "<div class='marquee'><a href='".$estado."' target='_blank'>".$estado."</a></div>";
		break;
	case 'edomex':
		echo "<span class='titulo'>Estado de México</span>";
		echo "<div class='marquee'><a href='".$estado."' target='_blank'>".$estado."</a></div>";
		break;
	case 'nayarit':
		echo "<span class='titulo'>Nayarit</span>";
		echo "<div class='marquee'><a href='".$estado."' target='_blank'>".$estado."</a></div>";
		break;
	default:
		// code...
		break;
}