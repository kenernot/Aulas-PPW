<?php

	class ExceptionConexao extends Exception {
		function __construct() {
			parent::__construct('Erro na conexão com o banco');
		}
	}


?>