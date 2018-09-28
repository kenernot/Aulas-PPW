			<img src="Imgs/logo.png"> </img>
				
				<div id="inner-body">
					<h1> Agendar Consulta</h1>
					<form onsubmit="return Verifica()" method="post" action="main.php">
						<table id="tab-agendar" border="0">
							<tr>
								<td id="tab-agendar-td">Nome*:</td>
								<td colspan="4">	<input id="mult" type="text" maxlength="75" name="nome">	</td>
							</tr>
							<tr>
								<td id="tab-agendar-td">CPF*:</td>
								<td id="tab-agendar-td">	<input  id="mult" type="text" maxlength="11" onkeypress="return Apenas_Numeros(event)" name="cpf">	</td>
								<td id="tab-agendar-td">D/ Nascimento*:</td>
								<td id="tab-agendar-td">	<input  id="mult" type="text" maxlength="10" onKeyPress="ajustar_data(this)" name="data_nascimento">	</td>
							</tr>
							<tr>
								<td id="tab-agendar-td">Fone:</td>
								<td id="tab-agendar-td">	<input  id="mult" type="text" maxlength="11" onkeypress="return Apenas_Numeros(event)">	</td>
								<td id="tab-agendar-td">Fone:</td>
								<td id="tab-agendar-td">	<input  id="mult" type="text" maxlength="11" onkeypress="return Apenas_Numeros(event)">	</td>
							</tr>
							<tr>
								<td id="tab-agendar-td">Dias disponíveis*:</td>
								<td id="tab-agendar-td">
									<select  id="sel" name="sel">
									
									</select>
								</td>
							</tr>
							<tr>
								<td id="tab-agendar-td" colspan="4" align="center"> <input  id="mult"  type="submit" a> </td>
							</tr>
						</table>
					</form>
				</div>