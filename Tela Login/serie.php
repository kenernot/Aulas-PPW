<?php
	
		
	// Inicia sessões 
	session_start(); 
	 
	// Verifica se existe os dados da sessão de login 
	if(!isset($_SESSION["nome"]) || !isset($_SESSION["secretaria"])) { 
		// Usuário não logado! Redireciona para a página de login 
		header("Location: login.php"); 
		exit; 
	} 

	include('inc/conecta.inc.php');

	$sql = "select * from secretarias;";
	$query = mysql_query($sql,$conexao);
 ?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Vanderlei Rogge">
    <meta http-equiv="content-language" content="pt-br">
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
    <title>SMEM - SERIE</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/typicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	

</head>

<body>
    <nav class="navbar navbar-default" style="margin-top:10px;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html" style="width:200px;height:auto;"><img class="img-responsive" src="assets/img/logo.png" style="width:164px;margin:0 0 0 0;padding:0px;"></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-left">
                    <li role="presentation"><a href="index.html">Home </a></li>
                    <li class="dropup"><a class="dropdown-toggle hidden" data-toggle="dropdown" aria-expanded="false" href="#">Informação <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li role="presentation"><a href="#">Organização </a></li>
                            <li role="presentation"><a href="#">Palestrantes </a></li>
                            <li role="presentation"><a href="#">Programação </a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a class="hidden" href="#">Conhe�a </a></li>
                    <li role="presentation"><a class="hidden" href="#">Notícias </a></li>
                    <li class="hidden" role="presentation"><a href="#">Galeria </a></li>
                    <li role="presentation"><a href="contato.html">S&eacuterie </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <ol class="breadcrumb">
        <li><a href="index.html"><span>Home</span></a></li>
        <li class="active"><span>S&eacuterie </span></li>
    </ol>
    <div class="container">
        <div class="jumbotron" style="background-color:#eef4f7;">
            <div class="row">
                <div class="col-md-9">
                    <h1>S&EacuteRIE </h1>
                    <p>Preencha todos os dados com aten&ccedil;&atilde;o.</p>
                </div>
                <div class="col-md-3"><img src="assets/img/contato-icon-132px.png" width="100px"></div>
            </div>
        </div>
        <div class="row contato">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                <form action="contato.php" method="post">

                    <div class="row">
						<div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="form_nome">S&eacuterie *</label>
                                <input class="form-control" type="text" name="form_nome" required="" placeholder="Digite o nome da série" maxlength="50" style='text-transform: uppercase;'>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="form_nome">Secretaria *</label>
                                <select class='form-control select2' name='escola' id="escola" style='width: 100%; text-transform: uppercase;' onchange="serie_json.php">
											<?php
                                        	while ($row = mysql_fetch_array($query, MYSQL_NUM)) {
												//echo $row[0] .  $row[1] .'<br>';
												echo '<option value='.$row[0].'>'.$row[1].'</option>';
											}
											?>

                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">Enviar </button>
                        </div>
                    </div>
                </form>
				
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
				<script type="text/javascript">
				  google.load("jquery", "1.4.2");
				</script>
				
				<script type="text/javascript">
				$(function(){
					$('#escola').change(function(){
						if( $(this).val() ) {
							$.getJSON('serie_json.php?search=',{escola: $(this).val(), ajax: 'true'}, function(j){
								var options;
								for (var i = 0; i < j.length; i++) {
									options += '<option value="' + j[i].id + '">' + j[i].descricao + '</option>';
								}	
								$('#serie').html(options).show();
							});
						} else {
							$('#serie').html('<option value="">– VAZIO -</option>');
						}
					});
				});
				
				</script>
			
				
            </div>
        </div>
    </div>
    <div></div>
    <div class="footer-basic" style="background-color:rgb(34,34,34);">
        <footer style="color:rgb(255,255,255);">
            <div class="social"><a href="https://www.facebook.com/semedmaraba" target="_blank"><i class="icon ion-social-facebook"></i></a>
                <p>facebook </p>
            </div>
            <p class="lead copyright"><a href="https://www.facebook.com/semedmaraba" target="_blank" style="color:rgb(255,255,255);">Desenvolvido por Prefeitura de Marab&aacute; </a></p>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>