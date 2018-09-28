	<?php
		$nome = $_POST["nome"];
		$sexo = $_POST["sexo"];
		$idade = $_POST["idade"];
		$aceita = "NÃO ACEITA";
		
		if ($sexo == "F" && $idade < 25) {
			$aceita = "ACEITA";
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
					<?php echo $nome.": ".$aceita;?>
				</td>
			</tr>
		</table>
	</body>
</html>