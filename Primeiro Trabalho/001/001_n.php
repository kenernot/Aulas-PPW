	<?php
		$valor1 = $_POST["valor1"];
		$valor2 = $_POST["valor2"];
		//$valor1 = $_POST["valor1"]; 
		//$valor2 = $_POST["valor2"];
		$R = $valor1 + $valor2;
		 if ($R > 20) {
			 $R += 8;
		 } else {
			 $R -= 5;
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
					<?php echo $R; ?>
				</td>
			</tr>
		</table>
	</body>
</html>