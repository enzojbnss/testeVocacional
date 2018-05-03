
<style>

#tela {
	position: absolute;
	top: 10%;
}

.jumbotron {
	background: #ffffff;
	text-align: center;
	font-size: 1.7em;
	width: 100%;
	height: 600px;
	margin-left: 32%;
	opacity: 0.55;
}

.jumbotron 	img {
	width: 50%
}

.jumbotron 	img:active {
	position: relative;
	padding: 10px;
}

.jumbotron 	table {
	width: 80%;
	text-align: center;
	margin-left: 10%;
	margin-right: 10%;
}

.pergunta {
	margin-top: 10%;
	font-size: 2em;
}

.pergunta input{
    font-weight: bolder;
    font-stretch: ultra-expanded;
    font-size: 1.5em;
}



</style>
<script type="text/javascript" src="js/service/PerguntaService.js"></script>
<script type="text/javascript" src="js/service/QuestionarioService.js"></script>
<script type="text/javascript" src="js/service/RespostaService.js"></script>
<script type="text/javascript" src="js/service/AreaService.js"></script>
<script type="text/javascript" src="js/app/pergunta/index.js"></script>

<div class="container" id="tela">
	<div id="dvPerguntas" class="jumbotron">
		<div>Programa de orientação profissional</div>
		<div class="pergunta">
			<div class="col-md-3" style="margin-left: 0px">
				<img id="btnPositivo" alt="" src="img/positivo.png" />
			</div>
			<div class="col-md-6">
				<label id="txtPergunta"></label>
			</div>
			<div class="col-md-3">
				<img id="btnNegativo" alt="" src="img/negativo.png" />
			</div>
		</div>
	</div>
	<div id="dvAreas" class="jumbotron">
		<div>Seu perfil se adequa as seguintes areas</div>
		<div class="pergunta">
			<table data-bind="foreach: areas">
				<tr>
					<td><input type="text" style="font-weight: bolder;" data-bind="value: descricao"
						readonly="readonly" /></td>
				</tr>
			</table>
		</div>
	</div>
</div>