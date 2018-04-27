
<style>
@font-face {
	font-family: chinese-rocks;
	src: url('/font/chinese-rocks/chinese-rocks-rg.ttf');
}

#tela {
	position: absolute;
	top: 10%;
	font-family: chinese-rocks;
}

.jumbotron {
	background: #ffffff;
	text-align: center;
	font-family: chinese-rocks;
	font-size: 1.7em;
	width: 100%;
	height: 600px;
	margin-left: 32%;
	opacity: 0.55;
}
.jumbotron 	img{
    width: 50%
	  
 }
.jumbotron 	img:active {
    position: relative;
    padding: 10px;
 }

.pergunta {
	margin-top: 10%;
	font-family: chinese-rocks;
	font-size: 2em;
}
</style>

<script type="text/javascript" src="js/service/PerguntaService.js"></script>
<script type="text/javascript" src="js/service/QuestionarioService.js"></script>
<script type="text/javascript" src="js/service/RespostaService.js"></script>
<script type="text/javascript" src="js/app/pergunta/index.js"></script>

<div class="container" id="tela">
	<div class="jumbotron">
		<div>Programa de orientação profissional</div>
		<div class="pergunta">
			<div class="col-md-3" style="margin-left: 0px">
				<img id="btnPositivo" alt="" src="/img/positivo.png" />
			</div>
			<div class="col-md-6">
				<label id="txtPergunta"></label>
			</div>
			<div class="col-md-3">
				<img id="btnNegativo" alt="" src="/img/negativo.png" />
			</div>
		</div>
	</div>
</div>