var service = "";
var idSexo = 2;
var sexo = [ "m", "f" ];
var checkBoxGroup = [];
pessoa = new Object();

$(function() {
	addCheckBox();
	$(document).on('click', "#btnSalvar", function() {
		salvar();
	});
	$("#txtCpf").mask("999.999.999-99");
});

function addCheckBox() {
	nome = "optMasculino"
	checkBoxGroup.push(new CheckBox(nome));
	$(document).on('click', "#" + nome, function() {
		selectAtivo(this);
	});
	nome = "optFeminino"
	checkBoxGroup.push(new CheckBox(nome));
	$(document).on('click', "#" + nome, function() {
		selectAtivo(this);
	});
}

function selectAtivo(me) {
	chkSelecionado = true;
	$.each(checkBoxGroup, function(index, item) {
		if (item.id == me.id) {
			item.ative(true);
			setSexo(index);
		} else {
			item.ative(false);
		}
	})
}

function salvar() {
	pessoa = getPessoa()
	if (validaDados(pessoa)) {
		service = new PessoaService();
		service.incluir("finalizaCadastro")
	}
}

function finalizaCadastro(retorno) {
	if (retorno.status) {
		window.location = "pergunta";
	}
}

function setSexo(value) {
	idSexo = value;
}

function getPessoa() {
	pessoa.nome = $("#txtNome").val();
	pessoa.sobrenome = $("#txtSobrenome").val();
	pessoa.email = $("#txtEmail").val();
	pessoa.dataNascimento = $("#txtDataNascimento").val();
	pessoa.cpf = $("#txtCpf").val();
	pessoa.sexo = sexo[idSexo]
	return pessoa;
}

function validaDados(pessoa) {
	var valor = true;
	if (pessoa.nome == "") {
		alert("Por favor preencha o campo nome!");
		valor = false;
	} else {
		if (pessoa.sobrenome == "") {
			alert("Por favor preencha o campo sobrenome!");
			valor = false;
		} else {
			if (validacaoEmail(pessoa.email)) {
				if (pessoa.dataNascimento == "") {
					alert("Por favor preencha o campo com data de nascimento!");
					valor = false;
				} else {
					if (idSexo == 2) {
						alert("O campo sexo não foi definido!");
						valor = false;
					}
				}
			} else {
				valor = false;
			}
		}
	}
	return valor;
}

function validacaoEmail(field) {
	valor = false;
	var field = new String(field);
	usuario = field.substring(0, field.indexOf("@"));
	dominio = field.substring(field.indexOf("@") + 1, field.length);
	if ((usuario.length >= 1) && (dominio.length >= 3)
			&& (usuario.search("@") == -1) && (dominio.search("@") == -1)
			&& (usuario.search(" ") == -1) && (dominio.search(" ") == -1)
			&& (dominio.search(".") != -1) && (dominio.indexOf(".") >= 1)
			&& (dominio.lastIndexOf(".") < dominio.length - 1)) {
		return true;
	}
	if (valor == false) {
		alert("O campo e-mail é invalido");
	}
}