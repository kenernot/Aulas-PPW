	<?php
		$valor1 = $_POST["valor1"];
		
		$mes = "";
		
		switch ($valor1) {
			case 1: $mes = "JANEIRO";
				break;
			case 2: $mes = "FEVEREIRO";
				break;
			case 3: $mes = "MARCO";
				break;
			case 4: $mes = "ABRIL";
				break;
			case 5: $mes = "MAIO";
				break;
			case 6: $mes = "JUNHO";
				break;
			case 7: $mes = "JULHO";
				break;
			case 8: $mes = "AGOSTO";
				break;
			case 9: $mes = "SETEMBRO";
				break;
			case 10: $mes = "OUTUBRO";
				break;
			case 11: $mes = "NOVEMBRO";
				break;
			case 12: $mes = "DEZEMBRO";
				break;
			default: $mes = "MES INVALIDO";
				break;
		}
		
		
		echo $mes;
	?>
   