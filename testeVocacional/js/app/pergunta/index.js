var service = "";
var perguntas = []
var perguntaAtual = 0;
var idQuestionario = 0;
var idResposta = 0;
var valorResposta = 0;
var areas = [];
$(function() {
	service = new PerguntaService();
	service.getLista("carregaPerguntas");
	service = null;
	$(document).on('click', "#btnPositivo", function() {
		responder(true);
	});
	$(document).on('click', "#btnNegativo", function() {
		responder(false);
	});
});

function carregaPerguntas(retorno) {
	perguntas = retorno;
	exibiPergunta();
}

function responder(valor) {
	idQuestionario
	if (valor) {
		valorResposta = 1;
		if (idQuestionario == 0) {
			gerarQuestionario();
		} else {
			addResposta();
		}
	} else {
		valorResposta = 2;
		if (idQuestionario == 0) {
			gerarQuestionario();
		} else {
			addResposta();
		}
	}
}

function gerarQuestionario() {
	service = new QuestionarioService();
	service.add("finalizaGeracao");
}

function finalizaGeracao(retorno) {
	if (retorno.status) {
		service.getID("defineIDQuestionario");
	}
}

function defineIDQuestionario(retorno) {
	strValor = new String(retorno);
	valor = strValor.replace('"', '');
	valor = valor.replace('"', '');
	idQuestionario = parseInt(valor);
	service = new RespostaService();
	addResposta();
}

function addResposta() {
	service.getID("defineResposta");
}

function defineResposta(retorno) {
	strValor = new String(retorno);
	valor = strValor.replace('"', '');
	valor = valor.replace('"', '');
	idResposta = parseInt(valor);
	service.add("finalizaGravacao");
}

function finalizaGravacao(retorno) {
	if (retorno.status) {
		perguntaAtual++;
		exibiPergunta();
	}
}

function exibiPergunta() {
	$("#txtPergunta").text(perguntas[perguntaAtual].texto);
	if (perguntaAtual == (perguntas.length - 1)) {
		$("#btnPositivo").css("opacity", 0);
		$("#btnNegativo").css("opacity", 0);
		$("#txtPergunta").css("opacity", 0);
		service = new QuestionarioService();
		service.encerraQuestionario("finalizaQuestionario");
	}
}

function finalizaQuestionario(retorno){
	if (retorno.status) {
		service = new AreaService();
		service.getLista("carregarAreas");
	}else{
	}
}



function carregarAreas(retorno){
	$.each(retorno,function(index,area){
		alert(area.descricao);
	});
}