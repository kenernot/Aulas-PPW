<html>
	<head>
	
		<?php
			include("include/head.php");
		?>
		
		<link rel="stylesheet" type="text/css" href="css/loginstyle.css">
		
	</head>
	
	<body>
	
		<?php
			include("include/top.php");
		?>
	
		<div class="wrapper fadeInDown">
		  <div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first mt-2">
			  <h4> Realize seu login </h4>
			</div>

			<!-- Login Form -->
			<form method="POST" action="back/B_Login.php">
			  <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
			  <input type="password" id="pass" class="fadeIn third" name="pass" placeholder="password">
			  <input type="submit" class="fadeIn fourth" value="Log In">
			  <input type="button" class="fadeIn fourth" value="Cadastrar-se">
			</form>
			

		  </div>
		</div>
	
		<?php
			include("include/bottom.php");
		?>
		
	</body>
	
</html>