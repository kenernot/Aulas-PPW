<?php
session_start();
//header("Content-Type: text/html; charset=ISO-8859-1",true);

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<SCRIPT LANGUAGE="JavaScript">

//   Função para pegar a data-->


     function startclock () {
        stopclock();
        gettheDate()
        showtime();
    }

	function stopclock (){
		if(timerRunning);
			clearTimeout(timerID);
		timerRunning = false;
	}

	function gettheDate() { 
		Todays = new Date();
		TheDate = "     " + Todays.getDate() +" / "+ (Todays.getMonth() + 1) + " / " + Todays.getFullYear() 
 	    document.clock.date.value = TheDate;
	}

	var timerID = null;

	var timerRunning = false;	
	//  - - - - - - - -  Mostra a Hora-->

	function showtime () {
			var now = new Date();
			var hours = now.getHours();
			var minutes = now.getMinutes();
			var seconds = now.getSeconds()
			var timeValue = "" + ((hours >12) ? hours -12 :hours)

			timeValue += ((minutes < 10) ? ":0" : ":") + minutes
			timeValue += ((seconds < 10) ? ":0" : ":") + seconds
			timeValue += (hours >= 12) ? " P.M." : " A.M."
			document.clock.face.value = timeValue;

			// you could replace the above with this

			// and have a clock on the status bar: 

			// window.status = timeValue;
			timerID = setTimeout("showtime()",1000);
			timerRunning = true;
	} 
	
//   Final do código JavaScript --->

</SCRIPT>
</head>

<body onLoad="startclock()">
<table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td><?php echo $_SESSION["nome"];?></td>
		<td valign="middle"><CENTER><font size="2" face="Verdana, Arial, Helvetica, sans-serif" color="#ffffff"><?php echo 'Adriane Hilda Knob';?>
		<form name="clock" onSubmit="0"><input type=text name="date" size=17 value="" class="form">&nbsp;&nbsp;<input type=text name="face" value="" class="form"></form></font></CENTER></td>
	</tr>
</table>
<div class="menu-container">
    <ul class="menu clearfix">
        <li><a href="#">Cadastros</a>
            <!-- Nível 1 -->
            <!-- submenu -->
            <ul class="sub-menu clearfix">
                <li><a href="#">Usuários</a>
                    <!-- Nível 2 -->
                    <!-- submenu do submenu -->
                    <ul class="sub-menu">
                        <li><a href="#">Incluir</a></li>
                        <li><a href="ajax/buscaNome.html">Editar</a></li>
                    </ul><!-- submenu do submenu -->
                </li>
                <li><a href="#">Funcionários</a>
					<ul class="sub-menu">
						<li><a href="#">Incluir</a></li>
					</ul>
				</li>
                <li><a href="#">Sub</a></li>
                <li><a href="#">Sub</a></li>
                <li><a href="#">Sub</a></li>
                <li><a href="#">Sub</a></li>
            </ul><!-- submenu -->
        </li>
        <li><a href="#">Operações</a></li>
        <li><a href="#">Relatórios</a>
		    <ul class="sub-menu clearfix">
                <li><a href="rel_usu.php">Usuários</a></li>
			</ul>
		</li>
        <li><a href="logoff.php">Sair</a></li>
    </ul>
</div>
</body>