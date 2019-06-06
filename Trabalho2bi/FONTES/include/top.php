    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Trabalho 2 bi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link" href="Cidade.php">Cidade</a> </li>
                <li class="nav-item"> <a class="nav-link" href="Estado.php">Estado</a> </li>
                <li class="nav-item"> <a class="nav-link" href="Usuario.php">Usuario</a> </li>
            </ul>
        </div>
		
		<div class="text-light">
			<?php
				if (ISSET($_SESSION["user"])) {
					echo $_SESSION["user"]."(".$_SESSION["nivel"].")";
				}
			?>
		</div>
    </nav>