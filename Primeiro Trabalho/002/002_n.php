	<?php
		$valor1 = $_POST["valor1"];
		$por10 = "Não";
		$por5 = "Não";
		$por2 = "Não";
		if ($valor1 % 10 == 0) {
			$por10 = "Sim";
		}
		if ($valor1 % 5 == 0) {
			$por5 = "Sim";
		}
		if ($valor1 % 2 == 0) {
			$por2 = "Sim";
		}		
	?>
	
<html>
	<body>
		<table align="center" border="1"> 
			<tr>
				<td>
					Resultado:
				</td>
				<td>
					<?php echo "Divisivel por 10:".$por10."<br>"."Divisivel por 5:".$por5."<br>"."Divisivel por 2:".$por2; ?>
				</td>
			</tr>
		</table>
	</body>
</html>