var service = "";
var idSexo = 2;
var sexo = [ "m", "f","i" ];
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
	var valor = false;
	if ( (pessoa.nome != "" && idSexo != 2) || (pessoa.nome != "" && validacaoEmail(pessoa.email)) || (pessoa.nome != "" && pessoa.cpf != "___.___.___-__") ||(pessoa.nome != "" && pessoa.dataNascimento != "") ){
		valor = true;
	}else {
		alert("Por favor preencha o campo nome e pelo menos mais um outro campo que não seja o sobrenome");
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
		//alert("O campo e-mail é invalido");
	}
}