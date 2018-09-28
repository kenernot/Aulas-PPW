	<?php
		$distancia = $_POST["valor1"];
		$kml = $_POST["valor2"];
		$preco = $_POST["valor3"];
		
		$consumo = $distancia / $kml;
		$total_pagar = $consumo * $preco;
		
	
		
		echo "Consumirá ".$consumo." litros para chegar lá.<br>";
		echo "Gastará R$".$total_pagar." em combustível.";
		
	?>
   