<?php
//cores e dígitos
$cor_fundo = "preto";
$cor_fonte = "branco";
$cor_borda = "verde";
$digitos = 7;

//dimensões do contador
$x = 54;
$y = 14;

//tamanho da fonte
$fonte = 3;

//define as margens
$margem_x = 3;
$margem_y = 0;

//chama a função que retorna o próximo valor do contador
$contador = RetornaProximoValor($digitos);

//informa ao navegador o tipo de imagem que será retornada
header("Content-type: image/png");

//cria a imagem
/// função que retorna uma imagem com as dimensões passadas como parâmetros
$imagem = ImageCreate($x, $y);

//define as cores
/// Retorna a identificação da cor passada nos parâmetros RGB para poderem ser usadas na imagem
$branco   = ImageColorAllocate($imagem, 255, 255, 255);
$preto    = ImageColorAllocate($imagem, 0, 0, 0);
$verde    = ImageColorAllocate($imagem, 0, 255, 0);
$vermelho = ImageColorAllocate($imagem, 255, 0, 0);
$azul     = ImageColorAllocate($imagem, 0, 0, 255);
$amarelo  = ImageColorAllocate($imagem, 255, 255, 0);

//obtém o identificador das cores escolhidas
$cor_fundo = $$cor_fundo;
$cor_fonte = $$cor_fonte;
$cor_borda = $$cor_borda;

//desenha um retângulo com a cor do fundo
/// Função que insere no parâmetro de imagem um retângulo preenchido com uma cor
ImageFilledRectangle($imagem, 0, 0, $x, $y, $cor_fundo);

//desenha a borda
/// Função que insere no parâmetro de imagem um retângulo com borda (cor passada por parâmetro)
ImageRectangle($imagem, 0, 0, $x-1, $y-1, $cor_borda);

//escreve o valor atual do contador
/// Função que escreve um texto na imagem como parâmetros de fonte (tamanho, valor, cor)
ImageString($imagem, $fonte, $margem_x, $margem_y, $contador, $cor_fonte);

//Gera a imagem PNG a ser enviada ao navegador
/// Função que retorna a imagem em si
ImagePNG($imagem);

//Libera a memória utilizada
/// Destrói o objeto de imagem
ImageDestroy($imagem);

Function RetornaProximoValor($digitos){
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

	$servidor = "localhost";
	$usuario  = "root";
	$senha    = "";
	$banco    = "aulas";

	$con = mysql_pconnect($servidor, $usuario, $senha);
	mysql_select_db($banco);

	$result = mysql_query("select * from contador");
	$total  = mysql_num_rows($result);

	if($total>0){
		$valor = mysql_result($result, 0,0);
		$valor++;
		$result = mysql_query("update contador set valor = $valor");
	}else{
		$valor=1;
		$result = mysql_query("insert into contador values (1)");
	}
	//mysql_close($con);

	while(strlen($valor) < $digitos){
		$valor = "0".$valor;
	}

	return $valor;	
}



?>