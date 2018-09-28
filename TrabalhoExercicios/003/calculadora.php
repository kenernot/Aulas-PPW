	<?php
		$infos[0]	=	$_POST["valor1"];
		$infos[1]	=	$_POST["valor2"];
		$infos[2]	=	$_POST["operacao"];
		
		$R = 0;
		
		switch ($infos[2]) {
			case "+": $R = $infos[0] + $infos[1];
			break;
			
			case "-": $R = $infos[0] - $infos[1];
			break;
			
			case "/": $R = $infos[0] / $infos[1];
			break;
			
			case "*": $R = $infos[0] * $infos[1];
			break;
		}
		
		echo $R;
		
	?>
   