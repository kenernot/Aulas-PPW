	function validar() {
		var nome = form1.nome.value;
		var sigla = form1.sigla.value;

		if (nome == "") {
			alert('Preencha o campo nome!');
			form1.nome.focus();
			return false;
		} else if (nome.length() > 50) {
			alert('O campo nome pode conter no máximo 50 caracteres!');
			form1.nome.focus();
			return false;
		} else if (sigla.length() != 2) {
			alert('O campo sigla tem que conter 2 caracteres!');
			form1.sigla.focus();
			return false;
		}
		return true;
	}