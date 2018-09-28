<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Exemplo Conexão no Banco de Dados com Login</title>


	<style type="text/css">

		body {
			background-color:#ffffff;
			font:12px Arial, Helvetica, sans-serif;
			margin:0;
			padding:0;
		}
		.login {
			position:absolute;
			top:50%;
			left:50%;
			margin-top:-100px;
			margin-left:-180px;
			color:#FFF;
			font-weight:700;
		}

	</style>

</head>

<script language="JavaScript" type="text/javascript">
<!--
	function doNumber(){
		var whichcode = window.event.keyCode;
		if (whichcode < 48) whichcode = 0;
		if (whichcode > 57) whichcode = 0;
		window.event.keyCode = whichcode;
	}

	function verifica() {
	////// Verifica o campo NOME
		var str = document.login.usuario.value
		if (str.length > 10) {
			alert("O campo USUÁRIO está limitado a 10 caracteres");
			document.login.usuario.focus();
			return false;
		}
		if (str == "") {
			alert("O campo USUÁRIO está em branco.\nPor favor entre com o USUÁRIO.");
			document.login.usuario.focus();
			return false;
		}

	////// Verifica o campo SENHA
		var str = document.login.senha.value
		if (str.length > 10) {
			alert("O campo SENHA está limitado a 10 caracteres")
			document.login.senha.focus();
			return false;
		}
		if (str == "") {
			alert("O campo SENHA está em branco.\nPor favor entre com o SENHA.")
			document.login.senha.focus();
			return false;
		}

		return true
	}

//-->
</script>

<body topmargin="0" leftmargin="0">
<form action="login.php" method="post" name="login" id="login" onsubmit="return verifica();">
<table width="380" border="0" cellspacing="0" cellpadding="0" align="center" class="login">
  <tr> 
    <td width="380"><p align="center"><font face="tahoma,Verdana,Geneva,Arial,Helvetica,sans-serif" size="6" color="#CC0000"><strong>Sistema</strong></font></p>
  </tr>
  <tr>
    <td><table width="200" align="center" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="8" valign="top" background="imagens/fundo.gif"><img src="imagens/cse.gif" width="8" height="15" border="0" alt=""></td>
          <td height="23" align="center" valign="middle" background="imagens/fundo.gif"></td>
          <td width="8" valign="top" background="imagens/fundo.gif"><img src="imagens/csd.gif" width="8" height="15" border="0" alt=""></td>
        </tr>
        <tr> 
          <td background="imagens/me.gif"></td>
          <td align="center" valign="middle"> <table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td colspan="3" height="12"></td>
              </tr>
              <tr> 
                <td align="right"><span class="campo_nome">Usuário:</span></td>
                <td width="5"></td>
                <td align="left"><input class="campo" type="text" name="usuario" size="10" maxlength="10" onkeypress="doNumber();"></td>
              </tr>
              <tr>
                <td colspan="3" height="12"></td>
              </tr>
              <tr> 
                <td align="right"><span class="campo_nome">Senha:</span></td>
                <td width="5"></td>
                <td align="left"><input class="campo" type="password" name="senha" size="10" maxlength="10"></td>
              </tr>
              <tr>
                <td colspan="3" height="12"></td>
              </tr>
              <tr> 
                <td colspan="3" height="10" align="center"> <input type="submit" name="entrar" value="   Entrar   " class="botao"> 
                </td>
              </tr>
              <tr>
                <td colspan="3" height="12"></td>
              </tr>
            </table></td>
          <td background="imagens/md.gif"></td>
        </tr>
        <tr> 
          <td width="8" valign="top"><img src="imagens/cie.gif" width="8" height="8" border="0" alt=""></td>
          <td height="5" align="center" valign="middle" background="imagens/mb.gif"></td>
          <td width="8" valign="top"><img src="imagens/cid.gif" width="8" height="8" border="0" alt=""></td>
        </tr>
      </table>
      <div align="center"></div></td>
  </tr>
</table>
</form>
<p>&nbsp; </p>
<p>&nbsp; </p>
</body>
</html>