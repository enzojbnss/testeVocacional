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
	if (idSexo == 2) {
		alert("O campo sexo não foi definido!");
	} else {
		pessoa = getPessoa()
        service = new PessoaService();
		service.incluir("finalizaCadastro")
	}
}

function finalizaCadastro(retorno){
	if(retorno.status){
		window.location= "pergunta";	
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
