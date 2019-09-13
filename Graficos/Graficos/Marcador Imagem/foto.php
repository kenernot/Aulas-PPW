<?php
//******variavéis de configuração******
$imagem = "foto.jpg";
$texto = "F E R I A S    V E M    L O G O ! ! !";
$fonte = 3;
$largura_fonte = 7;
$altura_fonte = 11;
$margem_x = 3;
$margem_y = 3;

// 0 = não exibe, 1 = exibe
$superior_esquerdo = 0;
$superior_direito = 0;
$inferior_esquerdo = 1;
$inferior_direito = 0;

//**********************************//
if(!file_exists($imagem)){
	echo "Arquivo da imagem não encontrado!";
	exit;
}

//define largura e altura do texto em pixels
$largura_texto = strlen($texto) * $largura_fonte + 2 * $margem_x;
$altura_texto = $altura_fonte + 2 * $margem_y;

//monta o nome do arquivo resultante
$arquivo_resultante = explode('.', $imagem);
$arquivo_resultante = $arquivo_resultante[0]."_escrito.jpg";


//lê a imagem de origem e obtém suas dimensões
// Função que retorna a imagem vinda de um arquivo
$imagem_origem = ImageCreateFromJPEG($imagem);
$origem_x = ImagesX($imagem_origem) - 1;
$origem_y = ImagesY($imagem_origem) - 1;

//define as cores
/// Retorna a identificação da cor passada nos parâmetros RGB para poderem ser usadas na imagem
$branco = ImageColorAllocate($imagem_origem, 255, 255, 255);
$azul = ImageColorAllocate($imagem_origem, 0, 0, 255);

//escreve o texto nos cantos especificados
if($superior_esquerdo){
	/// Função que preenche	a imagem com a cor especificada
	ImageFilledRectangle($imagem_origem, 0, 0, $largura_texto, $altura_texto, $azul);
	/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
	ImageString($imagem_origem, $fonte, $margem_x, $margem_y, $texto, $branco);
}

if($superior_direito){
	/// Função que preenche	a imagem com a cor especificada
	ImageFilledRectangle($imagem_origem, $origem_x = $largura_texto, 0, $origem_x, $altura_texto, $azul);
	/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
	ImageString($imagem_origem, $fonte, $origem_x - $largura_texto + $margem_x, $margem_y, $texto, $branco);
}

if($inferior_esquerdo){
	/// Função que preenche	a imagem com a cor especificada
	ImageFilledRectangle($imagem_origem, 0, $origem_y - $altura_texto, $largura_texto, $origem_y, $azul);
	/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
	ImageString($imagem_origem, $fonte, $margem_x, $origem_y - $altura_texto + $margem_y, $texto, $branco);
}

if($inferior_direito){
	/// Função que preenche	a imagem com a cor especificada
	ImageFilledRectangle($imagem_origem, 0, $origem_x - $largura_texto, $origem_y - $altura_texto, $origem_x, $origem_y, $azul);
	/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
	ImageString($imagem_origem, $fonte, $margem_x, $origem_x - $largura_texto + $imagem_x, $origem_y - $altura_texto + $margem_y, $texto, $branco);
}

/// Função que retorna a imagem em si e salva em um arquivo
ImageJPEG($imagem_origem, $arquivo_resultante);

//Libera a memória utilizada
/// Destrói o objeto de imagem
ImageDestroy($imagem_origem);

?>
<html>
<head>
	<title>Arquivo Resultante</title>
</head>
<body>
	<h2 align="center"><u>Arquivo Resultante: </u><?php echo $arquivo_resultante;?></h2>
	<p align="center"><img src="<?php echo $arquivo_resultante;?>"></p>
</body>
</html>