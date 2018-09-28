<?php

include('include/config.dba.php');

$conexao = mysql_pconnect($host,$user,$pass);
mysql_select_db($base,$conexao);


$sql_rel = "Select * from tusu";
$r_sql_rel = mysql_query($sql_rel, $conexao);
$n_sql_rel = mysql_num_rows($r_sql_rel);


if($n_sql_rel!=0){
	?>
	
	<table border=0 align=center cellpadding=0 cellspacing=0 WIDTH=600 ALIGN=CENTER>
		<tr>
			<td WIDTH=100><CENTER><img src="imagens/logo.png"></CENTER>
		</td>
		<td align=top WIDTH=500>
			<table height=76 cellpadding=0 cellspacing=0 border=0 align=center>
				<tr>
					<td height=46><i><u><CENTER><FONT SIZE="2" face="VERDANA"><?php echo "RELATÓRIO DE USUÁRIOS"; ?></FONT></CENTER></u></i></td>
				</tr>
				<tr>
					<td height=30 align=bottom>
						<table cellpadding=0 cellspacing=0 border=0>
							<tr>
								<td align=right width=250><FONT SIZE=-2 FACE=VERDANA><? echo "Data: ". date("d/m/Y") ." &nbsp; &nbsp; Hora: ". date("H:i:s"); ?></FONT></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		</tr>
	</table>
	<table border=0 align=center cellpadding=0 cellspacing=0 WIDTH=600 ALIGN=CENTER>
		<tr>
			<td WIDTH=100><FONT SIZE=-2 FACE=VERDANA>Código</FONT></td>
			<td WIDTH=500><FONT SIZE=-2 FACE=VERDANA><CENTER>Nome</CENTER></FONT></TD>
		</tr>
		<tr>
			<td colspan=2><hr size=1 noshade></td>
		</tr>

	<?php
	for($x=0; $x < $n_sql_rel; $x++){
			
			?>
			
			<tr
			<?php
			 if($x%2==0)
				echo " bgcolor=#EAEAEA";
			?>
			>
				<td><font size=-1 face=arial><?php echo mysql_result($r_sql_rel, $x, 'ID_TUSU'); ?></font></td>
				<td><font size=-1 face=arial><?php echo mysql_result($r_sql_rel, $x, 'NOME');  ?></font></td>
			</tr>
			<tr><td colspan=2><hr size=1 noshade></td></tr>
	<?php
	}
}
