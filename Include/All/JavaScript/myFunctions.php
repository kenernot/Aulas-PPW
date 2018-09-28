		<script language="JavaScript">
			function ajustar_data(input) {
				if ((event.keyCode<48)||(event.keyCode>57)){
					event.returnValue = false;
				} else {
					if ((input.value.length==2)||(input.value.length==5)) {
					input.value=input.value + "/" ;
					}
				}
			}
			
			function Apenas_Numeros(caracter) {
			  var nTecla = 0;
			  if (document.all) {
				  nTecla = caracter.keyCode;
			  } else {
				  nTecla = caracter.which;
			  }
			  if ((nTecla> 47 && nTecla <58)
			  || nTecla == 8 || nTecla == 127
			  || nTecla == 0 || nTecla == 9  // 0 == Tab
			  || nTecla == 13) { // 13 == Enter
				  return true;
			  } else {
				  return false;
			  }
			}
			
			function Ajusta_Select() {
				var hoje = new Date();
				hoje.setDate(hoje.getDate() + 1);
				document.getElementById("sel").options.clear;
				var opt1 = document.createElement("option");
				var opt2 = document.createElement("option");
				opt1.value = "1";
				opt1.text = hoje.getDate()+"/"+			(parseFloat(hoje.getMonth()+1))					+"/"+ hoje.getFullYear() + " - 14:15";
				hoje.setDate(hoje.getDate() + 5);
				opt2.value = "2";
				opt2.text = hoje.getDate()+"/"+			(parseFloat(hoje.getMonth()+1))					+"/"+ hoje.getFullYear() + " - 08:15";;
				document.getElementById("sel").add(opt1, null);
				document.getElementById("sel").add(opt2, null);
			}
			
			function Verifica() {
				if (document.getElementsByName('nome')[0].value == ""  || document.getElementsByName('cpf')[0].value == "" || document.getElementsByName('data_nascimento')[0].value == "" || document.getElementsByName('sel')[0].value == "") {
					alert("Existem campos obrigatórios vazios!");
					return false;
				} else if (document.getElementsByName('cpf')[0].value.length != 11 || document.getElementsByName('data_nascimento')[0].value.length != 10) { 
					alert("Existem campos obrigatórios não completamente preenchidos");
					return false;					
				} else {
					alert("Agendado com sucesso!");
					return true;
				}
				//alert("Existem campos obrig�torios vazios!");
			}

		</script>