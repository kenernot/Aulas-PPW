	<?php
		$valor0 = strtoupper($_POST["valor0"]);
		$valor1 = strtoupper($_POST["valor1"]);
		$valor2 = $_POST["valor2"];
		//$valor1 = $_POST["valor1"]; 
		//$valor2 = $_POST["valor2"];
		$R = 0;
		 if ($valor2 == "A") {
			 $R = 3;
		 } else {
			 $R = 10;
		 }
		$today = getdate();
		$d = $today['mday'];
		$m = $today['mon'];
		$y = $today['year'];
		$RR = $d."/".$m."/".$y;
	?>
	
<html>
	<body>
		<table align="center" border="0"> 
			<tr>
				<td colspan="2">
					BIBLIOTECA UESPAR - FACITEC
				</td>
			</tr>
			<tr>
				<td>
					Data:
				</td>
				<td>
					<?php echo $RR; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<h4>RECIBO DE EMPRESTIMO</h4>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php echo $valor1; ?>
				</td>
			</tr>
			<tr>
				<td>
					Quantidade de dias:
				</td>
				<td colspan="2">
					<?php echo $R; ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br>
					<br>
					<hr></hr>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<h3><?php echo $valor0; ?></h3>
				</td>
			</tr>
		</table>
	</body>
</html>