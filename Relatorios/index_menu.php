<?php
session_start();

header("Content-Type: text/html; charset=ISO-8859-1",true);

echo $_SESSION["nome"];
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Menu 1</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>


<ul id="menu-bar">
 <li><a href="#">Cadastros</a>
  <ul>
   <li><a href="form5.php">Usu�rios</a></li>
   <li><a href="#">Products Sub Menu 2</a></li>
   <li><a href="#">Products Sub Menu 3</a></li>
   <li><a href="#">Products Sub Menu 4</a></li>
  </ul>
 </li>
 <li><a href="#">Opera��es</a>
  <ul>
   <li><a href="up_arquivo.php">Arquivo</a></li>
   <li><a href="#">Services Sub Menu 2</a></li>
   <li><a href="#">Services Sub Menu 3</a></li>
   <li><a href="#">Services Sub Menu 4</a></li>
  </ul>
 </li>
 <li><a href="#">Relat�rios</a>
   <ul>
   <li><a href="rel_usu.php">Relat�rio de Usu�rios</a></li>
   <li><a href="#">Services Sub Menu 2</a></li>
   <li><a href="#">Services Sub Menu 3</a></li>
   <li><a href="#">Services Sub Menu 4</a></li>
  </ul>
</li>
 <li><a href="sair.php">Sair</a></li>
</ul>