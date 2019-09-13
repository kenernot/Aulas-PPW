<?php

	function gerarGrafico($legendas, $valores) {
		$valorMaximo = 0;
		// pega o valor maximo entre os valores
		for ($i = 0; $i < count($valores); $i++) {
			if ($valores[$i] > $valorMaximo) {
				$valorMaximo = $valores[$i];
			}
		}
		// cria as dimensoes baseada na quantidade e valor de dados
		$h = ($valorMaximo)*1.2;
		$w = (((count($valores))*50)+(((count($valores))-1)*25))*1.2;
		
		// cria a imagem
		$image = ImageCreate($w,$h);
		
		// pega as cores que serão usadas
		$branco = ImageColorAllocate($image, 254, 254, 254);
		$preto = ImageColorAllocate($image, 0, 0, 0);
		$azul = ImageColorAllocate($image, 0, 0, 255);
		
		// Cria o fundo branco inicial
		ImageFilledRectangle($image, 0, 0, $w, $h, $branco);
		
		$ultimo = $w*0.10;
		for ($i = 0; $i < count($valores); $i++) {
			
			ImageFilledRectangle($image,  $ultimo, ($h-$valores[$i]), ($ultimo+50), ($h*0.90),$azul);
			ImageString($image, 5, $ultimo, ($h*0.90)+5, $legendas[$i], $preto);	
			ImageString($image, 5, $ultimo, ($h-$valores[$i])-20, $valores[$i], $preto);	
			
			$ultimo += 75;
		}
		
		
		//Cria a linha
		ImageLine($image, ($w*0.05), ($h*0.90), ($w*0.95), ($h*0.90), $preto);
		
		return ImagePNG($image);
		ImageDestroy($image);
	}
	
	header("Content-type: image/png");

	$leg = array("2000", "2005", "2010", "2015", "2020");
	$val = array(200, 500, 750, 444, 267);
	
	gerarGrafico($leg,$val);

?>