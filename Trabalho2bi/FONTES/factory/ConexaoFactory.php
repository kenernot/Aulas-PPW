<?php
	include ("include/connection/config.php"); 
	include("classes/ExceptionConexao.php");
	
	class ConexaoFactory {
		
		
		function getConexao() {
			try {
				return new PDO(CONNECTIONSTRING, USER,PASS);
			} catch (Exception $e) {
				throw new ExceptionConexao();
			}
		}
		
	}

?>