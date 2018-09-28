<?php
	$valor1 = $_POST["valor1"];
	$valor2 = $_POST["valor2"];
	
	for ($i = $valor1; $i < $valor2+1; $i++) {
		if ($i % 2 != 0) {
			echo $i."<br>";
		}
	}
		
?>