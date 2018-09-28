<?php
	$valor1 = $_POST["valor1"];
		
	if ($valor1 >= 0 and $valor1 <=12) {
		echo "Criança";
	} else if ($valor1 > 12 and $valor1 <=18) {
		echo "Adolescente";
	} else if ($valor1 > 18 and $valor1 <=60) {
		echo "Adulto";
	} else if ($valor1 > 60) {
		echo "Idoso";
	} else {
		echo "Ainda não nasceu";
	}
		
?>