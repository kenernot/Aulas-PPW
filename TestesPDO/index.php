<?php
	include("connection\config.php");
	try {
		$con = new PDO($connectionString, USER, PASS);
		$con->exec("");
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>