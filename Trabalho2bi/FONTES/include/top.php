    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Trabalho 2 bi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
				<?php 
					if (ISSET($_SESSION["nivel"]) && $_SESSION["nivel"] == "9") {
						echo "<li class='nav-item'> <a class='nav-link' href='Cidade.php'>Cidade</a> </li>";
						echo "<li class='nav-item'> <a class='nav-link' href='Estado.php'>Estado</a> </li>";
						echo "<li class='nav-item'> <a class='nav-link' href='Usuario.php'>Usuario</a> </li>";
					}
				?>
            </ul>
        </div>
		
		<div class="text-light">
			<?php
				if (ISSET($_SESSION["user"])) {
					echo $_SESSION["user"]."(".$_SESSION["nivel"].")";
					echo "<a href='back/B_Logout.php' class='btn btn-danger mr-2 ml-3'>Logout</a>";
				} else {
					echo "<a href='Login.php' class='btn btn-success mx-2'>Login</a>";
				}
			?> 
		</div>
    </nav>