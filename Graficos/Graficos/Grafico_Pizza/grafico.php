<?php
header("Content-type: image/png");

//inclui o arquivo com as configurações
include ('config_grafico.inc.php');

//cria imagem e define as cores
/// função que retorna uma imagem com as dimensões passadas como parâmetros
$imagem = ImageCreate($largura, $altura);
/// Retorna a identificação da cor passada nos parâmetros RGB para poderem ser usadas na imagem
$fundo = ImageColorAllocate($imagem, 236, 226, 226);
$preto = ImageColorAllocate($imagem, 0, 0, 0);
$azul  = ImageColorAllocate($imagem, 0, 0, 255);
$verde = ImageColorAllocate($imagem, 0, 255, 0);
$vermelho = ImageColorAllocate($imagem, 255, 0, 0);
$amarelo = ImageColorAllocate($imagem, 255, 255, 0);

//definição dos dados
$dados = array("Grêmio", "Juventude", "Inter", "Caxias");
$valores = array(280, 140, 120, 70);
$cores = array($azul, $verde, $vermelho, $amarelo);

//cálculo do total
$total = 0;
$num_linhas = sizeof($dados);
for($i=0; $i<$num_linhas; $i++){
	$total += $valores[$i];
}

//desenha o gráfico
/// Função que insere na imagem uma elipse
ImageEllipse($imagem, $centrox, $centroy, $diametro, $diametro, $preto);
/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
ImageString($imagem, 3, 3, 3, "Total: $total pessoas", $preto);

$raio = $diametro/2;
for($i=0; $i<$num_linhas; $i++){
	$percentual = ($valores[$i] / $total) * 100;
	$percentual = number_format($percentual, 2);
	$percentual .= "%";

	$val = 360 * ($valores[$i] / $total);
	$angulo += $val;
	$angulo_meio = $angulo - ($val/2);

	$x_final = $centrox + $raio * cos(deg2rad($angulo));
	$y_final = $centroy + (- $raio * sin(deg2rad($angulo)));

	$x_meio = $centrox + ($raio/2 * cos(deg2rad($angulo_meio)));
	$y_meio = $centroy + (- $raio/2 * sin(deg2rad($angulo_meio)));

	$x_texto = $centrox + ($raio * cos(deg2rad($angulo_meio))) * 1.2;
	$y_texto = $centroy + (- $raio * sin(deg2rad($angulo_meio))) * 1.2;

	/// Função que retorna uma linha baseada nos parâmetros passados
	ImageLine($imagem, $centrox, $centroy, $x_final, $y_final, $preto);
	/// Função que preenche	a imagem com a cor especificada
	ImageFillToBorder($imagem, $x_meio, $y_meio, $preto, $cores[$i]);
	/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
	ImageString($imagem, 2, $x_texto, $y_texto, $percentual, $preto);
	
}

//criação da legenda
if($exibir_legenda == "sim"){
	//acha a maior string
	$maior_tamanho = 0;
	for($i=0; $i<$num_linhas; $i++){
		if(strlen($dados[$i]) > $maior_tamanho){
			$maior_tamanho = strlen($dados[$i]);
		}
	}

	//calcula os pontos de início e fim do quadrado
	$x_inicio_legenda = $lx - $largura_fonte * ($maior_tamanho + 4);
	$y_inicio_legenda = $ly;

	$x_fim_legenda = $lx;
	$y_fim_legenda = $ly + $num_linhas * ($altura_fonte + $espaco_entre_linhas) + 2 * $margem_vertical;
	ImageRectangle($imagem, $x_inicio_legenda, $y_inicio_legenda, $x_fim_legenda, $y_fim_legenda, $preto);

	//começa a desenhar os dados
	for($i=0; $i<$num_linhas; $i++){
		$x_pos = $x_inicio_legenda + $largura_fonte * 3;
		$y_pos = $y_inicio_legenda + $i * ($altura_fonte + $espaco_entre_linhas) + $margem_vertical;

		/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
		ImageString($imagem, $fonte, $x_pos, $y_pos, $dados[$i], $preto);
		/// Função que preenche	a imagem com a cor especificada
		ImageFilledRectangle($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos - $largura_fonte, $y_pos + $altura_fonte,$cores[$i]);
		/// Função que insere no parâmetro de imagem um retângulo com borda (cor passada por parâmetro)
		ImageRectangle($imagem, $x_pos-2*$largura_fonte, $y_pos, $x_pos - $largura_fonte, $y_pos + $altura_fonte, $preto);
	}
}

//Gera a imagem PNG a ser enviada ao navegador
/// Função que retorna a imagem em si
ImagePNG($imagem);

//Libera a memória utilizada
/// Destrói o objeto de imagem
ImageDestroy($imagem);
?>