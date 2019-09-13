<?php

	class ExceptionPersonalizada extends Exception {
		function __construct() {
			parent::__construct('#Erro da minha ExceptionPersonalizada#');
		}
	}


?>